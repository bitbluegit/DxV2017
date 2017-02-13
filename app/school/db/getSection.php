<?php 
require '../../../helper/db.php';

$reqData =  json_decode($_POST['data'],true);

$mdm = $reqData['mdm'];
$std = $reqData['std']; 

$OptionStr ='<option value="" disabled selected> Select Div </option>';

$divArr =  array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P',
	'Q','R','S','T','U','V','W','X','Y','Z');

$sql = " SELECT SC.`no_of_div` AS 'divCount' FROM sch_class SC WHERE SC.`Medium` ='{$mdm}' AND SC.`Std`='{$std}' ";
$result  = DB::oneRow($sql);
$divCount = $result['divCount'];

$divArr = array_slice($divArr,0, $divCount);

 //echo sprintf('<option>%s</option>',implode('</option><option>',$divArr1));

foreach ($divArr as $div) {
	$OptionStr .= sprintf('<option value="%s">%s</option>',$div,$div);
}

 echo $OptionStr;