<?php include("includes/userheader.php"); ?>
    <!-- PJESA E POSTIMIT -->
      <section class="site-section" id="next-section" style="padding:10%;">
      

<?php

if(isset($_GET['editmypetition'])){

$source = $_GET['editmypetition'];

} else {

$source = '';

}

switch($source) {

    case 'editmypetition';

    include 'includes/editmypetition.php';

    break;
    
    default:
    
    include "includes/userdashboard.php";
    
    break;
} 
?>







<!-- </div> -->
      </section>
    <!--END  PJESA E POSTIMIT -->

<?php include("includes/footer.php"); ?>

