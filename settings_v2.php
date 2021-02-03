<?php session_start(); 
if (isset($_SESSION["optin_user"])){
$temp = $_SESSION["optin_user"];

$user_name = str_ireplace("optin_","",$temp); //user name								
	include("./db_v2/config.php");
	if($temp){
		$data = Select_All_Completed_Task($user_name);
		$data2 = Select_All_Pending_Task($user_name);
		$total = select_all_camp($user_name);
		$percentage =(count($data) / count($total))*100;
	}
}else{
	header('location: index.php');
}

if($_SESSION["access_level"] != '1'){
	header('location: dash_board_v2.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OPSoft Dashboard</title>

    <!-- Custom fonts for this template-->
    <?php include_once("includes_v2/css.php")?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once("includes_v2/sidebar.php")?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once("includes_v2/topbar.php")?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    

                    <!-- Content Row -->
                    

                    <!-- Content Row -->


                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Add/Refresh Webshare.io Proxy</h6>
                                </div>
                                <div class="card-body">
								
                                   <div class="form-group">
										<label>Proxy Listing URL</label>
										<input type="text" name="bmd-label-floating-proxy-url-wb" id="bmd-label-floating-proxy-url-wb" value="https://proxy.webshare.io/api/proxy/list/" class="form-control" required>   
										</div>
										<div class="form-group">
										<label>Api Key </label>
										
										<input type="text" name="bmd-label-floating-proxy-api-wb" id="bmd-label-floating-proxy-api-wb" value="e5b88d7e31d6aec39876e44c1b5c2404615675d0" class="form-control" required>   
										</div>
										<div class="form-group">
										<label>Query Limit </label>
										<input type="text" name="bmd-label-floating-query-limit-wb" id="bmd-label-floating-query-limit-wb" value="50" class="form-control" required>   
										</div>
										<div class="task-btn">
									  <button type="submit" name="submit" class="btn btn-success btn-icon-split" onclick="add_proxy_files_webshare()">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                        <span class="text">Execute</span>
                                    </button>
									  </div>
                                 					  <div id="save-user-data3_wb"></div>
                                </div>
                            </div>

                            

                        </div>              
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
             <?php include_once("includes_v2/footer.php")?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="./php_v2/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    
 
</body>
<?php include_once("includes_v2/javascript.php")?>
</html>