<?php include("includes/adminheader.php"); ?>

    <!-- PJESA E DASHBOARD SECTION -->

<section class="site-section" id="next-section">
      <div class="container">
          

<?php
if(isset($_GET['edit'])){
$source = $_GET['edit'];
} else {
$source = '';
}
switch($source) {
     
    case 'updateuser';
    
    include "includes/edituser.php";
    break;
    

    default:
    
    include "includes/allusers.php";
    
    break;  
}  
?>
                


          
        </div>




      </section>

    <!-- END PJESA E DASHBOARD SECTION -->

<?php include("../includes/footer.php"); ?>

