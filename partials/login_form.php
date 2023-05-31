<?php
include 'dbconnect.php';
// define variables and set to empty values
$phoneErr = $passwordErr = "";
$phone = $password = "";

$showAlert = false;
$showUser=false;
$showErr = false;
$login = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["phone"])) {
    $phoneErr = "Phone is required";
  } else {
    $phone = test_input($_POST["phone"]);
    if (!preg_match('/^[0-9]{10}+$/', $phone)) {
      $phoneErr = "Invalid Phone format";
    }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = $_POST["password"];
  }

  if (empty($phoneErr) and empty($passwordErr)) {
    $sql = "SELECT * FROM Students WHERE phone='$phone'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
      while ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['passwd'])) {
          $login = true;
          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['phone'] = $phone;
          header("location: student_home.php");
        }
        else {
          $showAlert = true;
        }
      }
    } else {
      $showUser=true;
    }
  } else {
    $showErr = true;
  }
}


function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>