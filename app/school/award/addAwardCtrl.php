<?php 

require_once '../../../helper/db.php';


$enroll=$_POST['enroll'];
$name=$_POST['Stu_name'];
$date=$_POST['date'];
$mdm = $_POST['medium'];
$std=$_POST['standard'];
$section = $_POST['section'];
$comp=$_POST['competition'];
$remark=$_POST['remark'];
   $id=$_COOKIE['Id'];


 	 $sql="INSERT INTO `sch_awards`(`unique_id`, `Gr_no`, `name`, `mdm`, `std`, `section`, `name_of_competition`, `remark`, `date`) VALUES ('$id','$enroll','$name','$mdm','$std','$section','$comp','$remark','$date')";



$affectedRowCount = DB::execute($sql);
			if($affectedRowCount !== null ){
				$response['status'] = 'success';
				$response['msg'] = 'Class Created Success Fully ';
			}else{
				$response['status'] = 'failed';
				$response['msg'] = 'Class Not Created Please try Again ';
			}

 
 header("location:printAward.php?enroll=$enroll");