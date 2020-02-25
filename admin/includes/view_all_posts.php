      <table class="table table-bordered table-hover">
                           <thead>
                               <tr>
                                   <th>ID</th>
                                   <th>Author</th>
                                   <th>Title</th>
                                   <th>Category</th>
                                   <th>Prize</th>
                                   <th>Status</th>
                                   <th>Image</th>
                                   <th>comments</th>
                                   <th>Date</th>
                                   <th>Edit</th>
                                   <th>Delete</th>
                               </tr>
                           </thead>
                       
                            <tbody>
                            
                            <?php 
                                $query="select * from categories";
                                $select_all_categories=mysqli_query($connection,$query);
                                 while($row=mysqli_fetch_assoc($select_all_categories)){
                                  $cat_title=$row['cat_title'];   
                                 
                                
                                 $query="select * from posts where post_cat_title='{$cat_title}'";
                                 $all_posts=mysqli_query($connection,$query);
                                while($row=mysqli_fetch_assoc($all_posts)){
                                $post_id=$row['post_id'];    
                                $post_Author= $row['post_Author'];   
                                $post_prize= $row['post_prize'];   
                                $post_title=$row['post_title'];    
                                $post_category=$row['post_cat_title'];    
                                $post_status=$row['post_status'];    
                                $post_image=$row['post_image'];    
                                $post_date=$row['post_date'];   
                                $comment_counts=$row['comment_counts'];   
                                    
                    
                            
                          
                           echo "<tr>";
                                
                             echo  "<td>$post_id</td>";
                             echo "<td>$post_Author</td>";  
                             echo "<td>$post_title</td>";  
                             echo "<td>$post_category</td>";  
                              
                    echo "<td>$post_prize</td>";
                    echo "<td>$post_status</td>";
                    echo "<td><img class='img-responsive' width='100' src='{$post_image}'></td>";
                    echo  "<td>$comment_counts</td>";
                    echo  "<td>$post_date</td>";
                    echo "<td><a href='post.php?source=edit_post&p_id=$post_id'>Edit</a></td>";
                    echo "<td><a href='post.php?delete=$post_id'>Delete</a></td>";
                    echo   "<td></td>";
                           
                                }}?>        
                                    
                           <?php 
                            
                            echo "</tr>"; 
        
                                           
                      
                      echo "</tbody>";  
                       
                       echo "</table>";
                       ?>
                      
                     
                    <?php
                                    
                        if(isset($_GET['delete'])){
                        $the_post_id=$_GET['delete'];
                       
                        $query="DELETE FROM posts where post_id='{$the_post_id}'";
                        $delete_query=mysqli_query($connection,$query);
                            header("Location:post.php");
                            
                        
                        }            
                                
                        ?>