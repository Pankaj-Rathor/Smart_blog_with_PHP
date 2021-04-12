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
    <title>Register</title>
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
                            <div class="card-title">Update User</div>
                        </div>
                        <div class="card-body">
                            <?php
                                include 'config/connection.php';
                                $uid = $_GET['uid'];
                                $selectQuery = "SELECT * FROM `user` where uid='$uid' ";

                                //Execute Query
                                $query = mysqli_query($con, $selectQuery);
                                
                                while($user = mysqli_fetch_array($query))
                                {
                            ?>

                            <form id="r-form" action="" method="post">
                                <div style="display: none;">
                                    <input type="text" name="" id="uid" value="<?php echo $_GET['uid']; ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" id="name" value="<?php echo $user['name']; ?>" placeholder="Enter Name" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" id="email" value="<?php echo $user['email']; ?>" placeholder="Enter Email" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" id="password" value="<?php echo $user['password']; ?>" placeholder="Enter Password" required>
                                </div>
                                <div class="form-group">
                                  <input type="text" class="form-control" id="gender" value="<?php echo $user['gender']; ?>" placeholder="Gender">   
                                </div>
                                
                                <div class="form-group">
                                    <textarea class="form-control" id="about" name="about" col="10" row="5"><?php echo $user['about']; ?></textarea>
                                </div>
                                <?php
                                    }
                                ?>
                                <div class="container text-center" id="loader" style="display:none"><span class="fa fa-refresh fa-4x fa-spin" style="color: rgb(91, 192, 222)"></span>
                                        <h4>Please Wait...</h4>
                                    </div>
                                <div class="form-group text-center">
                                    <input id="submit-btn" class="btn btn-success" type="submit" name="submit" value="Update"></btn>
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

    <script type="text/javascript">
        $(document).ready(function(){
            console.log("ready");

            $("#r-form").on('submit',function(event){
                event.preventDefault();
                var uid = $("#uid").val();
                var name = $("#name").val();
                var email = $("#email").val();
                var password = $("#password").val();
                var gender = $("#gender").val();
                var about = $("#about").val();

                $("#loader").show();
                $("#submit-btn").hide();

                $.ajax({
                    url : "config/update.php",
                    type : 'POST',
                    data : {
                        'uid' : uid,
                        'name': name,
                        'email': email,
                        'password': password,
                        'gender': gender,
                        'about': about
                    },
                    success: function(data){
                             $("#loader").hide();
                            $("#submit-btn").show();
                        if (data == true) {
                           swal("Update User", "", "success").then((value) => {
                                    window.location = ("adminPanel.php");
                                });
                            console.log(data);
                        } else {
                            swal("Update Failed !!!", "", "error");
                            console.log(data);
                        }
                    },
                    error : function(jqXHR,textStatus, errorThrown){
                        $("#loader").hide();
                         $("#submit-btn").show();
                         swal("Ragisteration Faild !!!", "", "error");
                    },

                });
            });
        });
    </script>

  </body>
</html>

