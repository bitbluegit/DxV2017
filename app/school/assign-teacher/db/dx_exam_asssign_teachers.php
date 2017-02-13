<?php 


// include('../../db.php');
$con = mysqli_connect("localhost","admin","12345","dx2017");
$reqData = json_decode($_POST['data'], true);
$examId = $reqData['examId'];


// Get The Exam Subject Details AND Teacher Deatils 


$sql = mysqli_query($con," SELECT DISTINCT  ES.`subject_name`, IFNULL( AD.`Name` ,'-') AS 'teacher_name'
	FROM sch_exams SE
	INNER JOIN sch_exam_subjects ES ON ES.`exam_id` = SE.`exam_id`
	LEFT JOIN sch_exam_teacher ET ON ET.`exam_sub_id` = ES.`exam_sub_id`
	LEFT JOIN admin_sch AD ON AD.`unique_id` = ET.`teacher_id` 
	WHERE SE.`exam_id` = '{$examId}' ");




$resultTemplate = "";

if($sql && $sql->num_rows > 0 ){

	$resultTemplate .='<table><thead><tr><th>Subject Name</th> <th>Teacher Name</th></tr>';

	while( $row = mysqli_fetch_assoc($sql)) {

		$resultTemplate .= sprintf("<tr><td><span>%s</span></td><td><span>%s</span></td></tr>",$row['subject_name'] ,$row['teacher_name']);
		
	}
}else{
	$resultTemplate .=  '<p style="text-align:center;border:1px solid #ccc;padding:10px 0;color:#f00;"> No Exam Data Found </p>';
}

echo sprintf('<div class="exam-det-block" id="assign-teachers-exam-%s" class="exam-block" >%s</div>',$examId,$resultTemplate);

