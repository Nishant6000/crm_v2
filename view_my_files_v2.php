<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<meta http-equiv="refresh" content="30" />

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
                            <h6 class="m-0 font-weight-bold text-primary">Task List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Campain Name</th>
											 <th>Task Type</th>
											 <th>Uploaded Date</th>
											 <th>Completed Date</th>
                                            <th>Data Extraction Status</th>
                                            <th>Mail Validation Status</th>
											<th>Mail Filter </th>
                                            <th>Download/Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									if (isset($_SESSION["optin_user"])){
										$temp = $_SESSION["optin_user"];
										$user_name = str_ireplace("optin_","",$temp); //user name
									
												include("./db_v2/config.php");
												if($temp){
													$data = select_all_camp($user_name);
												}
									}
									
								
									?>
								<?php if($data){
										foreach($data as $dat){?>
                                        <tr>
                                            <td><?php echo $dat['campaign_name']; ?></td>
											<td><?php echo $dat['typeofsearch']; ?></td>
                                            <td><?php echo $dat['fileuploaded_time']; ?></td>
                                            <td><?php echo $dat['filecompletedate']; ?></td>
                                            <td><div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $dat['percentage1']?>%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $dat['percentage1']?>%" aria-valuenow="<?php echo $dat['percentage2']?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div></td>
                                            <td><div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $dat['percentage2']?>%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $dat['percentage2']?>%" aria-valuenow="<?php echo $dat['percentage2']?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div></td>
											<td><div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $dat['percentage3']?>%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $dat['percentage3']?>%" aria-valuenow="<?php echo $dat['percentage3']?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div></td>
											<?php 
											
											if($dat['percentage1'] == 100 && $dat['percentage2'] == 100 && $dat['percentage3'] == 100){
												echo '<td class="text-center"><a href="download_v2.php?f='.$dat['tmpcsvfileloc'].'"><i class="fa fa-download" aria-hidden="true"></i></a>&nbsp;</td>';
											}else if($dat['percentage1'] == 0 && $dat['percentage2'] == 0 && $dat['percentage3'] == 0){
												echo '<td class="text-center">&nbsp;<a href="./delete_v2.php?id='.$dat['sl_no'].'"><i class="fa fa-trash" style="color:red;"aria-hidden="true"></i></a></td>';
											}else{
												echo '<td class="text-center"><a href="download_v2.php?f='.$dat['tmpcsvfileloc'].'"><i class="fa fa-download" aria-hidden="true"></i></a>&nbsp;</td>';
											}
											
											?>

                                        </tr>
									
								<?php }}?>
                                    </tbody>
                                </table>
                            </div>
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    
 
</body>
<?php include_once("includes_v2/javascript.php")?>
</html>