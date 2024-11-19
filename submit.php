<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iq_test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$age = $_POST['age'];
$time_taken = $_POST['timeTaken'];

// Calculate score
$score = 0;
for ($i = 1; $i <= 30; $i++) {
    $question = "q" . $i;
    $correct_answer = $_POST["correct_" . $question];
    if (isset($_POST[$question]) && $_POST[$question] == $correct_answer) {
        $score++;
    }
}

$sql = "INSERT INTO results (name, mobile, age, correct_answers, time_taken) VALUES ('$name', '$mobile', '$age', '$score', '$time_taken')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
