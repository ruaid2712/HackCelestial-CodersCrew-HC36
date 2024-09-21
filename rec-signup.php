<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruiter Signup</title>
    <style>
        * {
            /* box-sizing: border-box; */
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #000;
            /* Changed to black background */
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* margin: 0; */
            margin: 0 80px;
        }

        .signup-container {
            background-color: #333;
            /* Dark grey background for the form */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            width: 90%;
            /* Responsive width */
            max-width: 600px;
            /* Max width for larger screens */
        }

        h2 {
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #ccc;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #555;
            background-color: #222;
            /* Slightly lighter black for input fields */
            color: #ddd;
            /* Light grey text */
            font-size: 16px;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
            background-color: #333;
            /* Slightly darker on focus */
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 18px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            text-decoration: none;
            color: #007bff;
        }

        .login-link a:hover {
            color: #0056b3;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .signup-container {
                padding: 30px;
            }

            h2,
            button {
                font-size: 16px;
            }

            input[type="text"],
            input[type="email"],
            input[type="password"] {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    <?php
    // Database connection setup
    include "db.php";

    // Form submission handling
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect and escape form data
        $companyName = $conn->real_escape_string($_POST['companyName']);
        $companyEmail = $conn->real_escape_string($_POST['companyEmail']);
        $recruiterName = $conn->real_escape_string($_POST['recruiterName']);
        $recruiterEmail = $conn->real_escape_string($_POST['recruiterEmail']);
        $password = $conn->real_escape_string($_POST['password']); // Remember to hash this password before storing
    
        // SQL to insert new record
        $sql = "INSERT INTO recruiters (companyName, companyEmail, recruiterName, recruiterEmail, password)
        VALUES ('$companyName', '$companyEmail', '$recruiterName', '$recruiterEmail', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='color: green;'>New record created successfully</p>";
        } else {
            echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    }

    $conn->close();
    ?>

    <div class="signup-container">
        <h2>Recruiter Signup</h2>
        <form id="recruiter-signup-form" method="post">
            <!-- Company Name -->
            <div class="form-group">
                <label for="company-name">Company Name</label>
                <input type="text" id="company-name" name="companyName" placeholder="Enter company name" required>
            </div>

            <!-- Company Email -->
            <div class="form-group">
                <label for="company-email">Company Email</label>
                <input type="email" id="company-email" name="companyEmail" placeholder="Enter company email" required>
            </div>

            <!-- Recruiter Name -->
            <div class="form-group">
                <label for="recruiter-name">Recruiter Name</label>
                <input type="text" id="recruiter-name" name="recruiterName" placeholder="Enter recruiter name" required>
            </div>

            <!-- Recruiter Email -->
            <div class="form-group">
                <label for="recruiter-email">Recruiter Email</label>
                <input type="email" id="recruiter-email" name="recruiterEmail" placeholder="Enter recruiter email"
                    required>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required>
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirmPassword" placeholder="Confirm password"
                    required>
            </div>

            <!-- Submit Button -->
            <button type="submit">Sign Up</button>
        </form>

        <!-- Already have an account link -->
        <div class="login-link">
            Already have an account? <a href="#">Log in</a>
        </div>
    </div>

</body>

</html>