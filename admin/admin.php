<?php 
include('../db.php');
if(isset($_POST['update_image'])) {

  $post_image = $_FILES['image']['name'];
  $POST_image_temp = $_FILES['image']['tmp_name'];

  move_uploaded_file($POST_image_temp, "../images/$post_image");

  mysqli_next_result($connection);
  $update_image_query = mysqli_query($connection,"CALL updateImages('$post_image','HeaderImage')");
  mysqli_next_result($connection);

  mysqli_next_result($connection);
  if(!$update_image_query){
    echo mysqli_error($connection);
  }

}

?>

<!-- Header -->

<?php include("includes/adminheader.php"); ?>


    <!-- PJESA E DASHBOARD SECTION -->

      <section class="site-section" id="next-section">
      <div class="container">
      <div class="row">
           <div class="col-lg-6 mb-5 mb-lg-0">
            <h1> Perditso Foton e header </h1>

          <form action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <label for="post_image">Header Image</label>
            <input type="file" name="image">
            </div>
            <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update_image" value="Update Image">
            </div>
            </div>

          <div class="col-lg-5 ml-auto">
      <h1> Logo e website </h1>
          <form action="" method="post" enctype="multipart/form-data"> 

<?php
 
              mysqli_next_result($connection);
              $select_all_logo_query = mysqli_query($connection,'CALL logo()');
              mysqli_next_result($connection);
      

  while ($row=mysqli_fetch_assoc($select_all_logo_query)){
    $logoId             = $row['logoId'];
    $logo_title            = $row['logoTitle'];
  }

if(isset($_POST['update_logo'])) {

  $logo_title = $_POST['logoTitle'];

  mysqli_next_result($connection);
  $update_logo_query = mysqli_query($connection,"CALL updateLogo('$logo_title')");
  mysqli_next_result($connection);
  
  if(!$update_logo_query){
    echo mysqli_error($connection);
  } else {
      echo "Logo u perditsua me sukses ";
  }

}
?>
     
     <div class="form-group">
        <label for="logoTitle">Ndrysho logo</label>
         <input type="text" value="<?php echo $logo_title; ?>" class="form-control" name="logoTitle">
     </div> 
     
      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="update_logo" value="Update">
     </div>


</form>

           </div>
        
          </div>
          <br>
              <h1> Teksti i faqes kryesore</h1>

            <table class="table">
              <thead>
              </thead>
              <!-- Banner 1 -->

 <?php
if(isset($_GET['source'])){

$source = $_GET['source'];

} else {

$source = '';

}

switch($source) {
     
    case 'edit_banner';
    
    include "includes/banner1edit.php";
    break;
    
    default:
    
    include "includes/banner1.php";
    
    break;
    
    
}
?>
                <!-- Banner 2 -->
 <?php
if(isset($_GET['source2'])){

$source = $_GET['source2'];

} else {

$source = '';

}

switch($source) {
     
    case 'edit_banner';
    
    include "includes/banner2edit.php";
    break;
    
    default:
    
    include "includes/banner2.php";
    
    break;
    
    
}
?>

                <!-- Banner 3 -->
<?php
if(isset($_GET['source3'])){

$source = $_GET['source3'];

} else {

$source = '';

}

switch($source) {
     
    case 'edit_banner';
    
    include "includes/banner3edit.php";
    break;
    
    default:
    
    include "includes/banner3.php";
    
    break;
    
    
}
?>
<tbody>      
</tbody>
</table>
<br>
<table class="table">
<thead>
</thead>
<?php   
if(isset($_GET['editreferencat'])){

$source = $_GET['editreferencat'];

} else {

$source = '';

}

switch($source) {
     
    case 'editfooter';
    
    include "includes/editfooter.php";
    break;

    case 'footeraddreferenca';
    
    include "includes/footeraddreferenca.php";
    break;

    default:
    
    include "includes/footerreferencat.php";
    
    break;
    
    
}

?>
              
            <tbody>
          
            </tbody>
            </table>
        </div>
      </div>
      </section>

    <!-- END PJESA E DASHBOARD SECTION -->

 <?php include("../includes/footer.php"); ?>
