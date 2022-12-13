<?php
session_start();
$error = "";
$msg = "";
include('../includes/config.php');
error_reporting(0);
if (strlen($_SESSION['dis_id']) == 0) {
    header('location: ../index.php');
} else {
  $me = $_SESSION['dis_id'];
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
            <a class="navbar-brand" href="index"><img src="image/tangalogo.jpg" style=" height:50px;width:220px;"></a>
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
                    <li class="breadcrumb-item active">Report</li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-plus"></i> Add new Transaction Report
                    </div>
                    <div class="card-body">
                    <?php
                        if (isset($_POST['addNewdonation'])) { 
                            $date = $_POST['date'];
                            $amount = $_POST['amount'];
                            $reason = $_POST['reason'];
                            $info = $_POST['info'];

                            
                              // images
                        $img_name = $_FILES['my_image']['name'];
                        $img_size = $_FILES['my_image']['size'];
                        $tmp_name = $_FILES['my_image']['tmp_name'];
                        $error = $_FILES['my_image']['error'];
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
	                      $img_ex_lc = strtolower($img_ex);
                        
                        $allowed_exs = array("jpg","png");
                        if (in_array($img_ex_lc,$allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = 'proof/'.$new_img_name;

                          if (move_uploaded_file($tmp_name, $img_upload_path)) {
                        
                              $status=1;
                              $sql = mysqli_query($con,"INSERT INTO `donetransaction`(`transactiondate`, `amount`, 
                              `reason`, `doneby`, `evidence`, `addinfo`) VALUES ('$date','$amount',
                              '$reason','$me','$img_upload_path','$info')");
                            if ($sql) {
                                $msg ="Donation Transaction added successfully";
                            } else {
                                echo "<script>alert('Something went wrong. Please try again');</script>";
                            }
                          }else {
                            $error ="File not Uploaded";
                          }
                        }
                            
                        }
                      ?>
                        <!-- message block -->
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
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">date</label>
                                    <input type="date" class="form-control" name="date" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Amount</label>
                                    <input type="text" class="form-control" name="amount" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Reason</label>
                                    <textarea type="text" class="form-control" name="reason" required></textarea>
                                </div>



                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Proof</label>
                                    <input type="file" class="form-control" name="my_image" required>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Addition Information</label>
                                    <textarea type="text" class="form-control" name="info" required></textarea>
                                </div>




                            </div>
                            <button type="submit" class="btn btn-primary" name="addNewdonation"><i class="fa fa-save"></i>
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