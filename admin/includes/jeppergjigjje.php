 <h1> Kthe pergjigjje </h1>
          <form action="" method="post" enctype="multipart/form-data">    

            <div class="form-group">
            <label for="Titulli">Titulli i peticionit</label>
            <select name='Titulli' class='form-control'>
            <?php

        if(isset($_GET['peticionId'])){
        $the_petition_id = $_GET['peticionId'];
        }

        mysqli_next_result($connection);
        $select_all_petitions_query = mysqli_query($connection,"CALL selectPeticionPergjigjje('$the_petition_id')");
        mysqli_next_result($connection);

            while($row = mysqli_fetch_assoc($select_all_petitions_query)){
              $peticionId = $row['peticionId'];
              $post_title = $row['Titulli'];
             // echo "<option value='$post_title'>$post_title</option>";
              
            }

             if(isset($_POST['update_pergjigjje'])) {
                
                $peticionId = $_POST['peticionId'];
                // $post_title = $_POST['Titulli'];
                $Pergjigjja = $_POST['Pergjigjja'];


                mysqli_next_result($connection);
                $update_pergjigjja_query = mysqli_query($connection,"CALL updatePergjigjja('$Pergjigjja','$the_petition_id')");
                mysqli_next_result($connection);
                if(!$update_pergjigjja_query){
                  echo mysqli_error($connection);
                } else {
      echo "Përgjigjja perditsua me sukses: " . " " . "<a href='petitions.php'> Shiko të gjith Peticionet</a> ";
  }
              }

            ?>
         </select>
        </div>

            <div class="form-group">
            <label for="Pergjigjja">Përgjigjja</label>
              <textarea type="text" class="form-control" name="Pergjigjja" cols="20" rows="5"></textarea>
            </div>


            <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update_pergjigjje" value="Kthe pergjigjje">
            </div>

          </form>