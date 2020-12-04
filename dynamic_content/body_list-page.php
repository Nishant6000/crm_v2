<div class="content">
        <div class="container-fluid">
         
          
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Campain Pitch and Subject:</span>
                     
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
									<th>Pitch </th>
									<th>Subject</th>
									<th>Action</th>
								  </tr>
						</thead>
                        <tbody>
						<?php include('db/config.php');
					session_start();
					$table_name = "pitch_sub";
					if (isset($_SESSION["optin_user"])){
					$temp = $_SESSION["optin_user"];
					$user_name = str_ireplace("optin_","",$temp); //user name
					$cnt_lead = countdata_pitch_data($table_name, $user_name);
							if(count($cnt_lead) == 0){
								echo "<tr>";
								echo "<td>1</td>\n"; 
								echo "<td>No Data Available !</td>\n";
								echo "</tr>";
							}else{
								foreach($cnt_lead as $cntld){
									echo '<tr>';
									echo '<td>'.$cntld["sl_no"].'</td>';
									echo '<td>'.$cntld["campaign_name"].'</td>';
									echo '<td>'.$cntld["subject"].'</td>';
									echo '<td>'.$cntld["pitch"].'</td>';
									echo '<td><input type="button" id="'.$cntld["campaign_name"].'|'.$cntld["pitch"].'|'.$user_name.'" value="Delete" onclick="deleteRowPitch(this.id)"></td>';
									echo '</tr>';
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