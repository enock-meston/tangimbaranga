<?php 
session_start();
include('includes/config.php');
$error = "";
$msg = "";
if(isset($_POST['userlogin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = $_POST['type'];

    $select = mysqli_query($con, "SELECT * FROM user WHERE useremail='$email' AND status='1'") or die(mysqli_error($con));
    
    if ($_POST['type'] == "min_user") {
        if (mysqli_num_rows($select) ==1) {
            $row = mysqli_fetch_array($select);
            $db_password = $row['password'];
        if (password_verify(mysqli_real_escape_string($con, trim($_POST['password'])), $db_password)) {
            $_SESSION['min_id'] = $row['userid'];
            $_SESSION['min_username'] = $row['username'];
            $_SESSION['min_useremail'] = $row['useremail'];
            $_SESSION['userphone'] = $row['userphone'];
            $_SESSION['min_usertype'] = $row['userType'];

            header("location: minubumwe/index.php");
        }else {
            $error = "Password does not match with any of account , Please try again later!!";
        }
        }else {
            $error = "Invalid user credintials , Please try again later!!";
        }
    }elseif ($_POST['type'] == "dis_user") {
        if (mysqli_num_rows($select) ==1) {
            $row = mysqli_fetch_array($select);
            $db_password = $row['password'];
        if (password_verify(mysqli_real_escape_string($con, trim($_POST['password'])), $db_password)) {
            $_SESSION['dis_id'] = $row['userid'];
            $_SESSION['dis_username'] = $row['username'];
            $_SESSION['dis_useremail'] = $row['useremail'];
            $_SESSION['disphone'] = $row['userphone'];
            $_SESSION['dis'] = $row['district'];
            $_SESSION['dis_usertype'] = $row['userType'];

            header("location: district/index.php");
        }else {
            $error = "Password does not match with any of account , Please try again later!!";
        }
        }else {
            $error = "Invalid user credintials , Please try again later!!";
        }
    }elseif ($_POST['type'] == "sec_user") {
        if (mysqli_num_rows($select) ==1) {
            $row = mysqli_fetch_array($select);
            $db_password = $row['password'];
        if (password_verify(mysqli_real_escape_string($con, trim($_POST['password'])), $db_password)) {
            $_SESSION['sec_id'] = $row['userid'];
            $_SESSION['sec_username'] = $row['username'];
            $_SESSION['sec_useremail'] = $row['useremail'];
            $_SESSION['secphone'] = $row['userphone'];
            $_SESSION['sec_usertype'] = $row['userType'];

            header("location: sector/index.php");
        }else {
            $error = "Password does not match with any of account , Please try again later!!";
        }
        }else {
            $error = "Invalid user credintials , Please try again later!!";
        }
    }elseif ($_POST['type'] == "cell_user") {
        if (mysqli_num_rows($select) ==1) {
            $row = mysqli_fetch_array($select);
            $db_password = $row['password'];
        if (password_verify(mysqli_real_escape_string($con, trim($_POST['password'])), $db_password)) {
            $_SESSION['cell_id'] = $row['userid'];
            $_SESSION['cell_username'] = $row['username'];
            $_SESSION['cell_useremail'] = $row['useremail'];
            $_SESSION['cellphone'] = $row['userphone'];
            $_SESSION['cell_usertype'] = $row['userType'];

            header("location: cell/index.php");
        }else {
            $error = "Password does not match with any of account , Please try again later!!";
        }
        }else {
            $error = "Invalid user credintials , Please try again later!!";
        }
    }elseif ($_POST['type'] == "citizen_user") {
        if (mysqli_num_rows($select) ==1) {
            $row = mysqli_fetch_array($select);
            $db_password = $row['password'];
        if (password_verify(mysqli_real_escape_string($con, trim($_POST['password'])), $db_password)) {
            $_SESSION['citizen_id'] = $row['userid'];
            $_SESSION['citizen_username'] = $row['username'];
            $_SESSION['citizen_useremail'] = $row['useremail'];
            $_SESSION['citizenphone'] = $row['userphone'];
            $_SESSION['citizen_usertype'] = $row['userType'];

            header("location: user/index.php");
        }else {
            $error = "Password does not match with any of account , Please try again later!!";
        }
        }else {
            $error = "Invalid user credintials , Please try again later!!";
        }
    }elseif ($_POST['type'] == "other_user") {
        if (mysqli_num_rows($select) ==1) {
            $row = mysqli_fetch_array($select);
            $db_password = $row['password'];
        if (password_verify(mysqli_real_escape_string($con, trim($_POST['password'])), $db_password)) {
            $_SESSION['other_id'] = $row['userid'];
            $_SESSION['other_username'] = $row['username'];
            $_SESSION['other_useremail'] = $row['useremail'];
            $_SESSION['otherphone'] = $row['userphone'];
            $_SESSION['other_usertype'] = $row['userType'];

            header("location: other/index.php");
        }else {
            $error = "Password does not match with any of account , Please try again later!!";
        }
        }else {
            $error = "Invalid user credintials , Please try again later!!";
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
            <input type="email" name="email" required class="input" id="username">
            <label for="email">email</label>
        </div>
        <div class="input-box">

            <select name="type" required class="input pass-input" id="password">
                <option selected>User Type</option>
                <option value="min_user">MINUBUMWE</option>
                <option value="dis_user">District</option>
                <option value="sec_user">Sector</option>
                <option value="cell_user">Cell</option>
                <option value="citizen_user">Citizen</option>
                <option value="other_user">Other</option>

            </select>
            <img src="assets/img/view.png" class="view-pass" alt="">

        </div>
        <div class="input-box">
            <input type="password" name="password" required class="input pass-input" id="password">
            <img src="assets/img/view.png" class="view-pass" alt="">
            <label for="password">Password</label>
        </div>

        <button name="userlogin" type="submit">Login</button>
        <hr>
        <br>
        <a href="newacount.php">Create New Account</a>
    </form>
    
    <!-- partial -->
    <script src="./script.js"></script>

</body>

</html>