<?php include 'partials/form.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>MyCollege -Registeration Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link href="img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    
    <link href="css/form.css" rel="stylesheet">
    <link href="img/favicon.ico" rel="icon">

</head>

<body>
    <?php include 'partials/nav.php' ?>
    <?php 
    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulations! </strong> Your account is created successfully now you can login.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }if ($showAlertErr) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! </strong>'.mysqli_error($conn).'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if ($showErr) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Warning!</strong>Please fill the required field.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

    if ($exists) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Sorry! </strong> The user is already exists!.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
    <div class="container register mb-4">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://i.pinimg.com/originals/e8/00/a9/e800a9fe9af2479ff212cb73be5e9715.jpg" alt="" />
                <h3>Welcome</h3>
                <p>You are 30 seconds away from Learning new skills!</p>
                <a href="login.php"><input type="submit" name="" value="Login" /></a><br />
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Teacher</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Apply as a Student</h3>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Full Name *" /><span class="error"><?php echo $nameErr;?></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Your Email *" /><span class="error"><?php echo $emailErr;?></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" minlength="10" maxlength="10" name="txtEmpPhone"
                                            class="form-control" placeholder="Your Phone *" /><span class="error"><?php echo $phoneErr;?></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password *"  /><span class="error"><?php echo $passwordErr;?></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password *" /><span class="error"><?php echo $cpasswordErr;?></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="maxl">
                                            <label class="radio inline">
                                                <input type="radio" name="gender" value="male" checked>
                                                <span> Male </span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="gender" value="female">
                                                <span>Female </span>
                                            </label>
                                        </div>
                                    </div>
                                    <input type="checkbox" onclick="myFunction()"> Show Password
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control" name="sub1">
                                            <option class="hidden" value="" selected disabled>Please select Subject 1
                                            </option>
                                            <option value="Hindi">Hindi</option>
                                            <option value="English">English</option>
                                            <option value="Marathi">Marathi</option>
                                        </select>
                                        <span class="error"><?php echo $sub1Err;?></span>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="sub2">
                                            <option class="hidden" value="" selected disabled>Please select Subject 2
                                            </option>
                                            <option value="Biology">Biology</option>
                                            <option value="Electronics">Electronics</option>
                                            <option value="Computer Science">Computer Science</option>
                                            <option value="Information Techonology">Information Techonology</option>
                                        </select>
                                        <span class="error"><?php echo $sub2Err;?></span>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="sub3">
                                            <option class="hidden" value="" selected disabled>Please select subject 3
                                            </option>
                                            <option value="Physics">Physics</option>
                                        </select>
                                        <span class="error"><?php echo $sub3Err;?></span>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="sub4">
                                            <option class="hidden" value="" selected disabled>Please select subject 4
                                            </option>
                                            <option value="Chemistry">Chemistry</option>
                                        </select>
                                        <span class="error"><?php echo $sub4Err;?></span>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="sub5">
                                            <option class="hidden" value="" selected disabled>Please select subject 5
                                            </option>
                                            <option value="Math">Math</option>
                                        </select>
                                        <span class="error"><?php echo $sub5Err;?></span>
                                    </div>
                                    <input type="submit" class="btnRegister" value="Register" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading">Apply as a Teacher</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last Name *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="text" maxlength="10" minlength="10" class="form-control"
                                        placeholder="Phone *" value="" />
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Confirm Password *"
                                        value="" />
                                </div>
                                <div class="form-group">
                                    <select class="form-control">
                                        <option class="hidden" selected disabled>Please select your Sequrity Question
                                        </option>
                                        <option>What is your Birthdate?</option>
                                        <option>What is Your old Phone Number</option>
                                        <option>What is your Pet Name?</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="`Answer *" value="" />
                                </div>
                                <input type="submit" class="btnRegister" value="Register" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include 'partials/footer.php' ?>
    <script src="js/passShow.js" ></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>