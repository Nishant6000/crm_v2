<div class="content">
        <div class="container-fluid">
          
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">	Create Campaign</span>
                    </div>
                  </div>
                </div>
               <div class="card-body">
                  <form >
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Campaign Name</label>
                          <input id="bmd-label-floating-camp-name" type="text" class="form-control">
                        </div>
                      </div>
					  <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category Name</label>
                          <input id="bmd-label-floating-camp-cat" type="text" class="form-control">
                        </div>
                      </div>
                      
                    </div>
					 </form>
					
					
                    <button type="submit" class="btn btn-primary pull-center" onclick="CreateCampaign()">Create Campaign</button>
                    <div class="clearfix"></div>
					<div id="Campaign-List"></div>
                </div>
            </div>
            
        </div>
		<div class="col-lg-12 col-md-12">
              <div class="">
				<div id="Campaign-List">
						  <div class="card">
							<div class="card-header card-header-primary">
							  <h4 class="card-title ">Campagin List</h4>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table">
								  <thead class=" text-primary">
									<tr>
									<th>ID</th>
									<th>Campagin Name</th>
									<th>File Name</th>
									<th>Created Date</th>
								  </tr>
								  </thead>
								<tbody>
								<?php 
								include('db/config.php');
								session_start();
								$table_name = "campaign";
								$temp = $_SESSION["optin_user"];
								$user_name = str_ireplace("optin_","",$temp);
								$view_count_data = countdata_camplist_data($table_name, $user_name);
								$view_count_data_count = count($view_count_data);
								if($view_count_data_count != 0){
									$k=1;
									foreach($view_count_data as $view_count_data_piece){
										echo "<tr>\n"; 
										echo "									  <td>".$k."</td>\n"; 
										echo "										<td id=\"\" value=\"\">".$view_count_data_piece['campaign_name']."</td>\n"; 
										echo "										<td>".$view_count_data_piece['filename']."</td>\n"; 
										echo "										<td>".$view_count_data_piece['campagin_create_date']."</td>\n"; 
										echo "									</tr>\n";
										$k++;
									}
								}
								
								?>
									
								</tbody>
								</table>
							  </div>
							</div>
						  </div>
			 </div>
		</div>   
            
        </div>
      </div>
	  