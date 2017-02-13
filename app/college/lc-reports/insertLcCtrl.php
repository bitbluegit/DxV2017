<?php 
require_once '../../../helper/db.php';


	$Gr_num= $_POST['grno'];
    $enroll_no= $_POST['enroll'];
    $stu_name = $_POST['name'];
    $mname= $_POST['mname'];
    $fname=$_POST['fname'];
    $religion=$_POST['religion'];
    $cast_subcaste= $_POST['cast'];
    $nationality= $_POST['nationality'];
    $dob= $_POST['dob'];
    $pob= $_POST['birth-place'];
    $doa= $_POST['doa'];
    $progress= $_POST['progress'];
    $conduct= $_POST['conduct'];
    $date_of_leaving= $_POST['dol'] !="" ?  $_POST['dol'] : date('Y-m-d');
    $std_studying= $_POST['std'];
    $reason_of_leaving = $_POST['rol'];
    $remark= $_POST['remark'];
    $created_at= date('Y-m-d H:i:s');
    $last_school_attend= $_POST['last-sch'];

   

$sql = "INSERT INTO `clg_lc` (`lc_no`, `Gr_num`, `enroll_no`, `stu_name`, `f_name`, `m_name`, `religion`,
  `cast_subcaste`, `nationality`, `dob`, `last_sch_clg_attend`, `pob`, `doa`, `progress`, `conduct`, `date_of_leaving`,
  `course_studying`, `reason_of_leaving`, `remark`, `created_at`
) 
VALUES ( '','$Gr_num', '$enroll_no', '$stu_name', '$fname', '$mname', '$religion', '$cast_subcaste', '$nationality',
    '$dob', '$last_school_attend', '$pob', '$doa', '$progress', '$conduct', '$date_of_leaving', '$std_studying',
    '$reason_of_leaving', '$remark', '$created_at'
  ) ";

// $result=mysqli_query($link,$sql);
$affectedRowCount = DB::execute($sql);
            if($affectedRowCount !== null ){
                $response['status'] = 'success';
                $response['msg'] = 'Class Created Success Fully ';
            }else{
                $response['status'] = 'failed';
                $response['msg'] = 'Class Not Created Please try Again ';
            }

    if($affectedRowCount){
    // update stu std to Mr.Dextro  
       $sql1 =" UPDATE clg_sch  SET `Std`='Mr.Dextro' WHERE `Gr_num`='".$Gr_num."'  ";
        $updateStd = DB::execute($sql1);


    }

    header("location:PrintLC.php");

