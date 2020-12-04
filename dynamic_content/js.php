
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  <script src="../assets/js/core/jquery.min.js"></script> -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script src="../assets/js/jquery.form.min.js" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
 
  <script>
function GetUrl() {
	var rcapcosbulknonautou = 1;
	var dual_response_ctrl = 0;
	var comp = document.getElementById("bmd-label-floating").value;
	var cont = document.getElementById("bmd-label-floating2").value;
	if (comp != "" && cont != ""){
		 $("#Company-to-url").html('<img src="786.gif"> Loading Please Wait...');
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("Company-to-url").innerHTML = this.responseText;
            }else if(this.readyState > 2){
				
				if(this.responseText.includes("^*")){
					rcapcosbulknonautou = 2;
					var rdurlbulku = this.responseText.split("^*");
					var rcorrectionbulku = rdurlbulku.length;
					if(dual_response_ctrl != rcorrectionbulku){
						window.open(rdurlbulku[rcorrectionbulku-2]);
						dual_response_ctrl = rcorrectionbulku;
					}else{
						dual_response_ctrl = rcorrectionbulku;
					}
				}
				
			}
        };
        xmlhttp.open("GET","php/company-to-url-list.php?comname="+comp+"&conname="+cont,true);
        xmlhttp.send();
	}else {
		swal("Error!", "Non Of The Felds Can Be Left Empty!", "error");
		//alert("Non Of The Feilds Can Be Left Blank");
		return;
	}
}

</script>
 <script>
function SaveCompanyurl() {
	
	// Use ajax send data to php
	var datacomp = "";
	var datacompbuf = "";
	var data = document.getElementById("c1");
	var data2 = document.getElementById("c2");	
	var data3 = document.getElementById("c3");	
	if(data.checked){
		var sldata = document.getElementById("sl1");
		datacompbuf = document.getElementById("compid").value;
		datacomp += datacompbuf.toUpperCase();
		datacomp += "|";
		datacomp += sldata;
		datacomp += "|";
	}
	if(data2.checked){
		var sldata2 = document.getElementById("sl2");
		var datacompbuf = document.getElementById("compid").value;
		datacomp += datacompbuf.toUpperCase();
		datacomp += "|";
		datacomp += sldata2;
		datacomp += "|";
	}
	if(data3.checked){
		sldata3 = document.getElementById("sl3");
		var datacompbuf = document.getElementById("compid").value;
		datacomp += datacompbuf.toUpperCase();
		datacomp += "|";
		datacomp += sldata3;
		datacomp += "|";
	}
	if(data.checked || data2.checked || data3.checked){
		$("#Email-Validator").html('<img src="786.gif"> Loading Please Wait...');
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("Company-to-url").innerHTML = this.responseText;
            }
        };
		
        xmlhttp.open("GET","php/save-curl.php?urldata="+datacomp,true);
        xmlhttp.send();
	}
		 document.getElementById("Company-to-url").innerHTML = "No Data Selected To Be Saved";
	
}

</script>

<script>
function GetEmail() {
	var email = document.getElementById("bmd-label-floating-email").value;
	var emailval = validateEmail(email);
	if(emailval == false){
		swal("Error!", "In-Valid Email Address!", "error");
		return;
	}
	if (email != ""){
		 $("#Email-Validator").html('<img src="786.gif"> Loading Please Wait...');
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
        xmlhttp.open("GET","php/email-validator-list.php?email="+email,true);
        xmlhttp.send();
	}else {
		swal("Error!", "E-mail Feild Cannot Be Left Blank!", "error");
		//alert("Non Of The Feilds Can Be Left Blank");
		return;
	}
}
function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}
</script>
<script>
function SaveValEmail() {
	// use ajax to pass this the data below to be saved;
	var myEle = document.getElementById("c1");
	var myEle2 = document.getElementById("mc1");
    if(myEle){
		var myEledata = document.getElementById("c1").value;
		alert(myEledata);
    }else if(myEle2){
      var myEledata2 = document.getElementById("mc1").value;
		alert(myEledata2);
    }else{
		alert("No Value Present");
	}
}

</script>
 <script>
function EmailPermuator() {
	
	var fname = document.getElementById("bmd-label-floating-fname").value;
	var mname =	document.getElementById("bmd-label-floating-mname").value;
	var lname = document.getElementById("bmd-label-floating-lname").value;
	var curl = document.getElementById("bmd-label-floating-curl").value;
	if (fname != "" && lname != "" && curl != ""){
		 $("#Email-Permuator").html('<img src="786.gif"> Loading Please Wait...');
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("Email-Permuator").innerHTML = this.responseText;
            }
        };
		if(mname != ""){
			xmlhttp.open("GET","php/email-permuator.php?fname="+fname+"&mname="+mname+"&lname="+lname+"&curl="+curl,true);
		}else{
			xmlhttp.open("GET","php/email-permuator.php?fname="+fname+"&mname=&lname="+lname+"&curl="+curl,true);
		}
        
        xmlhttp.send();
	}else {
		swal("Error!", "First name, last Name and Company Url Cannot Be Left Blank!", "error");
		//alert("Non Of The Feilds Can Be Left Blank");
		return;
	}
}

