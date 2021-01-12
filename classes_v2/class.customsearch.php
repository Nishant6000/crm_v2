
<?php 
include("class.c2url.php");
class custom_search extends companytourl{

    public static function google_custom_result($country,$company){

    $search = $country.' "head | demand | vp | sales | senior | director | marketing | manager " + '. $company. ' + site:linkedin.com/in OR site:us.linkedin.com -intitle:profiles -inurl:"/dir';
    $status = "2";
    $gcrr = parent::fetch_google_result($search,$status);
    return $gcrr;
    }
	public static function google_custom_result_proxy($country,$company,$no){

    $search = $country.' "head | demand | vp | sales | senior | director | marketing | manager " + '. $company. ' + site:linkedin.com/in OR site:us.linkedin.com -intitle:profiles -inurl:"/dir';
    $status = "2";
    $gcrr = parent::fetch_google_result_via_proxy($search,$status,$no);
    return $gcrr;
    }
    public static function process_google_for_val($data,$company){
        $array = array();
        $i=0;
        $dom = new DOMDocument(1.0);
        @$dom->loadHTML($data);
        $xpath = new DOMXpath($dom);
        $articles = $xpath->query('//div[@class="r"]');  // get googles div class r //kCrYT
          foreach ($articles as $item)
          {
            $item->getElementsByTagName('a'); 
                $itemp = $item->nodeValue;
                $itemp2 = explode("http",$itemp);
                $prv = self::patterncheck($company,$itemp2[0]);
                //echo " % Match --> ";
                //$itemp2[0];
                //echo "</br>";
                //echo "</br>";
                //echo "http";  Please add http 
                //$itemp2[1]  
                $itemp2[1] = str_ireplace("Similar","",$itemp2[1]);
                $itemp2[1] = str_ireplace("- Translate this page","",$itemp2[1]);
                //echo $itemp2[1];
                //echo "</br>";
                //echo "</br>";
                if($prv >= 50){
                    $array[$i] = $itemp2[0];
                    $i++;
                    //$array[$i] = $itemp2[1];
                    //$i++;
                    
                }
          }
          return $array;
          
    }
	public static function process_google_for_val_proxy($data,$company){
        $array = array();
        $i=0;
        $dom = new DOMDocument(1.0);
        @$dom->loadHTML($data);
        $xpath = new DOMXpath($dom);
        $articles = $xpath->query('//div[@class="kCrYT"]');  // get googles div class r //kCrYT
          foreach ($articles as $item)
          {
            $item->getElementsByTagName('a'); 
                $itemp = $item->nodeValue;
                $itemp2 = explode("http",$itemp);
                $prv = self::patterncheck($company,$itemp2[0]);
                //echo " % Match --> ";
                //$itemp2[0];
                //echo "</br>";
                //echo "</br>";
                //echo "http";  Please add http 
                //$itemp2[1]  
                $itemp2[1] = str_ireplace("Similar","",$itemp2[1]);
                $itemp2[1] = str_ireplace("- Translate this page","",$itemp2[1]);
                //echo $itemp2[1];
                //echo "</br>";
                //echo "</br>";
                if($prv >= 50){
                    $array[$i] = $itemp2[0];
                    $i++;
                    //$array[$i] = $itemp2[1];
                    //$i++;
                    
                }
          }
          return $array;
          
    }
    public static function patterncheck($val,$val2){
        $cscanvar ="";
        if(strstr($val," ")){
            //echo "Space EXISTS";
            $comp = explode(" ",$val);
            $compcnt = count($comp);
            $compcnt2 = count($comp)-1;
            $compcnt3 = count($comp);
            if ($comp[$compcnt2] == ""){
                //echo "UnWanted Space Exists";
                //echo "</br>";
                $compcnt = $compcnt2;
                //echo "</br>";
                $compcnt3 = $compcnt3-1;
            }
            else{
                //echo "</br>";
                $compcnt = $compcnt2;
                //echo "</br>";
                $compcnt3 = $compcnt3;
            }
            $weightage = 100 / $compcnt3;
            $finalweight = 0;
            for($i=0;$i<$compcnt3;$i++){
                $cscanvar .= $comp[$i];
                //echo $compcnt;
                //echo "</br>";
               if ($i != $compcnt){
                $cscanvar .= " "; 
                //echo $compcnt;
                //echo "</br>";
               }
               //echo $cscanvar;
               //echo "</br>";
               if(preg_match("/{$cscanvar}/i", $val2)) {
                $finalweight =  $weightage + $finalweight;
                }
              
            }
            }else {
                if(preg_match("/{$val}/i", $val2)) {
                   $finalweight = 100;
                }else{
                    $finalweight = 0;
                }
            }
            return $finalweight;
            
        }

