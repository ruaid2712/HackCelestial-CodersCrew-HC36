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
    <title>Homepage - JobCraft</title>
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

        /* Hero Section */
        .hero {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: #1e1e1e;
            padding: 60px 20px;
            margin-top: 20px;
        }

        .hero img {
            max-width: 100%;
            width: 800px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
        }

        .hero-content {
            max-width: 600px;
            padding: 20px;
        }

        .hero-content h1 {
            font-size: 48px;
            margin-bottom: 20px;
            color: #ffffff;
        }

        .hero-content p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .hero-content button {
            padding: 15px 30px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .hero-content button:hover {
            background-color: #0056b3;
        }

        /* About Company Section */
        .about-company {
            background-color: #1c1c1c;
            padding: 50px 20px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
            text-align: center;
            margin: 50px 20px;
        }

        .about-company h2 {
            color: #007bff;
            font-size: 36px;
            margin-bottom: 20px;
        }

        .about-company p {
            font-size: 18px;
            line-height: 1.6;
            color: #ccc;
            max-width: 800px;
            margin: 0 auto 20px;
        }

        /* Featured Section */
        .featured-section {
            padding: 50px 20px;
        }

        .featured-section h2 {
            text-align: center;
            color: #ffffff;
            font-size: 36px;
            margin-bottom: 40px;
        }

        .featured-items {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .featured-item {
            background-color: #1c1c1c;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
            transition: transform 0.3s;
        }

        .featured-item:hover {
            transform: scale(1.05);
        }

        .featured-item h3 {
            color: #007bff;
            margin-bottom: 10px;
            font-size: 24px;
        }

        .featured-item p {
            margin-bottom: 15px;
            font-size: 16px;
            line-height: 1.5;
            color: #ccc;
        }

        .featured-item button {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }

        .featured-item button:hover {
            background-color: #0056b3;
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
        <div class="logo">JobsCraft</div>
        <ul>
            <li><a href="#">Home</a></li>
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


    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to Internship and Jobs Portal</h1>
            <p>Find the best internship and job opportunities that align with your skills and aspirations. Whether
                you're a tech enthusiast, marketing expert, or cybersecurity whiz, we've got something for you.</p>
            <button>Explore Opportunities</button>
        </div>
        <img src="img/converted_imghack.jpg" alt="Company Overview Image">
    </section>

    <!-- About Company Section -->
    <section class="about-company">
        <h2>About JobCraft</h2>
        <p>At JobCraft, we are dedicated to empowering students to find meaningful internships and job opportunities
            that align with their career aspirations. Our mission is to bridge the gap between eager talent and
            companies seeking fresh perspectives.</p>
        <p>We believe that every student deserves a chance to kickstart their career with valuable experiences. Our
            platform connects ambitious individuals with industry leaders, fostering growth, innovation, and creativity.
        </p>
        <p>Join us as we transform the landscape of career development for students. At JobCraft, your future is our
            priority, and we’re here to guide you on your journey to success!</p>
    </section>

    <!-- Featured Jobs and Internships Section -->
    <section class="featured-section">
        <h2>Featured Jobs & Internships</h2>
        <div class="featured-items">
            <!-- Featured Item 1 -->
            <div class="featured-item">
                <h3>Software Development Intern</h3>
                <p>Join a leading tech company as a software development intern and work on cutting-edge projects.
                    Duration: 3 months. Location: Mumbai, MH</p>
                <button>Apply Now</button>
            </div>

            <!-- Featured Item 2 -->
            <div class="featured-item">
                <h3>Marketing Intern</h3>
                <p>Assist with marketing campaigns, social media management, and market research in this dynamic role.
                    Duration: 6 months. Location: Bangalore, KA</p>
                <button>Apply Now</button>
            </div>

            <!-- Featured Item 3 -->
            <div class="featured-item">
                <h3>Cybersecurity Analyst</h3>
                <p>Protect vital systems from cyber threats as a cybersecurity intern in a fast-growing tech company.
                    Duration: 4 months. Location: Delhi, DL</p>
                <button>Apply Now</button>
            </div>

            <!-- Featured Item 4 -->
            <div class="featured-item">
                <h3>Data Science Internship</h3>
                <p>Gain hands-on experience in data analysis, machine learning, and AI as a data science intern.
                    Duration: 5 months. Location: Pune, MH</p>
                <button>Apply Now</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Internship and Jobs Portal. All rights reserved.</p>
    </footer>

</body>

</html>