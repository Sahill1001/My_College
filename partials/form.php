<?php
include 'dbconnect.php';
// define variables and set to empty values
$nameErr = $emailErr = $phoneErr = $passwordErr = $cpasswordErr = $genderErr = "";
$name = $email = $phone = $password = $gender = "";

$sub1Err = $sub2Err = $sub3Err = $sub4Err = $sub5Err = "";
$sub1 = $sub2 = $sub3 = $sub4 = $sub5 = "";

$showAlert = false;
$showAlertErr = false;
$showErr = false;

$exists = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["phone"])) {
    $phoneErr = "Phone is required";
  } else {
    $phone = test_input($_POST["phone"]);
    // check if e-mail address is well-formed
    if (!preg_match('/^[0-9]{10}+$/', $phone)) {
      $phoneErr = "Invalid Phone format";
    }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } elseif (strlen($_POST["password"]) < 6) {
    $passwordErr = "Password should be minimus 6 charecter";
  } elseif ($_POST["password"] !== $_POST["cpassword"]) {
    $cpasswordErr = "Password is not match";
  } else {
    $password = $_POST["password"];
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }


  if (empty($_POST["sub1"])) {
    $sub1Err = "Subject 1 is required";
  } else {
    $sub1 = test_input($_POST["sub1"]);
  }

  if (empty($_POST["sub2"])) {
    $sub2Err = "Subject 2 is required";
  } else {
    $sub2 = test_input($_POST["sub2"]);
  }

  if (empty($_POST["sub3"])) {
    $sub3Err = "Subject 3 is required";
  } else {
    $sub3 = test_input($_POST["sub3"]);
  }

  if (empty($_POST["sub4"])) {
    $sub4Err = "Subject 4 is required";
  } else {
    $sub4 = test_input($_POST["sub4"]);
  }

  if (empty($_POST["sub5"])) {
    $sub5Err = "Subject 5 is required";
  } else {
    $sub5 = test_input($_POST["sub5"]);
  }

  if (empty($nameErr) and empty($emailErr) and empty($phoneErr) and empty($passwordErr) and empty($cpasswordErr) and empty($sub1Err) and empty($sub2Err) and empty($sub3Err) and empty($sub4Err) and empty($sub5Err)) {
    $sql = "SELECT * FROM Students WHERE phone='$phone' AND email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
      $hash=password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO Students (fname,email,phone,passwd,gender,sub1,sub2,sub3,sub4,sub5,tdate) VALUES ('$name','$email','$phone','$hash','$gender','$sub1','$sub2','$sub3','$sub4','$sub5', current_timestamp())";
      if (mysqli_query($conn, $sql)) {
        $showAlert = true;
        header("location:login.php");
      } else {
        $showAlertErr = true;
      }
    }else {
      $exists=true;
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