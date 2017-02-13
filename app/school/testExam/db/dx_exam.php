<?php 

// include('../../db.php');
$con = mysqli_connect("localhost","admin","12345","dx2017");

$reqData = json_decode($_POST['data'],true);
$mdm = $reqData['mdm'];
$std = $reqData['std'];
$exam_name = $reqData['examName'];
$exam_subject = $reqData['examSubject'];
$user_id=$_COOKIE['Id'];
$resStatusTxt = false;

$currentDateTime  =  date('Y-m-d H:i:s');

$primaryStdArr = array('first','second','third','fourth','fifth','sixth','seventh','eighth');


/**********************************************
******* Get the Division Count Form Class *****
**********************************************/

$secArr = array('A','B','C','D','E','F','G','H','I','J','K');
$divCount = 2 ;

$getDivCountQuery = mysqli_query($con ," SELECT  IF( DV1 > DV2 , DV1 , DV2) AS 'div_count' FROM (
	( SELECT IFNULL(SC.`no_of_div`,0) AS DV1  FROM sch_class SC WHERE SC.`Medium` = '{$mdm}' AND SC.`Std` = '{$std}' ) AS DC1 ,
	( SELECT IFNULL(COUNT(DISTINCT US.Section),0) AS DV2 FROM user_sch US WHERE US.`Medium` = '{$mdm}' AND US.Std = '{$std}' ) AS DC2 
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
	$insertExam = mysqli_query($con , " INSERT INTO `sch_exams` (`unique_id`, `mdm`, `std`, `sec`, `exam_name`, `date` )
		VALUES ( '{$user_id}', '{$mdm}', '{$std}', '{$div}', '{$exam_name}', 'date' ) " );

	if( $insertExam ) { $exam_id = mysqli_insert_id($con) ; }


	if( $exam_id == -1 ) { die('Error Occur'); }


	// insert exam subjects 
	foreach($exam_subject as $sub_data){
		$insertExamSubjects = mysqli_query($con , "
			INSERT INTO `sch_exam_subjects` (`exam_id`, `subject_name`, `written_mark`, `oral_mark`,`exam_date_time`, `is_assign`, `mark_added` ) 
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







