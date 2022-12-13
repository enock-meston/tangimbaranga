<?php 
    include('logged/includes/config.php');
?>

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
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap"
        rel="stylesheet">

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

    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Tangimbaraga
                <br>Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5">
        <div class="row gx-4 d-none d-lg-flex" style="background-color:rgb(120, 120, 121);color: aliceblue;">
            <div class="col-lg-6 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <div class="btn-sm-square rounded-circle bg-primary me-2">
                        <small class="fa fa-map-marker-alt text-white"></small>
                    </div>
                    <small>Kigali, Rwanda</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <div class="btn-sm-square rounded-circle bg-primary me-2">
                        <small class="fa fa-envelope-open text-white"></small>
                    </div>
                    <small>Tangimbaraga@gmail.com</small>
                </div>
            </div>
            <div class="col-lg-6 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <div class="btn-sm-square rounded-circle bg-primary me-2">
                        <small class="fa fa-phone-alt text-white"></small>
                    </div>
                    <small>+250 781095264</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <div class="btn-sm-square rounded-circle bg-primary me-2">
                        <small class="far fa-clock text-white"></small>
                    </div>
                    <small>Mon - Fri : 9AM - 9PM</small>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 px-4 px-lg-5">
        <a href="index.html" class="navbar-brand d-flex align-items-center">
            <h2 class="m-0 text-primary">Tang<font style="color: black;font-style:Ⓕⓞⓝⓣ Ⓢⓣⓨⓛⓔ;">

                    <img src="sl5.jpg" width="30" height="50">mbaraga
                </font>
            </h2>

        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse" style="background-color:rgb(230, 229, 227);">
            <div class="navbar-nav ms-auto py-4 py-lg-0">
                <a href="index.php" class="nav-item nav-link active">Ahabanza</a>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Ururimi</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom m-0">

                        <a href="index.php" class="dropdown-item"><img src="rw-flag.jpg" height="15"
                                width="20">Kinyarwanda</a>

                    </div>
                </div>
                <a href="logged/index.php" class="nav-item nav-link">Kwinjira</a>
            </div>
            <div class="h-100 d-lg-inline-flex align-items-center d-none">
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href=""><i
                        class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href=""><i
                        class="fab fa-twitter"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href=""><i
                        class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-0" href=""><i
                        class="fab fa-instagram"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5" style="background-color:rgb(133, 134, 136);">
        <center>
            <div class="owl-carousel header-carousel position-relative"
                style="width:60%;height:90%;box-shadow: 0px 0px 2px 0px rgb(245, 244, 244);">
                <?php $conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,'tangimbaraga');

                                  $sql = mysqli_query($conn, "SELECT * FROM news WHERE status=0");
                                  $count =1;
                                    while ($row = mysqli_fetch_array($sql)) {
                                     
                                  ?>

                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="logged/minubumwe/imagee/<?php echo $row['file'];?>" alt="">
                    <div class="carousel-inner">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-lg-8 text-center">

                                    <h4 class="display-3 text-white animated slideInDown mb-4">
                                        <?php echo $row['title'];?></h4>
                                    <p class="fs-5 text-white mb-4 pb-2">Amakuru Mashya..</p>
                                    <br><br><a href="viewnews.php?id=<?php echo $row['id'];?>"
                                        class="btn btn-primary rounded-pill py-md-3 px-md-5 me-3 animated slideInLeft">Soma
                                        Inkuruyose</a>
                                    <a
                                        class="btn btn-light rounded-pill py-md-3 px-md-5 animated slideInRight">Ibyegeranyo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <?php
                                    $count++;}
                                                                            ?>


                <a>
            </div>
        </center>

    </div>
    <center><img src="dir.gif" height="100" width="100">
        <a href="donate.html"><button class="btn btn-primary w-50 py-3" type="submit"
                style="border-radius:0px ;">Gufasha Abarokotse Genocide yakorewe Abatutsi 1994</button></a>
    </center>
    </div>
    <!-- Carousel End -->


    <!-- Facts Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="h-100 bg-dark p-4 p-xl-5">
                        <div class="d-flex align-items-center justify-content-between mb-4"
                            style="background-color:rgb(143, 143, 145);">
                            <div class="btn-square rounded-circle"
                                style="width: 150px; height: 200px;background-color:rgb(161, 161, 161);">
                                <img class="img-fluid" src="r.png" height="1000" width="1000">
                            </div>
                            <h1 class="display-1 mb-0" style="color: #faf5f5;">01</h1>
                        </div>
                        <h5 class="text-white">Serivise Za USSD Code</h5>
                        <hr class="w-25">
                        <span>Kanda *182*1*1*0799314097*Umubare Wamafaranga# maze Ufashe Okoresheje MOMO<br>
                            -*500*-*-*0799314097*Umubare Wamafaranga# maze Ufashe Okoresheje Airtel Money<br>

                        </span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="h-100 bg-dark p-4 p-xl-5">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="btn-square rounded-circle"
                                style="width: 64px; height: 64px;background-color:rgb(148, 150, 151);">
                                <img class="img-fluid" src="call.gif" height="1000" width="1000">
                            </div>
                            <h1 class="display-1 mb-0" style="color: #fcfafa;">02</h1>
                        </div>
                        <br><br><br><br>
                        <h5 class="text-white">Ukeneye Ubufasha bwihuse</h5>
                        <hr class="w-25">
                        <span>Vugana nabakoze ba tangimbaraga <br>
                            Hamagara Nimero Zikurikira:<br><Br>
                            <Center>
                                <h1 style="color:rgb(252, 251, 248)"> 0780473865<BR>
                                    0781095264</h1>
                            </Center>
                        </span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100 bg-dark p-4 p-xl-5">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="btn-square rounded-circle"
                                style="width: 264px; height: 204px;background-color:rgb(184, 185, 187);">
                                <img class="img-fluid" src="family.gif" height="1000" width="1000"
                                    style="border-radius:80px">
                            </div>
                            <h1 class="display-1 mb-0" style="color: #fffdfd;">03</h1>
                        </div>
                        <h5 class="text-white">Waba Utarabona Muryango wawe mwaraburanye Mugihe cya Genocide Yakorewe
                            abatutsi 1994? </h5>
                        <hr class="w-25">
                        <span>Gana Umurenge Ukwegereye Utanga Amakuru Muri Sisiteme Tugufashe Gushaka Umuryanga
                            Wawe</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts Start -->




    <!-- Quote Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container quote px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 ps-lg-0" style="min-height: 400px;background-color:rgb(164, 165, 167);">
                    <div class="position-relative h-100">
                        <br><br><br><br>
                        <img src="doc.gif" height="400" width="500"
                            style="margin-left:10px ;opacity: .7; border-top-left-radius: "><br>
                        <img src="ag.gif" height="300" width="500"
                            style="margin-left:10px ;opacity: .7;border-bottom-right-radius:;">
                    </div>
                </div>
                <div class="col-lg-6 quote-text py-5 wow fadeIn" data-wow-delay="0.5s"
                    style="background-color:rgb(169, 169, 170);">
                    <div class="p-lg-5 pe-lg-0">
                        <div class="bg-primary mb-3" style="width: 60px; height: 2px;"></div>
                        <center>
                            <?php $conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,'tangimbaraga');


