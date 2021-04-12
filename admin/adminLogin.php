<?php
    session_start();
?>
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
    <title>Login</title>
  </head>
  <body>
    <?php
    require_once('navbar.php');
    ?>

    <main class="mybg">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header text-center bg-info" style="font-size: 24px;">
                            <div class="card-title ">Admin Login</div>
                        </div>
                        <div class="card-body">
                            <form id="l-form" action=""  method="post">
                                <div class="form-group">
                                    <input id="email" class="form-control" type="email" name="userEmail" placeholder="Enter Email">
                                </div>
                                <div class="form-group">
                                    <input id="password" class="form-control" type="password" name="userPassword" placeholder="Enter Password">
                                </div>

                                <div class="container text-center" id="loader" style="display: none;"><span class="fa fa-refresh fa-4x fa-spin" style="color: rgb(91, 192, 222)"></span>
                                </div>

                                <div class="form-group text-center" id="submit-btn">
                                    <input class="btn btn-success" type="submit" name="submit" value="submit">
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

            $("#l-form").on('submit', function(event){
                event.preventDefault();
                var email = $("#email").val();
                var password = $("#password").val();

                $("#loader").show();
                $("#submit-btn").hide();

                $.ajax({
                    url:"config/uservalid.php",
                    type : 'POST',
                    data : {
                        'email':email,
                        'password':password
                    },
                    success: function(data){
                        $("#loader").hide();
                        $("#submit-btn").show();
                        console.log(data);
                        if(data == true){
                            swal("Login Done","","success").then((value) => {
                                window.location = ("adminPanel.php");
                            });
                        }else{
                            swal("Login Faild", "Try Again", "error");
                        }
                    },
                    error : function(jqXHR,textStatus,errorThrown){
                        $("#loader").hide();
                        $("#submit-btn").show();
                    }
                });
            });
        })
    </script>
  </body>
</html>