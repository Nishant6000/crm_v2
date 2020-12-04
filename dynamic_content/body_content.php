<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Total Leads</p>
                  <h3 class="card-title"><?php include('db/config.php');
					session_start();
					$table_name = "leads_db";
					if (isset($_SESSION["optin_user"])){
					$temp = $_SESSION["optin_user"];
					$user_name = str_ireplace("optin_","",$temp); //user name
					$cnt_lead = countdata_camplist_data($table_name, $user_name);
						echo count($cnt_lead);
					
					}else{
						header('location: index.php');
					}
?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger"></i>
                    <a href="#messages"></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Monthly Closures</p>
                  <h3 class="card-title"><?php include('db/config.php');
					$table_name = "leads_db";
					if (isset($_SESSION["optin_user"])){
					$temp = $_SESSION["optin_user"];
					$user_name = str_ireplace("optin_","",$temp); //user name
					//$currentdate = date('Y-m-d');
					$currentdate = '2019-09-14';
					$fromdate_array = explode('-',$currentdate);
					//$fromdate = $fromdate_array[0]."-".$fromdate_array[1]."-1";
					$fromdate = '2019-09-1';
					$cnt_lead = getall_data_daterange($table_name, $user_name, $fromdate, $currentdate);
					echo count($cnt_lead);
					}else{
						header('location: index.php');
					}?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-twitter"></i>
                  </div>
                  <p class="card-category">Monthly Revenue</p>
                  <h3 class="card-title"><?php include('db/config.php');
					$table_name = "leads_db";
					$value = 0;
					if (isset($_SESSION["optin_user"])){
					$temp = $_SESSION["optin_user"];
					$user_name = str_ireplace("optin_","",$temp); //user name
					//$currentdate = date('Y-m-d');
					$currentdate = '2019-09-14';
					$fromdate_array = explode('-',$currentdate);
					//$fromdate = $fromdate_array[0]."-".$fromdate_array[1]."-1";
					$fromdate = '2019-09-1';
					$cnt_lead = getall_data_daterange($table_name, $user_name, $fromdate, $currentdate);
					$ctnctr = count($cnt_lead);
						if(!$ctnctr){
							echo $value;
						}else{
							foreach($cnt_lead as $cnt_lead_data){
								echo $value = $value + $cnt_lead_data['amount'];
								echo " $";
							}
						}
					}else{
						header('location: index.php');
					}?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">error</i>
                  </div>
                  <p class="card-category">Not Intrested</p>
                  <h3 class="card-title">0</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-success">
                  <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Daily Sales</h4>
                  <p class="card-category">
                    <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
                </div>
                
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-warning">
                  <div class="ct-chart" id="websiteViewsChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Monthly Sales</h4>
                  <p class="card-category">Sales For The Month of </p>
                </div>
                
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-danger">
                  <div class="ct-chart" id="completedTasksChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Total Emails Sent</h4>
                  <p class="card-category">For The Month</p>
                </div>
                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Leads:</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#profile" data-toggle="tab">
                            <i class="material-icons">list</i> View Leads 
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#messages" data-toggle="tab">
                            <i class="material-icons">airplay</i> Upload Leads
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        
                      </ul>
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
									<th>Company Name</th>
									<th>Email Id</th>
									<th>Created Date</th>
									<th>Action </th>
								  </tr>
						</thead>
                        <tbody>
						<?php include('db/config.php');
					session_start();
					$table_name = "leads_db";
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
									echo '<tr>';
									echo '<td>'.$cntld["sl_no"].'</td>';
									echo '<td>'.$cntld["company"].'</td>';
									echo '<td>'.$cntld["email"].'</td>';
									echo '<td>'.$cntld["date"].'</td>';
									echo '<td><input type="button" id="'.$cntld["email"].'|'.$user_name.'" value="Delete" onclick="deleteRow(this.id)"></td>';
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
                
                <div class="card-body">
                  <form>
                    <div class="row">
					<div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Lead Name</label>
                          <input id="lename" name="lename" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Company Name</label>
                          <input id="cname" name="cname" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Company Url</label>
                          <input id="curl" name="curl" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input id="fname" name="fname" type="text" class="form-control">
                          <label class="bmd-label-floating">first name</label>
                        </div>
                      </div>
					  <div class="col-md-6">
                        <div class="form-group">
                          <input id="lname" name="lname" type="text" class="form-control">
                          <label class="bmd-label-floating">Last name</label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tittle of the Person</label>
                          <input id="persontitle" name="persontitle" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input id="email" name="email" type="email" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone</label>
                          <input id="phone" name="phone" type="text" class="form-control">
                        </div>
                      </div>
					  <div class="col-md-12">
                       <div class="input-group">
							  <div class="input-group-prepend">
								<span class="input-group-text" id="inputGroupFileAddon01">Upload Outlook File:</span>
							  </div>
							  <div class="custom-file">
								<input type="file" class="form-control" id="inputGroupFile01" name="inputGroupFile01">
							  </div>
							</div>
						
                      </div>
                    </div>
					  
					<div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Follow-Up</label>
						  <textarea class="form-control" id="Followup" name="Followup" rows="12" cols="35"></textarea>
                        </div>
                      </div>
                    </div>
                    
                    </form>
                    <button type="submit" onclick="leadpostsubmit()" class="btn btn-primary pull-right">Add Lead Info</button>
                    <div class="clearfix">
					<div id="save-list"></div></div>

                </div>
              </div>
                    </div>
                    
                </div>
              </div>
            </div>
            
        </div>
      </div>