if(isset($_POST['dosiye'])) {
     $a=$_POST['name'];
    $b=$_POST['email'];
        $c=$_POST['phone'];

$d=$_POST['instemail'];

$e=$_POST['instname'];

$f=$_POST['dis'];

$g=$_POST['proposaltime'];


  
  
  $image=$_FILES['speechcopy']['name'];
  $tmp=$_FILES['speechcopy']['tmp_name'];
  $sql="INSERT into otherinstitutionrequest(name,email,phone,instemail,instname,
  speechcopy,dis,proposaltime) values('".$a."','".$b."','".$c."','".$d."','".$e."',
  '".$image."','".$f."','".$g."')";
  $query=mysqli_query($conn,$sql);
  move_uploaded_file($tmp,"doc/".$image);
  if($query){
    send_mail("Request Sent","Kwiyandikisha Byakozwe 
    Neza! Tegereza Ubutumwa Bukwemerera Kuri Email Yawe",$b);
    
    echo "<div class='alert alert-success'style='width:70%;'>Kwiyandikisha Byakozwe 
    Neza! Tegereza Ubutumwa Bukwemerera Kuri Email Yawe</div>";
  }else {
    echo "<div class='alert alert-success'style='width:70%;'>Mwihangane havutse ikibazo! </div>";
  }
    
}

