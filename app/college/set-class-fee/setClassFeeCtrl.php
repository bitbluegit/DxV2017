<?php 
require_once '../../../helper/require.php';
$reqData =  json_decode($_POST['data'],true);
extract($reqData);
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '1';
$query =  " select * from clg_cls_fee CF where CF.Medium='{$mdm}' AND CF.Course ='{$crs}' AND CF.fee_type = '{$feename}'  " ;

if(DB::oneRow($query)){
	$response['status'] = 'failed';
	$response['msg'] = 'Fee Detail Already Exist';
}else{

	$sql  = " INSERT INTO `clg_cls_fee` (`unique_id`, `Medium`,`Course`,`CourseName`,`year`,`fee_type`,`fee`,`lfee`,`one_time`)
	VALUES ('{$user_id}','{$mdm}','{$crs}', '{$cname}','{$year}','{$feename}','{$feeamount}','{$latefee}', '{$feeformat1}' ) " ;

	$affectedRowCount = DB::execute($sql);
	if($affectedRowCount !== null ){
		$response['status'] = 'success';
		$response['msg'] = 'Fee Created Success Fully ';
	}else{
		$response['status'] = 'failed';
		$response['msg'] = 'Fee Not Created Please Try Again ';
	}

}

echo json_encode($response);
