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
		extract($formData);
		$currentDate = date('Y-m-d');
		$id=$_COOKIE['Id'];


		$sql = " INSERT INTO `enquiry` (`unique_id` ,`name`, `f_name`,`m_name`,`sex`,`DOB`,`cont_num`, `medium`, `std`,`section`,`enq_date`)
		VALUES ($id,'{$name}', '{$fname}', '{$mname}', '{$gender}','{$dob}','{$contact}','{$mdm}','{$std}', '{$sec}','{$currentDate}' ) " ;


		$affectedRowCount = DB::execute($sql);
		if($affectedRowCount !== null ){
			$response['status'] = 'success';
			$response['msg'] = 'Enquiry Inserted Success Fully ';
		}else{
			$response['status'] = 'failed';
			$response['msg'] = 'Enquiry Not Inserted Please try Again ';
		}
		
		// }

		echo json_encode($response);
	}
}


addEnquiryCtrl::addEnquiry( json_decode($_POST['data'], true) );

