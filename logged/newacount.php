<?php 
session_start();
include('includes/config.php');
$error = "";
$msg = "";


if (isset($_POST['saveMeBtn'])) {

    $names = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $province = $_POST['province'];
    $dis = $_POST['dis'];
    $sec = $_POST['sec'];
    $cell = $_POST['cell'];
    $vill = $_POST['village'];
    $type = "citizen_user";
    $pass = $_POST['password'];
  
    // check if email already exists
    $Checkemail = mysqli_query($con,"SELECT * FROM user WHERE useremail = '$email'");
    $countemail = mysqli_num_rows($Checkemail);
    // check phone
    $Checkphone = mysqli_query($con,"SELECT * FROM user WHERE userphone = '$phone'");
    $countphone = mysqli_num_rows($Checkphone);
  
    if ($countemail > 0) {
      echo "<script>alert('Email already exists!');</script>";
      echo "<script>window.location.href ='index.php'</script>";
    }elseif ($countphone) {
      echo "<script>alert('Phone number already exists!');</script>";
      echo "<script>window.location.href ='newacount.php'</script>";
    }
    else{
      $status = 1;
      $hashPassword = password_hash($pass, PASSWORD_DEFAULT);
      $query = mysqli_query($con,"INSERT INTO user (`username`, `useremail`, `userphone`, `province`,
       `district`, `sector`, `cell`, `village`, `usertype`, `password`, `status`) VALUES 
       ('$names','$email','$phone','$province','$dis','$sec','$cell','$vill','$type','$hashPassword','$status')");
      if ($query) {
        // send email
        $subject = "Account Created";
        $message = "Hello $names, your account has been created successfully. Your login details are as follows: Email: $email, Password: $pass";
        $to = $email;
        send_mail($subject,$message,$to);
        $msg = "User added successfully!";
      }else{
        echo "<script>alert('Something went wrong!');</script>";
        echo "<script>window.location.href ='addnewuser.php'</script>";
      }
    
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="./style.css">

</head>

<body style="background-image:url(b.png);opacity: 8;background-repeat:no-repeat;background-size:cover">
    <!-- partial:index.partial.html -->

    <form method="POST" class="login-box" autocomplete="on" style="background:grey;">
        <!-- message -->
        <div class="col-sm-12">
            <!---Success Message--->
            <?php if ($msg) { ?>
            <div class="alert alert-success" role="alert">
                <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
            </div>
            <?php } ?>

            <!---Error Message--->
            <?php if ($error) { ?>
            <div class="alert alert-danger" role="alert">
                <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
            </div>
            <?php } ?>
        </div>
        <!-- end of message -->
        <div class="title">
            <center> <img src="image/tangalogo.jpg" width="300" height="50"></center>

            <h1>LOGIN</h1>
        </div>
        <div class="input-box">
            <input type="text" name="name" required class="input" id="username">
            <label for="email">Names</label>
        </div>
        <div class="input-box">
            <input type="email" name="email" required class="input" id="username">
            <label for="email">email</label>
        </div>

        <div class="input-box">
            <input type="number" name="phone" required class="input" id="username">
            <label for="email">Phone</label>
        </div>

        <div class="input-box">

            <select name="province" required class="input pass-input" id="password">
                <option>Select Province</option>
                <option>Western</option>
                <option>Eastern</option>
                <option>Southern </option>
                <option>Northern</option>
                <option>Kigali City</option>

            </select>

            <div class="input-box">
                
                <input type="text" class="input" id="username" name="dis" required>
                <label for="email">District</label>
            </div>


            <div class="input-box">
                
                <input type="text" class="input" id="username" name="sec" required>
                <label for="inputPassword4">Sector</label>
            </div>


            <div class="input-box">
                
                <input type="text" class="input" id="username" name="cell" required>
                <label for="inputZip">Cell</label>
            </div>


            <div class="input-box">
                
                <input type="text" class="input" id="username" name="village" required>
                <label for="inputZip">Village</label>
            </div>
            <img src="assets/img/view.png" class="view-pass" alt="">

        </div>
        <div class="input-box">
            <input type="password" name="password" required class="input pass-input" id="password">
            <img src="assets/img/view.png" class="view-pass" alt="">
            <label for="password">Password</label>
        </div>

        <button name="saveMeBtn" type="submit">save me</button>
        <hr>
        <br>
        <a href="index.php">Back to Login</a>
    </form>

    <!-- partial -->
    <script src="./script.js"></script>

</body>

</html>