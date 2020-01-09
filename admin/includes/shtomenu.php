<?php
if(isset($_POST['create_menu'])) {
  
      $Emri_Menu  = $_POST['Emri_Menu'];
      $Link  = $_POST['Link'];
      $Emri_Menu = mysqli_real_escape_string($connection, $Emri_Menu);
      $Link = mysqli_real_escape_string($connection, $Link);

    
    
        mysqli_next_result($connection);
        $result2 = mysqli_query($connection,"CALL menuUserInsert('$Emri_Menu','$Link')");
        mysqli_next_result($connection);
        if(!$result){
            die('Query Failed'. mysqli_error());
        }     
            
        echo "Menu u krijua: " . " " . "<a href='menu.php'> Shiko të gjith Menu</a> ";
   }
   ?>

   <h3> Shto Kategori </h3>
          <form action="" method="post" enctype="multipart/form-data">    

            <div class="form-group">
            <label for="Emri_Menu">Emri I Kategorise</label>
              <input type="text" class="form-control" name="Emri_Menu">
            </div>
            <div class="form-group">
            <label for="Link">Shto Link perkates</label>
              <input type="text" class="form-control" name="Link">
            </div>
            <div class="form-group">
            <input class="btn btn-primary" type="submit" name="create_menu" value="Shto menu">
            </div>