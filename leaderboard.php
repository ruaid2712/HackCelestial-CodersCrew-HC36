<!DOCTYPE html>
<html lang="en">
<?php
session_start();
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
    <title>Leaderboard - JobCraft</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #121212;
            color: #f1f1f1;
            margin: 0;
            padding: 0;
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
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #007bff;
        }

        /* Leaderboard Section */
        .leaderboard {
            max-width: 800px;
            margin: 40px auto;
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
        }

        .leaderboard h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #444;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #2e2e2e;
        }

        /* Avatar Styles */
        .avatar {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin-right: 10px;
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

    <!-- Navbar -->
    <nav>
        <div class="logo">JobCraft</div>
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

    <!-- Leaderboard Section -->
    <div class="leaderboard">
        <h2>Leaderboard</h2>
        <table>
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Name</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><img src="https://via.placeholder.com/40" class="avatar" alt="John Doe">John Doe</td>
                    <td>1500</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><img src="https://via.placeholder.com/40" class="avatar" alt="Jane Smith">Jane Smith</td>
                    <td>1400</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><img src="https://via.placeholder.com/40" class="avatar" alt="Emily Johnson">Emily Johnson</td>
                    <td>1300</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><img src="https://via.placeholder.com/40" class="avatar" alt="Michael Brown">Michael Brown</td>
                    <td>1200</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td><img src="https://via.placeholder.com/40" class="avatar" alt="Sarah Wilson">Sarah Wilson</td>
                    <td>1100</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td><img src="https://via.placeholder.com/40" class="avatar" alt="David Lee">David Lee</td>
                    <td>1050</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td><img src="https://via.placeholder.com/40" class="avatar" alt="Sophia Kim">Sophia Kim</td>
                    <td>1000</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td><img src="https://via.placeholder.com/40" class="avatar" alt="James Chen">James Chen</td>
                    <td>950</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td><img src="https://via.placeholder.com/40" class="avatar" alt="Isabella Martinez">Isabella
                        Martinez</td>
                    <td>900</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td><img src="https://via.placeholder.com/40" class="avatar" alt="Liam Nguyen">Liam Nguyen</td>
                    <td>850</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 JobCraft. All rights reserved.</p>
    </footer>

</body>

</html>