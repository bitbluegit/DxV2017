<?php 

require '../../../helper/db.php';

$reqData =  json_decode($_POST['data'],true);

$sDate = $reqData['startdate'];
$eDate = $reqData['enddate'];

$conName  = $reqData['name'] != '' ? " AND LC.`stu_name`='{$reqData['name']}' " : ''; 
$conStd  = $reqData['standard'] != '' ? " AND LC.`std_studying`='{$reqData['standard']}' " : ''; 
$conEnroll  = $reqData['enroll'] != '' ? " AND LC.`Enroll_no`='{$reqData['enroll']}' " : ''; 
$conDate  = ($sDate  != '' &&  $eDate != '') ? " AND LC.`created_at` BETWEEN '{$sDate}' AND '{$eDate}' " : '';

$sql = " SELECT   LC.`lc_no`, LC.`Gr_num`,LC.`enroll_no`,LC.`std_studying`,LC.`stu_name`,LC.`f_name`
          FROM sch_lc LC WHERE 1=1 {$conName} {$conStd} {$conEnroll} {$conDate} "; 

$data  = DB::allRow($sql);
if($data){
	foreach ($data as $row) {
			$lc_no = array_shift($row);

		  $btn = "<button  onclick='lcreprint({$lc_no})'> <i class='ion-printer'></i> </button>";
		  echo sprintf("<tr><td>%s</td><td>%s</td></tr>",implode('</td><td>',$row),$btn);
	}
}else{
	echo '<tr><td colspan="10" style="text-align:center;color:#f00; font-weight:600;font-size:16px;">No Lc Found !<td></tr>';
}