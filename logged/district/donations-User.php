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
                    <li class="breadcrumb-item active">Donation Report</li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Citizens Donations
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Donar Names</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Amount</th>
                                        <th>Destination</th>
                                        <th>date</th>
                                        <th>Comment</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                $sql = "SELECT * FROM `donation` WHERE destination='".$_SESSION['dis']."'";
                $result = mysqli_query($con, $sql);
                $count =1;
                while ($row = mysqli_fetch_assoc($result)) {
                 
                ?>
                                    <tr>
                                        <td><?php echo $count;?></td>
                                        <td><?php echo $row['donor_name'];?></td>
                                        <td><?php echo $row['donorphone'];?></td>
                                        <td><?php echo $row['destination'];?></td>
                                        <td><?php echo $row['amount'];?></td>
                                        <td><?php echo $row['destination'];?></td>
                                        <td><?php echo $row['date'];?></td>
                                        <td><?php echo $row['comment'];?></td>

                                    </tr>
                                    <?php
                  $count++;
                }
                  ?>

                                    <tr>
                                        <td>Total: <?php 
                      $sl = mysqli_query($con,"SELECT sum(amount) as tamount FROM `donation` WHERE destination='".$_SESSION['dis']."'");
                      while ($data= mysqli_fetch_assoc($sl)) {
                        echo $data['tamount'];
                        $_SESSION['citizenAmount'] = $data['tamount'];
                      }
                    ?></td>
                                    </tr>

                                    <tr>
                                        <td>Total Remains Amount:  <?php 
                      $sl = mysqli_query($con,"SELECT sum(amount) as tamount FROM `donetransaction` WHERE doneby='$me'");
                      while ($data= mysqli_fetch_assoc($sl)) {
                       $donationsAmount = $data['tamount'] ;

                       echo $_SESSION['citizenAmount'] ." RWF from All - ". $donationsAmount. "
                       Rwf from Citizens =
                       ".($_SESSION['citizenAmount'] - $donationsAmount);
                      
                      }
                    ?></td>
                                    </tr>
                                </tbody>
                            </table>
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
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="../">Logout</a>
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