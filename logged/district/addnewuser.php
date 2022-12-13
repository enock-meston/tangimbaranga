<?php 

session_start();
$error = "";
$msg = "";
include('../includes/config.php');
error_reporting(0);
if (strlen($_SESSION['dis_id']) == 0) {
    header('location: ../index.php');
} else {


  if (isset($_POST['addNewUser'])) {

    $names = $_POST['names'];
    $email = $_POST['email'];
    $phone = $_POST['names'];
    $province = $_POST['province'];
    $dis = $_POST['dis'];
    $sec = $_POST['sec'];
    $cell = $_POST['cell'];
    $vill = $_POST['village'];
    $type = "sec_user";
    $pass = $_POST['password'];
  
    // check if email already exists
    $Checkemail = mysqli_query($con,"SELECT * FROM user WHERE useremail = '$email'");
    $countemail = mysqli_num_rows($Checkemail);
    // check phone
    $Checkphone = mysqli_query($con,"SELECT * FROM user WHERE userphone = '$phone'");
    $countphone = mysqli_num_rows($Checkphone);
  
    if ($countemail > 0) {
      echo "<script>alert('Email already exists!');</script>";
      echo "<script>window.location.href ='addnewuser.php'</script>";
    }elseif ($countphone) {
      echo "<script>alert('Phone number already exists!');</script>";
      echo "<script>window.location.href ='addnewuser.php'</script>";
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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap4.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
    <link rel="stylesheet" href="./style.css">

</head>

<body>
    <!-- partial:index.partial -->

    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="index">IBUKA SYSTEM</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <?php include('sidebar.php'); ?>

        </nav>
        <div class="content-wrapper" style="background-color: lightgray">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Sector</li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-plus"></i> Add new Sector
                    </div>
                    <div class="card-body">
                        <!-- form -->
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
                        <form method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Full name</label>
                                    <input type="text" class="form-control" name="names" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">E-mail</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">phone</label>
                                    <input type="number" class="form-control" name="phone" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Province</label>
                                    <select class="form-control" name="province" required>
                                        <option>Select Province</option>
                                        <option>Western</option>
                                        <option>Eastern</option>
                                        <option>Southern </option>
                                        <option>Northern</option>
                                        <option>Kigali City</option>
                                    </select>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">District</label>
                                    <input type="text" class="form-control" name="dis" required>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Sector</label>
                                    <input type="text" class="form-control" name="sec" required>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="inputZip">Cell</label>
                                    <input type="text" class="form-control" name="cell" required>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="inputZip">Village</label>
                                    <input type="text" class="form-control" name="village" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="addNewUser"><i class="fa fa-save"></i>
                                Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>Copyright © Fabrice IMANISHIMWE 2022</small>
                </div>
            </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.js'></script>
    <script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/dataTables.bootstrap4.js'></script>
    <script src="./script.js"></script>

</body>

</html>


<?php
}
?>