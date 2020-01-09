<?php include('db.php');
include('includes/headerlogo.php'); 
include('headerimg.php');
if(isset($_POST['register'])){

$emri = $_POST['emri'];
$email = $_POST['email'];
$password = $_POST['password'];

  $emri = mysqli_real_escape_string($connection, $emri);
  $email = mysqli_real_escape_string($connection, $email);
  $password = mysqli_real_escape_string($connection, $password);


$password = md5($password);

// $query = "INSERT INTO users(emri,email,password) VALUES ('$emri','$email','$password') "; 

        mysqli_next_result($connection);
        $result = mysqli_query($connection,"CALL registerUser('$emri','$email','$password')");
        mysqli_next_result($connection);
            // $result = mysqli_query($connection,$query);

            if(!$result){
               die('Query Failed'. mysqli_error());
            }     

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Careers &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="stylesheet" href="css/custom-bs.css" />
    <link rel="stylesheet" href="css/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="fonts/icomoon/style.css" />
    <link rel="stylesheet" href="fonts/line-icons/style.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/animate.min.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body id="top">
    <div class="site-wrap">
      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>
      <!-- .site-mobile-menu -->

      <!-- NAVBAR -->
      <header class="site-navbar mt-3">
        <div class="container-fluid">
          <div class="row align-items-center">
            <div class="site-logo col-6"><a href="index.php"><?php echo $logo; ?></a></div>

            <nav class="mx-auto site-navigation">
              <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                <li><a href="index.php" class="nav-link">Home</a></li>
                <li><a href="login.php">Login</a></li>
              </ul>
            </nav>

            <div
              class="right-cta-menu text-right d-flex aligin-items-center col-6"
            >
              <a
                href="#"
                class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"
                ><span class="icon-menu h3 m-0 p-0 mt-2"></span
              ></a>
            </div>
          </div>
        </div>
      </header>

      <!-- HOME -->
      <section
        class="home-section section-hero inner-page overlay bg-image"
        style="background-image: url('images/<?php echo $img; ?>');"
        id="home-section"
      ></section>

      <section class="site-section" id="next-section">
        <div class="container">
        <a href="login.php"><p> <- Kthehuni pas.</p></a>
        <h1 class="text-black font-weight-bold">Regjistrohuni</h1>
        <p> Ju lutem mbushni të dhënat për regjistrim.</p>

        <form action="" class="" method="post">
            
            <div class="row form-group">
                <div class="col-md-12">
                <label class="text-black" for="emri">Emri</label>
                <input name="emri" type="text" class="form-control" placeholder="Emri i plotë" required/>
                  </div>
                </div>


            <div class="row form-group">
                <div class="col-md-12">
                <label class="text-black" for="email">Email</label>
                <input name="email" type="email" id="email" class="form-control" placeholder="Email" required/>
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="password">Password</label>
                    <input name="password" type="password" id="password" class="form-control" placeholder="Password" required/>
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-12">
                    <input
                      name="register"
                      type="submit"
                      value="Register"
                      class="btn btn-primary btn-md text-white"
                    />
                  </div>
                </div>
              </form>
        

              <?php   
        if(isset($_POST['register'])){
              if($result){
              echo "Account eshte krijuar me sukses: " . " " . "<a href='login.php'> Kyquni Tani</a> ";  
              }
            }
              ?>
        </div>

      </section>

<?php include("includes/footer.php"); ?>
