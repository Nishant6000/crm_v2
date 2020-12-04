<?php
include_once 'classes/class.c2url.php';
$ar = "<nishant@acetlabs.com><xxxx@acetlabs.com><xxxx@acetlabs.com><xxxx@acet-labs.com><info@acetlabs.com><xxxxxx@acetlabs.com><investor@acetlabs.com>";
$urlp = "acetlabs.com";
$c2urls = new companytourl();
$emails = $c2urls->extract_emails_from($ar,$urlp);
print_r($emails);
?>