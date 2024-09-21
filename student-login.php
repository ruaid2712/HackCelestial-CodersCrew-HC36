<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
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

        .login-container {
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

        input[type="email"],
        input[type="password"] {
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

        .signup-link {
            text-align: center;
            margin-top: 20px;
        }

        .signup-link a {
            text-decoration: none;
            color: #007bff;
        }

        .signup-link a:hover {
            color: #0056b3;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .login-container {
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
        $email = $conn->real_escape_string($_POST['studentEmail']);
        $password = $_POST['password'];

        // Input validation for login
        if (empty($email) || empty($password)) {
            $error_message = "Please fill in all fields.";
        } else {
            // Check if email exists
            $stmt = $conn->prepare("SELECT password FROM user WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows == 0) {
                $error_message = "Email not registered. Please sign up.";
            } else {
                $stmt->bind_result($hashed_password);
                $stmt->fetch();

                // Verify password
                if (password_verify($password, $hashed_password)) {
                    // $success_message = "Login successful! Welcome back.";
                    // Here you could set session variables or redirect to another page
                    session_start();
                    $_SESSION['email'] = $email; // Store email in session (or any other info)
                    header("Location: index.php"); // Change this to the desired redirect page
                    exit();
                } else {
                    $error_message = "Incorrect password. Please try again.";
                }
            }

            $stmt->close();
        }
    }
    ?>

    <div class="login-container">
        <h2>Student Login</h2>
        <?php if (isset($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <?php if (isset($success_message)): ?>
            <div class="error-message" style="color: green;"><?php echo $success_message; ?></div>
        <?php endif; ?>
        <form id="student-login-form" method="post">
            <div class="form-group">
                <label for="student-email">Student Email</label>
                <input type="email" id="student-email" name="studentEmail" placeholder="Enter student email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required>
            </div>

            <button type="submit">Log In</button>
        </form>

        <div class="signup-link">
            Don't have an account? <a href="student-signup.php">Sign up</a>
        </div>
    </div>

</body>

</html>