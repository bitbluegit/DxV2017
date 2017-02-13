<?php 


// include('../../db.php');
$con = mysqli_connect("localhost","admin","12345","dx2017");
$reqData = json_decode($_POST['data'], true);
$examId = $reqData['examId'];

// Get The Exam Subject Details AND Teacher Deatils 

$data =  mysqli_fetch_assoc( mysqli_query($con , " SELECT SE.Std FROM sch_exams SE WHERE SE.exam_id = '{$examId}' " ) ) ;

 $sql = mysqli_query($con ," SELECT SE.subject_name, SE.written_mark, SE.oral_mark ,   IF(SE.is_assign=1,'Yes','No') AS 'is_assign' , 
 	IF(SE.mark_added=1, 'Yes','No') AS 'mark_added' 
 	FROM sch_exam_subjects SE WHERE SE.`exam_id` = '{$examId}' " ) ;

 $resultTemplate = "";

 if($sql && $sql->num_rows > 0 ){
 	$resultTemplate .='<table><thead><tr><th>Subject Name</th> <th>Written Mark</th> <th>Oral Mark</th>  <th> Teacher Assign </th> <th> Mark Added </th>  </tr>';
 	while( $row = mysqli_fetch_assoc($sql)) {
 		$resultTemplate .= sprintf("<tr><td>%s</td></tr>",implode('</td><td>',$row));
 	}
 }else{
 	$resultTemplate .=  '<p style="text-align:center;border:1px solid #ccc;padding:10px 0;color:#f00;"> No Exam Data Found </p>';
 }

 echo sprintf('<div class="exam-det-block" id="view-exam-details-%s" class="exam-block" >%s</div>',$examId,$resultTemplate);

