<?php ob_start(); ?>
<?php 
include('db.php'); 
include('headerimg.php'); 
include('includes/headerlogo.php'); 
//$per_page = 2;

if(isset($_GET['page'])) {

  $page = $_GET['page'];
} else {
  $page = "";
}
if($page == ""|| $page == 1) {
  $page_1 = 0;
} else {
  $page_1 = ($page * 5) - 5;
}

            mysqli_next_result($connection);
              $find_count = mysqli_query($connection,'CALL selectPetitions()');
             mysqli_next_result($connection);

            $count = mysqli_num_rows($find_count);

            mysqli_next_result($connection);
              $find_countUsers = mysqli_query($connection,'CALL selectUsers()');
             mysqli_next_result($connection);
            $countUsers = mysqli_num_rows($find_countUsers);

?>
<!doctype html>
<html lang="en">

<head>
  <title>Careers &mdash; Website Template by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/custom-bs.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="css/bootstrap-select.min.css">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="fonts/line-icons/style.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="css/style.css">
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
    </div> <!-- .site-mobile-menu -->


    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="index.php"><?php echo $logo ?></a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li><a href="index.php" class="active">Ballina</a></li>
              <?php
                session_start();
              if(empty($_SESSION['user']))
                  {
                   echo "<li><a href='login.php'>Login</a></li>";
                  } else {
                    echo "<li><a href='user.php'>My petitions</a></li>";
                  }
                  if(empty($_SESSION['admin']))
                  {
                   echo "";
                  } else {
                    echo "<li><a href='admin/admin.php'>Admin Settings</a></li>";
                  }
                   ?>
               
            </ul>
          </nav>

              <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                <div class="ml-auto">
                  <form action="" method='POST'>
                  <?php 
                if(empty($_SESSION['user']))
                  {
                   echo " ";
                  } else {
                    echo "<button type='submit' name='logoutIndex' class='btn btn-primary border-width-2 d-none d-lg-inline-block' value='Logout'>Logout</button>";
                  }

                  if(isset($_POST['logoutIndex']))
                    {
                     session_destroy();
                      header('Location: index.php');
                            } 
                ?>
                 
                 </form>
              </div>
              </div>
              
        </div>
      </div>
    </header>

    <!-- HOME -->
<?php 


mysqli_next_result($connection);
              $select_all_banners_query = mysqli_query($connection,'CALL selectBanner()');
              if(!$select_all_banners_query){
                echo mysqli_error($connection);
              }
             mysqli_next_result($connection);

  while ($row=mysqli_fetch_assoc($select_all_banners_query)){
    $main_text_id             = $row['main_text_id'];
    $main_text            = $row['main_text'];
    $main_tagline       = $row['main_tagline'];
    $main_text2           = $row['main_text2'];
    $main_tagline2           = $row['main_tagline2'];
    $main_text3           = $row['main_text3'];
    $main_tagline3       = $row['main_tagline3'];

  }
      ?>



    <section class="home-section section-hero inner-page overlay bg-image" style="background-image: url('images/<?php echo $img; ?>');"
      id="home-section">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="mb-5 text-center">
              <h1 class="text-white font-weight-bold"><?php echo $main_text ?></h1>
              <p><?php echo $main_tagline ?></p>
            </div>
          </div>
        </div>
      </div>


    </section>

    <!-- Section i dyte -->
    <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/<?php echo $img; ?>');">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2 text-white"><?php echo $main_text2 ?></h2>
            <p class="lead text-white"><?php echo $main_tagline2 ?></p>
          </div>
        </div>
        <div class="row pb-0 block__19738 section-counter d-flex justify-content-center">
    
          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="<?php echo $count; ?>">0</strong>
            </div>
            <span class="caption">Peticione te krijuara</span>
          </div>
    
          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="<?php echo $countUsers; ?>">0</strong>
            </div>
            <span class="caption">User te krijuar</span>
          </div>
    
         
    
    
        </div>
      </div>
    </section>
    <!-- perfundimi secion 2 -->
    <br>
    <!-- Section 3 -->
