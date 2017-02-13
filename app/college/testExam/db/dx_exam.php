<?php 

// include('../../db.php');
$con = mysqli_connect("localhost","admin","12345","dx2017");

$reqData = json_decode($_POST['data'],true);
$mdm          = $reqData['mdm'];
$year         = $reqData['yr'];
$course       = $reqData['cors'];
$courseName   = $reqData['corsName'];
$exam_name 	  = $reqData['examName'];
$exam_subject = $reqData['examSubject'];
$user_id      = $_COOKIE['Id'];
$resStatusTxt = false;

$currentDateTime =  date('Y-m-d H:i:s');

// $primaryStdArr = array('first','second','third','fourth','fifth','sixth','seventh','eighth');


/**********************************************
******* Get the Division Count Form Class *****
**********************************************/

$secArr = array('A','B','C','D','E','F','G','H','I','J','K');
$divCount = 3 ;

$getDivCountQuery = mysqli_query($con ," SELECT  IF( DV1 > DV2 , DV1 , DV2) AS 'div_count' FROM (
	( SELECT IFNULL(CC.`no_of_div`,0) AS DV1  FROM clg_class CC WHERE CC.`Medium` = '{$mdm}' AND CC.Cors` = '{$course}' ) AS DC1 ,
	( SELECT IFNULL(COUNT(DISTINCT US.Section),0) AS DV2 FROM user_clg US WHERE US.`Medium` = '{$mdm}' AND US.course = '{$course}' ) AS DC2 
	) " )  ; 

if($getDivCountQuery && $getDivCountQuery->num_rows > 0){
	$divCountData = mysqli_fetch_assoc($getDivCountQuery);
	$divCount = intval($divCountData['div_count']) > 0 ? $divCountData['div_count'] : $divCount ;
}

$divArr = array_slice($secArr , 0 ,$divCount );

/**********************************************
******** Insert Exam For All Divison **********
**********************************************/

foreach($divArr as $div){
	$exam_id = -1 ;

	  // Insert Exam 

	

	
	$insertExam = mysqli_query($con , " INSERT INTO `clg_exams` (unique_id, mdm, cors ,corsName ,yr ,sec ,exam_name )
		VALUES ( '{$user_id}', '{$mdm}', '{$course}','{$courseName}','{$year}', '{$div}', '{$exam_name}' ) " );


	if( $insertExam ) { $exam_id = mysqli_insert_id($con) ; }


	if( $exam_id == -1 ) { die('Error Occur'); }


	// insert exam subjects 
	foreach($exam_subject as $sub_data){
		$insertExamSubjects = mysqli_query($con , "
			INSERT INTO `clg_exam_subjects` (`exam_id`, `subject_name`, `written_mark`, `oral_mark`,`exam_date_time`, `is_assign`, `mark_added` ) 
			VALUES ('{$exam_id}', '{$sub_data['subjectName']}', '{$sub_data['writtenMark']}', '{$sub_data['oralMark']}','{$currentDateTime}', '0', '0' ) ; " );



			 //  check Query 
		if($insertExamSubjects){ $resStatusTxt = true ; }
		else{ $resStatusTxt = false; }

	}


}

// Response Status 

$response = array();
$response['statusTxt'] = $resStatusTxt;
if($resStatusTxt){ $response['statusMsg'] = 'Exam Created Success Fully'; }
else{ $response['statusMsg'] = 'Error Occur Please Try Agaiin ';}

echo json_encode($response);
exit;







