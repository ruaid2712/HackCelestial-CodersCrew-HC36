<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruiter Post Page</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #121212;
            color: #f1f1f1;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* Navbar styling */
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

        nav ul li a {
            text-decoration: none;
            color: #f1f1f1;
            font-size: 18px;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 8px;
            transition: background-color 0.3s, transform 0.3s;
        }

        nav ul li a:hover {
            background-color: #007bff;
            transform: scale(1.05);
        }

        .logo {
            color: #ffffff;
            font-size: 24px;
            font-weight: bold;
        }

        /* Split layout */
        .main-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 40px 30px;
        }

        /* Form Section */
        .form-container {
            flex: 3;
            background-color: #1e1e1e;
            padding: 40px;
            border-radius: 10px;
            margin-right: 20px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
        }

        .form-container h1 {
            color: #ffffff;
            font-size: 36px;
            margin-bottom: 30px;
        }

        .form-container label {
            color: #ffffff;
            font-size: 18px;
            margin-bottom: 10px;
            display: block;
        }

        .form-container input[type="text"],
        .form-container textarea,
        .form-container select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #007bff;
            border-radius: 5px;
            background-color: #1c1c1c;
            color: #ffffff;
            font-size: 16px;
            transition: border-color 0.3s, background-color 0.3s;
        }

        .form-container input[type="text"]:focus,
        .form-container textarea:focus,
        .form-container select:focus {
            border-color: #0056b3;
            background-color: #2e2e2e;
        }

        .form-container textarea {
            resize: vertical;
        }

        .form-container button {
            padding: 12px 30px;
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.3s;
            width: 100%;
        }

        .form-container button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        /* Sidebar Section */
        .sidebar {
            flex: 1;
            background-color: #1c1c1c;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
            position: sticky;
            top: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .sidebar h3 {
            color: #ffffff;
            margin-bottom: 20px;
            text-align: center;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            background-color: #2e2e2e;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .sidebar ul li:hover {
            background-color: #007bff;
            transform: scale(1.05);
        }

        /* New Section: Recruiter Stats */
        .stats {
            background-color: #2e2e2e;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            color: #ffffff;
            font-size: 18px;
        }

        .stats p {
            margin: 10px 0;
        }

        /* New Section: Recent Posts */
        .recent-posts {
            background-color: #2e2e2e;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            color: #ffffff;
        }

        .recent-posts h4 {
            color: #ffffff;
            margin-bottom: 10px;
        }

        .recent-posts ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .recent-posts ul li {
            padding: 10px;
            background-color: #3a3a3a;
            margin-bottom: 10px;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .recent-posts ul li:hover {
            background-color: #007bff;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #1c1c1c;
            color: #ffffff;
            border-top: 1px solid #444;
            margin-top: 50px;
        }
    </style>
</head>

<body>

    <?php


    include "db.php";
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $location = $_POST['location'];
        $type = $_POST['type'];
        $duration = $_POST['duration'];
        $company = $_POST['company'];
        $description = $_POST['description'];

        // Determine the appropriate table
        switch ($type) {
            case 'job':
                $table = 'jobs';
                break;
            case 'internship':
                $table = 'internships';
                break;
            case 'collaboration':
                $table = 'collaborations';
                break;
            default:
                die("Invalid opportunity type.");
        }

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO $table (title, location, duration, company, description) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $title, $location, $duration, $company, $description);

        if ($stmt->execute()) {
            echo "<script>alert('Opportunity posted successfully!'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    }

    $conn->close();
    ?>

    <!-- Navbar -->
    <nav>
        <div class="logo">JobCraft for Recruiters</div>
        <ul>
            <li><a href="rechome.php">Home</a></li>
            <li><a href="#">Internships</a></li>
            <li><a href="#">Jobs</a></li>
            <li><a href="#">Collaborations</a></li>
            <li><a href="#">Leaderboard</a></li>
        </ul>
    </nav>

    <!-- Main Section with Split Layout -->
    <div class="main-container">
        <!-- Form Section -->
        <div class="form-container">
            <h1>Post a New Opportunity</h1>
            <form method="POST" action="">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="Enter job/internship title" required>

                <label for="location">Location</label>
                <input type="text" id="location" name="location" placeholder="Enter job/internship location" required>

                <label for="type">Type of Opportunity</label>
                <select id="type" name="type" required>
                    <option value="job">Job</option>
                    <option value="internship">Internship</option>
                    <option value="collaboration">Collaboration</option>
                </select>

                <label for="duration">Duration (for internships)</label>
                <input type="text" id="duration" name="duration" placeholder="Enter duration (e.g., 3 months)">

                <label for="company">Company Name</label>
                <input type="text" id="company" name="company" placeholder="Enter company name" required>

                <label for="description">Description</label>
                <textarea id="description" name="description" rows="5" placeholder="Enter detailed description"
                    required></textarea>

                <button type="submit">Post Opportunity</button>
            </form>
        </div>

        <!-- Sidebar with Tips, Stats, and Recent Posts -->
        <div class="sidebar">
            <h3>Tips for Posting</h3>
            <ul>
                <li>Provide a clear job title</li>
                <li>Be specific with location</li>
                <li>Mention work-from-home options</li>
                <li>Set realistic expectations for duration</li>
                <li>Encourage students to apply</li>
            </ul>

            <!-- Recruiter Stats Section -->
            <div class="stats">
                <p><strong>Jobs Posted:</strong> 12</p>
                <p><strong>Applicants:</strong> 125</p>
                <p><strong>Average Response Time:</strong> 3 days</p>
            </div>

            <!-- Recent Posts Section -->
            <div class="recent-posts">
                <h4>Recent Posts</h4>
                <ul>
                    <li>Full-Stack Developer - TechCorp</li>
                    <li>Marketing Intern - Creative Inc.</li>
                    <li>Data Analyst - FinTech Group</li>
                    <li>UX Designer - DesignWorks</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 JobCraft for Recruiters. All rights reserved.</p>
    </footer>

</body>

</html>