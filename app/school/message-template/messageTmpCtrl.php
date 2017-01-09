<?php 

require_once '../../../helper/require.php';

class createTmpCtrl{

	public static $messageData = array('title' => 'holiday' ,'msg' => 'Mr Dextro','sec' => 'school');
	// public static $response = array();

	 // Valdiate class data 
	public static function validateData($data){
		$formData = self::$messageData ;
		foreach ($formData as $key => $value) {
			$formData[$key] = $data[$key];
		}
		return $formData; 
	}

	// Insert Class Details
	public static function insertTemplate($data){
		
	// validate data 
		$formData = self::validateData($data);
		$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '1';

		$query =  " select * from msg_template where tpl_txt='{$formData['msg']}' " ;
		

		if(DB::oneRow($query)){
			$response['status'] = 'failed';
			$response['msg'] = 'Template Already Exist ';
		}else{

			$sql  = " INSERT INTO `msg_template` (`unique_id`, `tpl_title`, `tpl_txt`, `tpl_for`)
			VALUES ('{$user_id}', '{$formData['title']}', '{$formData['msg']}', '{$formData['sec']}' ) " ;

			$affectedRowCount = DB::execute($sql);
			if($affectedRowCount !== null ){
				$response['status'] = 'success';
				$response['msg'] = 'Tmeplate Created Success Fully ';
			}else{
				$response['status'] = 'failed';
				$response['msg'] = 'Template Not Created Please try Again ';
			}
			
		}

		echo json_encode($response);
	}
}


createTmpCtrl::insertTemplate( json_decode($_POST['data'], true) );