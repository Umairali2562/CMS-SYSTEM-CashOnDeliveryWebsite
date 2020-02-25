      <table class="table table-bordered table-hover">
                           <thead>
                               <tr>
                                   <th>ID</th>
                                   <th>Username</th>
                                   <th>First Name</th>
                                   <th>Last Name</th>
                                   <th>Email</th>
                                   <th>Role</th>
                                 
                           
                               </tr>
                           </thead>
                       
                            <tbody>
                            
                            <?php 
                                $query="select * from users";
                                $select_users=mysqli_query($connection,$query);
                                 while($row=mysqli_fetch_assoc($select_users)){
                             
                                $user_id=$row['user_id'];    
                                $username=$row['username'];
                                $user_password= $row['password'];   
                                 $user_firstname=$row['user_firstname'];     
                                $user_lastname=$row['user_lastname'];    
                                $user_email=$row['user_email'];    
                                $user_image=$row['user_image'];    
                                $user_role=$row['user_role'];    
                                  
                                    
                    
                            
                          
                           echo "<tr>";
                                
                             echo  "<td>$user_id</td>";
                             echo "<td>$username</td>";  
                             echo "<td>$user_firstname</td>";  
                             echo "<td>$user_lastname</td>";  
                              
                    echo "<td>$user_email</td>";
                                     
                        /* $query="SELECT * FROM POSTS where post_cat_title='$comment_post_title'";
                        $select_post_title=mysqli_query($connection,$query);
                        while($row=mysqli_fetch_assoc($select_post_title)){
                            $post_cat_title=$row['post_cat_title'];
                            $post_title=$row['post_title'];
                        }             
                                     
                    echo "<td><a href='../index2.php?category=$post_cat_title'>$post_cat_title</a></td>";
                                     
                        */             
                                     
                    echo "<td>$user_role</td>";
                    
                  
                  
                                     
                                     
                    echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
                    echo "<td><a href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>";
                    echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit User</a></td>";
                    echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                    echo   "<td></td>";
                           
                                }?>        
                                    
                           <?php 
                            
                            echo "</tr>"; 
        
                                           
                      
                      echo "</tbody>";  
                       
                       echo "</table>";
                       ?>
                      
                     
                    <?php
                                    
                        if(isset($_GET['delete'])){
                        $the_user_id=$_GET['delete'];
                        
                        $query="DELETE FROM users where user_id='{$the_user_id}'";
                        $delete_query=mysqli_query($connection,$query);
                        header("Location:users.php");    
                            } 
                                
                        if(isset($_GET['change_to_sub'])){
                        $the_user_id=$_GET['change_to_sub'];
                        
                        $query="update users set user_role='Subscriber' where user_id=$the_user_id";
                        $change_subscriber_query=mysqli_query($connection,$query);
                        header("Location:users.php");    
                            
                        
                        }        
                                
                                
                                if(isset($_GET['change_to_admin'])){
                        $the_user_id=$_GET['change_to_admin'];
                        
                        $query="update users set user_role='Admin' where user_id=$the_user_id";
                        $change_admin_query=mysqli_query($connection,$query);
                        header("Location:users.php");    
                            
                        
                        }            
                                
                        ?>