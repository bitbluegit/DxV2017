<?php 

// include('../../db.php');
$con = mysqli_connect("localhost","admin","12345","dx2017");

$reqData = json_decode( $_POST['data'] , true );
$examIds = implode(', ' ,$reqData['examIds']);
$mdm = $reqData['mdm'];
$std = $reqData['std'];
$div = $reqData['div'];

// $primaryStdArr = array('first','second','third','fourth','fifth','sixth','seventh','eighth');
$subjectNameOrderArr = array('Bio','Math','Science');
$subjectOrder = sprintf( " '%s' " , implode("','",$subjectNameOrderArr));

// $primaryStdFlag = in_array($std,$primaryStdArr) ? true : false;

$subNameArr = array();
$stuMarkDet = array();



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



//  roll no , gr ,  name ,  sub-name -> exam-name smt /  fmt total grade 

// 1-8 std 
// if(in_array($std,$primaryStdArr)){

// 	$sql =  " SELECT DISTINCT US.`roll_no` , US.`Gr_num` , US.`Name` ,ES.`subject_name` , 
// 	ES.`exam_sub_id` , SE.`exam_name` , SE.`exam_id` ,
	
// 	(IFNULL(ES.fmt_daily_observation,0)+ IFNULL(ES.fmt_oral_work,0)+ IFNULL(ES.fmt_practical_experiment,0)+ IFNULL(ES.fmt_activity,0)+ IFNULL(ES.fmt_project,0)+ 
// 	IFNULL(ES.fmt_test_open_book,0)+ IFNULL(ES.fmt_home_class_work,0) + IFNULL(ES.fmt_other,0) ) AS 'exam_formative_mark' ,
// 	(IFNULL(ES.smt_oral,0)+ IFNULL(ES.smt_practical,0)+ IFNULL(ES.smt_written,0)) AS 'exam_submative_mark' ,

// 	(IFNULL(SM.fmt_daily_observation,0)+ IFNULL(SM.fmt_oral_work,0)+ IFNULL(SM.fmt_practical_experiment,0)+ IFNULL(SM.fmt_activity,0)+ IFNULL(SM.fmt_project,0)+
// 	IFNULL(SM.fmt_test_open_book,0)+ IFNULL(SM.fmt_home_class_work,0) + IFNULL(SM.fmt_other,0) ) AS 'stu_formative_mark' ,
// 	(IFNULL(SM.smt_oral,0)+ IFNULL(SM.smt_practical,0)+ IFNULL(SM.smt_written,0)) AS 'stu_submative_mark'

// 	FROM sch_exams SE 
// 	INNER JOIN sch_exam_subjects ES ON ES.`exam_id` = SE.`exam_id` 
// 	INNER JOIN user_sch US ON  US.`Medium` = SE.`mdm`  AND US.`Std` = SE.`std`  AND US.`Section`  = SE.`sec` 
// 	LEFT JOIN sch_student_mark SM ON SM.`exam_sub_id` =  ES.`exam_sub_id` AND SM.`gr_num` = US.`Gr_num` 
// 	WHERE SE.`exam_id` IN ({$examIds})
// 	GROUP BY US.`Gr_num` ,  ES.`exam_sub_id`
// 	ORDER BY US.`roll_no` , US.`Gr_num` , FIELD(ES.`subject_name`,{$subjectOrder}) , SE.`exam_name` " ;


//}else{

	$sql =  " SELECT DISTINCT US.`roll_no` , US.`Gr_num` , US.`Name` ,ES.`subject_name` , 
	ES.`exam_sub_id` , SE.`exam_name` , SE.`exam_id` ,
	SUM(IFNULL(ES.oral_mark,0)) AS 'exam_formative_mark' , SUM(IFNULL(ES.written_mark,0)) AS 'exam_submative_mark'  ,  
	SUM(IFNULL(SM.oral_mark,0)) AS 'stu_formative_mark'  , SUM(IFNULL(SM.written_mark,0)) AS 'stu_submative_mark'  
	FROM sch_exams SE 
	INNER JOIN sch_exam_subjects ES ON ES.`exam_id` = SE.`exam_id` 
	INNER JOIN user_sch US ON  US.`Medium` = SE.`mdm`  AND US.`Std` = SE.`std`  AND US.`Section`  = SE.`sec` 
	LEFT JOIN sch_student_mark SM ON SM.`exam_sub_id` =  ES.`exam_sub_id` AND SM.`gr_num` = US.`Gr_num` 
	WHERE SE.`exam_id` IN ({$examIds})
	GROUP BY US.`Gr_num` ,  ES.`exam_sub_id`
	ORDER BY US.`roll_no` , US.`Gr_num` , FIELD(ES.`subject_name`,{$subjectOrder}) , SE.`exam_name` " ;

//}

$result  = mysqli_query($con ,$sql);



/***********************************************************
 ********** STUDENT & SUBJECT -NAME ARRAY PREPARE ***********
 ***********************************************************/

$stuCurrentGrNum = -1 ;
$grNumCounterFlag = false; 

