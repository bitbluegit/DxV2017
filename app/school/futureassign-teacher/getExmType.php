<?php 
require '../../../helper/db.php';

$reqData =  json_decode($_POST['data'],true);

$mdm = $reqData['mdm'];
$std = $reqData['std']; 
$sec = $reqData['sec'];
echo $sec;

$OptionStr ='<option value="" disabled selected> Select Exam </option>';


$sql ="SELECT SE.`exam_name` FROM sch_exams SE WHERE SE.`mdm`= '{$mdm}' AND SE.`std`= '{$std}' AND SE.`sec`= 
'{$sec}' ";

 
$result  = DB::oneRow($sql);
// $divCount = $result['divCount'];

// $divArr = array_slice($divArr,0, $divCount);

 //echo sprintf('<option>%s</option>',implode('</option><option>',$divArr1));

foreach ($result as $div) {
	$OptionStr .= sprintf('<option value="%s">%s</option>',$div,$div);
}

 echo $OptionStr;