</script>
<script>
function Saveemailpermuator() {
	// use ajax here to get all check box value and sent it
	var tval = document.getElementById("tval").value;
	for(var i=1;i<tval;i++){
		tval2 = document.getElementById("ch"+i);
		if(tval2.checked){
			alert(tval2.value);
		}
	}
	return;
}
function checkall(){
	var tval = document.getElementById("tval").value;
	//alert(tval);
	//tval3 = tval-1;
	tval3 = tval;
	var tvalmain = document.getElementById("main");
	if (tvalmain.checked){
		for(var i=1;i!=tval3;i++){
		tval2 = document.getElementById("ch"+i);
		tval2.checked = true;
		}
	}else{
		for(var i=1;i<tval3;i++){
		tval2 = document.getElementById("ch"+i);
		tval2.checked = false;
		}
	}
	
}
function getbulkemail(){
	var rcapcosbulknonauto = 1;
	var dual_response_ctrl = 0;
	var curl = document.getElementById("bmd-label-floating-url").value;
	if (curl != ""){
		 $("#Email-Bulk-List").html('<img src="786.gif"> Loading Please Wait...');
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            //if (this.readyState == 4 && this.status == 200) {
             //   document.getElementById("Email-Bulk-List").innerHTML = this.responseText;
            //}
			xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
					
					document.getElementById("Email-Bulk-List").innerHTML = this.responseText;
					
                
            }else if(this.readyState > 2){
				
				if(this.responseText.includes("^*")){
					rcapcosbulknonauto = 2;
					var rdurlbulk = this.responseText.split("^*");
					var rcorrectionbulk = rdurlbulk.length;
					if(dual_response_ctrl != rcorrectionbulk){
						window.open(rdurlbulk[rcorrectionbulk-2]);
						dual_response_ctrl = rcorrectionbulk;
					}else{
						dual_response_ctrl = rcorrectionbulk;
					}
				}
				
			}
			
}
        };
		
		xmlhttp.open("GET","php/bulk-email-search.php?&curl="+curl,true);
        xmlhttp.send();
	}else {
		swal("Error!", "URL field cannot be left blank!", "error");
		//alert("Non Of The Feilds Can Be Left Blank");
		return;
	}
}
function SaveBulkEmails(){
	var mainval ="";
	var tval = document.getElementById("tval").value;
	tval = tval-1;
	var ctr=1;
	for(var i=0;i<tval;i++){
		mainval += document.getElementById("sl"+ctr).value;
		mainval +="|";
		ctr++;
	}
	if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            //if (this.readyState == 4 && this.status == 200) {
             //   document.getElementById("Email-Bulk-List").innerHTML = this.responseText;
            //}
			xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
					
					document.getElementById("Email-Bulk-List").innerHTML = this.responseText;
					
                
            }
			
}
        };
		
		xmlhttp.open("GET","php/bulk-email-save-to-campagin.php?bulkemailtosave="+mainval,true);
        xmlhttp.send();
}
function Customsearch(){
	var rcap = 1;
	var out = "^*";
	var out2 = "";
	var out3 = "";
	var cname = document.getElementById("bmd-label-floating-cname").value;
	var curl = document.getElementById("bmd-label-floating-curl").value;
	if(cname != "" && curl != ""){
		$("#custom-email-search").html('<img src="786.gif"> Loading Please Wait...');
		
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				//document.getElementById("custom-email-search").innerHTML = this.responseText;
				//if(this.responseText.includes("^*")){
					//var rdurl = this.responseText.split("^*");
					//window.open(rdurl[1]);
					//alert(rdurl);
					//document.getElementById("custom-email-search").innerHTML = this.responseText;
				//}else{
					if(rcap == 2){
						out2 = this.responseText;
						out3 += out2.replace(out, "");
					}else if(rcap == 1){
						out2 = this.responseText;
						out3 += out2;
					}
					document.getElementById("custom-email-search").innerHTML = out3;
				//}
                
            }else if(this.readyState > 2 && rcap == 1){
				if(this.responseText.includes("^*")){
					rcap = 2;
					
					var rdurl = this.responseText.split("^*");
					window.open(rdurl[1]);
					out += rdurl[0] + rdurl[1];
					//alert(out);
					
					//alert(rdurl);
					//document.getElementById("custom-email-search").innerHTML = this.responseText;
					//document.getElementById("custom-email-search").innerHTML = this.responseText;
				}
				
			}
		
				
			
        }
		
		xmlhttp.open("GET","php/custome-email-manual-search.php?&compname="+cname+"&compurl="+curl,true);
		//xmlhttp.open("GET","obflush.php",true);
        xmlhttp.send();
	}else {
		swal("Error!", "Non of The Feilds Can Be Left Blank!", "error");
	}
}

