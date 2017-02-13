<?php 

// include('../../db.php');
$con = mysqli_connect("localhost","admin","12345","dx2017");
$reqData = $_GET;
$examIds = $reqData['examIds'];
$mdm = $reqData['mdm'];
$std = $reqData['std'];
$div = $reqData['div'];
$grNum = $reqData['grNum'];

// $primaryStdArr = array('first','second','third','fourth','fifth','sixth','seventh','eighth');
$subjectNameOrderArr = array('Bio','Math','Science');
$subjectOrder = sprintf( " '%s' " , implode("','",$subjectNameOrderArr));


$conGrNum = $grNum == -1 ? '' : "AND US.Gr_num ='{$grNum}' ";

$subNameArr = array();
$stuMarkDet = array();


////////  FUNCTION SECTION /////////////////

function sumOfArrElement($arrData = array())
{
	$total = 0;
	foreach($arrData as $data){
		$total += floatval($data);
	}
	return $total;
}


// grade for percent mark 
function percentToGrade($per)
{
	$grade=array('E2', 'E1', 'D','C2','C1','B2','B1','A2','A1');
	if($per <= 20) {return   $grade[0]; }
	else if( $per > 20 && $per <= 32) {return $grade[1]; }
	else if( $per > 32 && $per <= 40) {return  $grade[2]; } 
	else if( $per > 40 && $per <= 50) {return $grade[3]; }
	else if( $per > 50 && $per <= 60) {return $grade[4]; }
	else if( $per > 60 && $per <= 70) {return   $grade[5]; }
	else if( $per > 70 && $per <= 80) {return $grade[6]; }
	else if( $per > 80 && $per <= 90) {return  $grade[7]; }
	else if( $per > 90 && $per <= 100) {return $grade[8]; }
	else {return "error"; }
}


// Retive Student Details 

