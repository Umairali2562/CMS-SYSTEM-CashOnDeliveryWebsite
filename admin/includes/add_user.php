<?php


if(isset($_POST['create_user'])){
  // $user_id=$_POST['user_id'];
  $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $user_role=$_POST['user_role'];
    $username=$_POST['username'];
    $user_email=$_POST['user_email'];
   // $post_image=$_FILES['image']{'name'};
//$post_image_temp=$_FILES['image']['tmp_name'];
    $user_password=$_POST['user_password'];

    
    
    
//move_uploaded_file($post_image_temp,"../img/$post_image");
//
//$post_image='../img/'.$post_image;
$query="INSERT INTO users(user_firstname,user_lastname,user_role,username,user_email,password) ";
//
$query.=" VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}');";

$create_user_query=mysqli_query($connection,$query);   
confirm($create_user_query);
    
    
}

?>
   

   
   <form action="" method="post" enctype="multipart/form-data"> 
    
    <?php 
       $query="select * from users";
       
       
       
       ?>
    
    
    <div class="form-group">
     <label for="title">First Name</label>    
     <input type="text" class="form-control" name="user_firstname">
    </div> 
    
    <div class="form-group">
     <label for="post_category">Last Name</label>    
     <input type="text" class="form-control" name="user_lastname">
    </div>
    
    
    <div class="form-group">
        <select name="user_role" id="">
            <option value="Subscriber">select options</option>
            <option value="Admin">Admin</option>
            <option value="Subscriber">Subscriber</option>
            
        </select>
        
    </div>
    
    
    
    
    
    <div class="form-group">
     <label for="title">UserName</label>    
     <input type="text" class="form-control" name="username">
    </div>
    
    <div class="form-group">
     <label for="post_status">Email</label>    
     <input type="text" class="form-control" name="user_email">
    </div>
    
    <div class="form-group">
     <label for="post_status">Password</label>    
     <input type="password" class="form-control" name="user_password">
    </div>
    <!-- 
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div> --! -->
    
 
   
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>
   
    
    
</form>