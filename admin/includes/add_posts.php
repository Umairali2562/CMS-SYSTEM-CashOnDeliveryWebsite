<?php


if(isset($_POST['create_post'])){
   $post_title=$_POST['title'];
   $post_prize=$_POST['post_prize'];
    $post_author=$_POST['author'];
    $post_category=$_POST['Post_Category'];
    $post_status=$_POST['post_status'];
    $post_image=$_FILES['image']{'name'};
    $post_image_temp=$_FILES['image']['tmp_name'];
    $post_content=$_POST['post_content'];
    $post_date=date('d-m-y');
   // $post_comment_count=4;
    
    
    
move_uploaded_file($post_image_temp,"../img/$post_image");

$post_image='../img/'.$post_image;
$query="INSERT INTO posts(post_cat_title,post_title,post_author,post_date,post_image,post_content,post_status,post_prize)";

$query.="VALUES('{$post_category}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_status}','{$post_prize}')";

$create_post_query=mysqli_query($connection,$query);
    
confirm($create_post_query);
    
    
}

?>
   

   
   <form action="" method="post" enctype="multipart/form-data"> 
    
    <div class="form-group">
     <label for="title">Post Title</label>    
     <input type="text" class="form-control" name="title">
    </div> 
    
    <div class="form-group">
     <label for="post_category">Post Category</label> 
     <br>   
 
         <select name="Post_Category" id="">
         
         <option>Select options</option>
         <?php
         $query="select * from categories";
         $select_all_categories=mysqli_query($connection,$query);
        
             
         while($row=mysqli_fetch_assoc($select_all_categories)){
                             
                                $cat_title=$row['cat_title'];    
                       
             
             
             
             
             
         echo "<option value='$cat_title'> $cat_title</option>";
         }
        ?>
            
                         
                                
      ?>
  </select>
     
     
     
    </div>
    
    <div class="form-group">
     <label for="title">Post Author</label>    
     <input type="text" class="form-control" name="author">
    </div>
    
   
   <div class="form-group">
    <label for="post_status">Post Status</label> 
     <br>   
 
    <select name="post_status" id="">
         
         <option value=''>Select Options</option>
         <option value='Published'>Published</option>
         <option value='Draft'>Draft</option>
        
        
                         
                    
  </select>
     </div>
      
    
    <div class="form-group">
     <label for="post_status">Prize</label>    
     <input type="text" class="form-control" name="post_prize">
    </div>
    
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>
    
 
    
    <div class="form-group">
    <label for="post_content">Post Content</label>
    <br>
    <textarea class="form-control" name="post_content" id="" cols="40" rows="10">     
    </textarea>
    </div>
    
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post" >
    </div>
   
    
    
</form>