<?php
include 'partials/dbconnect.php';
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location:login.php");
    exit;
} else {
    $phone = $_SESSION['phone'];
    $sql = "SELECT * FROM Students WHERE phone='$phone'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row["fname"];
        $sub1 = $row["sub1"];
        $sub2 = $row["sub2"];
        $sub3 = $row["sub3"];
        $sub4 = $row["sub4"];
        $sub5 = $row["sub5"];
    }
}
?>