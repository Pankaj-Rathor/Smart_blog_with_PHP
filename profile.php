<?php
    session_start();

    if(!isset($_SESSION['userName'])){
        header('location: login.php');
    }

    require 'admin/config/allCategory.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- font awesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@300&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Profile</title>
  </head>
  <body>
    <!-- navbar  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: #ff867c !important">
  <a class="navbar-brand" href="index.php">Smart Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Post <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         <?php
            while($c=mysqli_fetch_array($query))
            {
          ?>
          <a class="dropdown-item" href="#"><?php echo $c['cName']?></a>
          <?php
            }
          ?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>

       <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#!"><?php echo $_SESSION['userName']; ?></a>
      </li>
      <li class="nav-item">
        <a class="btn btn-outline-light" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
    <!-- end navbar -->
<main>
 <div class="container-fluid">
        <div class="row mt-3 mr-auto">
            <div class="col col-md-2">
                <!--categories-->
                <div class="list-group">
                    <a href="#" onclick="getPosts(0, this)" class="c-link list-group-item list-group-item-action active">All Post</a>
                    <?php
                      require 'admin/config/allCategory.php';
                      while($d=mysqli_fetch_array($query))
                      {
                    ?>
                    <a onclick="getPosts(<?php echo $d['cid']; ?>, this)" class="c-link list-group-item list-group-item-action" value="<?php echo $d['cid']; ?>"><?php echo $d['cName']; ?></a>
                    <?php
                        }
                    ?>
                </div>

            </div>
            <!-- Post container-->
            <div class="col col-md-10">
                <!-- Loader -->
                <div class="container text-center" id="loader">
                    <i class="fa fa-refresh fa-4x fa-spin" style="color:skyblue;"></i>
                    <h4 class="display-5">Posts Loading...</h4>
                </div>
                <!--All Post Show -->
                <div id="post-container">

                </div>

            </div>
        </div>
    </div>
</main>
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- sweetalert cdn -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="assets/js/main.js"></script>
   <!--  <?php
    //  include 'footer.php';
    ?> -->

<!-- get Post -->
    <script>
       $(document).ready(function () {
            let allPostRef = $(".c-link")[0];
            getPosts(0, allPostRef);
        });
       
        function getPosts(catId, temp) {
            $(".c-link").removeClass('active');
            $("#post-container").hide();
            $("#loader").show();

            $.ajax({
                url: "config/loadPost.php",
                data: {cid: catId},
                success: function (data, textStatus, jqXHR) {
                    $(temp).addClass('active');
                    $("#loader").hide();
                    $("#post-container").show();
                    $("#post-container").html(data);
                }
            });
        }

       
</script>           

  </body>
</html>