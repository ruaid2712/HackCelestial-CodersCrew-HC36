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

// Initialize variables for search and location
$searchTerm = isset($_GET['search']) ? $conn->real_escape_string(trim($_GET['search'])) : '';
$locationFilter = isset($_GET['location']) ? $conn->real_escape_string(trim($_GET['location'])) : '';

// Construct SQL query
$sql = "SELECT * FROM startups WHERE title LIKE '%$searchTerm%' ";
if ($locationFilter) {
    $sql .= "AND location = '$locationFilter' ";
}

$result = $conn->query($sql);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Collaboration with Startups</title>
    <link rel="stylesheet" href="css/colstyle.css"> <!-- Link to CSS file -->
    <style>
        /* Global Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding: 0;
        }

        /* Navbar */
        nav {
            background-color: #1c1c1c;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            text-decoration: none;
            color: #f1f1f1;
            font-size: 18px;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #007bff;
        }

        .logo {
            color: #ffffff;
            font-size: 24px;
            font-weight: bold;
        }

        /* Header */
        header {
            text-align: center;
            padding: 40px 0;
            background-color: #1e1e1e;
        }

        header h1 {
            color: #00b4d8;
            font-size: 36px;
        }

        form {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        form input,
        form select {
            padding: 10px;
            border: 1px solid #333;
            border-radius: 5px;
        }

        form button {
            padding: 10px 20px;
            background-color: #00b4d8;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #0090b1;
        }

        /* Project List */
        .project-list {
            max-width: 900px;
            margin: 0 auto;
        }

        .project-item {
            background-color: #1e1e1e;
            padding: 20px;
            margin: 15px 0;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .project-item h2 {
            color: #00b4d8;
        }

        .details-btn {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #00b4d8;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .details-btn:hover {
            background-color: #0090b1;
        }

        /* Details Section */
        .details-container {
            display: none;
            margin-top: 20px;
            padding: 20px;
            background-color: #1e1e1e;
            border-radius: 10px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.4);
        }

        .details-container h3 {
            color: #00b4d8;
        }

        .apply-btn {
            margin-top: 15px;
            padding: 12px 30px;
            background-color: #00b4d8;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        .apply-btn:hover {
            background-color: #0090b1;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #1e1e1e;
            color: #fff;
            border-top: 1px solid #333;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <nav>
        <div class="logo">JobsCraft</div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="jobs.php">Jobs</a></li>
            <li><a href="internships.php">Internships</a></li>
            <li><a href="#">Collaboration</a></li>
            <li><a href="challenge.php">Challenge</a></li>
            <li><a href="openAI.php">Resume Builder</a></li>
            <li><a href="leaderboard.php">Leaderboard</a></li>
            <?php if (isset($_SESSION['email'])): ?>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="student-login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <header>
        <h1>Discover Collaboration Projects</h1>
        <form id="search-form" method="GET" action="">
            <input type="text" name="search" placeholder="Search project titles or startups"
                value="<?php echo htmlspecialchars($searchTerm); ?>">
            <select name="location">
                <option value="">Select Location</option>
                <option value="mumbai" <?php if ($locationFilter == 'mumbai')
                    echo 'selected'; ?>>Mumbai</option>
                <option value="bangalore" <?php if ($locationFilter == 'bangalore')
                    echo 'selected'; ?>>Bangalore</option>
                <option value="delhi" <?php if ($locationFilter == 'delhi')
                    echo 'selected'; ?>>Delhi</option>
                <option value="chennai" <?php if ($locationFilter == 'chennai')
                    echo 'selected'; ?>>Chennai</option>
            </select>
            <button type="submit">Search</button>
        </form>
    </header>

    <main>
        <section class="project-list" id="project-list">
            <?php
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="project-item" data-id="' . $row["id"] . '">';
                    echo '<h2>' . htmlspecialchars($row["title"]) . '</h2>';
                    echo '<p><strong>Startup:</strong> ' . htmlspecialchars($row["startup_name"]) . '</p>';
                    echo '<p><strong>Location:</strong> ' . htmlspecialchars($row["location"]) . '</p>';
                    echo '<button class="details-btn" data-id="' . $row["id"] . '">View Details</button>';
                    echo '</div>';
                }
            } else {
                echo '<p>No collaboration projects found.</p>';
            }
            ?>
        </section>

        <!-- Details Section (initially hidden) -->
        <div class="details-container" id="details-container">
            <h3>Project Details</h3>
            <p id="project-title"></p>
            <p id="project-startup"></p>
            <p id="project-location"></p>
            <p id="project-description"></p>
            <button class="apply-btn">Apply Now</button>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Collaboration Portal. All rights reserved.</p>
    </footer>

    <script>
        // JavaScript to handle View Details
        document.querySelectorAll('.details-btn').forEach(button => {
            button.addEventListener('click', function () {
                const projectId = this.getAttribute('data-id');
                const projectItem = this.closest('.project-item');

                // Retrieve project details from the clicked project item
                const title = projectItem.querySelector('h2').textContent;
                const startup = projectItem.querySelector('p:nth-child(2)').textContent;
                const location = projectItem.querySelector('p:nth-child(3)').textContent;

                // Display details in the details container
                document.getElementById('project-title').textContent = title;
                document.getElementById('project-startup').textContent = startup;
                document.getElementById('project-location').textContent = location;
                document.getElementById('project-description').textContent = 'Collaborate on ' + title + ' project.';

                // Show the details container
                document.getElementById('details-container').style.display = 'block';

                // Scroll to the details container
                document.getElementById('details-container').scrollIntoView({ behavior: 'smooth' });
            });
        });
    </script>
</body>

</html>