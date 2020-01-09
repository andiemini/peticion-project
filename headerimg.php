 <?php 

 mysqli_next_result($connection);
      $resultImg = mysqli_query($connection,"CALL headerImages('HeaderImage')");
      mysqli_next_result($connection);
        $img = mysqli_fetch_assoc($resultImg)['post_image'];
      ?>