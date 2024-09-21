<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Sign Up</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>

    <?php
    include "db.php";
    // Start session
    session_start();

    // Define variables for error and success messages
    $error_message = "";
    $success_message = "";



    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['login'])) {
            // Handle login
            $email = $_POST['email'];
            $password = $_POST['pass'];

            // Input validation for login
            if (empty($email) || empty($password)) {
                $error_message = "Please fill in all login fields.";
            } else {
                // Prepare SQL query for login
                $stmt = $conn->prepare("SELECT id, name, password FROM user WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->store_result();

                // Check if user exists
                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($id, $name, $hashed_password);
                    $stmt->fetch();

                    // Verify password
                    if (password_verify($password, $hashed_password)) {
                        // Successful login
                        $_SESSION['user_id'] = $id;
                        $_SESSION['user_name'] = $name;
                        $success_message = "Login successful! Welcome, $name.";
                    } else {
                        $error_message = "Invalid password.";
                    }
                } else {
                    $error_message = "No user found with that email.";
                }

                $stmt->close();
            }
        } elseif (isset($_POST['signup'])) {
            // Handle sign-up
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['pass'];

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
                        $success_message = "Sign-up successful! You can now log in.";
                    } else {
                        $error_message = "Error during sign-up. Please try again.";
                    }
                }

                $stmt->close();
            }
        }
    }

    $conn->close();
    ?>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="login.php" method="POST">
                <h1>Create Account</h1>
                <div class="social-container">
                    <!-- <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a> -->
                </div>
                <span>or use your email for registration</span>

                <!-- Display error or success messages -->
                <?php if (!empty($error_message)): ?>
                    <div style="color: red;"><?= $error_message ?></div>
                <?php endif; ?>
                <?php if (!empty($success_message)): ?>
                    <div style="color: green;"><?= $success_message ?></div>
                <?php endif; ?>

                <input type="text" placeholder="Name" name="name" required />
                <input type="email" placeholder="Email" name="email" required />
                <input type="password" placeholder="Password" name="pass" required />
                <input type="number" placeholder="Mobile No" required>
                <input type="file" name="College ID" id="" accept=".jpeg, .jpg" required>
                <button type="submit" name="signup">Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form action="login.php" method="POST">
                <h1>Sign in</h1>
                <div class="social-container">
                    <!-- <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a> -->
                </div>
                <span>or use your account</span>

                <!-- Display error or success messages -->
                <?php if (!empty($error_message)): ?>
                    <div style="color: red;"><?= $error_message ?></div>
                <?php endif; ?>
                <?php if (!empty($success_message)): ?>
                    <div style="color: green;"><?= $success_message ?></div>
                <?php endif; ?>

                <input type="email" placeholder="Email" name="email" required />
                <input type="password" placeholder="Password" name="pass" required />
                <a href="#">Forgot your password?</a>
                <button type="submit" name="login">Sign In</button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start your journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/login.js"></script>
</body>

</html>