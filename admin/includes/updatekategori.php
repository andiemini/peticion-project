<form action="" method="post" enctype="multipart/form-data"> 

<?php
     if(isset($_GET['kategoriId'])){
        $the_kategori_id = $_GET['kategoriId'];
        }


     
      mysqli_next_result($connection);
      $select_all_kategori_query = mysqli_query($connection,"CALL selectKategoriUpdate('$the_kategori_id')");
      mysqli_next_result($connection);

  while ($row=mysqli_fetch_assoc($select_all_kategori_query)){
    $kategoriId             = $row['kategoriId'];
    $kategori_title            = $row['kategoriTitle'];
  }

if(isset($_POST['update_kategori'])) {

  $kategori_title = $_POST['kategoriTitle'];
  
  mysqli_next_result($connection);
  $update_kategori_query = mysqli_query($connection,"CALL updateKategori('$kategori_title','$the_kategori_id')");
  mysqli_next_result($connection);
  if(!$update_kategori_query){
    echo mysqli_error($connection);
  } else {
      echo "Kategorija u perditsua me sukses: " . " " . "<a href='petitions.php'> Shiko të gjith Kategorite</a> ";
  }

}
?>
     
     <div class="form-group">
        <label for="kategoriTitle">Ndrysho Kategorine</label>
         <input type="text" value="<?php echo $kategori_title; ?>" class="form-control" name="kategoriTitle">
     </div> 
     

      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="update_kategori" value="Update">
     </div>


</form>