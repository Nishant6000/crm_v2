<div class="content">
        <div class="container-fluid">
          
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Add Pitch and Subject To Campain</span>
                    </div>
                  </div>
                </div>
               <div class="card-body">
                  <form >
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
							  <label class="bmd-label-floating" for="sel2">Click to select Campain List:</label>
								<select class="form-control" id="sel2">
									<?php include('db/config.php');
											session_start();
											$table_name = "campaign";
											if (isset($_SESSION["optin_user"])){
											$temp = $_SESSION["optin_user"];
											$user_name = str_ireplace("optin_","",$temp); //user name
											$cnt_lead = countdata_camplist_data($table_name, $user_name);
													if(count($cnt_lead) == 0){
														echo "<option>No Data Available</option>";
													}else{
														foreach($cnt_lead as $cntld){
															echo "<option>".$cntld['campaign_name']."</option>";
														}
													}
											
											}else{
												header('location: index.php');
											}
						?>
								</select>
							</div>
                      </div>
                        <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Subject</label>
                          <input id="subject-line" type="text" class="form-control">
                        </div>
                      </div>
					  <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Pitch</label>
						  <textarea class="form-control" id="Pitch" name="Pitch" rows="5" cols="35"></textarea>
                        </div>
                      </div>
                    </div>
					 </form>
					
					
                    <button type="submit" class="btn btn-primary pull-center" onclick="Savesubjectpitch()">Add Pitch</button>
                    <div class="clearfix"></div>
					<div id="Company-to-url"></div>
                 
				  
				  
                </div>
            </div>
            
        </div>
      </div>
	  <div class="row">
            <div class="col-md-12">
                <div id="Company-to-url">
				
				</div>   
            </div>
            
          </div>