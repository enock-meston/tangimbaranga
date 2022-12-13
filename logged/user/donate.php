<?php 
$error = "";
$msg = "";
session_start();
include('../includes/config.php');
include 'pay_parse.php';
error_reporting(0);
if (strlen($_SESSION['citizen_id']) == 0) {
    header('location: ../index.php');
    $me= $_SESSION['citizen_id'];
} else {

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    #pic :hover {

        opacity: .9;
        border-top-left-radius: 2px;
        border-top-right-radius: 2px;
    }

    .form-total,
    span :hover {
        background: grey opacity: .9;
        border-top-left-radius: 2px;
        border-top-right-radius: 2px;
    }
    </style>
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
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">


                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                        <a class="nav-link" href="profile">
                            <i class="fa fa-fw fa-user"></i>
                            <span class="nav-link-text">Profile</span>
                        </a>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                        <a class="nav-link" href="request">
                            <i class="fa fa-fw fa-list"></i>
                            <span class="nav-link-text">Add Testimony</span>
                        </a>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                        <a class="nav-link" href="request">
                            <i class="fa fa-fw fa-music"></i>
                            <span class="nav-link-text">Watch Events</span>
                        </a>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                        <a class="nav-link" href="lostfamily">
                            <i class="fa fa-fw fa-user"></i>
                            <span class="nav-link-text">Lost Members</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                        <a class="nav-link" href="pub">
                            <i class="fa fa-fw fa-pencil"></i>
                            <span class="nav-link-text">Publication</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                        <a class="nav-link" href="book">
                            <i class="fa fa-fw fa-book"></i>
                            <span class="nav-link-text">Books</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                        <a class="nav-link" href="donate">
                            <i class="fa fa-fw fa-money"></i>
                            <span class="nav-link-text">Donate</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                        <a class="nav-link" href="live">

                            <span class="nav-link-text"> <img src="liveg.jpg" height="40px" width="40px"> Live
                                video</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav sidenav-toggler">
                    <li class="nav-item">
                        <a class="nav-link text-center" id="sidenavToggler">
                            <i class="fa fa-fw fa-angle-left"></i>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Donation</li>
                </ol>
                <!-- Icon Cards-->
                <div class="row">


                    <div class="col-xl-3 col-lg-3 stretch-card grid-margin" style="height:410px;">

                        <div class="card bg-danger">
                            <div class="card-body px-3 py-4" style="background-color:rgb(248, 247, 247)" id="pic">

                                <div class="d-flex justify-content-between align-items-start">

                                    <div class="color-card">
                                        <p class="mb-0 color-card-head" style="color:rgb(196, 54, 12);">

                                            <i class="card-icon-indicator mdi mdi-video "
                                                style="background:black"></i>Donating a survivor
                                            <font style="color:grey ; font-size: 10px;">choose Destination</font>

                                            <?php
                                             if (isset($_POST['DonateBtn'])) {
                                              $price= $_POST['price'];
                                              $phone1= $_POST['phone'];
                                              $district = $_POST['district'];
                                              $name= $_POST['name'];
                                              $details = $_POST['details'];

                                              $da = date("i");
                                               $curl = curl_init();
                                              $transID = uniqid();
                                              $calback = "";
                                      
                                                  //REQUEST PAYMENT 
                                      // var_dump($price);
                                      hdev_payment::api_id("HDEV-48d87cf2-c648-49c1-9c7c-a1a12dbc30eb-ID");
                                      hdev_payment::api_key("HDEV-79d8e552-5bed-4f5a-9551-cd051e32e406-KEY");
                                      $pay = hdev_payment::pay($phone1,$price,$transID,$calback);
                                      
                                      //var_dump($pay);//to get payment server response
                                      // $status = $pay->status;
                                      $status = "pending";
                                      $message = $pay->message;
                                      
                                      
                                       $sql1= mysqli_query($con, "INSERT INTO `donation`(`donor_name`, `donorphone`, 
                                       `donoraddress`, `amount`, `Transactionref`, `destination`, `comment`, `status`) 
                                       VALUES ('$name','$phone1','$district','$price','$transID','$district',
                                       '$details','$status')");
                                      if ($sql1) {
                                          $msg = "Donate Sent";
                                          
                                      }else{
                                          $error = "Donate Failed";
                                      }
                                      
                                      
                                      ?>
                                      <script type="text/javascript">
                                          windol.alert('<?php echo addslashes($message); ?>');
                                      </script>
                                      <?php
                                          }
                                          ?>

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
                                        <form method="POST" style="width:600px">
                                            <label for="fname">Names:</label><br>
                                            <input type="text" id="fname" name="name"><br>
                                            <label for="fname">Phone:</label><br>
                                            <input type="number" id="fname" name="phone"><br>

                                            <label for="fname">Amount:</label><br>
                                            <input type="number" id="fname" name="price"><br>
                                            <label for="fname">Destination:</label><br>
                                            <select type="text" id="fname" name="district">
                                              <option selected>Select District</option>
                                                <?php
                                                $sql = mysqli_query($con, "SELECT * FROM `user`");
                                                while ($row = mysqli_fetch_array($sql)) {
                                                    echo "<option value='" . $row['district'] . "'>" . $row['district'] . "</option>";
                                                }
                                                ?>
                                            </select><br>

                                            <label for="lname">Message:</label><br>
                                            <textarea type="text" id="lname" name="details"></textarea><br><br>
                                            <input type="submit" value="Donate" name="DonateBtn">
                                        </form>
                                    </div>
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
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Select "Logout" below if you are ready to end your current
                                    session.</div>
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