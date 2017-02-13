<?php 

require '../../../helper/db.php';

$reqData =  json_decode($_POST['data'],true);

$conName  = $reqData['name'] != '' ? " AND EXP.`to`='{$reqData['name']}' " : ''; 
$date  = $reqData['startdate'] != '' ? " AND EXP.`date`='{$reqData['startdate']}' " : ''; 
$mode  = $reqData['mode'] != '' ? " AND EXP.`mode`='{$reqData['mode']}' " : ''; 
$sql = " SELECT EXP.`receipt_no`, EXP.`title`,EXP.`to` AS NAME,EXP.`date`,EXP.`mode`,EXP.`amount`	 ,EXP.`receipt_no` AS  SrNo  FROM expenses EXP
		WHERE 1=1 {$conName} {$date} {$mode} "; 

$data  = DB::allRow($sql);
if($data){
	foreach ($data as $row) {
          $receipt_no = array_pop($row);

		 $btn = "<button class='btn btn-green' onclick='printExpense({$receipt_no})'><i class='ion-ios-printer'></i>
          </button>
          <button class='btn btn-red' onclick='deleteExpense({$receipt_no})'><i class='ion-trash-b'></i> </button>";
		   echo sprintf("<tr><td>%s</td><td>%s</td></tr>",implode('</td><td>',$row),$btn);
       }
}else{
	echo '<tr><td colspan="9" style="text-align:center;color:#f00; font-weight:600;font-size:16px;">No Expenses Found !<td></tr>';
}

