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
    <link href="css/mystyle.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index" style="background-color:   white">



<?php
session_start();
include "/includes/db.php";

if(isset($_SESSION['name'])){
$name=$_SESSION['name'];
        
        
        echo "<center><h1>Thank you For Purchasing $name</h1><br></center>";
        echo "<center><h3>Your Order has been Placed and soon the admin will contact you for home delivery..</h3><br></center>";
        
    
        
         echo "<table class='table table-bordered table-hover'>";
                      echo    "<thead>";
                               echo    "<tr>";
                               echo    "<th>Name</th>";
                                   echo    "<th>Email</th>";
                                   echo    "<th>Product</th>";
                                   echo    "<th>Quantity</th>";
                                   echo    "<th>Prize</th>";
                                  echo    "<th>Address</th>";
                                   echo    "<th>Phone No</th>";
                                   
                           
                               echo "</tr>";
                           echo "</thead>";
                       
                            echo "<tbody>";
                            
                           $Query="select * from checkout where name='{$name}' ";
                          
                        $select=mysqli_query($connection,$Query);
                      
                        while($row=mysqli_fetch_assoc($select)){
                        $id=$row['id'];
                           $name=$row['name'];
                            $phone_number=$row['phone_number'];
                            $city=$row['city'];
                            $address=$row['address'];
                            $zip=$row['zip_code'];
                            $Email=$row['Email'];
                            $item=$row['item'];
                            $prize=$row['prize'];
                            $counts=$row['counts'];
                            
                          
                           echo "<tr>";
                                
                             echo  "<td>$name</td>";
                             echo "<td>$Email</td>";  
                             echo "<td>$item</td>";  
                             echo "<td>$counts</td>";  
                             echo "<td>$prize</td>";  
                              
                    echo "<td>$address</td>";
                    echo "<td>$phone_number</td>";
                 
                  
                 
                           
                                 
                    
                            
                            echo "</tr>"; 
        
                        }
                      
                      echo "</tbody>";  
                       
                       echo "</table>";
        
          $query="DELETE FROM cart ";
                        $delete_query=mysqli_query($connection,$query);
        
       
}
    else{
        
        echo "<center><h1>You did not Purchase Anything</h1></center>";
    }
?>


    </body>
    
</html>
