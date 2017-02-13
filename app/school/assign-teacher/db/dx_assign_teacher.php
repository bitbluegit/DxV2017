<?php 

// include('../../db.php');
$con = mysqli_connect("localhost","admin","12345","dx2017");

$reqData = json_decode($_POST['data'],true);
$assignSubArr = $reqData['subAssign'];
$mdm = $reqData['mdm'];
$std = $reqData['std'];
$div = $reqData['div'];
$user_id = $_COOKIE['Id'];
$currentDate = date('Y-m-d');
$currentDateTime = date('Y-m-d H:i:s');
$statusTxt = 'failed';

$assignTeacherArr = array();
$subIds = array();
$insertTeacherQuery ='';

// Loop Through Assign Subject 
forEach($assignSubArr as $assignSub){
	$insertTeacherQuery .= " INSERT INTO `sch_exam_teacher` (`unique_id`, `exam_sub_id`, `teacher_id`, `date` )
	VALUES ('{$user_id}', '{$assignSub['subId']}', '{$assignSub['tId']}', '{$currentDate}') 
	ON DUPLICATE KEY UPDATE `teacher_id`='{$assignSub['tId']}' ; " ;

	$assignTeacherArr[$assignSub['tId']][] =  $assignSub['subName'].' , ';
	$subIds[] = $assignSub['subId'];
}


  // Insert Into assign Teacher 
 // update is_assign = 1   
// send Chat Msg to Class 

$result = mysqli_multi_query($con,$insertTeacherQuery);

if($result){
	// resetDbCon();
	$statusTxt = 'success - assign teacher ';
	$examSubIds = implode(',',$subIds);
	$updateIsAssignStatus = mysqli_query($con ," UPDATE sch_exam_subjects ES SET ES.`is_assign`= 1 WHERE ES.`exam_sub_id` IN ({$examSubIds}) " );

	if($updateIsAssignStatus){
		// resetDbCon();
		$statusTxt = 'success - update is-assign status ';
		$msgToClass = '';
		forEach($assignTeacherArr as $tId => $subNameArr){
			$msg = trim(',' , 'I Teacher Of '.implode(', ',$subNameArr) );
			$msgToClassQuery = " INSERT INTO `sch_chat` (`teacher_id`, `msg`, `date`, `msg_status`, `user_type`, `mdm`, `std`, `sec` ) 
			VALUES ('{$user_id}', '{$msg}', '{$currentDateTime}', '1', '1', '{$mdm}', '{$std}', '{$div}') ; ";
		}

		if(mysqli_multi_query($con,$msgToClassQuery)){
			$statusTxt =  'success';
		}

	}

}

echo $statusTxt;
exit;
