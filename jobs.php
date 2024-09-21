<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include "db.php"; // Include database connection

if (isset($_SESSION['email'])) {
    if (!isset($_SESSION['login_alert_shown'])) {
        echo "<script>alert('Login Successful')</script>";
        $_SESSION['login_alert_shown'] = true; // Set to true to avoid showing the alert again
    }
}

// Handle search query
$searchTerm = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
$locationFilter = isset($_GET['location']) ? $conn->real_escape_string($_GET['location']) : '';

// Construct SQL query
$sql = "SELECT * FROM jobs WHERE title LIKE '%$searchTerm%' ";
if ($locationFilter) {
    $sql .= "AND location = '$locationFilter' ";
}
$result = $conn->query($sql);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Page - JobCraft for Students</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #121212;
            color: #f1f1f1;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

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

        .hero {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #1e1e1e;
            padding: 60px 20px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3);
        }

        .hero-content h1 {
            font-size: 48px;
            margin-bottom: 20px;
            color: #ffffff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }

        .search-filter {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            background-color: #2a2a2a;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .search-filter input[type="text"],
        .search-filter select {
            padding: 10px;
            border: 2px solid #007bff;
            border-radius: 5px;
            background-color: #1c1c1c;
            color: #f1f1f1;
            transition: border-color 0.3s, background-color 0.3s;
        }

        .search-filter input[type="text"]:focus,
        .search-filter select:focus {
            border-color: #0056b3;
            background-color: #2e2e2e;
        }

        .job-listings-section {
            padding: 50px 20px;
            flex-grow: 1;
        }

        .job-listings-section h2 {
            text-align: center;
            color: #ffffff;
            font-size: 36px;
            margin-bottom: 40px;
        }

        .job-listings {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .job-item {
            background-color: #1c1c1c;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
            transition: transform 0.3s;
        }

        .job-item:hover {
            transform: scale(1.05);
        }

        .job-item h3 {
            color: #007bff;
            margin-bottom: 10px;
            font-size: 24px;
        }

        .job-item p {
            margin-bottom: 15px;
            font-size: 16px;
            line-height: 1.5;
            color: #ccc;
        }

        .view-details-btn {
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }

        .view-details-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #1c1c1c;
            color: #ffffff;
            border-top: 1px solid #444;
        }
    </style>
    <script>
        function viewDetails(jobId) {
            window.location.href = 'details.php?id=' + jobId + '&type=job';
        }
    </script>
</head>

<body>

    <nav>
        <div class="logo">JobsCraft</div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="jobs.php">Jobs</a></li>
            <li><a href="internships.php">Internship</a></li>
            <li><a href="collaboration.php">Collaboration</a></li>
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

    <section class="hero">
        <div class="hero-content">
            <h1>Find Your Dream Jobs</h1>
            <p>Browse through various internships and jobs in tech, business, and more!</p>
        </div>
        <div class="search-filter">
            <form method="GET" action="">
                <input type="text" name="search" placeholder="Search for jobs..."
                    value="<?php echo htmlspecialchars($searchTerm); ?>">
                <select name="location">
                    <option value="">Select Location</option>
                    <option value="mumbai" <?php if ($locationFilter == 'mumbai')
                        echo 'selected'; ?>>Mumbai</option>
                    <option value="bangalore" <?php if ($locationFilter == 'bangalore')
                        echo 'selected'; ?>>Bangalore
                    </option>
                    <option value="delhi" <?php if ($locationFilter == 'delhi')
                        echo 'selected'; ?>>Delhi</option>
                    <option value="chennai" <?php if ($locationFilter == 'chennai')
                        echo 'selected'; ?>>Chennai</option>
                </select>
                <button type="submit">Search</button>
            </form>
        </div>
    </section>

    <section class="job-listings-section">
        <h2>Available Jobs</h2>
        <div class="job-listings">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="job-item">';
                    echo '<h3>' . htmlspecialchars($row["title"]) . '</h3>';
                    echo '<p>Location: ' . htmlspecialchars($row["location"]) . '</p>';
                    echo '<p>Duration: ' . htmlspecialchars($row["duration"]) . '</p>';
                    echo '<p>Company: ' . htmlspecialchars($row["company"]) . '</p>';
                    echo '<button class="view-details-btn" onclick="viewDetails(' . $row["id"] . ')">View Details</button>';
                    echo '</div>';
                }
            } else {
                echo '<p>No jobs found.</p>';
            }
            ?>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 JobCraft for Students. All rights reserved.</p>
    </footer>

</body>

</html>