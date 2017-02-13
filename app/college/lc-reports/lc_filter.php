<?php 

require '../../../helper/db.php';

$reqData =  json_decode($_POST['data'],true);

$sDate = $reqData['startdate'];
$eDate = $reqData['enddate'];

$conName  = $reqData['name'] != '' ? " AND LC.`stu_name`='{$reqData['name']}' " : ''; 
$conStd  = $reqData['course'] != '' ? " AND LC.`course_studying`='{$reqData['course']}' " : ''; 
$conEnroll  = $reqData['enroll'] != '' ? " AND LC.`enroll_no`='{$reqData['enroll']}' " : ''; 
$conDate  = ($sDate  != '' &&  $eDate != '') ? " AND LC.`created_at` BETWEEN '{$sDate}' AND '{$eDate}' " : '';

$sql = " SELECT LC.`lc_no`, LC.`enroll_no`,LC.`stu_name` ,LC.`course_studying` ,LC.`remark`,
		 DATE_FORMAT(LC.`created_at`,'%d/%m/%Y') AS 'date'
		FROM clg_lc LC WHERE 1=1 {$conName} {$conStd} {$conEnroll} {$conDate} "; 

$data  = DB::allRow($sql);
if($data){
	foreach ($data as $row) {
		echo sprintf('<tr><td>%s</td></tr>',implode('</td><td>', $row));
	}
}else{
	echo '<tr><td colspan="10" style="text-align:center;color:#f00; font-weight:600;font-size:16px;">No LC Report Found !<td></tr>';
}