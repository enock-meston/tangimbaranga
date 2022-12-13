<?php session_start();
date_default_timezone_set("Africa/Kigali");
    include('../connector.php');
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
                    <li class="breadcrumb-item active">Application Request</li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Request From Other Institution
                        <button onclick="window.print();" class="btn btn-primary px-3" style="float: right;"><i
                                class="fa fa-print"></i> Print</button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr style="background:#528e38;color:white">
                                    <th>#</th>
                                    <th>Full Names</>th
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Inst-Email</th>
                                    <th>Inst-Name</th>
                                    <th>Speech Copy</th>
                                    <th>Discription</th>
                                    <th>Propasl-Time</th>



                                    <th>Active/Disactive</th>
                                    <th>Action
                                    <th>
                                </tr>
                                <?php $conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,'tangimbaraga');

                                  $sql = mysqli_query($conn, "SELECT * FROM otherinstitutionrequest");
                                  $count =1;
                                    while ($row = mysqli_fetch_array($sql)) {
                                     
                                  ?>
                                <tr>

                                    <td style="background: black;color: white;font-weight: bold;"><?php echo $count;?>
                                    </td>

                                    <td><?php echo $row['name'];?></td>

                                    <td><?php echo $row['phone'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    <td><?php echo $row['instemail'];?></td>
                                    <td><?php echo $row['instname'];?></td>
                                    <td><a href="../../doc/<?php echo $row['speechcopy'];?>" width="40" height="30"><img
                                                src="image/1.jpg" width="30" height="30">Application Doc</a></td>
                                    <td><?php echo $row['dis'];?></td>
                                    <td><?php echo $row['proposaltime'];?></td>
                                    <td>
                                        <?php


$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,'tangimbaraga');

$status=$row['status'];
                        if(($status)=='0')
                        {
                        ?>
                                        <a href="statusother.php?status=<?php echo $row['id'];?>"
                                            onclick="return confirm(' Really You want to Approve this Request ');">
                                            <input type="submit" class="btn btn-primary" name="status"
                                                value="Pending..."
                                                style="font-weight: bold;border-radius: 50px;background:url(hjk.jpg);color: black"></a>
                                        <?php
                        }
                        if(($status)=='1')
                        {
                        ?>
                                        <a href="statusother.php?status=<?php echo $row['id'];?>"
                                            onclick="return confirm('Really You want to Disactive this Request ');">
                                            <input type="submit" class="btn btn-primary" name="status" value="Approve"
                                                style="font-weight: bold;border-radius: 50px;color:white"></a>
                                        <?php
                        }
                        ?>
                                    </td>

                                    <td> <a href="deleteother.php?id=<?php echo $row['id'];?>"
                                            onclick="return confirm(' Really You want to Delete This Request ');">

                                            <input type="submit" class="btn btn-danger" name="id" value="Delete"
                                                style="font-weight: bold;color:white"></a>
                                    </td>
                                    <td> <a href="deleteother.php?id=<?php echo $row['id'];?>"
                                            onclick="return confirm(' Really You want to Delete This Request ');">
                                            <a href="view.php?id=<?php echo $row['id'];?>"
                                                onclick="return confirm(' Really You want to Send Credentials to this User ');">
                                                <input type="submit" class="btn btn-success" name="id"
                                                    value="Add Credentials" style="font-weight: bold;color:white"></a>
                                    </td>
                                </tr>
                                <?php
                                    $count++;
                                        }
                                    ?>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <center>
                <form action="searchother.php" method="POST">
                    <input type="text" name="search"
                        style="width: 70%; height: 40px;border-radius: 5px; font-size: 15px;border: 0px"
                        placeholder="Search report "><button class="btn"
                        style="width: 3%;height: 40px;background:#528e38;color:white" type="submit" name="submit"><i
                            class="fa fa-search"></i></button>
                </form>
            </center>
            <footer class="sticky-footer">
                <!-- /.container-fluid-->
                <!-- /.content-wrapper-->
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