<section class="py-5 bg-image overlay-primary w-75 fixed overlay" style="background-image: url('images/<?php echo $img; ?>');margin:0 auto;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-8">
        <h2 class="text-white"><?php echo $main_text3 ?></h2>
        <p class="mb-0 text-white lead"><?php echo $main_tagline3 ?></p>
      </div>
            <div class="col-md-3 ml-auto">
        <a href="user.php" class="btn btn-warning btn-block btn-lg">Shiko peticionet tuaja</a>
      </div>
    </div>
  </div>
</section>
    <!-- perfundimi secion 3-->

    <section class="site-section">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2"><?php echo $count; ?> Peticione te krijuara</h2>
          </div>

          
        </div>
    
        <div class="mb-5"> 
               <div class="row align-items-start job-item border-bottom pb-3 mb-3 pt-3">
                  <table class="table">
                   <tr class="row">
                     <th class="col-sm-2">Kategorija</th>
                     <th class="col-sm-4">Titulli i peticionit</th>
                     <th class="col-sm-3 text-left">Data</th>
                     <th class="col-sm-3 text-md-right">Numri i pjesmarrsve</th>
                    </tr>
                    </table>
               </div> 
              </div>
        
        <?php 

           if(!isset($_POST['searchbar']))
           {

             mysqli_next_result($connection);
              $select_all_petitions_query = mysqli_query($connection,"CALL selectIndexPost('$page_1')");
              if(!$select_all_petitions_query){
                echo mysqli_error($connection);
              }
             mysqli_next_result($connection);
           }
           else{
             $search = $_POST['search'];
             mysqli_next_result($connection);
      $select_all_petitions_query = mysqli_query($connection,"CALL searchPetition('$search')");
      mysqli_next_result($connection);



           }
            while($row = mysqli_fetch_assoc($select_all_petitions_query)){
              $post_id = $row['peticionId'];
              $post_kategori = $row['kategoriTitle'];
              $post_title = $row['Titulli'];
              $post_date = $row['Data'];
              $post_author = $row['Autori'];
              
              ?>

        <div class="mb-5">
          <div class="row align-items-start job-item border-bottom pb-3 mb-3 pt-3">
            <div class="col-md-2">
              <h3 class="text-primary"><?php echo $post_kategori ?></h3>
            </div>
            <div class="col-md-4">
              <h2><a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a> </h2>
              <p class="meta">Publisher: <strong><?php echo $post_author ?></strong></p>
            </div>
            <div class="col-md-3 text-left">
              <h3><?php echo $post_date ?></h3>
            </div>
            <div class="col-md-3 text-md-right">
              <strong class="text-primary"><?php  

                    mysqli_next_result($connection);
      $result3 = mysqli_query($connection,"CALL selectPostsSigned('$post_id')");
      mysqli_next_result($connection);
                    $signed = mysqli_fetch_assoc($result3)['signed'];

                    echo $signed; ?></strong>
            </div>
          </div>
      <?php } ?>
      <div class="row mb-5 justify-content-center">
      <div class="col-md-7 text-center">
       <div class="row form-group">
          <div class="col-md-12">
          <form action="" method="post">
         
          <div class="form-group">
          <input name="search" type="search" placeholder="Kerko te dhena" class="form-control"/>
          </div>
          <div class="form-group">
          <input name="searchbar" type="submit" value="Search" class="btn btn-primary btn-md text-white"/>
          </div>
                </form>
                  </div>
                </div>
          </div>
        </div>
        
        <div class="row pagination-wrap">
          
          <div class="col-md-6 text-center text-md-left">
            <div class="custom-pagination ml-auto">
              <div class="d-inline-block">
               <?php
                $count= ceil($count / 5);
                for($i = 1; $i<= $count; $i++) {
                  echo "<a href='index.php?page={$i}'>{$i}</a>";
                }
              ?>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
<?php include("includes/footer.php"); ?>

    




   