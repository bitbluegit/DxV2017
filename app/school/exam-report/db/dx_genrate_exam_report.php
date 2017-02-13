<?php 

// include('../../db.php');
$con = mysqli_connect("localhost","admin","12345","dx2017");
$reqData = json_decode( $_POST['data'] , true );
$examIds = implode(', ' ,$reqData['examIds']);
$mdm = $reqData['mdm'];
$std = $reqData['std'];
$div = $reqData['div'];

$resultClass = array(
	'First Class With Distinction'=> 0  ,
	'First Class' => 0 ,
	'Second Class' => 0 ,
	'Third Class'  => 0 ,
	'Failed'       => 0
	);


function getResultString($per){
	global $resultClass;
	if( $per >=60 && $per <=74.99) { $resultClass['First Class'] +=1;  return 'First Class';}
	else if( $per >=75 && $per <=100)   { $resultClass['First Class With Distinction'] +=1; return 'First Class With Distinction';   }
	else if( $per >=45 && $per <=59.99) { $resultClass['Second Class'] +=1;  return 'Second Class';  }
	else if( $per >=35 && $per <=44.99) { $resultClass['Third Class'] +=1;  return'Third Class'; }
	else if( $per<35) {        $resultClass['Failed'] +=1;   return 'Failed'; }
	else{ return 'error'; }
}



$sql =  " SELECT DISTINCT US.`Gr_num` ,ES.`exam_sub_id`,
SUM(IFNULL(ES.written_mark,0)+IFNULL(ES.oral_mark,0)) AS 'exam_mark' ,
SUM(IFNULL(SM.written_mark,0)+IFNULL(SM.oral_mark,0)) AS 'stu_mark' 
FROM sch_exams SE 
INNER JOIN sch_exam_subjects ES ON ES.`exam_id` = SE.`exam_id` 
INNER JOIN user_sch US ON  US.`Medium` = SE.`mdm`  AND US.`Std` = SE.`std`  AND US.`Section`  = SE.`sec` 
INNER JOIN sch_student_mark SM ON SM.`exam_sub_id` =  ES.`exam_sub_id` AND SM.`gr_num` = US.`Gr_num` 
WHERE SE.`exam_id` IN ({$examIds}) 
GROUP BY US.Gr_num , ES.`exam_sub_id`
ORDER BY  US.`Gr_num` " ;

$result  = mysqli_query($con ,$sql);

while($markDetails= mysqli_fetch_assoc($result)){
	$stuMarkDetailsArr[$markDetails['Gr_num']][] = $markDetails;
}



//  Result Genrate Retive First Class , distinction & failed student 
$studentFinalResult = array(); // fail , first class, second class etc
foreach ($stuMarkDetailsArr as $grNum => $stuMarkArr) {
	
	$stuTotalMark = 0 ;
	$examTotalMark = 0;
	$resultStr = '';
	foreach ($stuMarkArr as $stuMarks) {
		
		if( intval($stuMarks['exam_mark']) > 0) { 
			$sm = floatval($stuMarks['stu_mark']);
			$em = floatval($stuMarks['exam_mark']);
			$per = ($sm/$em)*100;
			if($per >= 35){
				$stuTotalMark += $sm;
				$examTotalMark += $em;
			}else{
				$resultStr = 'Failed';
				$resultClass['Failed'] += 1;
				break;	
			} 
		}


	} // mark loop 

	if($resultStr =='' && $examTotalMark > 0 ){
		$finalPer =  ($stuTotalMark/$examTotalMark)*100;
		$resultStr = getResultString($per);
	}
	$studentFinalResult[$grNum] = $resultStr;
} // stu mark Arr Loop

// 1st class : 30 , 2nd Class:40
$stuResultStr = '' ;
foreach ($resultClass as $grNum => $stuResult ) {
	$stuResultStr .= $grNum.' : <span>'.$stuResult.'</span> ';
}


//  Get The Student Detail For Exam 
$sql = mysqli_query( $con ," SELECT US.`roll_no` , US.`Gr_num` , US.`Name` 
	FROM user_sch US 
	WHERE US.`Medium` ='{$mdm}'  AND US.`Std` ='{$std}'  AND US.`Section`='{$div}'
	ORDER BY US.`roll_no` , US.`Gr_num` " ) ;

$template = "" ;
if($sql && $sql->num_rows >0){
	$template .= "<table> <caption>{$stuResultStr}</caption> <thead><tr> <th> Roll No </th> <th> Enroll No </th> <th>Name</th><th>Result</th> <th>&nbsp;</th> <th>&nbsp;</th> </tr></thead> <tbody>";
	while( $row = mysqli_fetch_assoc($sql) ){
		$stuResult = isset($studentFinalResult[$row['Gr_num']]) ? $studentFinalResult[$row['Gr_num']]: '';
		$template .= sprintf('<tr><td>%s</td><td>%s</td> <td><button onclick="printSmallResultPrint(%s)">SM-PRINT</button></td>
			<td><button onclick="printResultPrint(%s)">LG-PRINT</button></td> </tr>',implode('</td><td>',$row),$stuResult,$row['Gr_num'],$row['Gr_num']);
	}
	$template .= '</tbody></table>';
}else{
	$template .= "";
}

echo $template;

