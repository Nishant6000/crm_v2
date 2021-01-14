<?php

/**
 * Class to check up e-mail
 *
 * @author Konstantin Granin <kostya@granin.me>
 * @copyright Copyright (c) 2015, Konstantin Granin
 */
class bulkSearch {
	//==================Buffer Zone =========	
public $bulk_table_name = "campaign";

public function function savefile($fname, $val){
$fp = fopen($fname, 'a');
fputcsv($fp, $val);
fclose($fp);
}

public function getbulkemail($domain){
	for($i=0;$i<$rowcounter;$i++){
			$rowcount = $final[$i];
			$rowtest = $rowcount[$urlfcount];
					if(!stristr($rowtest, 'url') && $rowtest != ""){
						sleep(2);
						$fh = fopen("stat.txt", 'a') or die("Failed to read file"); 
						fwrite($fh, $rowtest);
						fclose($fh);
						
						//==========================================================================
						$c2urls = new companytourl();
						
								$urlp = $c2urls->get_domain($rowtest);
								
								$ar = "";
								$gsearch = 'EMAILS'.' '. '"@'.$urlp.'"';
								$bysearch = '[@'.$urlp.']';
								$yandex = '"@'.$urlp.'"';
								$nval = $i;
								
								//$results = $c2urls->fetch_google_result($gsearch,'2');
								 $results = $c2urls->fetch_google_result_via_proxy($gsearch,'2', $nval);
								 
								if(stristr($results,"302 Moved")){ // Google Capatcha Solving
									$dom = new DOMDocument(1.0);
									@$dom->loadHTML($results);
								   foreach ($dom->getElementsByTagName('a') as $node) {
								   $caplink = $node->getAttribute('href');
								   }
								   echo "^*".$caplink."^*";
									for($z=0;$z<40000;$z++) echo ' ';
									flush();
									sleep(2);
								   $buffer = "";
								$fh = fopen($file_loc, 'r') or die("Failed to read file"); 
								$fhr = fgets($fh);
								fclose($fh);
								while($fhr != 1){
									sleep(2);
									$fh = fopen($file_loc, 'r') or die("Failed to read file"); 
									$fhr = fgets($fh);
									fclose($fh);
								}
								$handle = fopen($file_loc_2, 'r') or die("Failed to read file"); 
								if($handle){
									while (!feof($handle)) {
									$gssrcap = fgets($handle, 4096);
									$buffer .= $gssrcap;
									// Process buffer here..
									}
								}
								//echo "dONE";
								sleep(1);
								$results = $buffer;
								$fh = fopen($file_loc, 'w') or die("Failed to read file"); 
								$txt2 = "0";
								fwrite($fh, $txt2);
								fclose($fh);
								
								}
								///===========================================================Google Capatcha Solving End For Bulk Search
							$ar .= strip_tags($results);
							$resultsb = $c2urls->fetch_bing_result($bysearch);
							$ar .= strip_tags($resultsb);
							//$resultsd = $c2urls->fetch_yandex_result($yandex);
							//$ar .= strip_tags($resultsd);
							$emails = $c2urls->extract_emails_from($ar,$urlp);
							//echo $emails;
							$email_array = explode("</br>",$emails);
							echo $patern_check_array_count = count($email_array);
								for($k=0;$k<$patern_check_array_count;$k++){
									if($kmc == 0){
										$forxlsxdata[$kmc] = array('Url','Email');
										savefile($newcsvfileloc, $forxlsxdata[$kmc]);// newly added
									}else{
										if($email_array[$k-1] != null){
										$forxlsxdata[$kmc] = array($rowtest,$email_array[$k-1]);
										savefile($newcsvfileloc, $forxlsxdata[$kmc]);// newly added 
										}
									}
									$kmc++;
								}
					
					// store it into excel ================================================
							
					}else{
						
					}
			
		}
	
}
}



?>