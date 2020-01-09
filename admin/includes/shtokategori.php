<?php
if(isset($_POST['create_kategori'])) {
  
    $kategoriTitle  = $_POST['kategoriTitle'];

      $kategoriTitle = mysqli_real_escape_string($connection, $kategoriTitle);
    
        mysqli_next_result($connection);
        $result = mysqli_query($connection,"CALL kategoriInsert('$kategoriTitle')");
        mysqli_next_result($connection);


        if(!$result){
            die('Query Failed'. mysqli_error());
        }     
            
        echo "Kategorija u krijua: " . " " . "<a href='petitions.php'> Shiko të gjith Kategorite</a> ";
   }
   ?>

   <h1> Shto Kategori </h1>
          <form action="" method="post" enctype="multipart/form-data">    

            <div class="form-group">
            <label for="kategoriTitle">Emri I Kategorise</label>
              <input type="text" class="form-control" name="kategoriTitle">
            </div>
            <div class="form-group">
            <input class="btn btn-primary" type="submit" name="create_kategori" value="Shto kategori">
            </div>