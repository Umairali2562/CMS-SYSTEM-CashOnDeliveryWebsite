
<?php session_start(); ?>

<?php
include "db.php";
?>

   

<?php
    
if(!isset($_SESSION['user_role'])){
       $_SESSION['msg']="<h3><center>Login First.!</center></h3>";
    

    
    
        header("Location:login.php");
    }



?>   
   
   
   
    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll animated infinite bounce" href="#page-top">BlueWhale Computer Store</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden"><a href="#page-top"></a></li>
                    <li><a class="page-scroll" href="#home"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                    
                    <li class="um-main"><a class="page-scroll" href="#product"><i class="fa fa-bell" aria-hidden="true"></i>Products</a>
                  
                    
                    </li>
                     
                      
                       
                        
                          <li><a class="page-scroll" href="#contact"><i class="fa fa-volume-control-phone" aria-hidden="true"></i>Contact</a></li>
                          
                          
                        <?php 
                    
                    $username=$_SESSION['username'];
                         if($username=="Login"){
                              echo "<li><a class='page-scroll' href='login.php'><i class='fa fa-sign-in' aria-hidden='true'></i>Login</a></li>";
                 
                     
                    echo  "<li><a href='cart.php'><i class='fa fa-shopping-cart fa-2x' aria-hidden='true'></i></a></li>";
                         }
                    
                    else{
                        echo "<li><a class='page-scroll' href='admin/profile.php'><i class='fa fa-sign-in' aria-hidden='true'></i>$username</a></li>";
                         echo  "<li><a href='cart.php'><i class='fa fa-shopping-cart fa-2x' aria-hidden='true'></i></a></li>";
                        
                        
                    }
                    
                         ?>  
                          
                       
                
                
                
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Welcome To BlueWhale Service!</div>
                <div class="intro-heading" id="home">Computer Store</div>
                <a href="#product" class="page-scroll btn btn-xl animated swing">Our Product.</a>
            </div>
        </div>
    </header>
