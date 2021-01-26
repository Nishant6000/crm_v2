
<?php session_start();
					if (isset($_SESSION["optin_user"])){
					$temp = $_SESSION["optin_user"];
					$user_name = str_ireplace("optin_","",$temp); //user name
					}else{
						header('location: index.php');
					}
					?>

<?php 
		if(isset($_GET['stat'])){
		 $stat = $_GET['stat'];
		?>
		<script>
		alert("<?php echo $stat ?>");
		</script>
		<?php
	  }?>
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
                    <?php
					
					if (isset($_SESSION["optin_user"])){
					$temp = $_SESSION["optin_user"];
					$user_name = str_ireplace("optin_","",$temp); //user name
				
							include("./db_v2/config.php");
							if($temp){
								$data = select_distinct_campaign($user_name);
		
							}
					}
					?>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
             

                        <!-- Earnings (Monthly) Card Example -->
         

                        <!-- Earnings (Monthly) Card Example -->
                       

                        <!-- Pending Requests Card Example -->
                        
                    </div>

                    <!-- Content Row -->


                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Upload Files</h6>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="./php_v2/load_campain.php" enctype="multipart/form-data">
									  <div class="selectholder">
										<div class="form-group">
										<label>Enter New Campaign </label>
										<input type="hidden" name="username" value="<?php echo $user_name;?>">
										<input type="text" name="camp_name" class="form-control">   
										</div>
										
										 <div class="or">
										 <img src="./img_v2/or.PNG">
										 </div>
										  
										<div class="form-group">
										<label>Select Campaign</label>
										 <select class="form-control" name="campnamepicked" id="sel1">
											<option value="SELECT">SELECT</option>
											<?php
											if($data){
												foreach($data as $dat){
													echo "<option value=".$dat['campaign_name'].">".$dat['campaign_name']."</option>";
												}
												
											}
											?>
										  </select>
										</div>
										 <hr class="dashed">
									  </div>
									  
									  <div class="form-group files">
										<label>Upload Your File </label>
										<input type="file" name="fileupload" class="form-control">
									  </div>
									  <div class="form-group radioselect" id="radio">
										<label class="radio-inline">
										  <input type="radio" name="optradio" value="CUSTOM" checked>&nbsp;Custom Search
										</label>
										<label class="radio-inline">
										  <input type="radio" name="optradio" value="BULK">&nbsp;Bulk Search
										</label>
										<label class="radio-inline">
										  <input type="radio" name="optradio" value="CTOURL">&nbsp;Company To Url
										</label>
										<label class="radio-inline">
										  <input type="radio" name="optradio" value="MAILVAL">&nbsp;Mail Validation 
										</label>
										<label class="radio-inline">
										  <input type="radio" name="optradio" value="CNMV">&nbsp;Custom NMV
										</label>
									  </div>
									  <div class="task-btn">
									  <button type="submit" name="submit" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                        <span class="text">Execute</span>
                                    </button>
									  </div>
									</form>
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