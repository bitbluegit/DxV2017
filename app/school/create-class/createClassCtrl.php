<?php 

require_once '../../../helper/require.php';

class createClassCtrl{

	public static $classData = array('mdm' => 'English' ,'std' => 'Mr Dextro','div' => 2);
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
	public static function insertClass($data){
		
	// validate data 
		$formData = self::validateData($data);
		$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '1';

		$query =  " select * from sch_class where Medium='{$formData['mdm']}' AND Std ='{$formData['std']}' " ;
		

		if(DB::oneRow($query)){
			$response['status'] = 'failed';
			$response['msg'] = 'Class Already Exist ';
		}else{

			$sql  = " INSERT INTO `sch_class` (`unique_id`, `Medium`, `Std`, `no_of_div`)
			VALUES ('{$user_id}', '{$formData['mdm']}', '{$formData['std']}', '{$formData['div']}') " ;

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
	}
}


createClassCtrl::insertClass( json_decode($_POST['data'], true) );