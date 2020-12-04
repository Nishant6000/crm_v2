<div class="content">
        <div class="container-fluid">
          
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">	Add User </span>
                    </div>
                  </div>
                </div>
               <div class="card-body">
                  <form >
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">User Name*</label>
                          <input id="bmd-label-floating-uname" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input id="bmd-label-floating-pass1" type="password" class="form-control">
                        </div>
                      </div>
					  <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Confirm Password*</label>
                          <input id="bmd-label-floating-pass2" type="password" class="form-control">
                        </div>
                      </div>
					   <div class="col-md-6">
                        <div class="form-group">
							  <label class="bmd-label-floating" for="access">ACCESS:</label>
								<select class="form-control" id="access">
									<option>ADMIN</option><option>AGENT</option><option>SALES</option></select>
							</div>
                      </div>
					   <div class="col-md-6">
                        <div class="form-group">
							  <label class="bmd-label-floating" for="status">STATUS:</label>
								<select class="form-control" id="status">
									<option>DEACTIVE</option><option>ACTIVE</option></select>
							</div>
                      </div>
					  <div class="col-md-12">
                        <div class="form-group">
							  <label class="bmd-label-floating" for="accosiate">ASSOCIATE:</label>
								<select class="form-control" id="associate">
									<?php include('db/config.php');
									$table_name = "crm_auth";
									$results = get_all_user_crm($table_name);
									if($results){
										foreach($results as $res){
											echo "<option>".$res['username']."</option>";
										}
										echo "<option>NA</option>";
									}else{
										echo "<option>NA</option>";
									}
									?>
								</select>
							</div>
                      </div>
                    </div>
					 </form>
					
					
                    <button type="submit" class="btn btn-primary pull-center" onclick="add_user()">Add User</button>
                    <div class="clearfix"></div>
					  <div id="save-user-data"></div>
                 
				  
				  
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
                      <span class="nav-tabs-title">	Search And Edit User </span>
                    </div>
                  </div>
                </div>
               <div class="card-body">
                  <form >
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Type The User Name You Want To Search*</label>
                          <input id="bmd-label-floating-uname2" onkeyup="search()" type="text" class="form-control">
						  <div id="select" class="select">
							  <ul id="dp">
								
							 </ul>
						</div>
                        </div>
                      </div>
					 
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">User Name</label>
                          <input id="bmd-label-floating-username" type="text" class="form-control">
						  <input id="bmd-label-floating-sl" type="hidden" class="form-control">
                        </div>
                      </div>
					  <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password*</label>
                          <input id="bmd-label-floating-passb2" type="password" class="form-control">
                        </div>
                      </div>
					  <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Confirm Password*</label>
                          <input id="bmd-label-floating-passbc2" type="password" class="form-control">
                        </div>
                      </div>
					   <div class="col-md-6">
                        <div class="form-group">
							  <label class="bmd-label-floating" for="access">ACCESS:</label>
								<select class="form-control" id="access2">
									<option>ADMIN</option><option>AGENT</option><option>SALES</option></select>
							</div>
                      </div>
					   <div class="col-md-6">
                        <div class="form-group">
							  <label class="bmd-label-floating" for="status">STATUS:</label>
								<select class="form-control" id="status2">
									<option>DEACTIVE</option><option>ACTIVE</option></select>
							</div>
                      </div>
					  <div class="col-md-12">
                        <div class="form-group">
							  <label class="bmd-label-floating" for="accosiate2">ASSOCIATE:</label>
								<select class="form-control" id="associate2">
									<?php include('db/config.php');
									$table_name = "crm_auth";
									$results = get_all_user_crm($table_name);
									if($results){
										foreach($results as $res){
											echo "<option>".$res['username']."</option>";
										}
										echo "<option>NA</option>";
									}else{
										echo "<option>NA</option>";
									}
									?>
								</select>
							</div>
                      </div>
                    </div>
					 </form>
					
					
                    <button type="submit" class="btn btn-primary pull-center" onclick="edit_user_acc()">Edit User</button>
                    <div class="clearfix"></div>
					  <div id="save-user-data2"></div>
                 
				  
				  
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
                      <span class="nav-tabs-title">	Add Proxy Settings OxyLABS</span>
                    </div>
                  </div>
                </div>
               <div class="card-body">
                  <form >
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Query Limit</label>
                          <input id="bmd-label-floating-query-limit" type="text" class="form-control">
                        </div>
                      </div>
					  <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Proxy URL</label>
                          <input id="bmd-label-floating-proxy-url" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input id="bmd-label-floating-proxy-username" type="text" class="form-control">
                        </div>
                      </div>
					 <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input id="bmd-label-floating-server-password" type="password" class="form-control">
                        </div>
                      </div>
					  
                    </div>
					 </form>
					
					
                    <button type="submit" class="btn btn-primary pull-center" onclick="add_proxy_files()">Add Proxy Files</button>
                    <div class="clearfix"></div>
					  <div id="save-user-data3"></div>
                 
				  
				  
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
                      <span class="nav-tabs-title">	Add Proxy Settings WebShare.io </span>
                    </div>
                  </div>
                </div>
               <div class="card-body">
                  <form >
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Query Limit</label>
                          <input id="bmd-label-floating-query-limit-wb" type="text" class="form-control">
                        </div>
                      </div>
					  <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Proxy URL</label>
                          <input id="bmd-label-floating-proxy-url-wb" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Api Key</label>
                          <input id="bmd-label-floating-proxy-api-wb" type="text" class="form-control">
                        </div>
                      </div>
					 
					  
                    </div>
					 </form>
					
					
                    <button type="submit" class="btn btn-primary pull-center" onclick="add_proxy_files_webshare()">Add Proxy Files</button>
                    <div class="clearfix"></div>
					  <div id="save-user-data3_wb"></div>
                 
				  
				  
                </div>
            </div>
            
        </div>
      </div>     	  
          </div>
		  <style>
		  .select ul li.option {
    background-color: #DEDEDE;
    box-shadow: 0px 1px 0 #DEDEDE, 0px -1px 0 #DEDEDE;
    -webkit-box-shadow: 0px 1px 0 #DEDEDE, 0px -1px 0 #DEDEDE;
    -moz-box-shadow: 0px 1px 0 #DEDEDE, 0px -1px 0 #DEDEDE;
	list-style:none;
	width:100%;
}

.select ul li.option:hover {
    background-color: #B8B8B8;
}




		  </style>