<?php session_start();
date_default_timezone_set("Africa/Kigali");
    include('../connector.php');
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content=""><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap4.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial -->
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="index"><img src="image/tangalogo.jpg" style=" height:50px;width:220px;"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
        <li class="breadcrumb-item active">Request</li>
      </ol>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Recents
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                 <th>#</th>
                   <th>Citizen Name</th>
                  <th>Phone</th>
                  <th>Written Testimony </th>     
                  <th>Date</th>
                  <th>Time</th>
                  <th>Status</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>

                <?php
                  
                  $query = mysqli_query($connect,"SELECT * FROM requests ORDER BY id DESC");

                  $rowcount = 0;
                  while ($row = mysqli_fetch_array($query)){
                    $rowcount ++;

                    $querys = mysqli_query($connect,"SELECT * FROM citizen WHERE id='".$row['cid']."'");
                    $rows = mysqli_fetch_array($querys);

                    $queryt = mysqli_query($connect,"SELECT * FROM temp WHERE room ='".$row['room']."'");
                    $rowt = mysqli_fetch_array($queryt);

                    echo"<tr>
                      <td>".$rowcount."</td>
                      <td>".$rows['name']."</td>
                      <td>".$rows['phone']."</td>
                      <td>".$row['room']."</td>
               
                      <td>".date('d/m/Y', $row['rdatetime'])."</td>
                      <td>".date('H:i', $row['rdatetime'])."</td>
                      <td><center>";
                        if($row['status'] == 0){
                          echo"<button class='btn btn-warning btn-sm'>Pending</button>";
                        }elseif($row['status'] == 1){
                          echo"<button class='btn btn-success btn-sm'>Approved</button>";
                        }elseif($row['status'] == 2){
                          echo"<button class='btn btn-danger btn-sm'>Rejected</button>";
                        }
                      echo"</center></td>
                      <td><center>";
                        if($row['status'] == 0){
                          echo"
                            <a href='../server.php?approveRequest=".$row['id']."'><button class='btn btn-outline-success btn-sm'>Approve</button></a>
                            <a href='../server.php?rejectRequest=".$row['id']."'><button class='btn btn-outline-danger btn-sm'>Reject</button></a>
                          ";
                        }else{
                          echo"N/A";
                        }
                      echo"</center></td>
                    </tr>";

                  }
                ?>
                
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/dataTables.bootstrap4.js'></script><script  src="./script.js"></script>

</body>
</html>
