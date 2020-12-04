<?php
include("../classes/class.validatemail.php");
$vemail = new validateEmail();
		$vemail->setEmailFrom("info@lexusenergy.com");
		echo $mailtestdata = $vemail->mailtester('info@optinprospects.us');
?>