$studentDetails = mysqli_fetch_assoc(mysqli_query( $con ," SELECT US.*, SD.* FROM user_sch US 
	INNER JOIN sch_details SD ON SD.`Gr_num` = US.`Gr_num`
	WHERE US.`Gr_num`='{$grNum}'  ")) ;




// 1-8 std 
// if(in_array($std,$primaryStdArr)){

// 	$sql =  " SELECT DISTINCT US.`roll_no` , US.`Gr_num` , US.`Name` , ES.`subject_name` , 
// 	ES.`exam_sub_id` , SE.`exam_name` , SE.`exam_id` ,


// 	IFNULL(ES.fmt_daily_observation,0) AS 'fmt_daily_observation',
// 	IFNULL(ES.fmt_oral_work,0) AS 'fmt_oral_work',
// 	IFNULL(ES.fmt_practical_experiment,0) AS 'fmt_practical_experiment',
// 	IFNULL(ES.fmt_activity,0) AS 'fmt_activity',
// 	IFNULL(ES.fmt_project,0) AS 'fmt_project',
// 	IFNULL(ES.fmt_test_open_book,0) AS 'fmt_test_open_book',
// 	IFNULL(ES.fmt_home_class_work,0) AS 'fmt_home_class_work',
// 	IFNULL(ES.fmt_other,0) AS 'fmt_other',

// 	IFNULL(ES.smt_oral,0) AS 'smt_oral',
// 	IFNULL(ES.smt_practical,0) AS 'smt_practical',
// 	IFNULL(ES.smt_written,0) AS 'smt_written',

// 	IFNULL(SM.fmt_daily_observation,0) AS 'stu_fmt_daily_observation',
// 	IFNULL(SM.fmt_oral_work,0) AS 'stu_fmt_oral_work',
// 	IFNULL(SM.fmt_practical_experiment,0) AS 'stu_fmt_practical_experiment',
// 	IFNULL(SM.fmt_activity,0) AS 'stu_fmt_activity',
// 	IFNULL(SM.fmt_project,0) AS 'stu_fmt_project',
// 	IFNULL(SM.fmt_test_open_book,0) AS 'stu_fmt_test_open_book',
// 	IFNULL(SM.fmt_home_class_work,0) AS 'stu_fmt_home_class_work',
// 	IFNULL(SM.fmt_other,0) AS 'stu_fmt_other',

// 	IFNULL(SM.smt_oral,0) AS 'stu_smt_oral',
// 	IFNULL(SM.smt_practical,0) AS 'stu_smt_practical',
// 	IFNULL(SM.smt_written,0) AS 'stu_smt_written'
	
// 	FROM sch_exams SE 
// 	INNER JOIN sch_exam_subjects ES ON ES.`exam_id` = SE.`exam_id` 
// 	INNER JOIN user_sch US ON  US.`Medium` = SE.`mdm`  AND US.`Std` = SE.`std`  AND US.`Section`  = SE.`sec` 
// 	LEFT JOIN sch_student_mark SM ON SM.`exam_sub_id` =  ES.`exam_sub_id` AND SM.`gr_num` = US.`Gr_num` 
// 	WHERE SE.`exam_id` IN ({$examIds}) {$conGrNum}
// 	GROUP BY US.`Gr_num` ,  ES.`exam_sub_id`
// 	ORDER BY US.`roll_no` , US.`Gr_num` , FIELD(ES.`subject_name`,{$subjectOrder}) , SE.`exam_name` " ;


// }else{

	$sql =  " SELECT DISTINCT US.`roll_no` , US.`Gr_num` , US.`Name` ,SE.exam_name , ES.`subject_name` , 
	ES.`exam_sub_id` , SE.`exam_name` , SE.`exam_id` ,
	SUM(IFNULL(ES.written_mark,0)) AS 'exam_submative_mark'  ,  SUM(IFNULL(ES.oral_mark,0)) AS 'exam_formative_mark' ,
	SUM(IFNULL(SM.written_mark,0)) AS 'stu_submative_mark'  ,  SUM(IFNULL(SM.oral_mark,0)) AS 'stu_formative_mark' 
	FROM sch_exams SE 
	INNER JOIN sch_exam_subjects ES ON ES.`exam_id` = SE.`exam_id` 
	INNER JOIN user_sch US ON  US.`Medium` = SE.`mdm`  AND US.`Std` = SE.`std`  AND US.`Section`  = SE.`sec` 
	LEFT JOIN sch_student_mark SM ON SM.`exam_sub_id` =  ES.`exam_sub_id` AND SM.`gr_num` = US.`Gr_num` 
	WHERE SE.`exam_id` IN ({$examIds}) {$conGrNum}
	GROUP BY US.`Gr_num` ,  ES.`exam_sub_id`
	ORDER BY US.`roll_no` , US.`Gr_num` , FIELD(ES.`subject_name`,{$subjectOrder}) , SE.`exam_name` " ;

// }

$result  = mysqli_query($con ,$sql);

$markDetailTemplate = "";
$examName ='';


$counter = 1 ;
$netExamMarks = 0;
$netObtainedMark = 0 ;

while($row = mysqli_fetch_assoc($result)){
	$examName = $row['exam_name'];
	$_fmtExamMark = array_slice($row,7,8);
	$_smtExamMark = array_slice($row,15,3);

	$_fmtSubMarkTotal = sumOfArrElement($_fmtExamMark);
	$_smtSubMarkTotal = sumOfArrElement($_smtExamMark);
	$_gramdSubMarkTotal = $_fmtSubMarkTotal+$_smtSubMarkTotal;
	$netExamMarks +=$_gramdSubMarkTotal; 


	$_fmtStuMark = array_slice($row,18,8);
	$_smtStuMark = array_slice($row,24,3);

	$_fmtSubStuMarkTotal = sumOfArrElement($_fmtStuMark);
	$_smtSubStuMarkTotal = sumOfArrElement($_smtStuMark);
	$_gramdSubStuMarkTotal = $_fmtSubStuMarkTotal+$_smtSubStuMarkTotal;
	$netObtainedMark += $_gramdSubStuMarkTotal;

	$_per = ($_gramdSubStuMarkTotal/$_gramdSubMarkTotal)*100;
	$_grade = percentToGrade($_per);


	$markDetailTemplate .= sprintf('<tr class="stu-mark-det"> <td>%s</td> <td>%s - Max Mark </td>  <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>&nbsp;</td>  </tr>',
		$counter, $row['subject_name'],implode('</td><td>',$_fmtExamMark),$_fmtSubMarkTotal,implode('</td><td>',$_smtExamMark),
		$_smtSubMarkTotal,$_gramdSubMarkTotal );

	$markDetailTemplate .= sprintf('<tr> <td>&nbsp;</td> <td>%s - Mark Obtd </td>  <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> 
		<td>%s</td> <td>%s</td> </tr>',$row['subject_name'],implode('</td><td>',$_fmtStuMark),$_fmtSubStuMarkTotal,
		implode('</td><td>',$_smtStuMark), $_smtSubStuMarkTotal,$_gramdSubStuMarkTotal,$_grade );

	$counter++;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Student Result Report </title>


	<style type="text/css">
		*{ padding: 0; margin: 0; }

		div.row { height: auto !important; }
		.row:after {content: " "; display: block; clear: both; }
		.col {float: left; padding-left: 15px; padding-right: 15px; min-height: 1px; }

		.md1 {width: 8.333333333%; }
		.md2 {width: 16.66666667%; }
		.md3 {width: 25%; }
		.md4 {width: 33.33333333%; }
		.md5 {width: 41.66666667%; }
		.md6 {width: 50%; }
		.md7 {width: 58.33333333%; }
		.md8 {width: 66.66666667%; }
		.md9 {width: 75%; }
		.md10 {width: 83.33333333%; }
		.md11 {width: 91.66666667%; }
		.md12 {width: 100%; }

		div.student-detail { text-align: center; }
		div.student-detail div.md3 { width: 25%; border: 1px solid #ccc; padding: 0 10px; margin: 0 30px; }
		div.student-detail span { text-align: center; font-size: 16px; color: #607D8B;}
		div.student-detail span.head { 
			font-size: 20px; font-variant: small-caps; font-weight: 600; text-decoration: underline; line-height: 31px;
		}

		div.mark-det { 
			width: 1000px; margin: auto; margin-top: 20px; padding: 10px; border: 5px double #ccc;
			min-height: 600px;position: relative;
		}

		div.mark-det table { width: 100%; }
		table tr td,th {border : 1px solid #ccc; text-align: center; }

		.thead table td {
			border:1px solid #ccc; display: inline-block; font-size:11px; margin: 2px 5px; padding: 10px 5px;
			writing-mode: vertical-lr; transform: rotate(180deg);
		}

		.formative-heads tr td {     min-height: 95px; padding: 6px 5px; margin: 0 0 0 13px; } 
		.submative-heads tr td {     min-height: 95px; padding: 6px 5px; margin: 0 0 0 14px; }

		tr.stu-mark-det td { padding: 6px 7px;  }
		table caption.exam-name { 
			border: 1px solid #ccc; font-size: 22px; font-weight: 600; color: #607d8b;font-variant: small-caps; 
			padding: 8px; background-color: #eee; 
		}

		tr.thead { color:#607d8b; }



		/*Sign Block */
		div.sign-block { position: absolute; bottom: 10px; width: 100%; }
		div.sign-block table { width: 100%; }	
		div.sign-block table tr td { border:none; width: 33%;     color: #607d8b; }
	</style>

</head>
<body>



<!-- *************************************************
 ***************** TEMPLAING START ******************* 
 ************************************************** -->


 <div class="mark-det">

 	<!-- student detail -->
 	<div class="row student-detail">

 		<!-- Stduent Name -->
 		<div class="col md3">
 			<span class="head">Student Name</span> <br>
 			<span><?= $studentDetails['Name'] ?></span>
 		</div>

 		<!-- Stduent Gr Num -->
 		<div class="col md3">
 			<span class="head">Gr Number</span> <br>
 			<span><?= $studentDetails['Enroll'] ?></span>
 		</div>

 		<!-- Stduent Enroll -->
 		<div class="col md3">
 			<span class="head">Enroll Number</span> <br>
 			<span><?= $studentDetails['Gr_num'] ?></span>
 		</div>
 	</div>

 	<br>
 	<br>
 	


 	<table> <caption class="exam-name"> Mark Detail For '<?= $examName ?>' Exam</caption> 
 		<tbody>
 			<tr class="thead">
 				<td>Sr No.</td> <td>Subject Name</td>
 				<!-- Formative -->
 				<td colspan="9">
 					<table class="formative-heads"> <caption>Formative Evaluation</caption> 
 						<tbody> <tr><td>daily observation</td> <td>oral work</td> <td>practical experiment</td> <td>activity</td> <td>project</td> <td>test open book</td> <td>home class work</td> <td>Other</td> <td>Total</td> </tr>
 						</tbody>
 					</table>
 				</td>

 				<!-- Submative -->
 				<td colspan="4">
 					<table class="submative-heads"> <caption>Submative Evaluation</caption>
 						<tbody> <tr> <td>oral</td> <td>practical</td> <td>written</td> <td>Total</td> </tr> </tbody>
 					</table>
 				</td>
 				<td> Grand Total </td> <td> Grades </td>
 			</tr> <!-- thead -->

 			<?php echo $markDetailTemplate ;  ?>

 		</tbody>
 	</table>

 	<div class="sign-block">
 		<table>
 			<tbody>
 				<tr>
 					<td>Class Teacher Signature</td>
 					<td>CPS Head Signature</td>
 					<td>Head Master's Signature</td>
 				</tr>
 			</tbody>
 		</table>
 	</div>
 </div> 

</body>
</html>