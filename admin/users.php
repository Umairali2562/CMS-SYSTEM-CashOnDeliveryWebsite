<?php include "includes/admin_header.php" ?>


        
          <div id="wrapper">
          
          
          <!-- navigation -->

<?php include "includes/admin_nav.php" ?>
       
       
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
       
                       
    <?php
    
    if(isset($_GET['source'])){
        $source=$_GET['source'];
    }

else {
    
    $source="";
    
}
    
   switch($source){
           
           case 'add_user';
            include "../admin/includes/add_user.php";
           break;
           
           case 'edit_user';
           include "../admin/includes/edit_user.php";
           break;
           
           case '200';
           echo "NICE";
           break;

           default:
           include "../admin/includes/view_all_users.php";
           
           
           break;
           
   }


    
    ?>
                       
                          
                          
                       
                       
                       
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
      
     
     
     
     
     
    <?php include "includes/admin_footer.php" ?>