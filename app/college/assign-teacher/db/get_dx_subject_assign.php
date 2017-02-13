<?php 

// include('../../db.php');
$con = mysqli_connect("localhost","admin","12345","dx2017");

$reqData = json_decode($_POST['data'],true);
$exam_id = $reqData['examId'];


$sql = mysqli_query($con," 
	SELECT DISTINCT ES.`exam_sub_id`, ES.`subject_name`, IFNULL( ET.`teacher_id` ,'') AS 'teacher_id'  , IFNULL( AD.`Name` ,'') AS 'teacher_name'
	FROM clg_exams SE
	INNER JOIN clg_exam_subjects ES ON ES.`exam_id` = SE.`exam_id`
	LEFT JOIN clg_exam_teacher ET ON ET.`exam_sub_id` = ES.`exam_sub_id`
	LEFT JOIN admin_sch AD ON AD.`unique_id` = ET.`teacher_id` 
	WHERE SE.`exam_id` = '{$exam_id}'
	");

if($sql && $sql->num_rows > 0 ){
	while( $row = mysqli_fetch_assoc($sql)) {
		$assignTeacher = '';
		if( $row['teacher_id'] != '' && $row['teacher_name'] !='' ){
			$assignTeacher = $row['teacher_id'].' ~ '.$row['teacher_name'];
		}
		echo sprintf("<tr><td><input type='text' value='%s' data-subid='%s' readonly></td>",$row['subject_name'] ,$row['exam_sub_id']);
		echo sprintf("<td><input type='text' value='%s' list='teacher-list' placeholder=' Select Teacher Name ' ></td></tr>",$assignTeacher);
		
	}

}else{
	echo '<tr><td colspan="2"> No Exam Data Found </td></tr>';
}
