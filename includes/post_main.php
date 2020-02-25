   <!-- Products Grid Section -->
    <section id="product" class="bg-light-gray">
        <div class="container-fluid">
           
            
            
            <div class="gridview">
            
            <?php 
                
                //for secrity ...
                $_GET['post_id']=mysqli_real_escape_string($connection,$_GET['post_id']);
                
                if(empty($_GET['post_id'])){
                  $_GET['post_id']=null;
                    
                    $_GET['post_id']=mysqli_real_escape_string($connection,$_GET['post_id']);
                     
                   
                }
                
                
            if(isset($_GET['post_id'])){    
            //cat_title coming from the form..
             $post_id=$_GET['post_id'];
     
         
            
            $query="select * from posts where post_id='$post_id' AND post_status='Published' ";
            $query=mysqli_query($connection,$query);
            if(!$query){
                echo "No Posts";
                
            }
                
                
                //fetching data from database
             while($row=mysqli_fetch_assoc($query)){
                                  
                $post_author=$row['post_Author'];
                $post_content=$row['post_content'];
                $post_id=$row['post_id'];
                
                 $post_image=$row['post_image'];
                $post_image=substr($post_image,7);
                $post_image="../blue/img/".$post_image;
                $post_title=$row['post_title'];
                $post_prize=$row['post_prize'];
                $post_date=$row['post_date'];
            
             }
                
                global $post_id;
            
                
                ?>
            
            
            
            
            
            <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            
                <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <form action="cart.php" method="post">
                <h1><?php echo $post_title?></h1>
                <input type="hidden" value="<?php echo $post_title ?>" name="post_title">

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $post_author?></a>
                </p>
                <input type="hidden" value="<?php echo $post_author ?>" name="post_author">

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <input value="<?php echo $post_date ?>" type="hidden" name="post_date">
                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="<?php echo $post_image ?>" alt="">
                <input value="<?php echo $post_image ?>" type="hidden" name="post_image">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $post_content?></p>
                <input type="hidden" value="<?php echo $post_content ?>" name="post_content">
                <input type="hidden" value="<?php echo $post_id ?>" name="post_id">
                    <input value="Add to Cart" type="submit" class="btnread" name="submit"/>

                <hr>

                <!-- Blog Comments -->

               </form>
                </div>
                

            </div>

     
           

        

            </div>

        </div>
        <!-- /.row -->

        <hr>

        

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    


        <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <hr>
                
                
                <?php 
                
                if(isset($_POST['create_comment'])){
                  
                 $query="select * from posts where post_id=$post_id";
                   $get_post_data=mysqli_query($connection,$query);
                   while($row=mysqli_fetch_assoc($get_post_data)){
                       $post_title=$row['post_title'];
                   }
                  
                    
                  $comment_author=$_POST['comment_author'];
                   $comment_author= mysqli_real_escape_string($connection,$comment_author);
                    $comment_email=$_POST['comment_email'];
                    $comment_email=mysqli_real_escape_string($connection,$comment_email);
                    $comment_content=$_POST['comment_content'];
                    $comment_content=mysqli_real_escape_string($connection,$comment_content);
                   
                    $query="insert into comments(comment_post_title,post_comment_id,comment_author,comment_email,comment_content,comment_status,comment_date) ";
                    
        $query.="values ('{$post_title}',$post_id,'{$comment_author}','{$comment_email}','{$comment_content}','Unapprove',now())";
                    
                    
                
         $create_comment_query=mysqli_query($connection,$query);
                    
                    if(!$create_comment_query){
                        die('query failed'.mysqli_error($connection));
                    }
                    
                    
          $query="UPDATE posts set comment_counts=comment_counts+1 ";
                    $query.="where post_cat_title='{$post_id}' ";
                    $update_comment_count=mysqli_query($connection,$query);
                }
                
                
                ?>

               
                <!-- Comments Form -->
                <div class="well">
                   
                   
                 
                    <h4>Leave a Comment:</h4>
                    <form  method="post" role="form">
                      
                        <div class="form-group">
                         <label for="Author">Author</label>
                          <input type="text" name="comment_author" class="form-control" name="comment_author">
                        </div>
                        
                         <div class="form-group">
                         <label for="Author">Email</label>
                          <input type="email" name="comment_email" class="form-control" name="comment_email">
                        </div>
                       
                        <div class="form-group">
                            <label for="comment">Your Comment</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
             
                
                
                           <!-- Comment -->
                <div class="media">
                     
                     <?php 
                    
            $query = "SELECT * FROM comments WHERE post_comment_id=$post_id";
            $query .= " AND comment_status='Approve' ";
            $query .= "ORDER BY comment_id DESC ";
                     
            $select_comment_query = mysqli_query($connection, $query);
            if(!$select_comment_query) {

                die('Query Failed' . mysqli_error($connection));
             }
            while ($row = mysqli_fetch_array($select_comment_query)) {
            $comment_date   = $row['comment_date']; 
            $comment_content= $row['comment_content'];
            $comment_author = $row['comment_author'];
                
                ?>
                     
                  <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author?>
                            <small><?php echo $comment_date?></small>
                        </h4>
                        
                       <?php echo $comment_content?>
 
                    </div>     
                     
               
                  
                </div>
                        <!-- End Nested Comment -->
                    </div>
                        <?php }}?>  
                    
                    
                </div>

            </div>

    

        </div>
        <!-- /.row -->


    </div>
    <!-- /.container -->

    </section>

    <footer id="">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">No Copyright @2018 Umair</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Boom Boom</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>