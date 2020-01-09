<form action="" method="post" enctype="multipart/form-data"> 

<?php
     if(isset($_GET['ID_Menu'])){
        $the_menu_id = $_GET['ID_Menu'];
        }


      mysqli_next_result($connection);
      $select_all_menu_query = mysqli_query($connection,"CALL selectMenuAdmUpdate('$the_menu_id')");
      mysqli_next_result($connection);

  while ($row=mysqli_fetch_assoc($select_all_menu_query)){
     $ID_Menu = $row['ID_Menu'];
                $Emri_Menu = $row['Emri_Menu'];
                $Link = $row['Link'];
  }

if(isset($_POST['update_menu'])) {

  $Emri_Menu = $_POST['Emri_Menu'];
    $Link = $_POST['Link'];

  mysqli_next_result($connection);
  $update_menu_query = mysqli_query($connection,"CALL updateMenuAdm('$Emri_Menu','$Link','$the_menu_id')");
  mysqli_next_result($connection);

  if(!$update_menu_query){
    echo mysqli_error($connection);
  } else {
      echo "Menu u perditsua me sukses: " . " " . "<a href='menu.php'> Shiko të gjith Menu</a> ";
  }

}
?>
     
     <div class="form-group">
        <label for="Emri_Menu">Ndrysho Emrin e menu</label>
         <input type="text" value="<?php echo $Emri_Menu; ?>" class="form-control" name="Emri_Menu">
     </div> 

     <div class="form-group">
        <label for="Link">Ndrysho Link</label>
         <input type="text" value="<?php echo $Link; ?>" class="form-control" name="Link">
     </div> 
     

      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="update_menu" value="Update">
     </div>


</form>