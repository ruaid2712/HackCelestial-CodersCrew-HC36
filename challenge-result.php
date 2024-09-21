<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge Result</title>
</head>

<body>
    <h3>Output: <?php echo htmlspecialchars($_GET['output']); ?></h3>
    <h3>Points Earned: <?php echo htmlspecialchars($_GET['points']); ?></h3>
    <a href="challenge.php">Go back to Challenge</a>
</body>

</html>