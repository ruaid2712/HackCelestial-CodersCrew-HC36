<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include "db.php"; // Include your database connection file

if (isset($_SESSION['email'])) {
    if (!isset($_SESSION['login_alert_shown'])) {
        echo "<script>alert('Login Successful')</script>";
        $_SESSION['login_alert_shown'] = true; // Set to true to avoid showing the alert again
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekly Coding Challenge</title>
    <link rel="stylesheet" href="css/challstyle.css">
</head>

<body>
    <nav>
        <div class="logo">Internship Portal</div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="jobs.php">Jobs</a></li>
            <li><a href="internships.php">Internship</a></li>
            <li><a href="collaboration.php">Collaboration</a></li>
            <li><a href="#">Challenge</a></li>
            <li><a href="openAI.php">Resume Builder</a></li>
            <?php if (isset($_SESSION['email'])): ?>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="student-login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <?php
    include "db.php";
    $sql = "SELECT id, ques, answer FROM challenge ORDER BY RAND() LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No challenges found.";
    }
    ?>

    <div class="container">
        <!-- Main Content Area -->
        <main class="main-content">
            <div class="header">
                <h1>Weekly Coding Challenge</h1>
                <button class="theme-toggle">🌙 Toggle Theme</button>
            </div>

            <section class="challenge-box">
                <h2><?php echo "Question: " . $row['ques']; ?></h2>
            </section>

            <!-- Code Submission Section -->
            <form action="process.php" method="POST" class="editor-container">
                <div class="language-selection">
                    <label for="language">Select Language:</label>
                    <select name="language" id="language">
                        <option value="python3">Python 3</option>
                        <option value="cpp17">C++</option>
                        <option value="java">Java</option>
                    </select>
                </div>

                <textarea name="code" id="code-editor" rows="10" placeholder="Write your code here..."></textarea>
                <input type="hidden" name="question_id" value="<?php echo $row['id']; ?>">

                <button type="submit" class="run-btn">Run Code</button>
            </form>

            <!-- Results Section -->
            <div class="results-container">
                <?php if (isset($_GET['output'])): ?>
                    <h3>Output:</h3>
                    <pre><?php echo htmlspecialchars($_GET['output'], ENT_QUOTES, 'UTF-8'); ?></pre>
                <?php else: ?>
                    <h3>No output available. Please submit a solution.</h3>
                <?php endif; ?>
                <?php if (isset($_GET['points'])): ?>
                    <h3>Points Earned: <?php echo htmlspecialchars($_GET['points'], ENT_QUOTES, 'UTF-8'); ?></h3>
                <?php else: ?>
                    <h3>No points awarded.</h3>
                <?php endif; ?>
            </div>
        </main>
    </div>

    <?php
    if (isset($_SESSION['email']) && isset($_GET['points'])) {
        $stmt = $conn->prepare("UPDATE `user` SET `score` = ? WHERE email = ?");
        $stmt->bind_param("is", $_GET['points'], $_SESSION['email']);
        if ($stmt->execute()) {
            echo "<script>alert('Score updated');</script>";
        } else {
            echo "<script>alert('Error updating score');</script>";
        }
    }
    ?>

    <footer class="footer">
        <p>&copy; 2024 Coding Challenges, Inc.</p>
    </footer>

    <script src="scripts.js"></script>
</body>

</html>