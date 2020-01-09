<?php
include('db.php');
include('checksession.php');
include('headerimg.php');
include('includes/headerlogo.php'); 
if(isset($_POST['logout']))
{
    session_destroy();
    header('Location: login.php');
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
            <div class="site-logo col-6"><a href="index.php"><?php echo $logo ?></a></div>

            <nav class="mx-auto site-navigation">
              <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <?php 

             mysqli_next_result($connection);
              $select_all_menus_query = mysqli_query($connection,'CALL selectMenuUser()');
              mysqli_next_result($connection);
             while($row = mysqli_fetch_assoc($select_all_menus_query)){
              $ID_Menu = $row['ID_Menu'];
                $Emri_Menu = $row['Emri_Menu'];
                $Link = $row['Link'];
              
              ?>
                <li><a href="<?php echo $Link ?>" class="nav-link"><?php echo $Emri_Menu ?></a></li>
                <?php } ?>
              </ul>
            </nav>

            <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
              <div class="ml-auto">
              <?php         
                       echo "<p>Mirsevini ". $_SESSION['user']."</p>";
                        ?>

                <form action="" method='POST'>
                <button type="submit" name="logout" class="btn btn-primary border-width-2 d-none d-lg-inline-block" value="Logout">Logout</button>
                </form>
              </div>
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
    <!-- PJESA E POSTIMIT -->
