<div class="row">
    <?php
        require 'connection.php';
        $cid = $_GET['cid'];
        if ($cid == 0) {
            require '../admin/config/allPost.php';
            //$post = mysqli_fetch_array($query);
            while($posts = mysqli_fetch_array($query)){

        // if ($post) {
        //     out.println("<h3 class='display-5'> No Post Found This Category </h3>");
        //     return;
        // }
        
        // for (Post p : posts) {
        //     if (p.getTitle().equals("")) {
        //         continue;
        //     }
    ?>
    <div class="col-md-6 mt-2">

        <div class="card">
            <img class="card-img-top" src="<?php echo 'image/postImg/'.$posts['image']; ?>" border="1" height="250" width="220" object-fit="cover" alt=""/>

            <div class="card-body">
                <h4> <?php echo $posts['title']; ?></h4>
                <?php
                    if($posts['title']!=null)
                    {
                    if (strlen($posts['title']) < 42) {
                ?>
                <br>
                <?php
                    }
                }
                ?>
                <?php           
                    $content = $posts['content'];
                    if (strlen($content) >= 102) {
                        $content = substr($content,0, 100);
                    }
                ?>
                <p> <?php echo $content ?> </p>
            </div>

            <div class="card-footer text-center bg-info text-white">
                <a href="showPost.php?postId=<?php echo $posts['id']?>" class="text-white btn btn-outline-dark mr-md-2" >Read More</a>
            </div>

        </div>

    </div>

    <?php
        }
    }
    else{
            require 'connection.php';
            $postById = "SELECT * FROM `posts` WHERE cid=$cid";
            $q = mysqli_query($con, $postById);
            while($post=mysqli_fetch_array($q)){
    ?>
     <div class="col-md-6 mt-2">

        <div class="card">
            <img class="card-img-top" src="<?php echo 'image/postImg/'.$post['image']; ?>" border="1" height="250" width="220" object-fit="cover" alt=""/>

            <div class="card-body">
                <h4> <?php echo $post['title']; ?></h4>
                <?php
                    if($post['title']!=null)
                    {
                    if (strlen($post['title']) < 42) {
                ?>
                <br>
                <?php
                    }
                }
                ?>
                <?php           
                    $content = $post['content'];
                    if (strlen($content) >= 102) {
                        $content = substr($content,0, 100);
                    }
                ?>
                <p> <?php echo $content ?> </p>
            </div>

            <div class="card-footer text-center bg-info text-white">
                <a href="showPost.php?postId=<?php echo $post['id']?>" class="text-white btn btn-outline-dark mr-md-2" >Read More</a>
            </div>

        </div>

    </div>

    <?php
        }
    }
    ?>
</div>

    