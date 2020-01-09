<?php 
session_start();
?>
<?php include("includes/indexheader.php"); ?>
    
    
    <section class="site-section">
      <div class="container">
        <div class="row align-items-center mb-5">
        <?php
          if(isset($_GET['p_id'])){
            $id = $_GET['p_id'];
          

          mysqli_next_result($connection);
      $select_all_petitions_query = mysqli_query($connection,"CALL selectPetitions()");
      mysqli_next_result($connection);
          $row = mysqli_fetch_assoc($select_all_petitions_query);
              $post_kategori = $row['Kategori'];
              $post_title = $row['Titulli'];
              $post_date = $row['Data'];
              $post_attachment = $row['Attachment'];
              $post_message = $row['Mesazhi'];
              $post_pergjigjja = $row['Pergjigjja'];
              
          }
          

          ?>
          <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="d-flex align-items-center">
              <div>
                <h2><?php echo $post_title; ?></h2>
                <div>
                  <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary"><?php echo $post_date; ?></span></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="row">
              <div class="col-6">
                <a href="#" class="btn btn-block btn-light btn-md"><span class="icon-heart-o mr-2 text-danger"></span>
                  <?php 

                    mysqli_next_result($connection);
      $result3 = mysqli_query($connection,"CALL selectPostsSigned('$id')");
      mysqli_next_result($connection);
                    $signed = mysqli_fetch_assoc($result3)['signed'];

                    echo $signed;
                  ?>
                  </a>
              </div>
              <div class="col-6">
              <?php 
              if(isset($_SESSION['userId'])){
                  $result2 = mysqli_query($connection,"CALL selectsignedPetition(".$_SESSION['userId'].",'$id')");
                  $idsp = mysqli_fetch_assoc($result2)['Id_Sp'];
                  
                  if(empty($idsp)){

                   echo " <a href='sign.php?userId=". $_SESSION['userId']."&p_id=". $id."' class='btn btn-block btn-primary btn-md'>Apply Now</a>";
                  }
                  else{
                     echo " <a href='#' class='btn btn-block btn-secondary btn-md'>Already Applied</a>";
                  }
                }
                else{
                  
                     echo " <a href='login.php' class='btn btn-block btn-primary btn-md'>Apply</a>";
                  
                
                }
              ?>
               

              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <div class="mb-5">
              <h4 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span><?php echo $post_attachment; ?></h4>
              <p><?php echo $post_message; ?></p>
            </div>
            <div class="bg-light p-3 border rounded">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Përgjigjja</h3>
              <p><?php echo $post_pergjigjja; ?></p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="bg-light p-3 border rounded">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Share</h3>
              <div class="px-3">
                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-pinterest"></span></a>
              </div>
            </div>
    
          </div>
        </div>
      </div>
    </section>

<?php include("includes/footer.php"); ?>