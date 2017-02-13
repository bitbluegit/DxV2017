<?php 

require_once '../../../helper/db.php';
$reqDataArr =  json_decode($_POST['data'],true);
$user_id = $_COOKIE['Id'];
$messageArr = array();
$responseArr =  array();
// extract($reqData);
$date = date('Y-m-d H:m:s');
$year = date('Y');
$tranDate= date('Y-m-d');

// Admission Fee - Insert Into "adm_sch_tran" Table and Admission Balalnce Amount insert into "Bal_amt"  Table 
// All Other Fees Insert Into sch_tran Table 
// For Last Year Pending Fee[one time fee] You Have to Update Amount and fee Status In 'lastyear_pend_fee_details' table 


foreach ($reqDataArr as $feeData) {
	extract($feeData);



	 // $feeName = $feeData[4] ;
	// $feeFreq =  $feeData[5] ;

	if($frequency == 'one-time'){
		if(	$feeType == 'admission fee'){
			// Inset Into adm_sch_tran 
			$tranInsert = " INSERT INTO adm_sch_tran (
			unique_id, Reciept, Gr_num, Amount, balance, Month, year, fee_type, pay_mode,
			cheque_num, lflag, late_fee, discount, reason, date, bank_name, cheque_date, is_cheq_msg_send,
			is_active, cheq_msg, created_at, updated_at )
			VALUES (
			'{$user_id}', '{$reciept}', '{$enroll}',
			'{$paid}', '{$balance}', '{$feeType}',
			'{$year}', '{$frequency}', '{$mode}',
			'{$cheqNo}', ' ', '{$lfee}', 
			'{$discount}', '{$reason}', '{$date}' ,
			'{$bank}', '{$chequedate}', ' ' ,
			'{$is_active}', '	 ', '{$tranDate}', '{$tranDate}') " ;

echo $tranInsert;
			$result = DB::execute($tranInsert);
			if($result){

			// Insert or update into bal_amt 
				$sql = " INSERT INTO bal_amt (Gr_num, amt, bal, date) 
				VALUES ('{$enroll}', '{$paid}', '{$balance}', '{$tranDate}') 
				ON DUPLICATE KEY UPDATE 
				amt = '{$paid}' , bal = '{$balance}' " ;

				$result = DB::execute($sql);
			}else{
				$messageArr[]  = $feeType .'Insertion Failed';
			}

		} else if( $feeType == 'Pending Fee'){
			$tranInsert = " 

			INSERT INTO sch_tran (
			unique_id, Reciept, Gr_num, Amount, bal, Month, year, fee_type, pay_mode, cheque_num,
			lflag, late_fee, discount, reason, date, bank_name, cheque_date, is_cheq_msg_send, is_active,
			cheq_msg, created_at, updated_at 
			) 
			VALUES ( 
			'{$user_id}', '{$reciept}', '{$enroll}', '{$paid}',
			'{$balance}', '{$feeType}', '{$year}',
			'{$frequency}', '{$mode}', '{$cheqNo}',
			'0', '{$lfee}', '{$discount}',
			'{$reason}', '{$date}', '{$bank}',
			'{$chequedate}', '0 ', '{$is_active}',
			'0', '{$tranDate}', '{$tranDate}'
			)

			"; 


			// Insert Into sch_tran 
			
			$result = DB::execute($tranInsert);
			if($result){

				$sql =  " 
				INSERT INTO lastyear_pend_fee_details ( Gr_num, pending_fees, total_amount, total_pending_amount, year )
				VALUES ('{$enroll}', '{$pending_fees}', '{$total_amount}', '{$total_pending_amount}', '{$year}' )
				ON DUPLICATE KEY UPDATE
				total_pending_amount = '{$total_amount}' 
				";

				$result = DB::execute($sql);
			}else{
				$messageArr[]  = $feeType .'Insertion Failed';
			}
		}
		else{

		}
	}else{
	// Monthly fee Here 		
	// Inset Into sch_tran 
		$tranInsert = " INSERT INTO sch_tran (
					unique_id, Reciept, Gr_num, Amount, bal, Month, year, fee_type, pay_mode, cheque_num,
					lflag, late_fee, discount, reason, date, bank_name, cheque_date, is_cheq_msg_send, is_active,
					cheq_msg, created_at, updated_at ) 
				VALUES (
					'{$user_id}', '{$reciept}', '{$enroll}', '{$paid}', '{$balance}', '{$feeType}', '{$year}', '{$frequency}', '{$mode}', '{$cheqNo}', ' ',
					'{$lfee}', '{$discount}', '{$reason}', '{$date}', '{$bank}', '{$chequedate}', ' ', '{$is_active}', ' ',
					'{$tranDate}', '{$tranDate}'
					) 
		" ;
		
		
		$result = DB::execute($tranInsert);
		if(!$result){
			$messageArr[]  = $feeType .'Insertion Failed';
		}
	}
}




if(count($messageArr)){
	$responseArr['status']= 'success';
}else{
	$responseArr['status']= 'failed';
	$responseArr['messages']= $messageArr;
}

echo json_encode($responseArr);
