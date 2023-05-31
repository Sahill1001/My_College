<?php
include 'dbconnect.php';

$showAlert = false;
$showErr = false;
// define variables and set to empty values
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $sql = "INSERT INTO `contact` (`fname`, `email`, `sub`, `msg`, `dtime`) VALUES ('$name', '$email', '$subject', '$message', current_timestamp());";

    if (mysqli_query($conn, $sql)) {
        $showAlert = true;
    } else {
        $showErr = mysqli_error($conn);
    }
}
?>