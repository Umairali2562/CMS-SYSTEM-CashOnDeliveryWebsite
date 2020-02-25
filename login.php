<?php
include "includes/db.php";
session_start();









if(isset($_POST['login'])){
     $username=$_POST['username'];
     $password=$_POST['password'];
    $username=mysqli_real_escape_string($connection,$username);
    $password=mysqli_real_escape_string($connection,$password);

$query="select * from users where username='{$username}' ";
    $select_user=mysqli_query($connection,$query);
    if(!$select_user){
        die("query failed".mysqli_error($connection));
    }
    
    while($row=mysqli_fetch_array($select_user)){
        $db_user_id=$row['user_id'];    
        $db_username=$row['username'];
        $db_user_password= $row['password'];   
        $db_user_firstname=$row['user_firstname'];     
        $db_user_lastname=$row['user_lastname'];    
        $db_user_email=$row['user_email'];      
        $db_user_role=$row['user_role'];    
    }

    if($username===$db_username&&$password===$db_user_password){
          $_SESSION['username']=$db_username;
        $_SESSION['firstname']=$db_user_firstname;
        $_SESSION['lastname']=$db_user_lastname;
        $_SESSION['user_role']=$db_user_role;
        header("Location:admin/index.php");
        
    
        
    }
    
    
    else{
         $_SESSION['msg1']="<h3><center>Wrong User/pass.!</center></h3>";
    

        header("Location:login.php");
    }
    
    
}



?>
   





<!DOCTYPE html>
<html lang="en">

<head>
    <title>BlueWhale Login</title>
    <!-- meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- /meta tags -->
    <!-- custom style sheet -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <!-- /custom style sheet -->
    <!-- fontawesome css -->
    <link href="css/fontawesome-all.css" rel="stylesheet" />
    <!-- /fontawesome css -->
    <!-- google fonts-->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- /google fonts-->

</head>


<body>
    <div class=" w3l-login-form">
        <h2>Login Here</h2>
        <form action="#" method="POST">

            <div class=" w3l-form-group">
                <label>Username:</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                     <input name="username" type="text" class="form-control" placeholder="Enter Username">
                </div>
            </div>
            <div class=" w3l-form-group">
                <label>Password:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                     <input name="password" type="password" class="form-control" placeholder="Enter Password">
                </div>
            </div>
            <div class="forgot">
                <a href="#">Forgot Password?</a>
                <p><input type="checkbox">Remember Me</p>
            </div>
            <?php 
       
            
            
            if(isset($_SESSION['msg'])) 
            {
                echo  $_SESSION['msg']; 
                       $query="DELETE FROM cart";
                        $delete_query=mysqli_query($connection,$query);
            
                
            }
            else if(isset($_SESSION['msg1'])){
                echo $_SESSION['msg1'];
                
            
                
            }
           
            
            ?>
           <button class="btn btn-primary" name="login" type="submit">Login</button>
        </form>
        <p class=" w3l-register-p">Don't have an account?<a href="#" class="register"> Register</a></p>
    </div>

</body>

</html>