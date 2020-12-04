<div class="content">
        <div class="container-fluid">
         
          
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">My Campain Files:</span>
                     
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                      <table class="table">
					  <thead class=" text-primary">
									<tr>
									<th>Sl</th>
									<th>Campain Name</th>
									<th>File Type</th>
									<th>File Name</th>
									<th>Action</th>
									<th></th>
								  </tr>
						</thead>
                        <tbody>
						<?php include('db/config.php');
					session_start();
					$table_name = "campaign";
					if (isset($_SESSION["optin_user"])){
					$temp = $_SESSION["optin_user"];
					$user_name = str_ireplace("optin_","",$temp); //user name
					$cnt_lead = countdata_camplist_data($table_name, $user_name);
							if(count($cnt_lead) == 0){
								echo "<tr>";
								echo "<td>1</td>\n"; 
								echo "<td>No Data Available !</td>\n";
								echo "</tr>";
							}else{
								foreach($cnt_lead as $cntld){
									$campaign_name = $cntld["campaign_name"];
									$filename = $cntld["filename"];
									$filename_array = explode(".",$filename);
										///=========================================
										$filetype = "Manual Company To URL";
										$fileloc = "optin_db_folder/".$user_name."/mc2url-".$filename;
											if (!file_exists($fileloc)) {
												
											}else{
												echo '<tr>';
												echo '<td>'.$cntld["sl_no"].'</td>';
												echo '<td>'.$cntld["campaign_name"].'</td>';
												echo '<td>'.$filetype.'</td>';
												echo '<td>'.$fileloc.'</td>';
												echo '<td><input type="button" id="'.$fileloc.'|" value="Delete" onclick="deletefile(this.id)"></td>';
												echo '<td><a href="'.$fileloc.'" download><input type="button" id="'.$fileloc.'" value="Download"></a></td>';
												echo '</tr>';
											}
											//===============================================================
											$filetype = "Automated Company To URL";
										$fileloc = "optin_db_folder/".$user_name."/ac2url-".$filename_array[0].".xlsx";
										$fileloc2 = "optin_db_folder/".$user_name."/resp-ac2url-".$filename_array[0].".xlsx";
											if (!file_exists($fileloc)) {
												if(file_exists($fileloc2)){
													echo '<tr>';
												echo '<td>'.$cntld["sl_no"].'</td>';
												echo '<td>'.$cntld["campaign_name"].'</td>';
												echo '<td>'.$filetype.'</td>';
												echo '<td>'.$fileloc2.'</td>';
												echo '<td><input type="button" id="'.$fileloc2.'|" value="Delete" onclick="deletefile(this.id)"></td>';
												echo '<td><a href="'.$fileloc2.'" download><input type="button" id="'.$fileloc2.'" value="Download"></a></td>';
												echo '</tr>';
												}
											}else{
												if(file_exists($fileloc2)){
													echo '<tr>';
												echo '<td>'.$cntld["sl_no"].'</td>';
												echo '<td>'.$cntld["campaign_name"].'</td>';
												echo '<td>'.$filetype.'</td>';
												echo '<td>'.$fileloc2.'</td>';
												echo '<td><input type="button" id="'.$fileloc2.'|'.$fileloc.'" value="Delete" onclick="deletefile(this.id)"></td>';
												echo '<td><a href="'.$fileloc2.'" download><input type="button" id="'.$fileloc2.'" value="Download"></a></td>';
												echo '</tr>';
												}
											}
											//=============================================================================
											$filetype = "Bulk Email Manual Search";
										$fileloc = "optin_db_folder/".$user_name."/bulk-".$filename;
											if (!file_exists($fileloc)) {
												
											}else{
												echo '<tr>';
												echo '<td>'.$cntld["sl_no"].'</td>';
												echo '<td>'.$cntld["campaign_name"].'</td>';
												echo '<td>'.$filetype.'</td>';
												echo '<td>'.$fileloc.'</td>';
												echo '<td><input type="button" id="'.$fileloc.'|" value="Delete" onclick="deletefile(this.id)"></td>';
												echo '<td><a href="'.$fileloc.'" download><input type="button" id="'.$fileloc.'" value="Download"></a></td>';
												echo '</tr>';
											}
											//====================================================================
											$filetype = "Custom Email Manual Search";
										$fileloc = "optin_db_folder/".$user_name."/custom-".$filename;
											if (!file_exists($fileloc)) {
												
											}else{
												echo '<tr>';
												echo '<td>'.$cntld["sl_no"].'</td>';
												echo '<td>'.$cntld["campaign_name"].'</td>';
												echo '<td>'.$filetype.'</td>';
												echo '<td>'.$fileloc.'</td>';
												echo '<td><input type="button" id="'.$fileloc.'|" value="Delete" onclick="deletefile(this.id)"></td>';
												echo '<td><a href="'.$fileloc.'" download><input type="button" id="'.$fileloc.'" value="Download"></a></td>';
												echo '</tr>';
											}
											//==============================================================================
											$filetype = "Automated Bulk Email Search";
											$fileloccsv ="optin_db_folder/".$user_name."/csvabemail-".$filename_array[0].".csv";
										$fileloc = "optin_db_folder/".$user_name."/abemail-".$filename_array[0].".xlsx";
										$fileloc2 = "optin_db_folder/".$user_name."/resp-abemail-".$filename_array[0].".xlsx";
										

											if (!file_exists($fileloc)) {
												if(file_exists($fileloc2)){
													echo '<tr>';
												echo '<td>'.$cntld["sl_no"].'</td>';
												echo '<td>'.$cntld["campaign_name"].'</td>';
												echo '<td>'.$filetype.'</td>';
												echo '<td>'.$fileloc2.'</td>';
												echo '<td><input type="button" id="'.$fileloc2.'|" value="Delete" onclick="deletefile(this.id)"></td>';
												echo '<td><a href="'.$fileloc2.'" download><input type="button" id="'.$fileloc2.'" value="Download"></a></td>';
												echo '</tr>';
												}
											}else{
												if(file_exists($fileloc2)){
													echo '<tr>';
												echo '<td>'.$cntld["sl_no"].'</td>';
												echo '<td>'.$cntld["campaign_name"].'</td>';
												echo '<td>'.$filetype.'</td>';
												echo '<td>'.$fileloc2.'</td>';
												echo '<td><input type="button" id="'.$fileloc2.'|'.$fileloc.'" value="Delete" onclick="deletefile(this.id)"></td>';
												echo '<td><a href="'.$fileloc2.'" download><input type="button" id="'.$fileloc2.'" value="Download"></a></td>';
												echo '</tr>';
												}
											}
											if(file_exists($fileloccsv)){
												echo '<tr>';
												echo '<td>'.$cntld["sl_no"].'</td>';
												echo '<td>'.$cntld["campaign_name"].'</td>';
												echo '<td>'.$filetype.'-csv</td>';
												echo '<td>'.$fileloccsv.'</td>';
												echo '<td><input type="button" id="'.$fileloc2.'|'.$fileloccsv.'" value="Delete" onclick="deletefile(this.id)"></td>';
												echo '<td><a href="'.$fileloccsv.'" download><input type="button" id="'.$fileloccsv.'" value="Download"></a></td>';
												echo '</tr>';
											} 
											
											//=============================================================================
											$filetype = "Automated Custom Email Search";
										$fileloccsv ="optin_db_folder/".$user_name."/csvacemail-".$filename_array[0].".csv";
										$fileloc = "optin_db_folder/".$user_name."/acemail-".$filename_array[0].".xlsx";
										$fileloc2 = "optin_db_folder/".$user_name."/resp-acemail-".$filename_array[0].".xlsx";
										
											if (!file_exists($fileloc)) {
												if(file_exists($fileloc2)){
													echo '<tr>';
												echo '<td>'.$cntld["sl_no"].'</td>';
												echo '<td>'.$cntld["campaign_name"].'</td>';
												echo '<td>'.$filetype.'</td>';
												echo '<td>'.$fileloc2.'</td>';
												echo '<td><input type="button" id="'.$fileloc2.'|" value="Delete" onclick="deletefile(this.id)"></td>';
												echo '<td><a href="'.$fileloc2.'" download><input type="button" id="'.$fileloc2.'" value="Download"></a></td>';
												echo '</tr>';
												}
											}else{
												
												if(file_exists($fileloc2)){
													echo '<tr>';
												echo '<td>'.$cntld["sl_no"].'</td>';
												echo '<td>'.$cntld["campaign_name"].'</td>';
												echo '<td>'.$filetype.'</td>';
												echo '<td>'.$fileloc2.'</td>';
												echo '<td><input type="button" id="'.$fileloc2.'|'.$fileloc.'" value="Delete" onclick="deletefile(this.id)"></td>';
												echo '<td><a href="'.$fileloc2.'" download><input type="button" id="'.$fileloc2.'" value="Download"></a></td>';
												echo '</tr>';
												}
											}
											if(file_exists($fileloccsv)){
												echo '<tr>';
												echo '<td>'.$cntld["sl_no"].'</td>';
												echo '<td>'.$cntld["campaign_name"].'</td>';
												echo '<td>'.$filetype.'-csv</td>';
												echo '<td>'.$fileloccsv.'</td>';
												echo '<td><input type="button" id="'.$fileloc2.'|'.$fileloccsv.'" value="Delete" onclick="deletefile(this.id)"></td>';
												echo '<td><a href="'.$fileloccsv.'" download><input type="button" id="'.$fileloccsv.'" value="Download"></a></td>';
												echo '</tr>';
											}
											
										//=============================================mail validation results===
										$filetype = "Automated Mail Validation";
										$fileloccsv ="optin_db_folder/".$user_name."/csvmailval-".$filename_array[0].".csv";
										$fileloc = "optin_db_folder/".$user_name."/mailval-".$filename_array[0].".xlsx";
										$fileloc2 = "optin_db_folder/".$user_name."/resp-mailval-".$filename_array[0].".xlsx";
											if (!file_exists($fileloc)) {
												if(file_exists($fileloc2)){
													echo '<tr>';
												echo '<td>'.$cntld["sl_no"].'</td>';
												echo '<td>'.$cntld["campaign_name"].'</td>';
												echo '<td>'.$filetype.'</td>';
												echo '<td>'.$fileloc2.'</td>';
												echo '<td><input type="button" id="'.$fileloc2.'|" value="Delete" onclick="deletefile(this.id)"></td>';
												echo '<td><a href="'.$fileloc2.'" download><input type="button" id="'.$fileloc2.'" value="Download"></a></td>';
												echo '</tr>';
												}
											}else{
												if(file_exists($fileloc2)){
													echo '<tr>';
												echo '<td>'.$cntld["sl_no"].'</td>';
												echo '<td>'.$cntld["campaign_name"].'</td>';
												echo '<td>'.$filetype.'</td>';
												echo '<td>'.$fileloc2.'</td>';
												echo '<td><input type="button" id="'.$fileloc2.'|'.$fileloc.'" value="Delete" onclick="deletefile(this.id)"></td>';
												echo '<td><a href="'.$fileloc2.'" download><input type="button" id="'.$fileloc2.'" value="Download"></a></td>';
												echo '</tr>';
												}
											}
											if(file_exists($fileloccsv)){
												echo '<tr>';
												echo '<td>'.$cntld["sl_no"].'</td>';
												echo '<td>'.$cntld["campaign_name"].'</td>';
												echo '<td>'.$filetype.'-csv</td>';
												echo '<td>'.$fileloccsv.'</td>';
												echo '<td><input type="button" id="'.$fileloc2.'|'.$fileloccsv.'" value="Delete" onclick="deletefile(this.id)"></td>';
												echo '<td><a href="'.$fileloccsv.'" download><input type="button" id="'.$fileloccsv.'" value="Download"></a></td>';
												echo '</tr>';
											} 
										//================================================================================
										
										
										
										//=========================================================================
								}
							}
					
					}else{
						header('location: index.php');
					}
?>
                         
                          
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane" id="messages">
                    <div class="card">
                
                
              </div>
                    </div>
                    
                </div>
              </div>
            </div>
            
        </div>
      </div>