
<?php include("includes/adminheader.php"); ?>

    <!-- PJESA E DASHBOARD SECTION -->

      <section class="site-section" id="next-section">
      <div class="container">
          

 <?php   
if(isset($_GET['pergjigjje'])){

$source = $_GET['pergjigjje'];

} else {

$source = '';

}

switch($source) {
     
    case 'jeppergjigjje';
    
    include "includes/jeppergjigjje.php";
    break;

    default:
    
    include "includes/allpetitions.php";
    
    break;
    
    
}

?>

<br>

<h1> Kategorite </h1>
<?php
           // KATEGORI

if(isset($_GET['kategorisource'])){

$source = $_GET['kategorisource'];

} else {

$source = '';

}

switch($source) {
     
    case 'shtokategori';
    
    include "includes/shtokategori.php";
    break;
    
    case 'updatekategori';
    
    include "includes/updatekategori.php";
    break;

    default:
    
    include "includes/kategorite.php";
    
    break;
    
    
}

// END KATEGORI  
?>
        </div>
      </section>

    <!-- END PJESA E DASHBOARD SECTION -->

<?php include("../includes/footer.php"); ?>

