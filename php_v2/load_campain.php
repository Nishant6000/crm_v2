<?php include("../db_v2/config.php");
$table_name = "campaign";
if (isset($_POST["submit"])) {
	
	$camp_name_sel = $_POST['campnamepicked'];
	$camp_name = $_POST['camp_name'];
	$search_type = $_POST['optradio'];
	$username = $_POST["username"];
	$target_dir = "../campagin_db_v2/".$username;
	$target_dir2 = "../campagin_db_v2/".$username."/";
				if (!file_exists($target_dir)) {
					mkdir($target_dir, 0777, true);
				}
				$target_file = $target_dir2 . basename($_FILES["fileupload"]["name"]);
				$file_name_tstore = basename($_FILES["fileupload"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			
				// Check if image file is a actual image or fake image
				
				// Check if file already exists
				if (file_exists($target_file)) {
					header('location: ../add-tasks_v2.php?stat=File Name Already Exists. Please Rename and upload again');
					$uploadOk = 0;
				}
				if($imageFileType != "xlsx" && $imageFileType != "csv") {
					header('location: ../add-tasks_v2.php?stat=Sorry, only xlsx files are allowed.');
					$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
					if($camp_name_sel == "SELECT" && $camp_name == NULL){
						header('location: ../add-tasks_v2.php?stat=Campain name or Campain Name Selection cannot be left blank');
					}else{
						if($camp_name != NULL){
							$camp_data_store = $camp_name;
							$camp_data_store = str_ireplace(' ','-',$camp_data_store);
						}else{
							$camp_data_store = $camp_name_sel;
						}
						
						if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
						add_camp_task($camp_data_store, $username, $target_file, $search_type);
							header('location: ../add-tasks_v2.php?stat=File Has Been Uploaded Successfully');
						} else {
							header('location: ../add-tasks_v2.php?stat=File Upload Failed');
						}
					}
					
					
				}
				
				
				
}else{
	header('location: ../add-tasks_v2.php?stat=No Submit, Contact IT');
}

?>