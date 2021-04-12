<?php
    require 'config/connection.php';
    $pid = $_GET['postId'];
    $postQuery = "SELECT * FROM `posts` WHERE id=$pid";

    $query = mysqli_query($con,$postQuery);

    while($post = mysqli_fetch_array($query)){
?>
<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $post['title']; ?></title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="assets/js/main.js" type="text/javascript"></script>

        <style>
            .p-title{
                font-size: 24px;
            }

            .p-content{
                font-weight: 50;
                font-size: 18px;
            }
            .p-user-info{
                font-size: 18px;
            }
            .p-date{
                font-weight: bold;
                font-size: 18px;
            }
            .p-user{
                border: 1px solid #e2e2e2;
                padding-top: 15px;
            }
            .c-like{
                color: blue;
            }
            .c-dislike{
                color : red;
            }
        </style>
        <!--Facebook Comment Plugin-->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v10.0" nonce="QLla78g7"></script>

</head>
<body> 
 <?php
    include 'navbar.php';
 ?>
    <!--main-->
    <main>
        <div class="container">
            <div class="row my-4">
                <div class="col-md-8 offset-md-2">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?php echo $post['title'];?></h4>
                        </div>

                        <div class="card-body">
                            <img id="p-img" class="card-img-top" src="image/postImg/<?php echo $post['image']; ?>" width="400" height="350" style=" border: 5px solid #e2e2e2;" />
                            <div class="row my-2 p-user">
                                <div class="col-md-6">
                                    <p class="p-user-info">Posted By <a href="#!"><?php echo $post['userId']; ?></a></p>
                                </div>
                                <div class="col-md-6 text-right">
                                    <p class="p-date"><?php echo $post['pDate']; ?></p>
                                </div>
                            </div>
                            <p class="p-content"><?php echo $post['content']; ?></p><br>
                        </div>


                        <div class="card-footer text-center bg-info text-white">
                        <!--Facebook comment plugin--> 
                        <div class="card-footer text-center">
                            <div class="fb-comments" data-href="http://localhost/smartBlog/showPost.php?postId=<?php echo $pid ?>" data-width="" data-numposts="5"></div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </main>
    <!--end main-->

    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- SweetAlert cdn -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

<?php
    }
?>
