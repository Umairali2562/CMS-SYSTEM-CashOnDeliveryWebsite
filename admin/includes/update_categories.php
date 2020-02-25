 <form action="" method="post" enctype="multipart/form-data" >
                        <div class="form-group"> 
                        <label for="cat-title">Edit Category</label>
                        <?php
                            
                            if(isset($_GET['edit'])){
                                
                            $cat_id=$_GET['edit'];  
                       $query="SELECT * FROM categories WHERE cat_id=$cat_id";
                       $select_categories_id=mysqli_query($connection,$query);
                         while($row=mysqli_fetch_assoc($select_categories_id)){
                                       $cat_title=$row['cat_title'];
                                       $cat_id=$row['cat_id'];
                                       $cat_image=$row['cat_images'];
                                
                      ?>
                    
                     <input value='<?php if(isset($cat_title)){ $cat_title;}?>' class='form-control' type='text' name='cat_title'>
        
        <div class="form-group">
       
         <?php //update ..
                             if(isset($_POST['update_categories'])){
                                       $the_cat_title=$_POST['cat_title'];
                                     $cat_image=$_FILES['image']['name'];
                                     $cat_image='../img/'.$cat_image;
                                     $cat_image_temp=$_FILES['image']['tmp_name'];  //the path of the image file
                                 
                                 
                                
                                 
                                        move_uploaded_file($cat_image_temp,$cat_image);       
                        $query="update categories SET cat_title='{$the_cat_title}',cat_images='{$cat_image}'  WHERE cat_id={$cat_id} ";
                                       $update_query=mysqli_query($connection,$query);
                            
                                   
                                 if(!$update_query){
                                     die("failed".mysqli_error($connection));
                                 }
                            
                                 
                                 
                             }
                            
                            ?>
        
        <img width="100" src="<?php echo $cat_image; ?>">
        <input type="file" name="image">
       
    </div>
                            
                            
                            
                             
                         <?php }} ?>
                            
                       
                            
                            
                            
                            
                        
                        
                        
                        </div>
                        <div class="form-group"> 
                        <input class="btn btn-primary" type="submit" name="update_categories" value="Update category">
                        </div>
                        </form>
                    