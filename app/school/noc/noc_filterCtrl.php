<?php 

require '../../../helper/db.php';

$reqData =  json_decode($_POST['data'],true);

$sDate = $reqData['startdate'];
$eDate = $reqData['enddate'];

$conName  = $reqData['name'] != '' ? " AND NOC.`name`='{$reqData['name']}' " : ''; 
$conStd  = $reqData['standard'] != '' ? " AND NOC.`std`='{$reqData['standard']}' " : ''; 
$conEnroll  = $reqData['enroll'] != '' ? " AND NOC.`gr_no`='{$reqData['enroll']}' " : ''; 
$conDate  = ($sDate  != '' &&  $eDate != '') ? " AND NOC.`issue_date` BETWEEN '{$sDate}' AND '{$eDate}' " : '';

$sql = " SELECT AD.`Name`,NOC.`Gr_no`, NOC.`noc_no`,NOC.`name`,NOC.`Std`,SC.`Medium`,NOC.`held_year`,NOC.
`letter_no`,NOC.`date`,NOC.`issue_date`, NOC.`noc_no` AS sr_no FROM sch_noc NOC 
	 INNER JOIN admin_sch AD ON NOC.`unique_id`= AD.`unique_id` INNER JOIN user_sch	SC ON SC.`Gr_num`=NOC.`Gr_no`
		 WHERE 1=1
		 {$conName} {$conStd} {$conEnroll} {$conDate} ";

$data  = DB::allRow($sql);
if($data){
	foreach ($data as $row) {
         $sr_no = array_pop($row);

		 $btn = "<button class='btn btn-green' onclick='printNOC({$sr_no})'><i class='ion-ios-printer'></i>
		  </button>&nbsp;
		  <button class='btn btn-red' onclick='deleteNOC({$sr_no})'><i class='ion-ios-printer'></i> </button>"; 
		   echo sprintf("<tr><td>%s</td><td>%s</td></tr>",implode('</td><td>',$row),$btn);
       }
}else{
	echo '<tr><td colspan="10" style="text-align:center;color:#f00; font-weight:600;font-size:16px;">No NOC Found !<td></tr>';
}