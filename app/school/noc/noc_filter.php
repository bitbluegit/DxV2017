<?php 

require '../../../helper/db.php';

$reqData =  json_decode($_POST['data'],true);

$sDate = $reqData['startdate'];
$eDate = $reqData['enddate'];

$conName  = $reqData['name'] != '' ? " AND NOC.`name`='{$reqData['name']}' " : ''; 
$conStd  = $reqData['standard'] != '' ? " AND NOC.`std`='{$reqData['standard']}' " : ''; 
$conEnroll  = $reqData['enroll'] != '' ? " AND NOC.`gr_no`='{$reqData['enroll']}' " : ''; 
$conDate  = ($sDate  != '' &&  $eDate != '') ? " AND NOC.`issue_date` BETWEEN '{$sDate}' AND '{$eDate}' " : '';

$sql = "  SELECT AD.`Name`,NOC.`Gr_no`, NOC.`noc_no`,NOC.`name`,NOC.`Std`,sc.`Medium`,NOC.`held_year`, 		NOC.`letter_no`,NOC.`date`,NOC.`issue_date` FROM sch_noc NOC INNER JOIN user_sch SC 
		ON NOC.`unique_id` = SC.`unique_id` INNER JOIN admin_sch AD ON sc.`unique_id`= AD.`unique_id` WHERE 1=1
		 {$conName} {$conStd} {$conEnroll} {$conDate} ";

$data  = DB::allRow($sql);
if($data){
	foreach ($data as $row) {
		echo sprintf('<tr><td>%s</td></tr>',implode('</td><td>', $row));
	}
}else{
	echo '<tr><td colspan="10" style="text-align:center;color:#f00; font-weight:600;font-size:16px;">No NOC Found !<td></tr>';
}