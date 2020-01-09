 <?php 
          mysqli_next_result($connection);
              $result = mysqli_query($connection,"CALL logo()");
              if(!$result){
                echo mysqli_error($connection);
              }
             mysqli_next_result($connection);
    
    $logo = mysqli_fetch_assoc($result)['logoTitle'];
      ?>