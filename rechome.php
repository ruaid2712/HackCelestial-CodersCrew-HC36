<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage - JobCraft for Recruiters</title>
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

        /* Features Section */
        .features-section {
            padding: 50px 20px;
        }

        .features-section h2 {
            text-align: center;
            color: #ffffff;
            font-size: 36px;
            margin-bottom: 40px;
        }

        .features-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .feature-item {
            background-color: #1c1c1c;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
            transition: transform 0.3s;
        }

        .feature-item:hover {
            transform: scale(1.05);
        }

        .feature-item h3 {
            color: #007bff;
            margin-bottom: 10px;
            font-size: 24px;
        }

        .feature-item p {
            margin-bottom: 15px;
            font-size: 16px;
            line-height: 1.5;
            color: #ccc;
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
        <div class="logo">Internship and Jobs Portal</div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="recpost.php">Post a Job</a></li>
            <li><a href="#">View Candidates</a></li>
            <li><a href="#">Leaderboard</a></li>
            <li><a href="collaboration.php">Collaboration</a></li>
            <li><a href="#">Login</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to JobCraft for Recruiters</h1>
            <p>Connect with talented candidates and streamline your recruitment process. Find the perfect fit for your
                team today.</p>
            <button>Post a Job Now</button>
        </div>
        <img src="img2.jpg" alt="Recruitment Overview Image">
    </section>

    <!-- About Company Section -->
    <section class="about-company">
        <h2>About JobCraft</h2>
        <p>At JobCraft, we understand the challenges recruiters face in finding the right talent. Our platform is
            designed to connect you with driven candidates who are eager to make an impact in their careers.</p>
        <p>We empower recruiters with tools to post jobs easily, view candidate profiles, and manage applications
            effectively. Our mission is to simplify the hiring process, making it faster and more efficient.</p>
        <p>Join us at JobCraft, where connecting talent with opportunity is our priority. Together, we can build the
            teams of tomorrow!</p>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <h2>Why Choose JobCraft?</h2>
        <div class="features-list">
            <div class="feature-item">
                <h3>Streamlined Job Posting</h3>
                <p>Easily post job openings with our user-friendly interface and reach a diverse pool of candidates.</p>
            </div>
            <div class="feature-item">
                <h3>Candidate Search</h3>
                <p>Utilize our powerful search tools to find the perfect candidates for your specific needs.</p>
            </div>
            <div class="feature-item">
                <h3>Analytics & Insights</h3>
                <p>Track the performance of your job postings and gain valuable insights into candidate engagement.</p>
            </div>
            <div class="feature-item">
                <h3>Collaboration Tools</h3>
                <p>Work seamlessly with your team to review applications and make informed hiring decisions.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Internship and Jobs Portal. All rights reserved.</p>
    </footer>

</body>

</html>