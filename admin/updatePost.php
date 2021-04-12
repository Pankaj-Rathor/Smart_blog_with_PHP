<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- font awesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@300&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Update Post</title>
  </head>
  <body>
    <?php
    require_once('navbar.php');
    ?>

    <main class="mybg">
        <div class="container py-4" >
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header text-center bg-info" style="font-size: 24px;">
                            <div class="card-title">Update Post</div>
                        </div>
                        <div class="card-body">
                            <?php
                                include 'config/connection.php';
                                $pid = $_GET['pid'];
                                $selectQuery = "SELECT * FROM `posts` where id='$pid' ";

                                //Execute Query
                                $query = mysqli_query($con, $selectQuery);
                                
                                while($p = mysqli_fetch_array($query))
                                {
                            ?>

                            <form action="config/updatePosts.php" method="post" enctype="multipart/form-data">
                                <div style="display: none;">
                                    <input type="text" name="pid" id="pid" value="<?php echo $_GET['pid']; ?>">
                                </div>
                                <div class="form-group">
                            <h6>Categories
                                <select class="form-control" name="cid">
                                    <option disabled="" class="form-control">---Select Categories---</option>
                                    <?php
                                      require 'config/allCategory.php';
                                      while($c=mysqli_fetch_array($query)){
                                    ?>
                                     <option value="<?php echo $c['cid']; ?>"> <?php echo $c['cName']; ?> </option>
                                     <?php
                                     }
                                    ?>
                                </select></h6>
                        </div>
                        <div class="form-group">
                            <input type="text" name="title" value="<?php echo $p['title'];?>" placeholder="Enter Post Title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <textarea rows="8" name="content" placeholder="Enter Post Content" class="form-control" required><?php echo $p['content'];?></textarea>
                        </div>
                        <div>
                            <img class="img-responsive" src="<?php echo '../image/postImg/'.$p['image'];?>" width=200 style="margin-left: 140px;"/>
                        </div>
                        <div class="form-group">  
                            <h6 class="form-control">Select Image <input type="file" name="image" id="image"/></h6>
                        </div>
                            <?php
                                    }
                                ?>
                                <div class="form-group text-center">
                                    <input id="submit-btn" class="btn btn-success" type="submit" name="updatePost" value="Update"></btn>
                                </div>
                            </form>
                        </div>
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
    <!-- custom js -->
    <script src="assets/js/main.js"></script>

  </body>
</html>

