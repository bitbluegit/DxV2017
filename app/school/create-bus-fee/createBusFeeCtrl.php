<?php 
require_once '../../../helper/require.php';

class insertBusFeeCtrl{

	public static $insertBusFee = array('areaname' => 'station' ,'feeamount' => '1500','latefee' => '50' ,
		'feefreq' => 'monthly' , 'latefeefreq' => 'onetime');
	// public static $response = array();

	 // Valdiate class data 
	public static function validateData($data){
		$formData = self::$insertBusFee ;
		foreach ($formData as $key => $value) {
			$formData[$key] = $data[$key];
		}
		return $formData; 
	}

	// Insert Class Details
	public static function InsertBusFee($data){
		
	// validate data 
		$formData = self::validateData($data);
		 $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '1';

		$query =  " select * from bus_fee where area_name='{$formData['areaname']}' " ;

		if(DB::oneRow($query)){
			$response['status'] = 'failed';
			$response['msg'] = 'Area Allready Created';
		}else{

			$sql  = " INSERT INTO `bus_fee` (`area_code`, `unique_id`, `area_name`,`bus_fee_amount`,
			`fee_freq`,`bus_lfee_amount`,`late_fee_freq`,`is_active`)
			VALUES ('','{$user_id}','{$formData['areaname']}','{$formData['feeamount']}',
			'{$formData['feefreq']}','{$formData['latefee']}','{$formData['latefeefreq']}','1') " ;

			$affectedRowCount = DB::execute($sql);
			if($affectedRowCount !== null ){
				$response['status'] = 'success';
				$response['msg'] = 'Bus Fee Created Success Fully ';
			}else{
				$response['status'] = 'failed';
				$response['msg'] = 'Bus Fee Not Created Please Try Again ';
			}
			
		}

		echo json_encode($response);
	}
}

insertBusFeeCtrl::InsertBusFee( json_decode($_POST['data'], true) );