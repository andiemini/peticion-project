<?php
include('db.php');
include('checksession.php');
$userid = $_GET['userId'];
$petId = $_GET['p_id'];
mysqli_next_result($connection);
$result = mysqli_query($connection,"CALL signPetition('$userid','$petId')");
mysqli_next_result($connection);
if(!$result){
    echo mysqli_error($connection);
}
else{
    header("Location:post.php?p_id=".$petId);
   
}
?>