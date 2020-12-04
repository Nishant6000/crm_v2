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
    <div class="content">
        <div class="container-fluid">
		<div class="row">
            <div class="col-md-12">
                <div id="Company-to-url">
					<img src="accesserror.png" style="margin-left:40%;margin-top:10%"></img>
				</div>   
            </div>
            
          </div>
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
