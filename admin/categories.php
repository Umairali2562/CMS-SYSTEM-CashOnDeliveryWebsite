<?php include "includes/admin_header.php" ?>


        
          <div id="wrapper">
          
          
          <!-- navigation -->

<?php include "/includes/admin_nav.php" ?>
       
       
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To The Admin Panel
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">
                        
                    <?php //add categories 
               insert_categories();
    
                    ?>
                        
                    <form action="" method="post">
                        <div class="form-group"> 
                        <label for="cat-title">Category</label>
                        <input class="form-control" type="text" name="cat_title">
                        
                        </div>
                        
                        <div class="form-group"> 
                        
                        <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                        
                        </div>
                        
                    </form>    
                      
                      
                      <?php  //update and include categories
                            
                            if(isset($_GET['edit'])){
                                
                                $cat_id=$_GET['edit'];
                                include "includes/update_categories.php";
                            }
                            
                            ?>
                               
                               
                               
                                
                                        
                    </div> <!--Add category form-->
                       
                       <div class="col-xs-6">
                       
                           <table class="table table-bordered table-hover">
                               <thead>
                                   <tr>
                                       <th>Id</th>
                                       <th>Category Title</th>
                                       <th>Category Image</th>
                                   </tr>
                               </thead>
                               <tbody>
                                  <?php
                                   
                                //find my all categories queries
                                 findallcategories();
                                   
                                   ?>
                                  
                                 <?php //DELETE query
                                   deletecategories();
                                   ?>
                               </tbody>
                           </table>   
                           
                       </div>
                       
                       
                       
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
      
     
     
     
     
     
    <?php include "includes/admin_footer.php" ?>