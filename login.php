<?php 
include('db.php');
if(isset($_POST['login'])){

$email =  mysqli_real_escape_string($connection, $_POST['email']);
$password = md5(mysqli_real_escape_string($connection, $_POST['password']));

// $query = "SELECT userId FROM users WHERE email ='$email' AND password = '$password'";
// $result = mysqli_query($connection,$query);


mysqli_next_result($connection);
      $result = mysqli_query($connection,"CALL userLogin('userId','$email','$password')");
      mysqli_next_result($connection);
	$id=mysqli_fetch_assoc($result)['userId'];
  //   $query="SELECT email FROM users WHERE userId='$id'";
  // $result=mysqli_query($connection,$query);
  
  mysqli_next_result($connection);
      $result = mysqli_query($connection,"CALL userEmail('$id')");
      mysqli_next_result($connection);

	$emri=mysqli_fetch_assoc($result)['email'];
	if(!empty($id)){
    session_start();
    $_SESSION['user']=$emri;
    $_SESSION['userId']=$id;
		header('Location:user.php');
	}


}
?>
<?php include("includes/indexheader.php"); ?>


      <section class="site-section" id="next-section">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
              <h1 class="text-black font-weight-bold">Login ne account</h1>
              <?php 
                 if(isset($_POST['login'])){
                   if(empty($id)){
                     echo "<p style='color:red;'>Gabim email ose fjalkalimi.</p>";
                   }
                 }
              ?>
              <p>
                Kycuni ne account per te krijuar nje peticion.
              </p>
              <form action="login.php" class="" method="post">
                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="email">Email</label>
                    <input name="email" type="email" id="email" class="form-control" placeholder="Enter Email" />
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="password">Password</label>
                    <input name="password" type="password" id="password" class="form-control" placeholder="Enter Password"/>
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-12">
                    <input
                      name="login"
                      type="submit"
                      value="Submit"
                      class="btn btn-primary btn-md text-white"
                    />
                  </div>
                </div>
              </form>
            </div>
            <div class="col-lg-5 ml-auto">
              <h1 class="text-black font-weight-bold">Regjistrohuni</h1>
              <p>
                Nese nuk keni account ju lutem regjistrohuni per te krijuar
                peticion.
              </p>
              <div class="p-4 mb-3 bg-white">
                <div class="row form-group">
                  <div class="col-md-12">
                    <a href="register.php"><input
                      type="button"
                      value="Regjistrohuni"
                      class="btn btn-primary btn-md text-white"
                    /></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

<?php include("includes/footer.php"); ?>
