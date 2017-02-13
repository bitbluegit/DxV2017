<?php 
require_once '../../../helper/require.php';


$enroll=$_POST['enroll'];
$name=$_POST['Stu_name'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$dob=$_POST['dob'];
$birth_place=$_POST['birth-place'];
$std=$_POST['standard'];
$religion=$_POST['religion'];
$purpose=$_POST['purpose'];

$id = $_COOKIE['Id'];
$date= date('Y-m-d');


 	$sql = "INSERT INTO bonafide (unique_id, Gr_no, date, name, FatherName, m_name, DOB, place, std,
 	 religion,  purpose )

VALUES ('{$id}', '{$enroll}','{$date}', '{$name}', '{$fname}', '{$mname}', '{$dob}', '{$birth_place}', '{$std}', '{$religion}',
  '{$purpose}')" ;


			$affectedRowCount = DB::execute($sql);
			if($affectedRowCount !== null ){
				$response['status'] = 'success';
				$response['msg'] = 'Class Created Success Fully ';
			}else{
				$response['status'] = 'failed';
				$response['msg'] = 'Class Not Created Please try Again ';
			}

 
 header("location:bonafide_print.php");
 





// class createUserCtrl{

// 	public static $classData = array('enroll' => '1' ,'name' => 'xyz}','fname' => 'abc' ,
// 		'mname' => 'dge', 'std' => 'first','dob' => '08/02/1993','birth_place' => 'yg',
// 		'religion' => 'ddd', 'purpose' => 'abcdefg');
// 	// public static $response = array();

// 	 // Valdiate class data 
// 	public static function validateData($data){
// 		$formData = self::$classData ;
// 		foreach ($formData as $key => $value) {
// 			$formData[$key] = $data[$key];
// 		}
// 		return $formData; 
// 	}

// 	// Insert Class Details
// 	public static function insertUser($data){
		
// 	// validate data 
// 		$formData = self::validateData($data);
// 		// $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '1';

// 		$query =  " select * from bonafide where enroll='{$formData['enroll']}' AND
// 		 name ='{$formData['name']}' " ;

// 		if(DB::oneRow($query)){
// 			$response['status'] = 'failed';
// 			$response['msg'] = 'Already Issued';
// 		}else{

// 			$sql  = " INSERT INTO `bonafide` (`unique_id`, `Gr_no`, `sr_no`,`date`,`name`,`FatherName`, `m_name`
// 			 `DOB`, `place`, `std`, `religion`, `purpose`)
// 			VALUES ('','{$formData['enroll']}','','', '{$formData['name']}', '{$formData['fname']}',
// 			'{$formData['mname']}','{$formData['dob']}','{$formData['birth-place']}','{$formData['std']}',
// 			'{$formData['religion']}','{$formData['purpose']}',) " ;
	


// 			$affectedRowCount = DB::execute($sql);
// 			if($affectedRowCount !== null ){
// 				$response['status'] = 'success';
// 				$response['msg'] = 'Bonafide Created Success Fully ';
// 			}else{
// 				$response['status'] = 'failed';
// 				$response['msg'] = 'Bonafide Not Created Please try Again ';
// 			}
			
// 		}

// 		echo json_encode($response);
// 	}
// }


// createUserCtrl::insertUser( json_decode($_POST['data'], true) );