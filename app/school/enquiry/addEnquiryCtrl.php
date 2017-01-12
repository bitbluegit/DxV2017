<?php 

require_once '../../../helper/require.php';

class addEnquiryCtrl{

	public static $enquiryData = array('name' => 'abc' ,'fname' => 'bcd','mname' => 'efg' ,
		'gender' => 'make' ,'dob' => '01/10/207' ,'address' => 'msdfsfdake' , 'contact' => '9876543210',
		'mdm' => 'English','std' => 'First' ,'sec' => 'A');
	// public static $response = array();

	 // Valdiate class data 
	public static function validateData($data){
		$formData = self::$enquiryData ;
		foreach ($formData as $key => $value) {
			$formData[$key] = $data[$key];
		}
		return $formData; 
	}

	// Insert Class Details
	public static function addEnquiry($data){
		
	// validate data 
		$formData = self::validateData($data);
		// $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '1';

		 // $query =  " select * from  where uname='{$formData['uname']}' AND
		 //  pwd ='{$formData['pswd']}' " ;

		// if(DB::oneRow($sql)){
		// 	$response['status'] = 'failed';
		// 	$response['msg'] = 'Try Diffrent UserName And Password';
		// }else{

			$sql = " INSERT INTO `enquiry` (`sr_no`, `name`, `f_name`,`m_name`,`sex`,`DOB,`cont_num`, `medium`,
			 `std`,`section`)
			VALUES ('','{$formData['name']}', '{$formData['fname']}', '{$formData['mname']}',
			'{$formData['gender']}','{$formData['dob']}','{$formData['contact']}','{$formData['mdm']}','{$formData['std']}',
			'{$formData['sec']}') " ;


			$affectedRowCount = DB::execute($sql);
			if($affectedRowCount !== null ){
				$response['status'] = 'success';
				$response['msg'] = 'User Created Success Fully ';
			}else{
				$response['status'] = 'failed';
				$response['msg'] = 'User Not Created Please try Again ';
			}
			
		// }

		echo json_encode($response);
	}
}


addEnquiryCtrl::addEnquiry( json_decode($_POST['data'], true) );