<?php
date_default_timezone_set('UTC');
require('XLSXReader.php');
$xlsx = new XLSXReader('sample.xlsx');
$sheetNames = $xlsx->getSheetNames();
foreach($sheetNames as $sheetName) {
	$sheet = $xlsx->getSheet($sheetName);
	?>
	<p><?=escape($sheetName);?></p>
	<?php
	$final = $sheet->getData();
	$final2 = count($final);
	print_r(count($final[0]));
	//array2Table2($sheet->getData());
}

die;
$data = array_map(function($row) {
	$converted = XLSXReader::toUnixTimeStamp($row[0]);
	return array($row[0], $converted, date('c', $converted), $row[1]);
}, $xlsx->getSheetData('Dates'));
array_unshift($data, array('Excel Date', 'Unix Timestamp', 'Formatted Date', 'Data'));
array2Table($data);


function array2Table($data) {
	echo '<table>';
	foreach($data as $row) {
		echo "<tr>";
		foreach($row as $cell) {
			echo "<td>" . escape($cell) . "</td>";
		}
		echo "</tr>";
	}
	echo '</table>';
}

function debug($data) {
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}

function escape($string) {
	return htmlspecialchars($string, ENT_QUOTES);
}


?>

