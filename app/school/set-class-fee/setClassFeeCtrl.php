<?php 
require_once '../../../helper/require.php';

class setClassFeeCtrl{

	public static $setClassFee = array('mdm' => 'english' ,'std' => 'first', 'feefreq' => 'Per Year' ,
		'feename' => 'Admission Fee','feeamount' =>'4000' ,'latefee' => '50','feeformat1' =>'compulsory' , 'feeformat2' => 'payable');
	// public static $response = array();

	 // Valdiate class data 
	public static function validateData($data){
		$formData = self::$setClassFee ;
		foreach ($formData as $key => $value) {
			$formData[$key] = $data[$key];
		}
		return $formData; 
	}

	// Insert Class Details
	public static function setClassFee($data){
		
	// validate data 
		$formData = self::validateData($data);
		$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '1';

		$query =  " select * from sch_cls_fee where Medium='{$formData['mdm']}' AND Std ='{$formData['std']}' AND fee_type = '{$formdata['feename']}'  " ;

		if(DB::oneRow($query)){
			$response['status'] = 'failed';
			$response['msg'] = 'Fee Detail Already Exist';
		}else{

			$sql  = " INSERT INTO `sch_cls_fee` (`unique_id`, `Medium`,`Std`,
			`fee_type`,`fee`,`lfee`,`one_time`,`cumpulsory`, `status`)
			VALUES ('{$user_id}','{$formData['mdm']}','{$formData['std']}',
			'{$formData['feename']}','{$formData['feeamount']}','{$formData['latefee']}','{$formData['feefreq']}',
			'{$formData['feeformat1']}','{$formData['feeformat2']}' ) " ;

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
	}
}

setClassFeeCtrl::setClassFee( json_decode($_POST['data'], true) );