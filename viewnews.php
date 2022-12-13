<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tangimbaraga.gov.rw</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body style="background-color:rgb(109, 109, 107);">
    <!-- Spinner Start -->
    
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Tangimbaraga 
                <br>Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->



    <!-- Navbar Start -->
    
    <!-- Navbar End -->

<br><br>
    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5" style="background-color:rgb(133, 134, 136);"><center>
        <div class="" style="width:80%;height:90%;box-shadow: 0px 0px 2px 0px rgb(245, 244, 244);background: white;color: black">
            <h1><a href="index.php"><img src="tangalogo.jpg" width="200" height="50"></a> |Amakuru Mashya Arambuye</h1>
             <?php 
        $conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,'tangimbaraga');
        if (isset($_GET['id'])) {
          $id= $_GET['id'];
        
               $count_log=mysqli_query($conn,"select * from news where id='$id'");
               $count = mysqli_num_rows($count_log);
        
                 

                                  $sql = mysqli_query($conn, "SELECT * FROM news WHERE id='$id' AND status=0");
                                  $count =1;
                                    while ($row = mysqli_fetch_array($sql)) {
                                     
                                  ?>
                
                <img class="" src="logged/minubumwe/imagee/<?php echo $row['file'];?>" alt="" >
             <h4 class="display-3 text-dark animated slideInDown mb-4" style="color: black"><?php echo $row['title'];?></h4><hr>
                <p class="fs-5 text-dark mb-4 pb-2" style="color: black"><?php echo $row['dis'];?></p>
                
            </div>    <?php
                                    }
                                        }
                                    ?>
            
                
            </div></center>
            
       

    <!-- Copyright Start -->
    <div class="container-fluid py-4" style="background: #000000;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">Tangimbaraga</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">Tangimbaraga Campany</a><br>Distributed By <a class="border-bottom" href="https://themewagon.com/" >MINUBUMWE</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>