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

<?php include "/includes/header2.php";


    
//getting data by get re    
    if(isset($_GET['submit'])){
    
   $prize=$_GET['prize'];
   $counts=$_GET['counts'];
    $item=$_GET['item'];
    $id=$_GET['id'];        
        
}

    
//inserting data
    
    
    if(isset($_POST['save'])){

  echo $name=$_POST['fname'];
        echo "<br>";
   echo $id=$_POST['id'];
         echo "<br>";
   echo $phone_number=$_POST['pnum'];
         echo "<br>";
    echo $city=$_POST['selection'];
         echo "<br>";
   echo $address=$_POST['houseadd'];
         echo "<br>";
    echo $zip=$_POST['zip'];
         echo "<br>";
   echo $Email=$_POST['email'];
     echo "<br>";
   echo $prize=$_POST['prize'];
         echo "<br>";
   echo $counts=$_POST['counts'];
         echo "<br>";
   echo $item=$_POST['item'];
    
    
    //inserting data
 $query="insert into checkout(name,phone_number,city,address,zip_code,Email,item,prize,counts) ";
                    
        $query.="values ('{$name}',$phone_number,'{$city}','{$address}',$zip,'{$Email}','{$item}',$prize,$counts) ";
                    
                    
     $create=mysqli_query($connection,$query);    
        
        if(!$create){
            echo $query;
            echo "<br>";
            echo "Failed.".mysqli_error($connection);
         
        }
        else{
            
       $_SESSION['name']=$name;
    
           
       echo " <script> window.location = 'done.php'; </script>";
            
        }
    

    }
    
    
    
    
    
    
?>
    
 
    
    
    

    <!-- Checkout --->
    <div class="container3">
        <div class="title">
            <h2>Delivery Information</h2>
        </div>
      <div class="d-flex">
        <form action="" method="post">
          <label>
            <span class="fname">Full Name <span class="required">*</span></span>
            <input type="text" name="fname" placeholder="Enter your full name">
          </label>
          <label>
            <span class="pnum">Phone Number <span class="required">*</span></span>
            <input type="text" name="pnum" placeholder="Please enter your phone number">
          </label>
          <label>
            <span>City <span class="required">*</span></span>
            <select name="selection">
              <option value="select">Select a city...</option>
              <option value="ABB">Abbottabad</option>
              <option value="BAH">Bahawalpur</option>
              <option value="FAI">Faisalabad</option>
              <option value="HYD">Hyderabad</option>
              <option value="ISL">Islamabad</option>
              <option value="KAR">Karachi</option>
              <option value="LAR">Larkana</option>
              <option value="LAH">Lahore</option>
              <option value="MUR">Murree</option>
              <option value="NAW">Nawabshah</option>
              <option value="PES">Peshawar</option>
              <option value="SIA">Sialkot</option>
              <option value="QUE">Quetta</option>
            </select>
          </label>
          <label>
            <span> Address <span class="required">*</span></span>
            <input type="text" name="houseadd" placeholder="For Example: House# 123, Street# 123, ABC Road." required>
          </label>
          <label>
            <span>Postcode / ZIP <span class="required">*</span></span>
            <input type="text" name="zip" placeholder="Enter your area postal/zip code"> 
          </label>
          <label>
            <span>Email Address <span class="required">*</span></span>
            <input type="email" name="email" placeholder="Enter your email address"> 
            
          
          </label>
              <input type="hidden" name="prize" value="<?php echo $prize ?>"> 
            <input type="hidden" name="counts" value="<?php echo $counts ?>"> 
            <input type="hidden" name="item" value="<?php echo $item ?>"> 
            <input type="hidden" name="id" value="<?php echo $id ?>"> 

            <button type="submit" name="save" class="save">SAVE</button>
        </form>
        
       </div>
      </div>

 




    
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
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Send Message</button>
                            </div>
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
