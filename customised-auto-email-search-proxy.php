<!DOCTYPE html>
<html lang="en">

<head>

<?php
global $temp;
session_start();

if (isset($_SESSION["optin_user"])){
	$temp = $_SESSION["optin_user"];
	
		include('db/config.php');
		$table_name = "campaign";
		$userdbname = str_ireplace("optin_","",$temp);	
		$db_results = countdata_campdata_last($table_name, $userdbname);
					if($db_results){
						$_SESSION["optin_user_file"] = $db_results['filename'];
					}else{
						$_SESSION["optin_user_file"] = "NO DATA";
					}
					
	
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
      <?php include 'dynamic_content/body_content_auto_customized_email-proxy.php';?>
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
