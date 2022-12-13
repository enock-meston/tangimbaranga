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
    <a class="navbar-brand" href="index">Smart Booking Shower</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <?php include('sidebar.php'); ?>

  </nav>
  <div class="content-wrapper" style="background-color: lightgray">
    <div class="container-fluid" >
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Time</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Recent Added Time
          <button onclick="window.location='addnewtime'" class="btn btn-primary px-3" style="float: right;"><i class="fa fa-plus"></i> Set  New Time </button>
          <button onclick="window.location='addnewminute'" class="btn btn-primary px-3" style="float: right;"><i class="fa fa-plus"></i> Set  Minute || </button>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <?php include 'db_connect.php' ?>
<style>
  .vid-item{
    cursor: pointer;
    position: relative;
    width: calc(25%) !important;
  }
  .watch{
    position: absolute;
    top: 0;
    left: 0;
    height: calc(100%);
    width: calc(100%);
    opacity: 0;
      background: #00000052;
  }
  .vid-item:hover .watch{
    opacity: 1;
  }
  .vid-details{
    width: calc(70%)!important;
  }
</style>
<div class="container py-2">
  <div class="col-lg-12">
    <div class="card bg-light">
      <div class="card-body">
        <div class="col-md-12 d-flex justify-content-between">
          <h3><b>My Videos</b></h3>
          <button class="btn btn-light bg-light border float-right" id="upload" type="button"><i class="fa fa-plus"></i> <i class="fa fa-video"></i> Upload</button>
        </div>
        <hr>
        <div class="row">
          <?php  
            $qry = $conn->query("SELECT * FROM uploads where user_id={$_SESSION['login_id']} ");
            while($row=$qry->fetch_assoc()):
          ?>
          <div class="col-md-12 py-2 border-bottom">
            <div class="d-flex w-100">
              <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
              <div class="d-flex justify-content-center bg-dark border-dark img-thumbnail w-100 p-0 vid-item" data-id="<?php echo $row['code'] ?>">
              <video id="<?php echo $row['code'] ?>" class="img-fluid" <?php echo !empty($row['thumbnail_path']) ? "poster='assets/uploads/thumbnail/".$row['thumbnail_path']."'" : '' ?> muted>
                <source src="<?php echo !empty($row['video_path']) ? "assets/uploads/videos/".$row['video_path'] : '' ?>">
              </video>
              <div class="watch d-flex align-items-center justify-content-center"><h3><span class="fa fa-play text-white"></span></h3></div>
            </div>
              <div class="d-bloc py-2 px-2 vid-details">
                <h6 class="card-title"><b><?php echo ucwords($row['title']) ?></b></h6>
                <p class="card-text truncate"><?php echo $row['description'] ?></p>
                <div class="d-flex w-100">
                  <button class="btn-sm btn-block btn-outline-primary col-sm-2 mr-2 edit_upload" type="button" data-id ="<?php echo $row['id'] ?>"><i class="fa fa-edit"></i> Edit</button>
                  <button class="btn-sm btn-block btn-outline-danger col-sm-2 m-0 delete_upload" type="button" data-id ="<?php echo $row['id'] ?>"><i class="fa fa-edit"></i> Delete</button>
                </div>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $('#upload').click(function(){
    uni_modal("<i class='fa fa-video'></i> Upload Video","upload.php","large")
  })
  $('.edit_upload').click(function(){
    uni_modal("<i class='fa fa-video'></i> Edit Uploaded Video","upload.php?id="+$(this).attr('data-id'),"large")
  })
  $('.vid-item').click(function(){
    location.href = "index.php?page=watch&code="+$(this).attr('data-id')
  })
  $('.vid-item').hover(function(){
    var vid = $(this).find('video')
    var id = vid.get(0).id;
      setTimeout(function(){
        vid.trigger('play')
        document.getElementById(id).playbackRate = 2.0
      },500)
  })
  $('.vid-item').mouseout(function(){
    var vid = $(this).find('video')
      setTimeout(function(){
        vid.trigger('pause')
      },500)
  })
  $('.delete_upload').click(function(){
    _conf("Are you sure to delete this data?","delete_upload",[$(this).attr('data-id')])
  })
  function delete_upload($id){
    start_load()
    $.ajax({
      url:'ajax.php?action=delete_upload',
      method:'POST',
      data:{id:$id},
      success:function(resp){
        if(resp==1){
          alert_toast("Data successfully deleted",'success')
          setTimeout(function(){
            location.reload()
          },1500)

        }
      }
    })
  }
</script>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
        <small>Copyright © Jean darc and Promise 2022</small>
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
