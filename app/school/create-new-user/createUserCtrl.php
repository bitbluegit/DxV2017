<?php 

require_once '../../../helper/require.php';

class createUserCtrl{

	public static $classData = array('uname' => 'Admin' ,'pswd' => '123','usrtype' => 'admin' ,
		'fullname' => 'admin' , 'contactno' => '9876543210');
	// public static $response = array();

	 // Valdiate class data 
	public static function validateData($data){
		$formData = self::$classData ;
		foreach ($formData as $key => $value) {
			$formData[$key] = $data[$key];
		}
		return $formData; 
	}

	// Insert Class Details
	public static function insertUser($data){
		
	// validate data 
		$formData = self::validateData($data);
		// $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '1';

		$query =  " select * from admin_sch where uname='{$formData['uname']}' AND
		 pwd ='{$formData['pswd']}' " ;

		if(DB::oneRow($query)){
			$response['status'] = 'failed';
			$response['msg'] = 'Try Diffrent UserName And Password';
		}else{

			$sql  = " INSERT INTO `admin_sch` (`unique_id`, `uname`, `pwd`,`type`,`name`,`p_num`, `admin_id`)
			VALUES ('','{$formData['uname']}', md5('{$formData['pswd']}'), '{$formData['usrtype']}',
			'{$formData['fullname']}','{$formData['contactno']}','') " ;


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
	}
}


createUserCtrl::insertUser( json_decode($_POST['data'], true) );