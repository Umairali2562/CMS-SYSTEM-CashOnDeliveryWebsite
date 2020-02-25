<?php

if(isset($_GET['edit_user'])){
    
$the_user_id=$_GET['edit_user'];  
    
    $query="select * from users where user_id='{$the_user_id}'";
    $select_users_query=mysqli_query($connection,$query);
     while($row=mysqli_fetch_assoc( $select_users_query)){

    $user_id=$row['user_id'];    
   $username=$row['username'];
    $user_password= $row['password'];   
     $user_firstname=$row['user_firstname'];     
    $user_lastname=$row['user_lastname'];    
    $user_email=$row['user_email'];    
    $user_image=$row['user_image'];    
    $user_role=$row['user_role'];    

     }



}






if(isset($_POST['edit_user'])){

  $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $user_role=$_POST['user_role'];
    $username=$_POST['username'];
    $user_email=$_POST['user_email'];
//   // $post_image=$_FILES['image']{'name'};
////$post_image_temp=$_FILES['image']['tmp_name'];
$user_password=$_POST['user_password'];

//    
//    
//    
////move_uploaded_file($post_image_temp,"../img/$post_image");
////
////$post_image='../img/'.$post_image;

            $query="UPDATE users SET ";
            $query.="user_firstname ='{$user_firstname}',";
            $query.="user_lastname ='{$user_lastname}',";
    
            $query.="user_role ='{$user_role}',";
            $query.="username ='{$username}',";
            $query.="user_email ='{$user_email}',";
            $query.="password ='{$user_password}' ";
            $query.=" where user_id ={$the_user_id} ";
  

    
 $edit_user_query=mysqli_query($connection,$query);

confirm($edit_user_query);

}

?>
   

   
   <form action="" method="post" enctype="multipart/form-data"> 
    
    <?php 
       $query="select * from users";
       
       
       
       ?>
    
    
    <div class="form-group">
     <label for="title">First Name</label>    
     <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname ?>">
    </div> 
    
    <div class="form-group">
     <label for="post_category">Last Name</label>    
     <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname ?>">
    </div>
    
    
    <div class="form-group">
        <select name="user_role" id="">
            <option value="<?php echo $user_role ?>"><?php echo $user_role ?></option>
         <?php   
            if($user_role=='Admin'){
            
           echo  "<option value='Subscriber'>Subscriber</option>";
            }
            
            else{
                echo  "<option value='Admin'>Admin</option>";
                
            }
            
            
            ?>
            
            
           
            
        </select>
        
    </div>
    
    
    
    
    
    <div class="form-group">
     <label for="title">UserName</label>    
     <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
    </div>
    
    <div class="form-group">
     <label for="post_status">Email</label>    
     <input type="text" class="form-control" name="user_email" value="<?php echo $user_email ?>">
    </div>
    
    <div class="form-group">
     <label for="post_status">Password</label>    
     <input type="password" class="form-control" name="user_password" value="<?php echo $user_password ?>">
    </div>
    <!-- 
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div> --! -->
    
 
   
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
    </div>
   
    
    
</form>