$("#upload-file").on("click", function() {
		var rcapcosbulk = 1;
		var outcosbulk = "Data Saved Sucessfully";
		var outcosbulk2 = "";
		var outcosbulk3 = "";
        var property = document.getElementById('inputGroupFile01').files[0];
        var file_name = property.name;
        var file_extension = file_name.split('.').pop().toLowerCase();
		var dual_response_ctrl = 0;

        if(jQuery.inArray(file_extension,['xlsx']) == -1){
          alert("Invalid file Format, Supports only 'xlsx' Format 'Microsoft Office 2003 and above files'");
		  return;
        }

        var form_data = new FormData();
        form_data.append("file",property);
		$("#custom-auto-email-search").html('<img src="786.gif"> Loading Please Wait...');
       if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
					//if(rcapcosbulk == 2){
						///outcosbulk2 = this.responseText;
						//outcosbulk3 += outcosbulk2.replace(outcosbulk, "");
					//}else if(rcapcosbulk == 1){
						//outcosbulk2 = this.responseText;
					//	outcosbulk3 += outcos2;
					//}
					//document.getElementById("custom-auto-email-search").innerHTML = outcosbulk;
					document.getElementById("custom-auto-email-search").innerHTML = this.responseText;
				//}
                
            }else if(this.readyState > 2){
				
				if(this.responseText.includes("^*")){
					rcapcosbulk = 2;
					var rdurlbulk = this.responseText.split("^*");
					var rcorrectionbulk = rdurlbulk.length;
					if(dual_response_ctrl != rcorrectionbulk){
						window.open(rdurlbulk[rcorrectionbulk-2]);
						dual_response_ctrl = rcorrectionbulk;
					}else{
						dual_response_ctrl = rcorrectionbulk;
					}
				}
				
				
				
				
				
				
				
				//if(this.responseText.includes("^*")){
				//	rcapcos = 2;
				///	var rdurl = this.responseText.split("^*");
				//	var rcorrection = rdurl.length;
				//	console.log(rcorrection);
				//	window.open(rdurl[rcorrection-2]);
				//	if(rcorrection-1 == 1){
				///	outcosbulk += rdurl[0] + rdurl[1];	
				//	}else{
				//		outcosbulk += rdurl[rcorrection-1];
				//	}
					
				//}
				
			}
			
}
	xmlhttp.open("POST", "php/upload.php", true);
	xmlhttp.send(form_data);
});

///===============================================================================================

