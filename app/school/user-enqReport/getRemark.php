<?php 
require_once '../../../helper/db.php';
$reqData =  json_decode($_POST['data'],true);

$srno = $reqData['sr_no'];
echo $srno;
$sql = "SELECT ENQ.`remark` FROM enquiry ENQ WHERE ENQ.`sr_no`= {$srno}";
$result= DB::oneRow($sql);
// $remark = $result['remark'];



?>