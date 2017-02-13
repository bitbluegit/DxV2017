<?php 

require '../../../helper/db.php';

$reqData =  json_decode($_POST['data'],true);


$sDate = $reqData['startdate'];
$eDate = $reqData['enddate'];

$conName  = $reqData['name'] != '' ? " AND AW.`name`='{$reqData['name']}' " : ''; 
$conStd  = $reqData['standard'] != '' ? " AND AW.`std`='{$reqData['standard']}' " : ''; 
$conEnroll  = $reqData['enroll'] != '' ? " AND AW.`gr_no`='{$reqData['enroll']}' " : ''; 
$conDate  = ($sDate  != '' &&  $eDate != '') ? " AND AW.`date` BETWEEN '{$sDate}' AND '{$eDate}' " : '';

$sql = " 
SELECT AD.name AS 'user_name' ,AW.gr_no, AW.name AS 'stu_name' ,AW.mdm,
AW.std,AW.section,AW.name_of_competition,AW.remark ,  DATE_FORMAT(AW.date,'%d/%m/%Y') AS 'date' ,
AW.sr_no AS sr_no
FROM sch_awards AW 
INNER JOIN admin_sch AD
ON AD.`unique_id` = AW.`unique_id`
WHERE 1=1 {$conName} {$conStd} {$conEnroll} {$conDate} "; 

$data  = DB::allRow($sql);
if($data){
	foreach ($data as $row) {
          $sr_no = array_pop($row);

		 $btn = "<button class='btn btn-green' onclick='printAward({$sr_no})'><i class='ion-ios-printer'></i>
		  </button>&nbsp;
		  <button class='btn btn-red' onclick='deleteAward({$sr_no})'><i class='ion-ios-printer'></i> </button>"; 
		   echo sprintf("<tr><td>%s</td><td>%s</td></tr>",implode('</td><td>',$row),$btn);
       }
}else{
	echo '<tr><td colspan="9" style="text-align:center;color:#f00; font-weight:600;font-size:16px;">No Bonafide Found !<td></tr>';
}

