<!DOCTYPE html>
<html lang="en">

<head>
<?php
global $temp;
session_start();
if (isset($_SESSION["optin_user"])){
	$temp = $_SESSION["optin_user"];
}else{
	header('location: index.php');
}
?>
  <!-- Header CSS -->
  <?php include 'dynamic_content/head_css.php';?>
  <!-- Header CSS End-->
</head>

<body class="">
  <div class="wrapper ">
    <!-- Side Bar-->
    <?php include 'dynamic_content/sidebar.php';?>
    <!--Side Bar End-->
    
    <div class="main-panel">
      <!-- Navbar -->
      <?php include 'dynamic_content/navbar.php';?>
      <!-- End Navbar -->
      <!-- Body Content-->
      <?php include 'dynamic_content/body_content_campagin_creator.php';?>
      <!-- Body Content End-->
      <!--- Footer-->
      <?php include 'dynamic_content/footer.php';?>
      <!-- Footer End-->
    </div>
  </div>
  <div class="fixed-plugin">
   
  </div>
  <!--   Core JS Files   -->
  <?php include 'dynamic_content/js.php';?>
</body>

</html>
