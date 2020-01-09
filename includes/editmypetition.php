<form action="" method="post" enctype="multipart/form-data"> 

<?php
     if(isset($_GET['peticionId'])){
        $the_petitions_id = $_GET['peticionId'];
        }

      mysqli_next_result($connection);
        $select_all_petitions_query = mysqli_query($connection,"CALL selectPeticionPergjigjje('$the_petitions_id')");
        mysqli_next_result($connection);

  while ($row=mysqli_fetch_assoc($select_all_petitions_query)){
    $peticionId = $row['peticionId'];
    $peticion_title = $row['Titulli'];
    $peticion_cat = $row['Kategori'];
    $peticion_mesazhi = $row['Mesazhi'];
    $peticion_attachment = $row['Attachment'];
  }

if(isset($_POST['update_mypetition'])) {

  $peticion_title = $_POST['Titulli'];
  $peticion_cat = $_POST['Kategori'];
  $peticion_mesazhi = $_POST['Mesazhi'];
  $peticion_attachment = $_POST['Attachment'];


  mysqli_next_result($connection);
  $update_petitions_query = mysqli_query($connection,"CALL updateMyPetitions('$peticion_title','$peticion_cat','$peticion_mesazhi','$peticion_attachment','$the_petitions_id')");
  mysqli_next_result($connection);


  if(!$update_petitions_query){
    echo mysqli_error($connection);
  } else {
      echo "Përmbajtja u perditsua me sukses: " . " " . "<a href='user.php'> Shiko të gjitha Peticionet</a> ";
  }

}
?>
     
     <div class="form-group">
        <label for="Titulli">Ndrysho Titullin</label>
         <input type="text" value="<?php echo $peticion_title; ?>" class="form-control" name="Titulli">
     </div> 
    
    <div class="form-group">
            <label for="Kategori">Ndrysho Kategorine</label>
            <select name='Kategori' class='form-control'>
         <?php 
           $result= mysqli_query($connection,"CALL selectKategori()");
           while($row = mysqli_fetch_assoc($result))
           { extract($row);
              echo "<option value='$kategoriId'>$kategoriTitle</option>";
           }
           ?>
         </select>
        </div>


     <div class="form-group">
        <label for="Mesazhi">Ndrysho Mesazhi</label>
         <input type="text" value="<?php echo $peticion_mesazhi; ?>" class="form-control" name="Mesazhi">
     </div> 

     <div class="form-group">
        <label for="Attachment">Ndrysho Attachment</label>
         <input type="text" value="<?php echo $peticion_attachment; ?>" class="form-control" name="Attachment">
     </div> 
     

      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="update_mypetition" value="Update">
     </div>


</form>