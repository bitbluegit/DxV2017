<?php 

require_once '../../../helper/db.php';


$enroll=$_POST['enroll'];
$issuedate = $_POST['issuedate'];
$name=$_POST['Stu_name'];
$rollno=$_POST['rollno'];
$held_year=$_POST['hyear'];
$std=$_POST['standard'];
$date=$_POST['date'];
$letterno=$_POST['letterno'];
   $id=$_COOKIE['Id'];



 	$sql = "INSERT INTO `sch_noc` (`unique_id`,`noc_no`, `Gr_no`, `issue_date`, `name`,  `roll_no`, `held_year`, `std`,
 	 `date`, `letter_no` )

VALUES ('$id','', '$enroll', now(), '$name',  '$rollno', '$held_year', '$std',  '$date',
 '$letterno')" ;


			$affectedRowCount = DB::execute($sql);
			if($affectedRowCount !== null ){
				$response['status'] = 'success';
				$response['msg'] = 'NOC Created Success Fully ';
			}else{
				$response['status'] = 'failed';
				$response['msg'] = 'NOC Not Created Please try Again ';
			}
 
  header("location:nocCertificate.php");
 


