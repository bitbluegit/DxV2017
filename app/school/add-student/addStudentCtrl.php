<?php 
require_once '../../../helper/db.php';
 extract($_POST);

$user_id = $_COOKIE['Id'];
$date = date('Y-m-d');


$sql = " INSERT INTO `user_sch` (`unique_id`, `Enroll`, `Name`, `Medium`, `Std`, `Section`, `roll_no`, `timestamp` )
VALUES ($user_id, '{$enroll_no}',  '{$student_name}', '{$medium}', '{$standard}', '{$section}', '{$rollno}',
 '{$date}' ) " ;
$result = DB::execute($sql);

if($result){
  
  // last inserted grno
  $grno = DB::lastInsertId(); 

  $sql = "INSERT INTO `sch_details` (`unique_id`, `Gr_num`, `Enroll`, `name`, `f_name`, `m_name`, `sex`, `DOB`, `birth_place`, `cont_num`, `address`, `off address`, `occupation`, `docs`, `religion`, `caste`, `nationality`, `last_school`,
  `adhar_num`, `status`, `timestamp`, `father_qualification`, `mother_qualification`, `mother_occupation`,
  `type_of_admission`, `state`, `doa` )

  VALUES ($user_id , '{$grno}' , '{$gr_no}', '{$student_name}', '{$f_name}', '{$m_name}', '{$gender}', 
  '{$dob}', '{$birth_place}', '{$contact_number}', '{$address}',  '{$per_address}', '{$f_occupation}', 
  '{$documents}', '{$religion}', '{$caste}', '{$nationality}', '{$last_school}', '{$aadhar_no}'
  ,'{$pay_status}', '',  '{$f_qualification}', '{$m_qualification}', 
  '{$m_occupation}', '{$type_of_adm}', '{$state}' , '{$admission_date}' ) ";

  $result = DB::execute($sql);
  if($result){




    /****************************************
    ******* Upload Stduent Image  *********
    ****************************************/
    
    $tmp_name  = $_FILES['stu_img']['tmp_name'];
    $fileName = $grno.'.jpg'; 
    $path ="C:/Program Files (x86)/Ampps/www/DxV2017/uploads/Images/Stduent-Images/School/{$fileName}";
    move_uploaded_file($tmp_name,  $path);

 } // school details insert if stmt

} // user sch insert if stmt

header("location:adm_form.php?gr_num='$grno'");