$("#upload-file-c2url").on("click", function() {
		
		var outcosbulk = "Data Saved Sucessfully";
        var property = document.getElementById('inputGroupFile01c2urlauto').files[0];
        var file_name = property.name;
        var file_extension = file_name.split('.').pop().toLowerCase();
		

        if(jQuery.inArray(file_extension,['xlsx']) == -1){
          alert("Invalid file Format, Supports only 'xlsx' Format 'Microsoft Office 2003 and above files'");
		  return;
        }

        var form_data = new FormData();
        form_data.append("file",property);
		$("#custom-auto-company-to-url").html('<img src="786.gif"> Loading Please Wait...');
       if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
					
					document.getElementById("custom-auto-company-to-url").innerHTML = this.responseText;
				//}
                
            }else if(this.readyState > 2){
				document.getElementById("custom-auto-company-to-url").innerHTML = this.responseText;
				
				
			}
			
}
	xmlhttp.open("POST", "php/upload-c2urlauto.php", true);
	xmlhttp.send(form_data);
});
//========================================================================================================
$("#upload-file-validate").on("click", function() {
		var outcosbulk = "Data Saved Sucessfully";
        var property = document.getElementById('inputGroupFile01c2urlauto').files[0];
        var file_name = property.name;
        var file_extension = file_name.split('.').pop().toLowerCase();
		

        if(jQuery.inArray(file_extension,['xlsx']) == -1){
          alert("Invalid file Format, Supports only 'xlsx' Format 'Microsoft Office 2003 and above files'");
		  return;
        }

        var form_data = new FormData();
        form_data.append("file",property);
		$("#mail-val-filter").html('<img src="786.gif"> Loading Please Wait...');
       if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
					
					document.getElementById("mail-val-filter").innerHTML = this.responseText;
				//}
                
            }else if(this.readyState > 2){
				document.getElementById("mail-val-filter").innerHTML = this.responseText;
				
				
			}
			
}
	xmlhttp.open("POST", "php/upload-mailautoval.php", true);
	xmlhttp.send(form_data);
});
//========================================================================================================
$("#upload-file-validate").on("click", function() {
		var outcosbulk = "Data Saved Sucessfully";
        var property = document.getElementById('inputGroupFile01c2urlauto').files[0];
        var file_name = property.name;
        var file_extension = file_name.split('.').pop().toLowerCase();
		

        if(jQuery.inArray(file_extension,['xlsx']) == -1){
          alert("Invalid file Format, Supports only 'xlsx' Format 'Microsoft Office 2003 and above files'");
		  return;
        }

        var form_data = new FormData();
        form_data.append("file",property);
		$("#mail-val-filter").html('<img src="786.gif"> Loading Please Wait...');
       if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
					
					document.getElementById("mail-val-filter").innerHTML = this.responseText;
				//}
                
            }else if(this.readyState > 2){
				document.getElementById("mail-val-filter").innerHTML = this.responseText;
				
				
			}
			
}
	xmlhttp.open("POST", "php/upload-mailautoval.php", true);
	xmlhttp.send(form_data);
});
//==============================================================================upload-file-validate-turbo
$("#upload-file-validate-turbo").on("click", function() {
		var outcosbulk = "Data Saved Sucessfully";
        var property = document.getElementById('inputGroupFile01c2urlauto').files[0];
        var file_name = property.name;
        var file_extension = file_name.split('.').pop().toLowerCase();
		

        if(jQuery.inArray(file_extension,['xlsx']) == -1){
          alert("Invalid file Format, Supports only 'xlsx' Format 'Microsoft Office 2003 and above files'");
		  return;
        }

        var form_data = new FormData();
        form_data.append("file",property);
		$("#mail-val-filter").html('<img src="786.gif"> Loading Please Wait...');
       if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
					
					document.getElementById("mail-val-filter").innerHTML = this.responseText;
				//}
                
            }else if(this.readyState > 2){
				document.getElementById("mail-val-filter").innerHTML = this.responseText;
				
				
			}
			
}
	xmlhttp.open("POST", "php/upload-mailautoval-turbo.php", true);
	xmlhttp.send(form_data);
});

//========================================================================================================
$("#upload-file-c2url_google_proxy").on("click", function() {
		
		var outcosbulk = "Data Saved Sucessfully";
        var property = document.getElementById('inputGroupFile01c2urlauto').files[0];
        var file_name = property.name;
        var file_extension = file_name.split('.').pop().toLowerCase();
		

        if(jQuery.inArray(file_extension,['xlsx']) == -1){
          alert("Invalid file Format, Supports only 'xlsx' Format 'Microsoft Office 2003 and above files'");
		  return;
        }

        var form_data = new FormData();
        form_data.append("file",property);
		$("#custom-auto-company-to-url").html('<img src="786.gif"> Loading Please Wait...');
       if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
					
					document.getElementById("custom-auto-company-to-url").innerHTML = this.responseText;
				//}
                
            }else if(this.readyState > 2){
				document.getElementById("custom-auto-company-to-url").innerHTML = this.responseText;
				
				
			}
			
}
	xmlhttp.open("POST", "php/upload-c2urlauto-proxy.php", true);
	xmlhttp.send(form_data);
});

///===============================================================================================

$("#upload-file-mailval").on("click", function() {
		var resprocess = "";
		var resprocessfinal = "";
		var outcosbulk = "Data Saved Sucessfully";
        var property = document.getElementById('inputGroupFile01mailval').files[0];
        var file_name = property.name;
        var file_extension = file_name.split('.').pop().toLowerCase();
		

        if(jQuery.inArray(file_extension,['xlsx']) == -1){
          alert("Invalid file Format, Supports only 'xlsx' Format 'Microsoft Office 2003 and above files'");
		  return;
        }

        var form_data = new FormData();
        form_data.append("file",property);
		$("#mail-valdiation-tool").html('<img src="786.gif"> Loading Please Wait...');
       if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
					
					document.getElementById("mail-valdiation-tool").innerHTML = this.responseText;
				//}
                
            }else if(this.readyState > 2){
				if(this.responseText.includes("^*&")){
				resprocessfinal = this.responseText.split("^*&");
				document.getElementById("mail-valdiation-tool-progress-bar").innerHTML = resprocessfinal[resprocessfinal.length-2];// resprocessfinal[resprocessfinal.length-1];
				}else{
					document.getElementById("mail-valdiation-tool-progress-bar").innerHTML = "";//this.responseText;
				}
			}
			
}
	xmlhttp.open("POST", "php/upload-mailval.php", true);
	xmlhttp.send(form_data);
});



//==================================================================================================



