      <?php




     echo "<table class='table table-bordered table-hover'>";
                      echo    "<thead>";
                               echo    "<tr>";
                            echo    "<th>id</th>";
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
                            
                           
                       $query="select * from checkout";
    
$checkout=mysqli_query($connection,$query);
    
while($row=mysqli_fetch_assoc($checkout)){
    $name=$row['name'];
    $phone_number=$row['phone_number'];
    $city=$row['city'];
    $address=$row['address'];
    $zip_code=$row['zip_code'];
    $Email=$row['Email'];
    $item=$row['item'];
    $prize=$row['prize'];
    $counts=$row['counts'];
    $id=$row['id'];
   

                            
                          
                           echo "<tr>";
                            echo  "<td>$id</td>";    
                             echo  "<td>$name</td>";
                             echo "<td>$Email</td>";  
                             echo "<td>$item</td>";  
                             echo "<td>$counts</td>";  
                             echo "<td>$prize</td>";  
                              
                    echo "<td>$address</td>";
                    echo "<td>$phone_number</td>";
                    echo "<td><a href='purchase.php?delete=$id'>Delete</a></td>";
                 
                  
                 
                           
                                 
                    
                            
                            echo "</tr>"; 
        
}
                      
                      echo "</tbody>";  
                       
                       echo "</table>";



 if(isset($_GET['delete'])){
                        $id=$_GET['delete'];
                        
                        $query="DELETE FROM checkout where id='{$id}'";
                        $delete_query=mysqli_query($connection,$query);
                        header("Location:purchase.php");    
                            } 




?>