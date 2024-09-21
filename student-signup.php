<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Signup</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #000;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0 80px;
        }

        .signup-container {
            background-color: #333;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            width: 90%;
            max-width: 600px;
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
        input[type="password"],
        input[type="file"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #555;
            background-color: #222;
            color: #ddd;
            font-size: 16px;
        }

        input:focus {
            border-color: #007bff;
            background-color: #333;
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

        @media (max-width: 768px) {
            .signup-container {
                padding: 30px;
            }

            h2,
            button {
                font-size: 16px;
            }

            input {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    <?php
    include "db.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $conn->real_escape_string($_POST['studentName']);
        $email = $conn->real_escape_string($_POST['studentEmail']);
        // $phoneNo = $conn->real_escape_string($_POST['phoneNo']);
        $password = $conn->real_escape_string($_POST['password']);

        // Input validation for sign-up
        if (empty($name) || empty($email) || empty($password)) {
            $error_message = "Please fill in all sign-up fields.";
        } else {
            // Check if email already exists
            $stmt = $conn->prepare("SELECT email FROM user WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $error_message = "Email already registered. Please login.";
            } else {
                // Insert new user into the database
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $name, $email, $hashed_password);

                if ($stmt->execute()) {
                    // $success_message = "Sign-up successful! You can now log in.";
                    // session_start();
                    // $_SESSION['email'] = $email; // Store email in session (or any other info)
                    header("Location: student-login.php"); // Change this to the desired redirect page
                    exit();
                }
            }

            $stmt->close();
        }
    }
    ?>

    <div class="signup-container">
        <h2>Student Signup</h2>
        <form id="student-signup-form" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="student-name">Student Name</label>
                <input type="text" id="student-name" name="studentName" placeholder="Enter student name" required>
            </div>

            <div class="form-group">
                <label for="student-email">Student Email</label>
                <input type="email" id="student-email" name="studentEmail" placeholder="Enter student email" required>
            </div>

            <div class="form-group">
                <label for="phone-no">Phone Number</label>
                <input type="tel" id="phone-no" name="phoneNo" placeholder="Enter phone number" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required>
            </div>

            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirmPassword" placeholder="Confirm password"
                    required>
            </div>

            <div class="form-group">
                <label for="document">Upload Document</label>
                <input type="file" id="document" name="document" required>
            </div>

            <button type="submit">Sign Up</button>
        </form>

        <div class="login-link">
            Already have an account? <a href="student-login.php">Log in</a>
        </div>
    </div>

</body>

</html>