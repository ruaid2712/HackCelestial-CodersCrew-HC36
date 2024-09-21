<?php
include "db.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

// JDoodle API credentials
$clientId = '2c34cba6106544aa03bf1f827bc7515d';
$clientSecret = '6461dced7a24ad2dc88598cd2aa9f6399408a66685b29c8aa8cdcf8237b05611';
$jdoodleUrl = 'https://api.jdoodle.com/v1/execute';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $language = $_POST['language'];
    $code = $_POST['code'];
    $question_id = $_POST['question_id']; // Fetch the question ID

    $sql = "SELECT id, ques, answer FROM challenge WHERE id = $question_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No challenges found.";
    }
}

$expectedOutput = $row['answer'];

$data = array(
    'script' => $code,
    'language' => $language,
    'versionIndex' => '0',
    'clientId' => $clientId,
    'clientSecret' => $clientSecret
);

$options = array(
    'http' => array(
        'method' => 'POST',
        'header' => 'Content-type: application/json',
        'content' => json_encode($data)
    )
);

$context = stream_context_create($options);
$result = file_get_contents($jdoodleUrl, false, $context);
$response = json_decode($result, true);

$output = trim($response['output']);
file_put_contents('jdoodle_debug.log', "Output: $output\nExpected: $expectedOutput\n", FILE_APPEND);

session_start();
if (!isset($_SESSION['points'])) {
    $_SESSION['points'] = 0;
}

if (trim($output) === trim($expectedOutput)) {
    $_SESSION['points'] += 10;
}

header("Location: challenge-result.php?output=" . urlencode($output) . "&points=" . urlencode($_SESSION['points']));
exit();
