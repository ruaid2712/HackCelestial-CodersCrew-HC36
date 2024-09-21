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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Internship Opportunities</title>
  <link rel="stylesheet" href="/css/styles.css" />
  <!-- Link to the CSS file -->
  <style>
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

    /* Styling adjustments for the rest of the page */
    body.dark-theme {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background-color: #121212;
      color: #f1f1f1;
      margin: 0;
      padding: 0;
    }

    header {
      padding: 20px;
      text-align: center;
      background-color: #1c1c1c;
      border-bottom: 1px solid #444;
    }

    header h1 {
      margin: 0;
      color: #ffffff;
    }

    #search-form {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
      margin-top: 10px;
    }

    #search-form input {
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #555;
      width: 250px;
    }

    #search-form select {
      padding: 10px;
      border-radius: 5px;
      background-color: #1e1e1e;
      color: white;
      border: 1px solid #555;
    }

    #search-form button {
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      background-color: #007bff;
      color: white;
      cursor: pointer;
      font-weight: bold;
    }

    #search-form button:hover {
      background-color: #0056b3;
    }

    .filters {
      padding: 20px;
      background-color: #1c1c1c;
      border-bottom: 1px solid #444;
      display: flex;
      justify-content: center;
    }

    .popular-searches {
      display: flex;
      justify-content: center;
      gap: 15px;
      flex-wrap: wrap;
    }

    .popular-searches span {
      font-size: 16px;
      margin-right: 10px;
    }

    .popular-searches button {
      padding: 10px 20px;
      background-color: #007bff;
      border: none;
      border-radius: 5px;
      color: white;
      cursor: pointer;
      font-weight: bold;
    }

    .popular-searches button:hover {
      background-color: #0056b3;
    }

    .internship-list {
      display: grid;
      grid-template-columns: repeat(auto-fit,
          minmax(500px, 1fr));
      /* Wider min-width for containers */
      gap: 30px;
      /* Increase the gap between containers */
      padding: 30px;
    }

    .internship-item {
      background-color: #1c1c1c;
      padding: 30px;
      /* Increased padding */
      border-radius: 12px;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
      /* A bit deeper shadow for more depth */
      transition: transform 0.3s;
      font-size: 18px;
      /* Increase font size */
    }

    .internship-item:hover {
      transform: scale(1.08);
      /* Slightly larger scale on hover */
    }

    .internship-item h2 {
      margin-top: 0;
      font-size: 22px;
      /* Make the headings larger */
    }

    .details-btn {
      padding: 15px 25px;
      /* Increase button size */
      background-color: #007bff;
      border: none;
      border-radius: 8px;
      color: white;
      cursor: pointer;
      font-size: 16px;
      /* Larger button text */
      font-weight: bold;
    }

    .details-btn:hover {
      background-color: #0056b3;
    }

    footer {
      text-align: center;
      padding: 20px;
      background-color: #1c1c1c;
      color: #ffffff;
      border-top: 1px solid #444;
    }
  </style>
</head>

<body class="dark-theme" data-page-type="job"> <!-- For jobs page -->


  <!-- Navbar -->
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

  <header>
    <h1>Discover Opportunities</h1>
    <form id="search-form">
      <input type="text" id="search" placeholder="Search job titles or companies" />
      <select id="location-filter">
        <option value="">Select Location</option>
        <option value="Mumbai, MH">Mumbai, MH</option>
        <option value="Bangalore, KA">Bangalore, KA</option>
        <option value="Delhi, DL">Delhi, DL</option>
      </select>
      <button type="submit">Search</button>
    </form>
  </header>

  <main>
    <section class="filters">
      <div class="popular-searches">
        <span>Popular searches:</span>
        <button>Tech Jobs</button>
        <button>Web Development</button>
        <button>Data Analysis</button>
        <button>Cybersecurity</button>
        <button>Networking</button>
        <button>Cloud Computing</button>
        <button>Programming</button>
      </div>
    </section>

    <section class="internship-list" id="internship-list">
      <!-- Internship Entries -->
      <?php
      // Database connection
      include "db.php";


      // Fetch internships from the database
      $sql = "SELECT * FROM internships";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
          echo '<div class="internship-item" data-id="' . $row["id"] . '" data-location="' . $row["location"] . '">';
          echo '<h2>' . $row["title"] . '</h2>';
          echo '<p><strong>Company:</strong> ' . $row["company"] . '</p>';
          echo '<p><strong>Location:</strong> ' . $row["location"] . '</p>';
          echo '<p><strong>Duration:</strong> ' . $row["duration"] . '</p>';
          echo '<p><strong>Description:</strong> ' . $row["description"] . '</p>';
          echo '<button class="details-btn" onclick="viewDetails(' . $row["id"] . ')">View Details</button>';
          echo '</div>';
        }

      } else {
        echo '<p>No internships found.</p>';
      }

      // Close the connection
      $conn->close();
      ?>
    </section>
  </main>

  <footer>
    <p>&copy; 2024 Internship Portal. All rights reserved.</p>
  </footer>

  <script src="js/script.js"></script>
  </>

</html>