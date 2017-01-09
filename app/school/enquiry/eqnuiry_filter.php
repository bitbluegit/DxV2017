<?php 

require '../../../helper/db.php';

$reqData =  json_decode($_POST['data'],true);

$sDate = $reqData['startdate'];
$eDate = $reqData['enddate'];

$conMdm  = $reqData['medium'] != '' ? " AND EQ.`medium`='{$reqData['medium']}' " : ''; 
$conStd  = $reqData['standard'] != '' ? " AND EQ.`std`='{$reqData['standard']}' " : ''; 
$conUserId  = $reqData['username'] != '' ? " AND EQ.`unique_id`='{$reqData['username']}' " : ''; 
$conDate  = ($sDate  != '' &&  $eDate != '') ? " AND EQ.`enq_date` BETWEEN '{$sDate}' AND '{$eDate}' " : '';

$sql = " SELECT EQ.`sr_no` ,EQ.`name` AS 'user_name' , EQ.`name` AS 'stu_name' ,
EQ.`f_name` ,  EQ.`medium`,EQ.`std` , EQ.`cont_num`,  EQ.`address`, EQ.`remark`, DATE_FORMAT(EQ.`enq_date`,'%d/%m/%Y') AS 'enq_date'
FROM enquiry EQ 
INNER JOIN admin_sch AD ON AD.`unique_id` = EQ.`unique_id`
WHERE 1=1 {$conMdm} {$conStd} {$conUserId} {$conDate} "; 

$data  = DB::allRow($sql);
if($data){
	foreach ($data as $row) {
		echo sprintf('<tr><td>%s</td></tr>',implode('</td><td>', $row));
	}
}else{
	echo '<tr><td colspan="10" style="text-align:center;color:#f00; font-weight:600;font-size:16px;">No Enquiry Found !<td></tr>';
}