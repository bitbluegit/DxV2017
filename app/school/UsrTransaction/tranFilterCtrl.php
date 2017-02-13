<?php 

require '../../../helper/db.php';

$reqData =  json_decode($_POST['data'],true);


$sDate = $reqData['startDate'];
$eDate = $reqData['endDate'];

$conMdm  = $reqData['medium'] != '' ? " AND US.medium='{$reqData['medium']}' " : ''; 

$conStd  = $reqData['standard'] != '' ? " AND US.std='{$reqData['standard']}' " : ''; 
// $conUserId  = $reqData['username'] != '' ? " AND EQ.unique_id='{$reqData['username']}' " : ''; 
$conMode1 = $reqData['mode'] != '' ? " AND AT.pay_mode='{$reqData['mode']}' " : ''; 
$conMode2 = $reqData['mode'] != '' ? " AND ST.pay_mode='{$reqData['mode']}' " : ''; 

$conYear1 = $reqData['year'] != '' ? "AND AT.year ='{$reqData['year']}' " : '';
$conYear2 = $reqData['year'] != '' ? "AND ST.year ='{$reqData['year']}' " : '';

$conDate1  = ($sDate  != '' &&  $eDate != '') ? " AND AT.date BETWEEN '{$sDate}' AND '{$eDate}' " : '';
$conDate2  = ($sDate  != '' &&  $eDate != '') ? " AND ST.date BETWEEN '{$sDate}' AND '{$eDate}' " : '';

// $sql = " SELECT AD.Name,AT.Gr_num ,US.Name ,US.Medium,US.Std ,US.Section,AT.Reciept ,AT.Amount,AT.Month,AT.fee_type,AT.pay_mode,AT.cheque_num,AT.late_fee,at.reason, AT.dateFROM adm_sch_tran AT
//   INNER JOIN admin_sch AD ON AD.unique_id=AT.unique_id
//   INNER JOIN user_sch US ON US.unique_id = AT.unique_id

// WHERE 1=1  {$conMode} {$conMdm} {$conStd} {$conDate} {$conYear} "; 


$sql1 = "
		 (
			SELECT  AT.Gr_num, US.Name ,US.Medium, US.Std ,US.Section ,AT.Reciept 
			,AT.Amount ,AT.Month ,AT.fee_type ,AT.pay_mode ,AT.cheque_num ,AT.late_fee ,at.reason, AT.date
			FROM adm_sch_tran AT
	  		INNER JOIN admin_sch AD ON AD.unique_id = AT.unique_id
	  	    INNER JOIN user_sch US ON US.Gr_num = AT.Gr_num
	  	  	WHERE  1=1  {$conMode1} {$conMdm} {$conStd} {$conDate1} {$conYear}
	  	  )
			UNION ALL	  

		(
			SELECT ST.Gr_num ,US.Name ,US.Medium ,US.Std ,US.Section ,ST.Reciept,ST.Amount,ST.fee_type, 
			ST.Month, ST.pay_mode ,ST.cheque_num, ST.late_fee, ST.reason, ST.date FROM sch_tran ST
			INNER JOIN admin_sch AD ON AD.unique_id = ST.unique_id 
			INNER JOIN user_sch US ON US.Gr_num = ST.Gr_num 
		 	WHERE  1=1  {$conMode2} {$conMdm} {$conStd} {$conDate2} {$conYear}
		 )
 		";

// $sql = $sql1 .UNION ALL. $sql2;



$data  = DB::allRow($sql1);
// var_dump($data);
// exit();
if($data){
	foreach ($data as $row) {
		echo sprintf('<tr><td>%s</td></tr>',implode('</td><td>', $row));
	}
}else{
	echo '<tr><td colspan="15" style="text-align:center;color:#f00; font-weight:600;font-size:16px;">No Transaction Found !<td></tr>';
}


?>

      