if($result && $result->num_rows > 0){
	$tmpArr = array();
	while($row = mysqli_fetch_assoc($result)){
		
		$_subName = $row['subject_name'] ;
		$_examName = $row['exam_name'];
		$_grnum = $row['Gr_num'];

		if($stuCurrentGrNum != $_grnum ){
			if($grNumCounterFlag){ // skip first time because there is no stu mark in tmp array
				$stuMarkDet[] = $tmpArr;
				$tmpArr = array();
			}

			$grNumCounterFlag = true ; 

			// store student info one time 
			$stuCurrentGrNum = $_grnum;
			$tmpArr['roll_no'] = $row['roll_no'];
			$tmpArr['Gr_num']  = $row['Gr_num'];
			$tmpArr['Name']    = ucwords(strtolower($row['Name']));
		}

		// store subject name and Exam-Mark
		$subNameArr[$_subName][$_examName]['exam_formative_mark'] = $row['exam_formative_mark']; 
		$subNameArr[$_subName][$_examName]['exam_submative_mark'] = $row['exam_submative_mark']; 
		


		// student subject marks 
		$tmpArr[$_subName][$_examName]['stu_formative_mark'] = $row['stu_formative_mark'];
		$tmpArr[$_subName][$_examName]['stu_submative_mark'] = $row['stu_submative_mark'];
		

	}

}

$stuMarkDet[] = $tmpArr; // store last loop data in array 





/*************************
 *** Prepare Table Head ***
 *************************/

$trSubjectHead = '<th>Roll No</th> <th>Enroll No</th> <th>Name</th>';
$trExamNameHead = '<th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>';

foreach($subNameArr as $subName => $examNames){
	$trSubjectHead .= sprintf(" <th colspan='%s'> %s </th> ",count($examNames)+2 ,$subName);
	foreach($examNames as $examName => $examMark){
		$_fmtMark = $examMark['exam_formative_mark'] > 0 ? '<span>FM/'.$examMark['exam_formative_mark'].'</span>' : '' ;
		$_smtMark = $examMark['exam_submative_mark'] > 0 ? '<span>SM/'.$examMark['exam_submative_mark'].'</span>' : '' ;
		$trExamNameHead .= sprintf('<th>%s <br> %s %s </th>',$examName,$_fmtMark,$_smtMark);
	}

	$trExamNameHead .= '<th>Total </th> <th>Grade</th>';
}

$trSubject = sprintf('<tr>%s  <th>Total Mark</th> <th>Grade</th> <th>Parents Sign</th> </tr>',$trSubjectHead);
$trExamName = sprintf('<tr>%s  <th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th> </tr>',$trExamNameHead);
$thead = sprintf('<thead> %s %s </thead>',$trSubject,$trExamName);



/*************************
 *** Prepare Table Body ***
 *************************/


$stuMarkRowsStr = '';
// student Mark Data 
foreach ($stuMarkDet as $stuData){

	$stuMarkStr ='';
	$TOTAL_EXAM_MARK = 0;
	$TOTAL_STU_MARK = 0;


	// if($primaryStdFlag){
	// 	$stuMarkStr .= sprintf('<td>%s <button onclick="printReport(%s)">&#9113;</button></td><td>%s</td><td>%s</td>',
	// 		$stuData['roll_no'],$stuData['Gr_num'],$stuData['Gr_num'],$stuData['Name']);
	// }else{
		$stuMarkStr .= sprintf('<td>%s</td><td>%s</td><td>%s</td>',$stuData['roll_no'],$stuData['Gr_num'],$stuData['Name']);
	//}

	foreach($subNameArr as $subName => $examName){
		$examTotalMatk = 0;
		$stuTotalMark = 0 ;

		foreach($examName as $examName => $examMark){
			$_examFmtMark = $examMark['exam_formative_mark'];
			$_examSubMark = $examMark['exam_submative_mark'];
			$examTotalMatk += ($_examSubMark+$_examFmtMark);
			$TOTAL_EXAM_MARK += $examTotalMatk;

			$_stuFmtMark = $stuData[$subName][$examName]['stu_formative_mark'] ;
			$_stuSmtMark = $stuData[$subName][$examName]['stu_submative_mark'];
			$stuTotalMark += ($_stuSmtMark+$_stuFmtMark);
			$TOTAL_STU_MARK += $stuTotalMark;

			$_examMarkStr ='';
			$_examMarkStr .=  $_examFmtMark > 0 ?  "<span>{$_stuFmtMark}</span>" : '';
			$_examMarkStr .=  $_examSubMark > 0 ?  "<span>{$_stuSmtMark}</span>" : '';
			

			$stuMarkStr .= sprintf( "<td> %s </td>" , $_examMarkStr );

		} // examName foreach

		// subject total , grade 
		$_per =  ($stuTotalMark/$examTotalMatk)*100;
		$_grade = percentToGrade($_per);
		$stuMarkStr .= sprintf("<td>%s</td><td> %s</td>",$stuTotalMark,$_grade);

	} // subNameArr foreach

	// student total , grade 
	$_finalPer =  ($TOTAL_STU_MARK/$TOTAL_EXAM_MARK)*100;
	$_finalGrade = percentToGrade($_finalPer);
	$stuMarkStr .= sprintf("<td>%s</td><td> %s</td><td> &nbsp;</td>",$TOTAL_STU_MARK,$_finalGrade);
	$stuMarkRowsStr .= sprintf('<tr>%s</tr>',$stuMarkStr);

} // stu mark foreach

$tbody = sprintf('<tbody><tr>%s</tr></tbody>',$stuMarkRowsStr);
echo sprintf('<table id="stu-mark-det-table">%s %s</table>',$thead,$tbody);











