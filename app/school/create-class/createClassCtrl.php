<?php 

require_once '../../../helper/db.php';
$reqData =  json_decode($_POST['data'],true);
extract($reqData);

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '1';

$query =  " select * from sch_class SC where SC.Medium='{$mdm}' AND SC.Std ='{$std}' " ;

if(DB::oneRow($query)){
	$response['status'] = 'failed';
	$response['msg'] = $query  ; 'Class Already Exist ';
}else{

	$sql  = " INSERT INTO `sch_class` (`unique_id`, `Medium`, `Std`, `no_of_div`)
	VALUES ('{$user_id}', '{$mdm}', '{$std}', '{$div}') " ;

	$affectedRowCount = DB::execute($sql);
	if($affectedRowCount !== null ){
		$response['status'] = 'success';
		$response['msg'] = 'Class Created Success Fully ';
	}else{
		$response['status'] = 'failed';
		$response['msg'] = 'Class Not Created Please try Again ';
	}
	
}

echo json_encode($response);

?>