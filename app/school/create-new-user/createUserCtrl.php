<?php 

require_once '../../../helper/db.php';
$reqData =  json_decode($_POST['data'],true);
extract($reqData);

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '1';

$query =  " select * from admin_sch where uname='{$uname}' AND pwd ='{$pswd}' " ;

if(DB::oneRow($query)){
	$response['status'] = 'failed';
	$response['msg'] = 'Try Diffrent UserName And Password';
}else{

	$sql  = " INSERT INTO `admin_sch` ( `uname`, `pwd`,`type`,`name`,`p_num`, `admin_id`)
	VALUES ('{$uname}', md5('{$pswd}'), '{$usrtype}', '{$fullname}','{$contactno}','{$user_id }') " ;

	$affectedRowCount = DB::execute($sql);
	if($affectedRowCount !== null ){
		$response['status'] = 'success';
		$response['msg'] = 'User Created Success Fully ';
	}else{
		$response['status'] = 'failed';
		$response['msg'] = 'User Not Created Please try Again ';
	}

}

echo json_encode($response);

