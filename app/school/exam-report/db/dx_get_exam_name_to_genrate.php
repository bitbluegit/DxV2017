<?php 

// include('../../db.php');
    $con = mysqli_connect("localhost","admin","12345","dx2017");


$reqData = json_decode($_POST['data'],true);
$mdm = $reqData['mdm'];
$std = $reqData['std'];
$sec = $reqData['sec'];
$resType = isset($reqData['resType']) ? 'checkbox' : 'option' ;

$sql = mysqli_query($con," SELECT DISTINCT  SE.`exam_id` , SE.`exam_name` FROM sch_exams SE WHERE SE.`mdm`='{$mdm}' AND SE.std='{$std}' AND SE.`sec`='{$sec}' ");



// Check box Template For Exam Name 
if($resType == 'checkbox'){
	$examCount = $sql->num_rows;
	if($sql && $examCount > 0 ){
		echo '<table><tbody>';
		$examNameTr = '<tr><td>Exam Name</td>';
		$examIdTr = '<tr><td>#</td>';

		while( $exam = mysqli_fetch_assoc($sql)) {
			$examNameTr .= sprintf('<td><span>%s</span></td>',$exam['exam_name']);
			$examIdTr .= sprintf('<td> <input type="checkbox" name="examIds" value="%s"></td>',$exam['exam_id']);
		}
		echo sprintf('%s</tr> %s</tr></tbody> ',$examNameTr,$examIdTr);
		echo sprintf("<tfoot><tr><td colspan='%s'>
			<button type='button' class='submit-btn' onclick='genrateExamReport()'>GENRATE</button>
			<button type='button' class='submit-btn' onclick='printSmallResultAll()'>SM-PRINT</button>
			<button type='button' class='submit-btn' onclick='printLargeResultAll()'>LG-PRINT</button>
			</td></tr> </tfoot> </table>",$examCount+1);
	}else{
		echo '<p> No Exam Found </p>';
	}

}else{ // select Option Template For Exam Name 

	if($sql && $sql->num_rows > 0 ){
		echo '<option value="default"> Select One </option>';
		while( $exam = mysqli_fetch_assoc($sql)) {
			echo sprintf('<option value="%s">%s</option>',$exam['exam_id'] ,$exam['exam_name']);
		}

	}else{
		echo '<option value="default"> No Exam Created </option>';
	}

}