$("#upload-file-2").on("click", function() {
		var rcapcos = 1;
	var outcos = "Data Saved To File";
	var outcos2 = "";
	var outcos3 = "";
	var response_handler = "";
	var response_handler_2 = "";
	var response_handler_3 = "";
	var dual_response_ctrl = 0;
	
        var property = document.getElementById('inputGroupFile01').files[0];
        var file_name = property.name;
        var file_extension = file_name.split('.').pop().toLowerCase();

        if(jQuery.inArray(file_extension,['xlsx']) == -1){
          alert("Invalid file Format, Supports only 'xlsx' Format 'Microsoft Office 2003 and above files'");
		  return;
        }
		$("#custom-auto-email-search").html('<img src="786.gif"> Loading Please Wait...');
        var form_data = new FormData();
        form_data.append("file",property);
       if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				//if(rcapcos == 2){
						//outcos2 = this.responseText;
						//outcos3 += outcos2.replace(outcos, "");
					//}else if(rcapcos == 1){
						//outcos2 = this.responseText;
						//outcos3 += outcos2;
					//}
					document.getElementById("custom-auto-email-search").innerHTML = this.responseText;
				//}
                
            }else if(this.readyState > 2){
				
				if(this.responseText.includes("^*")){
					rcapcos = 2;
					var rdurl = this.responseText.split("^*");
					var rcorrection = rdurl.length;
					if(dual_response_ctrl != rcorrection){
						window.open(rdurl[rcorrection-2]);
						dual_response_ctrl = rcorrection;
					}else{
						dual_response_ctrl = rcorrection;
					}
					
					
					
					
					///////////////////////////////////////////////////////////////////////////////////
					//rcapcos = 2;
					//var rdurl = this.responseText.split("^*");
					//var rcorrection = rdurl.length;
					//console.log(rcorrection);
					//window.open(rdurl[rcorrection-2]);
					//if(rcorrection-1 == 1){
					//outcos += rdurl[0] + rdurl[1];	
					//}else{
						//outcos += rdurl[rcorrection-1];
					//}
					//////////////////////////////////////////////////////////////////////////////////
					//alert(out);
					
					//alert(rdurl);
					//document.getElementById("custom-email-search").innerHTML = this.responseText;
					//document.getElementById("custom-email-search").innerHTML = this.responseText;
				}
			}
			
}
	xmlhttp.open("POST", "php/upload-custom.php", true);
	xmlhttp.send(form_data);
      });
//================================================================Proxy==================================================
$("#upload-file-proxy").on("click", function() {
		var rcapcosbulk = 1;
		var outcosbulk = "Data Saved Sucessfully";
		var outcosbulk2 = "";
		var outcosbulk3 = "";
        var property = document.getElementById('inputGroupFile01').files[0];
        var file_name = property.name;
        var file_extension = file_name.split('.').pop().toLowerCase();
		var dual_response_ctrl = 0;

        if(jQuery.inArray(file_extension,['xlsx']) == -1){
          alert("Invalid file Format, Supports only 'xlsx' Format 'Microsoft Office 2003 and above files'");
		  return;
        }

        var form_data = new FormData();
        form_data.append("file",property);
		$("#custom-auto-email-search").html('<img src="786.gif"> Loading Please Wait...');
       if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
					//if(rcapcosbulk == 2){
						///outcosbulk2 = this.responseText;
						//outcosbulk3 += outcosbulk2.replace(outcosbulk, "");
					//}else if(rcapcosbulk == 1){
						//outcosbulk2 = this.responseText;
					//	outcosbulk3 += outcos2;
					//}
					//document.getElementById("custom-auto-email-search").innerHTML = outcosbulk;
					document.getElementById("custom-auto-email-search").innerHTML = this.responseText;
				//}
                
            }else if(this.readyState > 2){
				
				if(this.responseText.includes("^*")){
					rcapcosbulk = 2;
					var rdurlbulk = this.responseText.split("^*");
					var rcorrectionbulk = rdurlbulk.length;
					if(dual_response_ctrl != rcorrectionbulk){
						window.open(rdurlbulk[rcorrectionbulk-2]);
						dual_response_ctrl = rcorrectionbulk;
					}else{
						dual_response_ctrl = rcorrectionbulk;
					}
				}
				
				
				
				
				
				
				
				//if(this.responseText.includes("^*")){
				//	rcapcos = 2;
				///	var rdurl = this.responseText.split("^*");
				//	var rcorrection = rdurl.length;
				//	console.log(rcorrection);
				//	window.open(rdurl[rcorrection-2]);
				//	if(rcorrection-1 == 1){
				///	outcosbulk += rdurl[0] + rdurl[1];	
				//	}else{
				//		outcosbulk += rdurl[rcorrection-1];
				//	}
					
				//}
				
			}
			
}
	xmlhttp.open("POST", "php/upload-bulk-proxy.php", true);
	xmlhttp.send(form_data);
});

