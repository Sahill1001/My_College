<?php
include 'partials/session.php';
$staus = $err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (array_key_exists('nameBtn', $_POST)) {
        nameBtn();
    } else if (array_key_exists('phoneBtn', $_POST)) {
        phoneBtn();
    }else if (array_key_exists('passBtn', $_POST)) {
        passBtn();
    }
}
function nameBtn()
{
    include 'partials/dbconnect.php';
    $phone = $_SESSION['phone'];
    $name = $_POST["name"];
    $sql = "UPDATE Students SET fname='$name' WHERE phone='$phone'";
    if (mysqli_query($conn, $sql)) {
        $staus = "Name has successfully changed ";
    } else {
        $err = "Error updating record: " . mysqli_error($conn);
    }
}
function phoneBtn()
{
    include 'partials/dbconnect.php';
    $phone = $_SESSION['phone'];
    $phone1 = $_POST["phone1"];
    $sql = "UPDATE Students SET phone='$phone1' WHERE phone='$phone'";
    if (mysqli_query($conn, $sql)) {
        header("location:logout.php");
        $staus = "Name has successfully changed ";
    } else {
        $err = "Error updating record: " . mysqli_error($conn);
    }
}

function passBtn()
{
    include 'partials/dbconnect.php';
    $phone = $_SESSION['phone'];
    $password = $_POST["password"];
    $hash=password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE Students SET passwd='$hash' WHERE phone='$phone'";
    if (mysqli_query($conn, $sql)) {
        header("location:logout.php");
        $staus = "Name has successfully changed ";
    } else {
        $err = "Error updating record: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MyCollege - Students Home page </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap"
    rel="stylesheet">

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php
    include 'partials/student_nav.php';

    if ($staus) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulations! </strong>'.$staus.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if ($err) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Warning!</strong>'.$err.'.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

    ?>
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <table class="table">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td>
                                        <?php echo $name ?>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Full Name" />
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="submit" name="nameBtn" value="Update" class="btn btn-primary" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone</th>
                                    <td>
                                        <?php echo $phone ?>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="phone1" minlength="10" maxlength="10"
                                                name="txtEmpPhone" class="form-control" placeholder="Your Phone" />
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="submit" name="phoneBtn" value="Update" class="btn btn-primary" />
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">Password</th>
                                    <td>..................</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" class="form-control"
                                                placeholder="Password" />
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="submit" name="passBtn" value="Update" class="btn btn-primary" />
                                    </td>
                                </tr>
                            </tbody>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include 'partials/footer.php' ?>
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i
            class="fa fa-angle-double-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>