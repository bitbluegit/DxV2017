<?php 

require '../../../helper/db.php';

$reqData =  json_decode($_POST['data'],true);


$sDate = $reqData['startdate'];
$eDate = $reqData['enddate'];

$conTitle  = $reqData['title'] != '' ? " AND CC.`cir_subject`='{$reqData['title']}' " : ''; 
$conDate  = ($sDate  != '' &&  $eDate != '') ? " AND CC.`created_at` BETWEEN '{$sDate}' AND '{$eDate}' " : '';

$sql = " SELECT  CC.`cir_no` AS sr_no,  CC.`cir_subject`,  CC.`cir_desc`,  CC.`cir_date`,  CC.`cir_no` 
FROM  circular CC 
WHERE 1=1 {$conTitle} {$conDate} "; 

$data  = DB::allRow($sql);
if($data){
	foreach ($data as $row) {
          $cir_no = array_pop($row);

		 $btn = "<button class='btn btn-green' onclick='printCircular({$cir_no})'><i class='ion-ios-printer'></i>
          </button>
          <button class='btn btn-red' onclick='deleteCircular({$cir_no})'><i class='ion-trash-b'></i> </button>";
		   echo sprintf("<tr><td>%s</td><td>%s</td></tr>",implode('</td><td>',$row),$btn);
       }
}else{
	echo '<tr><td colspan="9" style="text-align:center;color:#f00; font-weight:600;font-size:16px;">No Bonafide Found !<td></tr>';
}

