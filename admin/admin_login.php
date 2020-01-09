<?php include('../db.php'); 
include('../headerimg.php');
include('includes/headerlogo.php');  
if(isset($_POST['login'])){

$username =  mysqli_real_escape_string($connection, $_POST['adminUser']);
$password = mysqli_real_escape_string($connection, $_POST['adminPassword']);

      mysqli_next_result($connection);
      $result = mysqli_query($connection,"CALL adminLogin('adminId','$username','$password')");
      mysqli_next_result($connection);
    
     $id=mysqli_fetch_assoc($result)['adminId'];
  
    mysqli_next_result($connection);
      $result = mysqli_query($connection,"CALL selectadminlogin('$id')");
      mysqli_next_result($connection);
	$emri=mysqli_fetch_assoc($result)['adminUser'];
    
    if(!empty($id)){
    session_start();
		$_SESSION['admin']=$emri;
		header('Location:admin.php');
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
            <div class="site-logo col-6"><a href="../index.php"><?php echo $logo ?></a></div>

            <nav class="mx-auto site-navigation">
              <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
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
        style="background-image: url('../images/<?php echo $img; ?>');"
        id="home-section"
      ></section>

      <section class="site-section" id="next-section">
        <div class="container">
              <a href="../index.php"><p> <- Kthehuni pas.</p></a>
              <h1 class="text-black font-weight-bold">Login ne dashboard te administrimit</h1>
              <?php 
                 if(isset($_POST['login'])){
                   if(empty($id)){
                     echo "<p style='color:red;'>Gabim email ose fjalkalimi.</p>";
                   }
                 }
              ?>
              <p>
                Admin Panel Login.
              </p>
              <form action="" method="post">
                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="adminUser">Username</label>
                    <input name="adminUser" type="text"  id='adminUser' class="form-control" placeholder="Enter Username" />
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="password">Password</label>
                    <input name="adminPassword" type="password" id="password" class="form-control" placeholder="Enter Password"/>
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
          
        </div>
      </section>

 <?php include("../includes/footer.php"); ?>
