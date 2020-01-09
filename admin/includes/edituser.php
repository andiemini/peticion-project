<form action="" method="post" enctype="multipart/form-data"> 

<?php
     if(isset($_GET['userId'])){
        $the_user_id = $_GET['userId'];
        }

      mysqli_next_result($connection);
      $select_all_users_query = mysqli_query($connection,"CALL selectUsersUpdate('$the_user_id')");
      mysqli_next_result($connection);

  while ($row=mysqli_fetch_assoc($select_all_users_query)){
    $userId             = $row['userId'];
    $emri            = $row['emri'];
    $email            = $row['email'];
  }

if(isset($_POST['update_users'])) {

  $emri = $_POST['emri'];
  $email = $_POST['email'];

  mysqli_next_result($connection);
  $update_user_query = mysqli_query($connection,"CALL updateUsers('$emri','$email','$the_user_id')");
  mysqli_next_result($connection);

  if(!$update_user_query){
    echo mysqli_error($connection);
  } else {
      echo "Perdoruesi u perditsua me sukses: " . " " . "<a href='users.php'> Shiko të gjith Perdoruesit</a> ";
  }

}
?>
     
     <div class="form-group">
        <label for="emri">Ndrysho Emrin</label>
         <input type="text" value="<?php echo $emri; ?>" class="form-control" name="emri">
     </div> 

     <div class="form-group">
        <label for="email">Ndrysho Email</label>
         <input type="text" value="<?php echo $email; ?>" class="form-control" name="email">
     </div> 
     

      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="update_users" value="Update">
     </div>


</form>