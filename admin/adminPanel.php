<?php
  session_start();
  if(!isset($_SESSION['admin']))
  {
    header('location:adminLogin.php');
  }
?>
<!DOCTYPE html>
<html>
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
    <title>Admin Panel</title>
</head>
<body>
 
<!-- navbar  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: #ff867c !important">
  <a class="navbar-brand" href="http://localhost/SmartBlog/index.php">Smart Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <h4> Admin Panel </h4>
      </li>
  </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link active"  data-toggle="modal" data-target="#do-post-modal">Post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="adminlogin.php"><?php echo $_SESSION['admin']?></a>
      </li>
      <li class="nav-item">
        <a class="btn btn-outline-light" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<!-- end of navbar  -->

<!-- main -->
<main class="mybg py-2" >
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <ul class="list-group">
                  <li class="list-group-item active">Dashboard</li>
                  <li class="list-group-item">User</li>
                  <li class="list-group-item">Post</li>
                </ul>
            </div>

          <div class="col-md-10">
    <!-- User Table -->
        <div class="container" id="user-table" style="display: none;">
					<table class="table table-bordered bg-light">
					  <thead class="thead-light">
					    <tr>
					      <th scope="col">ID</th>
					      <th scope="col">Name</th>
					      <th scope="col">Email</th>
					      <th scope="col">Gender</th>
					      <th scope="col">About</th>
					      <th scope="col" colspan="2">Operation</th>
					    </tr>
					  </thead>
					  <tbody>
						<?php
		                	include 'config/allUser.php';
		                	// $color = array('bg-light','bg-success', 'bg-danger');
		                	while($user = mysqli_fetch_array($query))
		                	{
		                 ?>
					    <tr class="bg-light">
					      <td><?php echo $user['id']; ?></td>
					      <td><?php echo $user['name']; ?></td>
					      <td><?php echo $user['email']; ?></td>
					      <td><?php echo $user['gender']; ?></td>
					      <td><?php echo $user['about']; ?></td>
					      <td><a href="<?php echo 'updateUser.php?uid='.$user['uid']; ?>"><i class="fa fa-edit fa-2x" style="color: green;"></i></a></td>
					      <td><a href="config/deleteUser.php?uid=<?php echo $user['uid']; ?>"><i class="fa fa-trash fa-2x"></i></a></td>
					      </tr>
					    <?php
					    	}
					    ?>
					  </tbody>
					</table>
        </div>
        <!-- End User-Table -->

  <!-- Post Table -->
        <div class="container" id="post-table" style="display:;">

          <table class="table table-bordered bg-light">
            <thead class="thead-light">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Image</th>
                <th scope="col">Cid</th>
                <th scope="col">Date</th>
                <th scope="col" colspan="2">Operation</th>
              </tr>
            </thead>
            <tbody>
            <?php
                      include 'config/allPost.php';
                      // $color = array('bg-light','bg-success', 'bg-danger');
                      while($post = mysqli_fetch_array($query))
                      {
                     ?>
              <tr class="bg-light">
                <td><?php echo $post['id']; ?></td>
                <td><?php echo $post['title']; ?></td>
                <td><?php echo $post['content']; ?></td>
                <td><img src="<?php echo '../image/postImg/'.$post['image'];?>" width=100></td>
                <td><?php echo $post['cid']; ?></td>
                <td><?php echo $post['pDate']; ?></td>
                <td><a href="updatePost.php?pid=<?php echo $post['id']; ?>"><i class="fa fa-edit fa-2x"></i></a></td>
                <td><a href="config/deletePost.php?uid=<?php echo $post['id']; ?>"><i class="fa fa-trash fa-2x"></i></a></td>
                </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
      </div>
    <!-- End Post-table -->

        </div>
    </div>
    </div>
</main>
<!-- end main -->

<!-- Do Post Modal -->
<div class="modal fade" id="do-post-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header my-background">
                <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container text-center">

                    <form id="post-form" action="config/addPost.php" method="post" enctype="multipart/form-data">
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
                            <input type="text" name="title" placeholder="Enter Post Title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <textarea rows="8" name="content" placeholder="Enter Post Content" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <h6 class="form-control">Select Image <input type="file" name="image"></h6>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input id="submit-btn" type="submit" value="Create Post" name="addPost" class="btn btn-primary">
              </div>
            </form>
        </div>
    </div>
</div>

<!-- end of Post Modal-->

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



    <!-- ajax -->
     <script type="text/javascript">
        $(document).ready(function(){
            console.log("ready");

            $("#update-form").on('submit',function(event){
                event.preventDefault();
                var name = $("#name").val();
                var email = $("#email").val();
                var password = $("#password").val();
                var gender = $(".gender").val();
                var about = $("#about").val();

                $("#loader").show();
                $("#submit-btn").hide();

                $.ajax({
                    url : "config/insert.php",
                    type : 'POST',
                    data : {
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
                           swal("Register Successfully", "", "success").then((value) => {
                                    window.location = ("login.php");
                                });
                            console.log(data);
                        } else {
                            swal("Ragisteration Faild !!!", "", "error");
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
    <!-- end ajax -->
</body>
</html>