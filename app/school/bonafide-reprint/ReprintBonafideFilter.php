<?php 

require '../../../helper/db.php';

$reqData =  json_decode($_POST['data'],true);


$sDate = $reqData['startdate'];
$eDate = $reqData['enddate'];

$conName  = $reqData['name'] != '' ? " AND BF.name='{$reqData['name']}' " : ''; 
$conStd  = $reqData['standard'] != '' ? " AND BF.std='{$reqData['standard']}' " : ''; 
$conEnroll  = $reqData['enroll'] != '' ? " AND BF.gr_no='{$reqData['enroll']}' " : ''; 
$conDate  = ($sDate  != '' &&  $eDate != '') ? " AND BF.date BETWEEN '{$sDate}' AND '{$eDate}' " : '';

$sql = " SELECT AD.name AS 'user_name' ,BF.gr_no, BF.name AS 'stu_name' ,
BF.FatherName ,BF.std ,  BF.purpose, DATE_FORMAT(BF.date,'%d/%m/%Y') AS 'date' ,BF.sr_no AS sr_no
FROM bonafide BF 
INNER JOIN admin_sch AD
ON AD.unique_id = BF.unique_id
WHERE 1=1 {$conName} {$conStd} {$conEnroll} {$conDate} "; 

$data  = DB::allRow($sql);
if($data){
	foreach ($data as $row) {
          $sr_no = array_pop($row);

		 $btn = "<button class='btn btn-green' onclick='printBonafide({$sr_no})'><i class='ion-ios-printer'></i>
		  </button>&nbsp;
		  <button class='btn btn-red' onclick='deleteBonafide({$sr_no})'><i class='ion-ios-printer'></i> </button>"; 
		   echo sprintf("<tr><td>%s</td><td>%s</td></tr>",implode('</td><td>',$row),$btn);
       }
}else{
	echo '<tr><td colspan="9" style="text-align:center;color:#f00; font-weight:600;font-size:16px;">No Bonafide Found !<td></tr>';
}