else 
{
    echo "<div class='alert alert-success'style='width:70%;'>please! Saba Kunyuza Ibiganiro Kuriyi Sisitemo.</div>";
}
?></center>
                        <h1>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="display-5 mb-5" style="color:white">Gusaba Gutanga Ikiganiro
                        </h1>
                        <p class="mb-4 pb-2" style="color: white;">Ibigo Bikeneye Gutanga Ubutumwa Kubaturage
                            Mukoresheje Sisiteme Mwuzuze Iyifomu Isaba</p>

                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0"
                                    placeholder="Amazina Y'ushaka Gutanga ikiganiro" style="height: 55px;" name="name">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control border-0" placeholder="Email yawe"
                                    style="height: 55px;" name="email">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="number" class="form-control border-0" placeholder="telephone yawe"
                                    style="height: 55px;" name="phone">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control border-0" placeholder="Email Y'ikigo ukoreramo"
                                    style="height: 55px;" name="instemail">
                            </div>

                            <div class="col-12 col-sm-12">
                                <input type="text" class="form-control border-0" placeholder="Izina Ry'Ikigo Ukormo"
                                    style="height: 55px;" name="instname">
                            </div><br>
                            <font style="color:white">
                                Uploading ibaruwa isaba ivuyeku kukigo,copy yikiganiro uributange</font>
                            <div class="col-12 col-sm-12">
                                <input type="file" class="form-control border-0" placeholder="telephone yawe"
                                    style="height: 55px;" name="speechcopy">
                                <span class="focus-input100" data-placeholder="Izina rya konti Cq Telefone"
                                    style="color:white ;"></span>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0" placeholder="amakuru y'inyongera"
                                    name="dis"></textarea>
                            </div>

                            <div class="col-12 col-sm-12">
                                <font color="white">proposal Time You Want</font>
                                <input type="datetime-local" class="form-control border-0"
                                    placeholder="Izina Ry'Ikigo Ukormo" style="height: 55px;" name="proposaltime">
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit" name="dosiye">Kohereza
                                </button>
                            </div>
                        </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-primary mb-3 mx-auto" style="width: 60px; height: 2px;"></div>
                <h1 class="display-5 mb-5" style="color:white ;">Inkuru Ziheruka</h1>
            </div>

            <div class="row g-4">
                <?php $conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,'tangimbaraga');

                                  $sql = mysqli_query($conn, "SELECT * FROM news WHERE status=1");
                                  $count =1;
                                    while ($row = mysqli_fetch_array($sql)) {
                                     
                                  ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item"><a href="viewcurrentnews.php?id=<?php echo $row['id'];?>">
                            <div class="overflow-hidden position-relative">
                                <img class="img-fluid" src="logged/minubumwe/imagee/<?php echo $row['file'];?>" alt="">
                                <div class="team-social">
                                    <img class="img-fluid" src="logged/minubumwe/imagee/<?php echo $row['file'];?>"
                                        alt="" style="width: 300px; height: 300px;">
                                </div>
                            </div>
                        </a>

                        <div class="text-center p-4">
                            <h5 class="mb-0" style="color:white ;"><?php echo $row['title'];?></h5>
                            <span class="text-primary">Host , 8:00 Am</span>
                        </div>
                    </div>
                </div><?php
                                    $count++;
                                        }
                                    ?>
            </div>
        </div>
    </div>


    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s" style="background-color: #464545 ;">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-primary mb-3 mx-auto" style="width: 60px; height: 2px;"></div>
                <h1 class="display-5 mb-5" style="color:white ;">Abayobozi ba Tangimbaraga</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item text-center" data-dot="<img class='img-fluid' src='1.png' alt=''>">
                    <p class="fs-5" style="color:white ;">President Wa Campany Ya tangimbaraga Murwanda</p>
                    <h4 style="color:white ;">Imanishimwe Fabrice</h4>
                    <span class="text-primary" style="color:white ;">IT Professional</span>
                </div>
                <div class="testimonial-item text-center" data-dot="<img class='img-fluid' src='2.jpg' alt=''>">
                    <p class="fs-5" style="color:white ;">vc President Wa Campany Ya tangimbaraga Murwanda</p>
                    <h4>Indatwa Hubert</h4>
                    <span class="text-primary">IT Professional</span>
                </div>
                <div class="testimonial-item text-center" data-dot="<img class='img-fluid' src='3.jpg' alt=''>">
                    <p class="fs-5">President Wa Campany Ya tangimbaraga Murwanda</p>
                    <h4>Imanishimwe Fabrice</h4>
                    <span class="text-primary">IT Professional</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div class="container-fluid  text-secondary footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s"
        style="background-color:rgb(236, 230, 230);">
        <div class="container py-5" style="background-color:rgb(5, 5, 5)">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Aho wadusanga</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Kigali,Rwanda</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+0250 781095264</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>Tangimbaraga@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-2" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-2" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-2" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-2" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Ibyo dukora</h5>
                    <a class="btn btn-link" href="">Gufasha Abarokotse Genocide yakorewe Abatutsi 1994</a>
                    <a class="btn btn-link" href="">Gutanga Ibiganiro(kwibuka)</a>
                    <a class="btn btn-link" href="">Guhuza Imiryango yaburanye Mugihe cya Genocide</a>
                    <a class="btn btn-link" href="">Amateka yose Yaranze Urwanda</a>

                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Inzira Yabugufi Ya sisiteme</h5>
                    <a class="btn btn-link" href="">Ibitwerekeye</a>
                    <a class="btn btn-link" href="">Serivisi Dutanga</a>
                    <a class="btn btn-link" href="">Ikoreshereze Ya sisiteme</a>
                    <a class="btn btn-link" href="">Gufasha</a>
                    <a class="btn btn-link" href="">Kwinjira muri sisiteme</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Guhanga Konti</h5>
                    <p>Hanga Konti Shya </p>
                    <div class="position-relative w-100">
                        <input class="form-control bg-transparent border-secondary w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="Kanda Hano">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Hanga
                            Konti</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid py-4" style="background: #000000;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">Tangimbaraga</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">Tangimbaraga
                        Campany</a><br>Distributed By <a class="border-bottom" href="https://themewagon.com/">Ibuka</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


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