    public static function emailpremuator($fname,$mname,$lname,$domain){
            $domainp = parent::get_domain($domain);
            $eparray = array();
            $epc = 0;
            if ($mname == "" && $lname == ""){
                $fnames = strtolower($fname);
                $fname1d = $fnames[0];
                $eparray[$epc] = $fnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fname1d."@".$domainp;
                $epc++;
                return $eparray;
            }else if ($mname == ""){
                $fnames = strtolower($fname);
                $lnames = strtolower($lname);
                $fname1d = $fnames[0];
                $lname1d = $lnames[0];
                $eparray[$epc] = $fnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fnames.$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fnames.".".$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fname1d.$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fname1d.".".$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fnames.$lname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $fnames.".".$lname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $fname1d.$lname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $fname1d.".".$lname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $lnames.$fnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $lnames.".".$fnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $lnames.$fname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $lnames.".".$fname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $lname1d.$fnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $lname1d.".".$fnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $lname1d.$fname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $lname1d.".".$fname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $fnames."-".$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fname1d."-".$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fnames."-".$lname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $fname1d."-".$lname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $lnames."-".$fnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $lnames."-".$fname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $lname1d."-".$fnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $lname1d."-".$fname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $fnames."_".$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fname1d."_".$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fnames."_".$lname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $fname1d."_".$lname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $lnames."_".$fnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $lnames."_".$fname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $lname1d."_".$fnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $lname1d."_".$fname1d."@".$domainp;
                $epc++;
                return $eparray;

            }else{
                $fnames = strtolower($fname);
                $mnames = strtolower($mname);
                $lnames = strtolower($lname);
                $fname1d = $fnames[0];
                $mname1d = $mnames[0];
                $lname1d = $lnames[0];
                $eparray[$epc] = $fnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fnames.$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fnames.".".$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fname1d.$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fname1d.".".$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fnames.$lname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $fnames.".".$lname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $fname1d.$lname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $fname1d.".".$lname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $lnames.$fnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $lnames.".".$fnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $lnames.$fname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $lnames.".".$fname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $lname1d.$fnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $lname1d.".".$fnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $lname1d.$fname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $lname1d.".".$fname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $fnames."-".$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fname1d."-".$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fnames."-".$lname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $fname1d."-".$lname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $lnames."-".$fnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $lnames."-".$fname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $lname1d."-".$fnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $lname1d."-".$fname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $fnames."_".$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fname1d."_".$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fnames."_".$lname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $fname1d."_".$lname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $lnames."_".$fnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $lnames."_".$fname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $lname1d."_".$fnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $lname1d."_".$fname1d."@".$domainp;
                $epc++;
                $eparray[$epc] = $fnames."-".$mname1d."-".$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fnames."-".$mnames."-".$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fname1d.$mname1d."_".$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fnames."_".$mname1d."_".$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fnames."_".$mnames."_".$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fnames.$mname1d.$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fnames.".".$mname1d.".".$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fnames.$mnames.$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fnames.".".$mnames.".".$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fname1d.$mname1d.$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fname1d.$mname1d.".".$lnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fname1d.$mname1d."-".$lnames."@".$domainp;
                $epc++;
               return $eparray;
            }
    }
    public static function bfr_email_permuator($name){
        $namearray = explode(" ", $name);
        $carray = count($namearray);
        if($namearray[$carray-1] == ""){
            $carray = $carray - 1;
        } 
        if($carray > 3){
            return false;
        }
        if($carray ==  1){
            $rname[0] = $namearray[0];  
        }else if($carray == 2){
            $rname[0] = $namearray[0];
            $rname[1] = $namearray[1];
        }else if ($carray == 3){
            $rname[0] = $namearray[0];
            $rname[1] = $namearray[1];
            $rname[2] = $namearray[2];
        }
        return $rname;
    }
	public static function emailpremuator_pattern($fname,$mname,$lname,$domain,$pattern){ //patern 1 is all with dots, pattern 2 all with dash, pattern 3 all with undersore, pattern 4 without special character, pattern zero all data
	
            $domainp = parent::get_domain($domain);
            $eparray = array();
            $epc = 0;
			
            if ($mname == "" && $lname == "" && $pattern == 4){
                $fnames = strtolower($fname);
                $fname1d = $fnames[0];
                $eparray[$epc] = $fnames."@".$domainp;
                $epc++;
                $eparray[$epc] = $fname1d."@".$domainp;
                $epc++;
                return $eparray;
            }
			if ($mname == ""){
                $fnames = strtolower($fname);
                $lnames = strtolower($lname);
                $fname1d = $fnames[0];
                $lname1d = $lnames[0];
				if($pattern == 1){
					 $eparray[$epc] = $fnames.".".$lnames."@".$domainp;
					$epc++;
					 $eparray[$epc] = $fname1d.".".$lnames."@".$domainp;
					$epc++;
					 $eparray[$epc] = $fnames.".".$lname1d."@".$domainp;
					$epc++;
					$eparray[$epc] = $fname1d.".".$lname1d."@".$domainp;
					$epc++;
					$eparray[$epc] = $lnames.".".$fnames."@".$domainp;
					$epc++;
					$eparray[$epc] = $lnames.".".$fname1d."@".$domainp;
					$epc++;
					$eparray[$epc] = $lname1d.".".$fnames."@".$domainp;
					$epc++;
					 $eparray[$epc] = $lname1d.".".$fname1d."@".$domainp;
					$epc++;
					return $eparray;
				}elseif($pattern == 2){
					$eparray[$epc] = $fnames."-".$lnames."@".$domainp;
					$epc++;
					$eparray[$epc] = $fname1d."-".$lnames."@".$domainp;
					$epc++;
					$eparray[$epc] = $fnames."-".$lname1d."@".$domainp;
					$epc++;
					$eparray[$epc] = $fname1d."-".$lname1d."@".$domainp;
					$epc++;
					$eparray[$epc] = $lnames."-".$fnames."@".$domainp;
					$epc++;
					$eparray[$epc] = $lnames."-".$fname1d."@".$domainp;
					$epc++;
					$eparray[$epc] = $lname1d."-".$fnames."@".$domainp;
					$epc++;
					$eparray[$epc] = $lname1d."-".$fname1d."@".$domainp;
					$epc++;
					return $eparray;
				}elseif($pattern == 3){
					$eparray[$epc] = $fnames."_".$lnames."@".$domainp;
					$epc++;
					$eparray[$epc] = $fname1d."_".$lnames."@".$domainp;
					$epc++;
					$eparray[$epc] = $fnames."_".$lname1d."@".$domainp;
					$epc++;
					$eparray[$epc] = $fname1d."_".$lname1d."@".$domainp;
					$epc++;
					$eparray[$epc] = $lnames."_".$fnames."@".$domainp;
					$epc++;
					$eparray[$epc] = $lnames."_".$fname1d."@".$domainp;
					$epc++;
					$eparray[$epc] = $lname1d."_".$fnames."@".$domainp;
					$epc++;
					$eparray[$epc] = $lname1d."_".$fname1d."@".$domainp;
					$epc++;
					return $eparray;
				}elseif($pattern == 4){
					$eparray[$epc] = $fnames."@".$domainp;
					$epc++;
					$eparray[$epc] = $lnames."@".$domainp;
					$epc++;
					$eparray[$epc] = $fnames.$lnames."@".$domainp;
					$epc++;
					$eparray[$epc] = $fname1d.$lnames."@".$domainp;
					$epc++;
					$eparray[$epc] = $fnames.$lname1d."@".$domainp;
					$epc++;
					$eparray[$epc] = $fname1d.$lname1d."@".$domainp;
					$epc++;
					$eparray[$epc] = $lnames.$fnames."@".$domainp;
					$epc++;
					$eparray[$epc] = $lnames.$fname1d."@".$domainp;
					$epc++;
					$eparray[$epc] = $lname1d.$fnames."@".$domainp;
					$epc++;
					$eparray[$epc] = $lname1d.$fname1d."@".$domainp;
					$epc++;
					return $eparray;
				}else{
						$eparray[$epc] = $fnames."@".$domainp;
						$epc++;
						$eparray[$epc] = $lnames."@".$domainp;
						$epc++;
						$eparray[$epc] = $fnames.$lnames."@".$domainp;
						$epc++;
						$eparray[$epc] = $fnames.".".$lnames."@".$domainp;
						$epc++;
						$eparray[$epc] = $fname1d.$lnames."@".$domainp;
						$epc++;
						$eparray[$epc] = $fname1d.".".$lnames."@".$domainp;
						$epc++;
						$eparray[$epc] = $fnames.$lname1d."@".$domainp;
						$epc++;
						$eparray[$epc] = $fnames.".".$lname1d."@".$domainp;
						$epc++;
						$eparray[$epc] = $fname1d.$lname1d."@".$domainp;
						$epc++;
						$eparray[$epc] = $fname1d.".".$lname1d."@".$domainp;
						$epc++;
						$eparray[$epc] = $lnames.$fnames."@".$domainp;
						$epc++;
						$eparray[$epc] = $lnames.".".$fnames."@".$domainp;
						$epc++;
						$eparray[$epc] = $lnames.$fname1d."@".$domainp;
						$epc++;
						$eparray[$epc] = $lnames.".".$fname1d."@".$domainp;
						$epc++;
						$eparray[$epc] = $lname1d.$fnames."@".$domainp;
						$epc++;
						$eparray[$epc] = $lname1d.".".$fnames."@".$domainp;
						$epc++;
						$eparray[$epc] = $lname1d.$fname1d."@".$domainp;
						$epc++;
						$eparray[$epc] = $lname1d.".".$fname1d."@".$domainp;
						$epc++;
						$eparray[$epc] = $fnames."-".$lnames."@".$domainp;
						$epc++;
						$eparray[$epc] = $fname1d."-".$lnames."@".$domainp;
						$epc++;
						$eparray[$epc] = $fnames."-".$lname1d."@".$domainp;
						$epc++;
						$eparray[$epc] = $fname1d."-".$lname1d."@".$domainp;
						$epc++;
						$eparray[$epc] = $lnames."-".$fnames."@".$domainp;
						$epc++;
						$eparray[$epc] = $lnames."-".$fname1d."@".$domainp;
						$epc++;
						$eparray[$epc] = $lname1d."-".$fnames."@".$domainp;
						$epc++;
						$eparray[$epc] = $lname1d."-".$fname1d."@".$domainp;
						$epc++;
						$eparray[$epc] = $fnames."_".$lnames."@".$domainp;
						$epc++;
						$eparray[$epc] = $fname1d."_".$lnames."@".$domainp;
						$epc++;
						$eparray[$epc] = $fnames."_".$lname1d."@".$domainp;
						$epc++;
						$eparray[$epc] = $fname1d."_".$lname1d."@".$domainp;
						$epc++;
						$eparray[$epc] = $lnames."_".$fnames."@".$domainp;
						$epc++;
						$eparray[$epc] = $lnames."_".$fname1d."@".$domainp;
						$epc++;
						$eparray[$epc] = $lname1d."_".$fnames."@".$domainp;
						$epc++;
						$eparray[$epc] = $lname1d."_".$fname1d."@".$domainp;
						$epc++;
						return $eparray;
					}
			
    }else{	
			$fnames = strtolower($fname);
			$mnames = strtolower($mname);
			$lnames = strtolower($lname);
			$fname1d = $fnames[0];
			$mname1d = $mnames[0];
			$lname1d = $lnames[0];
			if($pattern == 1){
			$eparray[$epc] = $fnames.".".$lnames."@".$domainp;
			$epc++;
			$eparray[$epc] = $fname1d.".".$lnames."@".$domainp;
			$epc++;
			$eparray[$epc] = $fnames.".".$lname1d."@".$domainp;
			$epc++;
			 $eparray[$epc] = $fname1d.".".$lname1d."@".$domainp;
			$epc++;
			 $eparray[$epc] = $lnames.".".$fnames."@".$domainp;
			$epc++;
			$eparray[$epc] = $lname1d.".".$fnames."@".$domainp;
			$epc++;
			 $eparray[$epc] = $lname1d.".".$fname1d."@".$domainp;
			$epc++;
			$eparray[$epc] = $fnames.".".$mname1d.".".$lnames."@".$domainp;
			$epc++;
			$eparray[$epc] = $fnames.".".$mnames.".".$lnames."@".$domainp;
			$epc++;
			$eparray[$epc] = $fname1d.$mname1d.".".$lnames."@".$domainp;
			$epc++;
			return $eparray;
			}else if($pattern == 2){
				$eparray[$epc] = $fnames."-".$lnames."@".$domainp;
			$epc++;
			$eparray[$epc] = $fname1d."-".$lnames."@".$domainp;
			$epc++;
			$eparray[$epc] = $fnames."-".$lname1d."@".$domainp;
			$epc++;
			$eparray[$epc] = $fname1d."-".$lname1d."@".$domainp;
			$epc++;
			$eparray[$epc] = $lnames."-".$fnames."@".$domainp;
			$epc++;
			$eparray[$epc] = $lnames."-".$fname1d."@".$domainp;
			$epc++;
			$eparray[$epc] = $lname1d."-".$fnames."@".$domainp;
			$epc++;
			$eparray[$epc] = $lname1d."-".$fname1d."@".$domainp;
			$epc++;
			$eparray[$epc] = $fnames."-".$mname1d."-".$lnames."@".$domainp;
			$epc++;
			$eparray[$epc] = $fnames."-".$mnames."-".$lnames."@".$domainp;
			$epc++;
			 $eparray[$epc] = $fname1d.$mname1d."-".$lnames."@".$domainp;
			$epc++;
			return $eparray;
			}else if($pattern == 3){
				$eparray[$epc] = $fnames."_".$lnames."@".$domainp;
			$epc++;
			$eparray[$epc] = $fname1d."_".$lnames."@".$domainp;
			$epc++;
			$eparray[$epc] = $fnames."_".$lname1d."@".$domainp;
			$epc++;
			$eparray[$epc] = $fname1d."_".$lname1d."@".$domainp;
			$epc++;
			$eparray[$epc] = $lnames."_".$fnames."@".$domainp;
			$epc++;
			$eparray[$epc] = $lnames."_".$fname1d."@".$domainp;
			$epc++;
			$eparray[$epc] = $lname1d."_".$fnames."@".$domainp;
			$epc++;
			$eparray[$epc] = $lname1d."_".$fname1d."@".$domainp;
			$epc++;
			$eparray[$epc] = $fname1d.$mname1d."_".$lnames."@".$domainp;
			$epc++;
			$eparray[$epc] = $fnames."_".$mname1d."_".$lnames."@".$domainp;
			$epc++;
			$eparray[$epc] = $fnames."_".$mnames."_".$lnames."@".$domainp;
			$epc++;
			return $eparray;
				}else if($pattern == 4){
					$eparray[$epc] = $fnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fnames.$lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fname1d.$lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fnames.$lname1d."@".$domainp;
				$epc++;
				$eparray[$epc] = $fname1d.$lname1d."@".$domainp;
				$epc++;
				$eparray[$epc] = $lnames.$fnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $lnames.$fname1d."@".$domainp;
				$epc++;
				$eparray[$epc] = $lname1d.$fnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $lname1d.$fname1d."@".$domainp;
				$epc++;
				 $eparray[$epc] = $fnames.$mname1d.$lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fnames.$mnames.$lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fname1d.$mname1d.$lnames."@".$domainp;
				$epc++;
				return $eparray;
				}else{
				$eparray[$epc] = $fnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fnames.$lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fnames.".".$lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fname1d.$lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fname1d.".".$lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fnames.$lname1d."@".$domainp;
				$epc++;
				$eparray[$epc] = $fnames.".".$lname1d."@".$domainp;
				$epc++;
				$eparray[$epc] = $fname1d.$lname1d."@".$domainp;
				$epc++;
				$eparray[$epc] = $fname1d.".".$lname1d."@".$domainp;
				$epc++;
				$eparray[$epc] = $lnames.$fnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $lnames.".".$fnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $lnames.$fname1d."@".$domainp;
				$epc++;
				$eparray[$epc] = $lnames.".".$fname1d."@".$domainp;
				$epc++;
				$eparray[$epc] = $lname1d.$fnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $lname1d.".".$fnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $lname1d.$fname1d."@".$domainp;
				$epc++;
				$eparray[$epc] = $lname1d.".".$fname1d."@".$domainp;
				$epc++;
				$eparray[$epc] = $fnames."-".$lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fname1d."-".$lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fnames."-".$lname1d."@".$domainp;
				$epc++;
				$eparray[$epc] = $fname1d."-".$lname1d."@".$domainp;
				$epc++;
				$eparray[$epc] = $lnames."-".$fnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $lnames."-".$fname1d."@".$domainp;
				$epc++;
				$eparray[$epc] = $lname1d."-".$fnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $lname1d."-".$fname1d."@".$domainp;
				$epc++;
				$eparray[$epc] = $fnames."_".$lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fname1d."_".$lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fnames."_".$lname1d."@".$domainp;
				$epc++;
				$eparray[$epc] = $fname1d."_".$lname1d."@".$domainp;
				$epc++;
				$eparray[$epc] = $lnames."_".$fnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $lnames."_".$fname1d."@".$domainp;
				$epc++;
				$eparray[$epc] = $lname1d."_".$fnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $lname1d."_".$fname1d."@".$domainp;
				$epc++;
				$eparray[$epc] = $fnames."-".$mname1d."-".$lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fnames."-".$mnames."-".$lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fname1d.$mname1d."_".$lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fnames."_".$mname1d."_".$lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fnames."_".$mnames."_".$lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fnames.$mname1d.$lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fnames.".".$mname1d.".".$lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fnames.$mnames.$lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fnames.".".$mnames.".".$lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fname1d.$mname1d.$lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fname1d.$mname1d.".".$lnames."@".$domainp;
				$epc++;
				$eparray[$epc] = $fname1d.$mname1d."-".$lnames."@".$domainp;
				$epc++;
			   return $eparray;
				}
            }
	}

}

?>