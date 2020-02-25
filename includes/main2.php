   <!-- Products Grid Section -->
    <section id="product" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><i class="fa fa-bell" aria-hidden="true"></i> Products</h2>
                    <h3 class="section-subheading text-muted">Here's The List Of the Products Available.</h3>
                </div>
            </div>
            
            
            
            <div class="gridview">
            
            <?php 
                
            if(isset($_GET['category'])){    
            //cat_title coming from the form..
           
             
                $_GET['category']=mysqli_real_escape_string($connection,$_GET['category']);
            $cat_title=$_GET['category'];
            $query="select * from posts where post_cat_title='$cat_title' AND post_status='Published' ";
            $query=mysqli_query($connection,$query);
            
             while($row=mysqli_fetch_assoc($query)){
                                  
                $post_author=$row['post_Author'];
                $post_content=$row['post_content'];
                $post_id=$row['post_id'];
                 $post_image=$row['post_image'];
                $post_image=substr($post_image,7);
                $post_image="../blue/img/".$post_image;
                $post_title=$row['post_title'];
                $post_prize=$row['post_prize'];
            
            //for security
                 $post_author=mysqli_real_escape_string($connection,$post_author);
                 $post_content=mysqli_real_escape_string($connection,$post_content);
                 $post_id=mysqli_real_escape_string($connection,$post_id);
                 $post_image=mysqli_real_escape_string($connection,$post_image);
                 $post_title=mysqli_real_escape_string($connection,$post_title);
                 $post_prize=mysqli_real_escape_string($connection,$post_prize);
                
                ?>
            
            
            
            
            
             <div class="mybox">
                    <a href="#" class="">
                       <img src="<?php echo $post_image;?>" class="img-responsive" alt="">
                    </a>
                    <div class="caption" >
                       <form action="post.php" method="get">
                      
                        <h4 style="text-align: center;"><?php echo $post_title ?></h4>
                        <hr class="lineread">
         
                         <h4 style="text-align: center;"><?php echo "$".$post_prize ?></h4>
                       <input type="hidden" name="post_id"  value="<?php echo $post_id ?>">
                      
                   
                      <input  type="submit" class="btnread" value="View More">
                      </form>
                      
                    </div>
               </div>  
               
              
                     
                   
                      
                   
           
          
         <?php }} ?>
         
          </div>
        </div>

         