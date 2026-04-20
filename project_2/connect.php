<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "registration_db";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];

    $sql = "INSERT INTO users (first_name, last_name, email, mobile, gender,course) 
            VALUES ('$fname', '$lname', '$email', '$mobile', '$gender','$course')";

    if (mysqli_query($conn, $sql)) {
        echo "<h2>Data saved successfully!</h2>";
        echo "<a href='index.html'>Go back to form</a>";
    } else {
        echo "error: ". mysqli_error($conn);
    }
}

mysqli_close($conn);
?>