//==========================================================================================================================
$("#upload-file-2-proxy").on("click", function() {
		var rcapcos = 1;
	var outcos = "Data Saved To File";
	var outcos2 = "";
	var outcos3 = "";
	var response_handler = "";
	var response_handler_2 = "";
	var response_handler_3 = "";
	var dual_response_ctrl = 0;
	
        var property = document.getElementById('inputGroupFile01').files[0];
        var file_name = property.name;
        var file_extension = file_name.split('.').pop().toLowerCase();

        if(jQuery.inArray(file_extension,['xlsx']) == -1){
          alert("Invalid file Format, Supports only 'xlsx' Format 'Microsoft Office 2003 and above files'");
		  return;
        }
		$("#custom-auto-email-search").html('<img src="786.gif"> Loading Please Wait...');
        var form_data = new FormData();
        form_data.append("file",property);
       if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				//if(rcapcos == 2){
						//outcos2 = this.responseText;
						//outcos3 += outcos2.replace(outcos, "");
					//}else if(rcapcos == 1){
						//outcos2 = this.responseText;
						//outcos3 += outcos2;
					//}
					document.getElementById("custom-auto-email-search").innerHTML = this.responseText;
				//}
                
            }else if(this.readyState > 2){
				
				if(this.responseText.includes("^*")){
					rcapcos = 2;
					var rdurl = this.responseText.split("^*");
					var rcorrection = rdurl.length;
					if(dual_response_ctrl != rcorrection){
						window.open(rdurl[rcorrection-2]);
						dual_response_ctrl = rcorrection;
					}else{
						dual_response_ctrl = rcorrection;
					}
					
					
					
					
					///////////////////////////////////////////////////////////////////////////////////
					//rcapcos = 2;
					//var rdurl = this.responseText.split("^*");
					//var rcorrection = rdurl.length;
					//console.log(rcorrection);
					//window.open(rdurl[rcorrection-2]);
					//if(rcorrection-1 == 1){
					//outcos += rdurl[0] + rdurl[1];	
					//}else{
						//outcos += rdurl[rcorrection-1];
					//}
					//////////////////////////////////////////////////////////////////////////////////
					//alert(out);
					
					//alert(rdurl);
					//document.getElementById("custom-email-search").innerHTML = this.responseText;
					//document.getElementById("custom-email-search").innerHTML = this.responseText;
				}
			}
			
}
	xmlhttp.open("POST", "php/upload-custom-proxy.php", true);
	xmlhttp.send(form_data);
      });



