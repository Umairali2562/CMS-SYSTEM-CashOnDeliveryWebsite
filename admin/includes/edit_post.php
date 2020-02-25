<?php


if(isset($_GET['p_id'])){

$the_post_id=$_GET['p_id'];
}

    
                            $query="SELECT * FROM posts where post_id=$the_post_id";
                            $select_posts_by_id=mysqli_query($connection,$query);
                            

                            while($row=mysqli_fetch_assoc($select_posts_by_id)){
                            $post_id=$row['post_id'];
                            $post_prize=$row['post_prize'];
                            $post_category=$row['post_cat_title'];
                            $post_title=$row['post_title'];
                            $post_author=$row['post_Author'];
                            $post_date=$row['post_date'];
                            $post_image=$row['post_image'];
                            $post_content=$row['post_content'];
                            $post_status=$row['post_status'];
                            }
    
    


if(isset($_POST['update_post'])){
    
 
                           
                         
                            $post_title=$_POST['title'];
                            $post_prize=$_POST['post_prize'];
                            $post_author=$_POST['author'];
                            $post_category=$_POST['post_category'];
                            
                            $post_image=$_FILES['image']['name'];
                         $post_image="../img/".$post_image;
                           
                       $post_image_temp=$_FILES['image']['tmp_name'];
                           
                            
    
                            $post_content=$_POST['post_content'];
                            $post_status=$_POST['post_status'];
    
                      
    
    
    if($post_image=="../img/"){
        $query="SELECT * from posts where post_id=$the_post_id ";
        $select_image=mysqli_query($connection,$query);
        
        while($row=mysqli_fetch_assoc($select_image)){
            $post_image=$row['post_image'];
           
            
        }
        
    }
    
    
      move_uploaded_file($post_image_temp,"$post_image"); 
    

            $query="UPDATE posts SET ";
            $query.="post_title ='{$post_title}',";
            $query.="post_prize ='{$post_prize}',";
    
            $query.="post_cat_title ='{$post_category}',";
    
    
    
            $query.="post_date ='now()',";
            $query.="post_Author ='{$post_author}',";
            $query.="post_status ='{$post_status}',";
            $query.="post_content ='{$post_content}',";
            $query.="post_image ='{$post_image}' ";
            $query.=" where post_id ={$the_post_id} ";
  

    
 $update_post=mysqli_query($connection,$query);
                        
confirm($update_post);
    
}

?>  
   
   
   <form action="" method="post" enctype="multipart/form-data"> 
    
    <div class="form-group">
     <label for="title">Post Title</label>    
     <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
    </div> 
    
    <div class="form-group">
  
  <select name="post_category" id="">
         
         
         <?php
          $query="SELECT * FROM categories";
                       $select_categories=mysqli_query($connection,$query);
      
                        confirm($select_categories);
                         while($row=mysqli_fetch_assoc($select_categories)){
                                       $cat_title=$row['cat_title'];
                                       $cat_id=$row['cat_id'];
                          echo "<option value='$cat_title'>{$cat_title}</option>";
                         }
                                
      ?>
  </select>
  
   
  
  
  
       </div>
    
    <div class="form-group">
     <label for="title">Post Author</label>    
     <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="author">
    </div>
    
    
       <div class="form-group">
    <select name="post_status" id="">
            <option value="<?php echo $post_status ?>"><?php echo $post_status ?></option>
         <?php   
            if($post_status=='Published'){
            
           echo  "<option value='Draft'>Draft</option>";
            }
            
            else{
                echo  "<option value='Published'>Published</option>";
                
            }
         
        
                                  
        
                                
      ?>
                                
    
  </select>
       </div>
    
    <div class="form-group">
     <label for="post_status">Post Prize</label>    
     <input value="<?php echo $post_prize; ?>" type="text" class="form-control" name="post_prize">
    </div>
    
    <div class="form-group">
       
        
        <img width="100" src="<?php echo $post_image; ?>">
        <input type="file" name="image">
       
    </div>
    
 
    
    <div class="form-group">
    <label for="post_content">Post Content</label>
    <br>
    <textarea  class="form-control" name="post_content" id="" cols="40" rows="10">     
    <?php echo $post_content; ?>
    
    </textarea>
    </div>
    
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Post" >
    </div>
   
    
    
</form>