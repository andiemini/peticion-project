
<?php include("includes/adminheader.php"); ?>

    <!-- PJESA E DASHBOARD SECTION -->

      <section class="site-section" id="next-section">
      <div class="container">
          

 <?php   
if(isset($_GET['editmenu'])){

$source = $_GET['editmenu'];

} else {

$source = '';

}

switch($source) {
     
    case 'editmainmenu';
    
    include "includes/editmainmenu.php";
    break;

    case 'shtomenu';
    
    include "includes/shtomenu.php";
    break;

    default:
    
    include "includes/mainmenu.php";
    
    break;
    
    
}

?>

<?php   
if(isset($_GET['editmenuadm'])){

$source = $_GET['editmenuadm'];

} else {

$source = '';

}

switch($source) {
     
    case 'editmainmenu';
    
    include "includes/editmainmenuadm.php";
    break;

    case 'shtomenu';
    
    include "includes/shtomenuadm.php";
    break;

    default:
    
    include "includes/mainmenuadm.php";
    
    break;
    
    
}

?>

<br>
        </div>
      </section>

    <!-- END PJESA E DASHBOARD SECTION -->

<?php include("../includes/footer.php"); ?>