//===========================================================================================================================
function CreateCampaign(){
	var campname= document.getElementById("bmd-label-floating-camp-name").value;
	var campcat = document.getElementById("bmd-label-floating-camp-cat").value;
	if(campname != "" && campcat != ""){
		$("#Campaign-List").html('<img src="786.gif"> Loading Please Wait...');
		
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
					document.getElementById("Campaign-List").innerHTML = this.responseText;
				//}
					if(this.responseText.includes("^*")){
						window.location = "create_camp_name.php" ;
					}
            }
		
				
			
        }
		
		xmlhttp.open("GET","php/create_campagin.php?&campname="+campname+"&campcat="+campcat,true);
		//xmlhttp.open("GET","obflush.php",true);
        xmlhttp.send();
	}else{
		swal("Error!", "URL field cannot be left blank!", "error");
	}
	
	
}
function leadsubmit(){
	var ldname= document.getElementById("cname").value; 	
	var ldurl = document.getElementById("curl").value;
	var lfname = document.getElementById("fname").value; 
	var llname = document.getElementById("lname").value; 
	var lpersontitle = document.getElementById("persontitle").value;
	var lemail = document.getElementById("email").value;
	var lphone = document.getElementById("phone").value;
	var lfollowup = document.getElementById("Followup").value;
	var lfollowup2 =  encodeURIComponent(lfollowup);
			if(ldname != "" && ldurl != "" && lfname != "" && llname != "" && lpersontitle != "" && lemail != "" && lphone != "" && fileupload != "" && lfollowup != ""){
				$("#save-list").html('<img src="786.gif"> Loading Please Wait...');
						
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
								document.getElementById("save-list").innerHTML = this.responseText;
							//}
								
						}
					
							
						
					}
		
		xmlhttp.open("GET","php/save-leadinfo.php?&ldname="+ldname+"&ldurl="+ldurl+"&lfname="+lfname+"&llname="+llname+"&lpersontitle="+lpersontitle+"&lemail="+lemail+"&lphone="+lphone+"&lfollowup="+lfollowup2,true);
		//xmlhttp.open("GET","obflush.php",true);
        xmlhttp.send();
			}else{
				swal("Error!", "None of the fields cannot be left blank!", "error");
			}
			

}
function leadpostsubmit(){
	var leadname = document.getElementById("lename").value; 
	var ldname= document.getElementById("cname").value; 	
	var ldurl = document.getElementById("curl").value;
	var lfname = document.getElementById("fname").value; 
	var llname = document.getElementById("lname").value; 
	var lpersontitle = document.getElementById("persontitle").value;
	var lemail = document.getElementById("email").value;
	var lphone = document.getElementById("phone").value;
	var lfollowup = document.getElementById("Followup").value;
	var lfollowup2 =  encodeURIComponent(lfollowup);
	 var property = document.getElementById('inputGroupFile01').files[0];
        var file_name = property.name;
        var file_extension = file_name.split('.').pop().toLowerCase();
		if(ldname != "" && ldurl != "" && lfname != "" && llname != "" && lpersontitle != "" && lemail != "" && lphone != "" && file_name != "" && lfollowup != ""){
				
		}else{
			swal("Error!", "None of the fields cannot be left blank!", "error");
			return;
		}
        if(jQuery.inArray(file_extension,['xlsx']) == -1){
          alert("Invalid file Format, Supports only 'xlsx' Format 'Microsoft Office 2003 and above files'");
		  return;
        }
	$("#save-list").html('<img src="786.gif"> Loading Please Wait...');
	 var form_data = new FormData();
	form_data.append("leadname",leadname);
	form_data.append("ldname",ldname);
	form_data.append("ldurl",ldurl);
	form_data.append("lfname",lfname);
	form_data.append("llname",llname);
	form_data.append("lpersontitle",lpersontitle);
	form_data.append("lemail",lemail);
	form_data.append("lphone",lphone);
	form_data.append("file",property);
	form_data.append("lfollowup",lfollowup);
	
	if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
								document.getElementById("save-list").innerHTML = this.responseText;
							//}
								
						}
					
							
						
					}
		
		xmlhttp.open("POST","php/save-post-leadinfo.php",true);
		//xmlhttp.open("GET","obflush.php",true);
        xmlhttp.send(form_data);
}
function deleteRow(clicked_id){
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				if(this.responseText == "^~"){
					window.location = "dash_board.php" ;
				}
            }
        };
        xmlhttp.open("GET","php/del-row.php?data="+clicked_id,true);
        xmlhttp.send();
}
function deleteRowPitch(clicked_id){
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				if(this.responseText == "^~"){
					console.log(this.responseText);
					window.location = "list-page.php" ;
				}
            }
        };
        xmlhttp.open("GET","php/del-row-pitch.php?data="+clicked_id,true);
        xmlhttp.send();
}
function Savesubjectpitch(){
	var campain = document.getElementById("sel2").value; 	
	var subject = document.getElementById("subject-line").value;
	var pitch = document.getElementById("Pitch").value; 
	var pitchencode =  encodeURIComponent(pitch);
	if(campain != "No Data Available" && subject != "" && pitchencode != ""){
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				if(this.responseText == "^*"){
					window.location = "pitch-exists.php";
					console.log(this.responseText);
				}else{
					console.log(this.responseText);
					window.location = "list-page.php";
				}
            }
        };
        xmlhttp.open("GET","php/pitch-subject.php?&campain="+campain+"&sub="+subject+"&pitch="+pitchencode,true);
        xmlhttp.send();
	}else{
		swal("Error!", "None of the fields cannot be left blank!", "error");
	}
}
function deletefile(id){
	var file_path = id;
	var txt;
  var r = confirm("Are You Sure? Once Deleted Cannot Be Restored");
  if (r == true) {
	  if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				if(this.responseText == "^~"){
					console.log(this.responseText);
					window.location = "view-files.php";
				}
            }
        };
        xmlhttp.open("GET","php/del-file.php?data="+file_path,true);
        xmlhttp.send();
   
  } 
  
}
function add_user(){
	var uname = document.getElementById("bmd-label-floating-uname").value; 	
	var pass1 = document.getElementById("bmd-label-floating-pass1").value;
	var pass2 = document.getElementById("bmd-label-floating-pass2").value; 
	var access = document.getElementById("access").value; 
	var status = document.getElementById("status").value;
	var associate = document.getElementById("associate").value;
	
			if(uname != "" && pass1 != "" && pass2 != "" && access != "" && status != "" && associate != "" && pass1 == pass2){
				$("#save-user-data").html('<img src="786.gif"> Loading Please Wait...');
		
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
								document.getElementById("save-user-data").innerHTML = this.responseText;
							//}
								
						}
					
							
						
					}
		
		xmlhttp.open("GET","php/save-userinfo.php?&uname="+uname+"&pass1="+pass1+"&pass2="+pass2+"&access="+access+"&status="+status+"&associate="+associate,true);
		//xmlhttp.open("GET","obflush.php",true);
        xmlhttp.send();
			}else{
				swal("Error!", "None of the fields cannot be left blank And Both Password Should Match!", "error");
			}
  
}
function add_proxy_files(){
	var querylmt = document.getElementById("bmd-label-floating-query-limit").value; 	
	var proxyurl = document.getElementById("bmd-label-floating-proxy-url").value;
	var proxyuname = document.getElementById("bmd-label-floating-proxy-username").value; 
	var proxypass = document.getElementById("bmd-label-floating-server-password").value; 
	
	
			if(querylmt != "" && proxyurl != "" && proxyuname != "" && proxypass != ""){
				$("#save-user-data3").html('<img src="786.gif"> Loading Please Wait...');
		
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
								document.getElementById("save-user-data3").innerHTML = this.responseText;
							//}
								
						}
					
							
						
					}
		
		xmlhttp.open("GET","php/create-proxy-files.php?&querylmt="+querylmt+"&proxyurl="+proxyurl+"&proxyuname="+proxyuname+"&proxypass="+proxypass, true);
		//xmlhttp.open("GET","obflush.php",true);
        xmlhttp.send();
			}else{
				swal("Error!", "None of the fields cannot be left blank And Both Password Should Match!", "error");
			}
}
function add_proxy_files_webshare(){
	var querylmt = document.getElementById("bmd-label-floating-query-limit-wb").value; 	
	var proxyurl = document.getElementById("bmd-label-floating-proxy-url-wb").value;
	var proxyapi = document.getElementById("bmd-label-floating-proxy-api-wb").value; 
	
			if(querylmt != "" && proxyurl != "" && proxyapi != ""){
				$("#save-user-data3_wb").html('<img src="786.gif"> Loading Please Wait...');
		
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
		
		xmlhttp.open("GET","php/create-proxy-files_webshare.php?&querylmt="+querylmt+"&proxyurl="+proxyurl+"&proxyapi="+proxyapi, true);
		//xmlhttp.open("GET","obflush.php",true);
        xmlhttp.send();
			}else{
				swal("Error!", "None of the fields cannot be left blank And Both Password Should Match!", "error");
			}
	
}
function getPaging(valuea){
	document.getElementById("bmd-label-floating-uname2").value = valuea;
	 $("#dp").hide();
	 if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
								var res = this.responseText;
								var res2 = res.split("|");
								document.getElementById("bmd-label-floating-username").value = res2[1];
								document.getElementById("bmd-label-floating-sl").value = res2[0];
								document.getElementById("bmd-label-floating-passb2").value = res2[2];
								document.getElementById("bmd-label-floating-passbc2").value = res2[2];
								
							//}
								
						}
					
							
						
					}
		xmlhttp.open("GET","php/getuserdetails.php?&search="+valuea,true);
		//xmlhttp.open("GET","obflush.php",true);
        xmlhttp.send();
	

}
function search(){
 if(document.getElementById("bmd-label-floating-uname2").value.length > 2){
	 $("#dp").show();
	 var inp = document.getElementById("bmd-label-floating-uname2").value;
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
								document.getElementById("dp").innerHTML = this.responseText;
							//}
								
						}
					
							
						
					}
		xmlhttp.open("GET","php/livesearch.php?&search="+inp,true);
		//xmlhttp.open("GET","obflush.php",true);
        xmlhttp.send();
 }else{
	 return;
 }
}
function edit_user_acc(){
	var sl = document.getElementById("bmd-label-floating-sl").value; 
	var uname = document.getElementById("bmd-label-floating-username").value; 	
	var pass1 = document.getElementById("bmd-label-floating-passb2").value;
	var pass2 = document.getElementById("bmd-label-floating-passbc2").value; 
	var access = document.getElementById("access2").value; 
	var status = document.getElementById("status2").value;
	var associate = document.getElementById("associate2").value;
	
			if(uname != "" && pass1 != "" && pass2 != "" && access != "" && status != "" && associate != "" && pass1 == pass2){
				$("#save-user-data2").html('<img src="786.gif"> Loading Please Wait...');
		
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
								document.getElementById("save-user-data2").innerHTML = this.responseText;
							//}
								
						}
					
							
						
					}
		
		xmlhttp.open("GET","php/edit-userinfo.php?&sl="+sl+"&uname="+uname+"&pass1="+pass1+"&pass2="+pass2+"&access="+access+"&status="+status+"&associate="+associate,true);
		//xmlhttp.open("GET","obflush.php",true);
        xmlhttp.send();
			}else{
				swal("Error!", "None of the fields cannot be left blank And Both Password Should Match!", "error");
			}
  
}

</script>