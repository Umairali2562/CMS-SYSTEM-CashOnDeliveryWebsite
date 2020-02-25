      <table class="table table-bordered table-hover">
                           <thead>
                               <tr>
                                   <th>ID</th>
                                   <th>Author</th>
                                   <th>Comment</th>
                                   <th>Email</th>
                                   <th>Status</th>
                                   <th>In Response to</th>
                                   <th>Date</th>
                                   <th>Approve</th>
                                   <th>UnApprove</th>
                                   <th>Delete</th>
                               </tr>
                           </thead>
                       
                            <tbody>
                            
                            <?php 
                                $query="select * from comments";
                                $select_all_comments=mysqli_query($connection,$query);
                                 while($row=mysqli_fetch_assoc($select_all_comments)){
                             
                                $comment_id=$row['comment_id'];    
                                $comment_post_title=$row['comment_post_title'];
                                $post_comment_id=$row['post_comment_id'];
                                $comment_author= $row['comment_author'];   
                                 $comment_content=$row['comment_content'];     
                                $comment_email=$row['comment_email'];    
                                $comment_status=$row['comment_status'];    
                                $comment_date=$row['comment_date'];    
                                  
                                    
                    
                            
                          
                           echo "<tr>";
                                
                             echo  "<td>$comment_id</td>";
                             echo "<td>$comment_author</td>";  
                             echo "<td>$comment_content</td>";  
                             echo "<td>$comment_email</td>";  
                              
                    echo "<td>$comment_status</td>";
                                     
                         $query="SELECT * FROM POSTS where post_title='{$comment_post_title}' ";
                        $select_post_title=mysqli_query($connection,$query);
                        while($row=mysqli_fetch_assoc($select_post_title)){
                          $post_cat_title=$row['post_cat_title'];
                          $post_title=$row['post_title'];
                          $post_id=$row['post_id'];
                        
                      
                        }             
                                     
                    echo "<td><a href='../post.php?post_id=$post_id'>$post_title</a></td>";
                                     
                                     
                                     
                    echo "<td>$comment_date</td>";
                    echo "<td><a href='comments.php?Approve=$comment_id'>Approve</a></td>";
                    echo "<td><a href='comments.php?Unapprove=$comment_id'>Unapprove</a></td>";
                    echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
                    echo   "<td></td>";
                           
                                }?>        
                                    
                           <?php 
                            
                            echo "</tr>"; 
        
                                           
                      
                      echo "</tbody>";  
                       
                       echo "</table>";
                       ?>
                      
                     
                    <?php
                                    
                        if(isset($_GET['delete'])){
                        $the_comment_id=$_GET['delete'];
                        
                        $query="DELETE FROM comments where comment_id='{$the_comment_id}'";
                        $delete_query=mysqli_query($connection,$query);
                        header("Location:comments.php");    
                            } 
                                
                        if(isset($_GET['Unapprove'])){
                        $the_comment_id=$_GET['Unapprove'];
                        
                        $query="update comments set  comment_status='Unapprove' where comment_id=$the_comment_id";
                        $unapprove_comment_query=mysqli_query($connection,$query);
                        header("Location:comments.php");    
                            
                        
                        }        
                                
                                
                                if(isset($_GET['Approve'])){
                        $the_comment_id=$_GET['Approve'];
                        
                        $query="update comments set  comment_status='Approve' where comment_id=$the_comment_id";
                        $unapprove_comment_query=mysqli_query($connection,$query);
                        header("Location:comments.php");    
                            
                        
                        }            
                                
                        ?>