<?php 
 require_once '../../../helper/db.php';
 extract($_POST);

 $date = date('Y-m-d');
$user_id = $_COOKIE['Id'];


$sql1 = "INSERT INTO `user_clg`
 (`unique_id`, `Gr_num`, `Enroll`, `roll_No`, `Name`, `Medium`, `course`, `CourseName`, `year`, `Section`, `timestamp`
) 
VALUES ($user_id, '{$enroll_no}' ,'{$gr_no}' ,'{$rollno}','{$student_name}' ,'{$medium}', '{$course}', 
  '{$cName}', '{$year}', '{$section}', '{$date}' )" ;
	$result = DB::execute($sql1);

if($result){
  $grno = DB::lastInsertId(); 

$sql = "INSERT INTO `clg_details` (`unique_id`, `Gr_num`, `Enroll`, `name`, `f_name`, `m_name`, `sex`, `DOB`,
 `birth_place`, `ContactNo`, `address`, `off address`, `occupation`, `docs`, `religion`, `caste`, `nationality`, `last_school`, `adhar_num`, `status`, `timestamp`, `father_qualification`, `mother_qualification`, `mother_occupation`, `type_of_admission`, `state`
) 
VALUES
  ($user_id , '{$grno}' ,'{$gr_no}' ,'{$student_name}' ,'{$f_name}', '{$m_name}'  ,'{$gender}', '{$dob}','{$birth_place}' ,
   '{$contact_number}', '{$address}' ,'{$per_address}' ,'{$f_occupation}' ,'{$documents}' ,'{$religion}' ,
   '{$caste}','{$nationality}' ,'{$last_school}' ,'{$aadhar_no}','{$pay_status}','{$date}', '{$f_qualification}',
    '{$m_qualification}' ,'{$m_occupation}' ,'{$type_of_adm}' ,'{$state}'  
     ) ";
  $result = DB::execute($sql);

  if($result){



    /****************************************
    ******* Upload Stduent Image  *********
    ****************************************/
    
    $tmp_name  = $_FILES['stu_img']['tmp_name'];
    $fileName = $grno.'.jpg'; 
    $path ="C:/Program Files (x86)/Ampps/www/DxV2017/uploads/Images/Stduent-Images/College/{$fileName}";
    move_uploaded_file($tmp_name,  $path);


    } //School detail insert if stmnt


} //user sch insert if stmnt


	 header("location:adm_form.php?gr_num='.$grno.'");