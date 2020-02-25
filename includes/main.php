<section id="product" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><i class="fa fa-bell" aria-hidden="true"></i> Categories</h2>
                    <h3 class="section-subheading text-muted">Here's The List Of the Products Available.</h3>
                </div>
            </div>
            
            
          
            
            
            <div class="gridview">
             
               
            <?php
         
            $query="SELECT * FROM categories";
            $query=mysqli_query($connection,$query);
            
            while($row=mysqli_fetch_assoc($query)){
                $cat_id=$row['cat_id'];
                $cat_img=$row['cat_images'];
                $cat_desc=$row['cat_description'];
                $cat_title=$row['cat_title'];
            
            $cat_img=substr($cat_img,3);
             
                ?>
             
             
              <div class="mybox">
                    <a href="#" class="">
                       <img src="<?php echo $cat_img; ?>" class="img-responsive" alt="">
                    </a>
                    <div class="caption" >
                       <form action="products.php" method="get">
                        <h4 style="text-align: center;"><?php echo $cat_title ?></h4>
                        <p class="pararead"><?php echo $cat_desc ?></p>
                       <hr class="lineread">
                       <input type="hidden" name="category"  value="<?php echo $cat_title ?>">
                      <input  type="submit" class="btnread" value="View More">
                      </form>
                      
                    </div>
               </div>  
                     
                <?php }  ?>
                 
     
               </div>
            


         
            </div>
            
            

        