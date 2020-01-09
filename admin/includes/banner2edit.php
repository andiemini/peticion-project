<form action="" method="post" enctype="multipart/form-data"> 

<?php

      mysqli_next_result($connection);
              $select_all_headers_query = mysqli_query($connection,'CALL banner()');
             mysqli_next_result($connection);

  while ($row=mysqli_fetch_assoc($select_all_headers_query)){
    $main_text_id             = $row['main_text_id'];
    $main_text            = $row['main_text2'];
    $main_tagline       = $row['main_tagline2'];
  }

if(isset($_POST['update_topsection'])) {

  $main_text = $_POST['main_text2'];
  $main_tagline = $_POST['main_tagline2'];


  mysqli_next_result($connection);
  $update_topsection_query = mysqli_query($connection,"CALL updatebanner2('$main_text','$main_tagline')");
  mysqli_next_result($connection);

  if(!$update_topsection_query){
    echo mysqli_error($connection);
  }

}
?>
     
     <div class="form-group">
        <label for="main_text2">Main Title</label>
         <input type="text" value="<?php echo $main_text; ?>" class="form-control" name="main_text2">
     </div>

      <div class="form-group">
        <label for="main_tagline2">Main Tagline</label>
         <input type="text" value="<?php echo $main_tagline; ?>" class="form-control" name="main_tagline2">
     </div>    
     

      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="update_topsection" value="Update">
     </div>


</form>