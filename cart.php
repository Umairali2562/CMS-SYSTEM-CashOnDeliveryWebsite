<!DOCTYPE html>
<html lang="en">




<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bluewhale Store</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="css/animate.css">
    <!-- Theme CSS -->
    <link href="css/agency.css" rel="stylesheet">
    <link href="css1/mystyle.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 

    

</head>

<body id="page-top" class="index" style="background-color:   white">

   <?php include "includes/cart_header.php";?>


     

    


    <!-- Cart -->
    
    <?php
    
if(isset($_GET['delete'])){
    
    $item=$_GET['delete'];
    
      $query="DELETE FROM cart where item='{$item}'";
                        $delete_query=mysqli_query($connection,$query);
                        
    
 
}    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
// add to cart    
    $total=0;
if(isset($_POST['submit'])){
    
 $post_id=$_POST['post_id'];
    

    
//getting post data    
    $query="select * from posts where post_id=$post_id";
    
$c=mysqli_query($connection,$query);
    
while($row=mysqli_fetch_assoc($c)){
    $item=$row['post_title']; //post id ka item
    $prize=$row['post_prize'];
    $post_cat_title=$row['post_cat_title'];

}
    
    
//condition to check if repeated data ...
    
    
    //getting data from cart
     $query="select * from cart where item='{$item}'";
    
$cart=mysqli_query($connection,$query);
    
    if(!$cart){
        echo "failed";
    }
    
while($row=mysqli_fetch_assoc($cart)){
    $item_cart=$row['item'];
    $id=$row['id'];
   
}
    
    //if $item cart is empty
    if(empty($item_cart)){
        $item_cart=null;
    }
    
    
    
    
  //comparing cart item from the cart to post_title if not same then make a new entry 
    
    if(!$item==$item_cart){
      $query="insert into cart(cart_post_cat_title,item,price,Quantity,total) ";
                    
        $query.="values ('{$post_cat_title}','{$item}',$prize,1,$prize) ";
                    
                    
     $create=mysqli_query($connection,$query);
    
    }
    else{  //if same update the quantity
        $total=$total+$prize;
        
         //total items .
      $query="UPDATE cart set Quantity=Quantity+1,total=total+$total ";
                    $query.="where item='{$item}' ";
                    $update_count=mysqli_query($connection,$query);
        
      
    }
    
    
       
    
   
    
   
}


    
    
    //selecting all
    
    
       $query="select * from cart ";
            $query=mysqli_query($connection,$query);
 
                
                
           
             
    ?>
    
           
<section class="container2 content-section">
   
    <form action="checkout.php" method="get">
   
        
                  <h2 class="section-header">CART</h2>
        
        <div class="cart-row class-row-set">
            <span class="cart-item cart-header cart-column">ITEM</span>
            
            <span class="cart-price cart-header cart-column">PRICE</span>
            <span class="cart-quantity cart-header cart-column">QUANTITY</span>
        </div>
    
    <?php 
   
         //fetching data from database
             while($row=mysqli_fetch_assoc($query)){
                                  
              
        $item=$row['item'];
        $prize=$row['price'];
        $counts=$row['Quantity'];
        $total=$total+$prize;
    ?>    
        
        

           
        <div class="cart-row cart-row-items">
            <h1 class="cart-item cart-column cart-header"><?php echo $item?></h1>
            <input type="hidden" name="item" value="<?php echo $item?>" >
            <h1 class="cart-item cart-column cart-header">$<?php echo $prize?></h1>
            <input type="hidden" name="prize" value="<?php echo $prize?>">
            <h1 class="cart-item cart-column cart-header"><?php echo $counts?></h1>
            <input type="hidden" name="counts" value="<?php echo $counts?>">
            <input type="hidden" name="id" value="<?php echo $id?>">
            <h1 class=" cart-column cart-header"><a href="cart.php?delete=<?php echo $item ?>">Delete</a></h1>
        </div>

   
        

        <div class="cart-items">
        </div>
       
  
            


<?php 
                 
             } //end of the loop
    
?>
    

   
    <div class="cart-total">
            <strong class="cart-total-title">Total</strong>
            
            <?php 
        $query="select * from cart ";
        $query=mysqli_query($connection,$query);
           while($row=mysqli_fetch_assoc($query)){
            $total=$row['total'];
           }
        
        
               ?>
            
            
            <span class="cart-total-price">$<?php echo $total?></span>
        </div>
    
    <input type="submit" class="checkout" name="submit" value="Proceeed To Checkout">
    </form>
    </section>         
   








    
    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us if You have Query</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                           <center> <div class="col-lg-4 text-center">
                                <div id="success"></div>
                        <button type="submit" class="btn btn-xl " style="margin-left:100%;">Send Message</button>
                            </div></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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

   

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    
<!--    Parallex scripts-->
    <script src="js/parallax.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/agency.min.js"></script>

    <!-- Cart -->
    <script src="js/cart.js"></script>



</body>

</html>
