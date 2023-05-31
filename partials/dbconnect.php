<?php
$servername = "localhost";
$username = "root";
$password = "";
// Create connection
$conn1 = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn1) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_query($conn1, "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'college'");

$sql2 = "CREATE DATABASE IF NOT EXISTS college";
$sql3=mysqli_query($conn1,$sql2);
mysqli_close($conn1);

if (!$sql3) {
  echo "Error creating database: " . mysqli_error($conn1);
} 
    
$conn = mysqli_connect($servername, $username, $password, 'college');

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$exists = mysqli_query($conn, "select 1 from Students");
$exists1 = mysqli_query($conn, "select 1 from contact");

if (!$exists) {
  $sql = "CREATE TABLE `college`.`Students` (`srn` INT(20) NOT NULL AUTO_INCREMENT , `fname` VARCHAR(50) NOT NULL , `email` VARCHAR(50) NOT NULL , `phone` VARCHAR(50) NOT NULL , `passwd` VARCHAR(255) NOT NULL , `gender` VARCHAR(10) NOT NULL , `sub1` VARCHAR(50) NOT NULL , `sub2` VARCHAR(50) NOT NULL , `sub3` VARCHAR(50) NOT NULL , `sub4` VARCHAR(50) NOT NULL , `sub5` VARCHAR(50) NOT NULL , `tdate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`srn`))";
  if (!mysqli_query($conn, $sql)) {
    echo "Error creating table: " . mysqli_error($conn);
  }
}

if (!$exists1) {
  $sql1 = "CREATE TABLE `college`.`contact` (`srn` INT(20) NOT NULL AUTO_INCREMENT , `fname` VARCHAR(50) NOT NULL , `email` VARCHAR(50) NOT NULL , `sub` VARCHAR(50) NOT NULL , `msg` VARCHAR(500) NOT NULL , `dtime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`srn`))";
  if (!mysqli_query($conn, $sql1)) {
    echo "Error creating table: " . mysqli_error($conn);
  }
}
?>