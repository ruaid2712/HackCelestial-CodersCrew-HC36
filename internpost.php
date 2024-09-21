<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post an Internship</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(img/internback.jpeg);
            /* background-position: cover; */
            background-size: cover;
        }

        .form-container {
            background-color: rgba(0, 0, 0, 0);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.4);
            max-width: 60%;
            margin: auto;

        }

        h1 {
            font-size: 24px;
            color: #fff;
        }

        label {
            display: block;
            margin: 15px 0 5px;
            color: #f4f4f4;
            font-weight: 500;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-sizing: border-box;
            opacity: 0.6;
            /* Added for better box sizing */
        }

        button {
            background-color: #5c67f2;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-top: 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #5058e5;
        }

        .checkbox-group,
        .button-group {
            margin: 15px 0;
        }

        .checkbox-group label,
        .button-group label {
            margin-right: 20px;
        }

        .checkbox-group input[type="checkbox"],
        .button-group input[type="radio"] {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Post an Internship Opening</h1>
        <form action="internpost.php" method="POST">
            <label for="title">Internship Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="company">Company Name:</label>
            <input type="text" id="company" name="company" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>

            <label for="type">Internship Type:</label>
            <select id="type" name="type" required>
                <option value="Full-time">Full-time</option>
                <option value="Part-time">Part-time</option>
                <option value="Remote">Remote</option>
            </select>

            <label for="duration">Duration (in months):</label>
            <input type="number" id="duration" name="duration" min="1" required>

            <label for="stipend">Stipend (if any):</label>
            <input type="text" id="stipend" name="stipend">

            <label for="description">Internship Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <label for="email">Contact Email:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Post Internship</button>
        </form>
    </div>
</body>

</html>