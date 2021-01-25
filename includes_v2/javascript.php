<script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="./vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="./vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="./js/demo/chart-area-demo.js"></script>
    <script src="./js/demo/chart-pie-demo.js"></script>
	<script src="./vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="./vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="./js/demo/datatables-demo.js"></script>
	
	<script>
function GetEmail() {
	var email = document.getElementById("bmd-label-floating-email").value;
	var emailval = validateEmail(email);
	if(emailval == false){
		alert("In-Valid Email Address!");
		return;
	}
	if (email != ""){
		 $("#Email-Validator").html('<img src="loading.gif"> Loading Please Wait...');
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("Email-Validator").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","php_v2/email-validator-list.php?email="+email,true);
        xmlhttp.send();
	}else {
		alert("E-mail Feild Cannot Be Left Blank!");
		//alert("Non Of The Feilds Can Be Left Blank");
		return;
	}
}
function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}
function add_proxy_files_webshare(){
	var querylmt = document.getElementById("bmd-label-floating-query-limit-wb").value; 	
	var proxyurl = document.getElementById("bmd-label-floating-proxy-url-wb").value;
	var proxyapi = document.getElementById("bmd-label-floating-proxy-api-wb").value; 
	
			if(querylmt != "" && proxyurl != "" && proxyapi != ""){
				$("#save-user-data3_wb").html('<img src="loading.gif"> Loading Please Wait...');
		
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
								document.getElementById("save-user-data3_wb").innerHTML = this.responseText;
							//}
								
						}
					
							
						
					}
		
		xmlhttp.open("GET","php_v2/create-proxy-files_webshare.php?&querylmt="+querylmt+"&proxyurl="+proxyurl+"&proxyapi="+proxyapi, true);
		//xmlhttp.open("GET","obflush.php",true);
        xmlhttp.send();
			}else{
				swal("Error!", "None of the fields cannot be left blank And Both Password Should Match!", "error");
			}
	
}
</script>