<?php 

require '../../../helper/db.php';

$reqData =  json_decode($_POST['data'],true);

// $sDate = $reqData['startdate'];
// $eDate = $reqData['enddate'];

extract($reqData);


$conMdm  = $medium != '' ? " AND US.`Medium`='{$medium}' " : ''; 
$conStd  = $standard != '' ? " AND US.`std`='{$standard}' " : ''; 
$conSec  = $section != '' ? " AND US.`Section`='{$section}' " : ''; 
// $conDate  = ($sDate  != '' &&  $eDate != '') ? " AND BF.`date` BETWEEN '{$sDate}' AND '{$eDate}' " : '';

$sql = " SELECT US.`Gr_num`,US.`Enroll`,US.`Name`,SD.`f_name`,SD.`sex`,SD.`DOB`,SD.`cont_num`,SD.`address`
FROM user_sch AS US
INNER JOIN sch_details AS SD ON SD.`Gr_num`=US.`Gr_num`
WHERE 1=1 {$conMdm} {$conStd} {$conSec} "; 

$data  = DB::allRow($sql);
extract($data);

if($data){
	foreach ($data as $row) {
		echo sprintf('<tr><td>%s</td></tr>',implode('</td><td>', $row));
	}
}else{

	echo '<tr><td colspan="10" style="text-align:center;color:#f00; font-weight:600;font-size:16px;">
	  No Student  Found !<td></tr>';
}