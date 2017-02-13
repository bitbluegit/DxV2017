<?php 
require_once '../../../helper/db.php';
$data = extract($_POST);


$sql ="UPDATE `sch_details`
		SET   `Enroll` = '{$gr_no}', `name` = '{$student_name}', `f_name` = '{$f_name}', `m_name` = '{$m_name}', `sex` = '{$gender}', `DOB` = '{$dob}', `birth_place` = '{$birth_place}', `cont_num` = '{$contact_number}', `address` = '{$address}',  `religion` = '{$religion}', `caste` = '{$caste}', `nationality` = '{$nationality}', `last_school` = '{$last_school}', `adhar_num` = '{$aadhar_no}', `status` = '{$pay_status}'
  		WHERE `Gr_num` = '{$enroll_no}' " ;


$result = DB::execute($sql);


$sql1 = "UPDATE `user_sch`
SET  `Enroll` = '{$gr_no}', `Name` = '{$student_name}', `Medium` = '{$medium}', `Std` = '{$standard}', `Section` = '{$division}', `roll_no` = '{$rollNo}'  WHERE `Gr_num` = '{$enroll_no}' " ;

$result1 = DB::execute($sql1);

if($result1){
	echo "update";}
	else{
	echo 	"error" ;
	}





?>