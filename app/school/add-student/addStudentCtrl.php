<?php 
 require_once '../../../helper/db.php';

$id = $_COOKIE['Id'];

$enroll = $_POST['enroll_no'];
$grno = $_POST['gr_no'];
$rollno =$_POST['rollno'];
$sname =$_POST['student_name'];
$fname =$_POST['f_name'];
$mname =$_POST['m_name'];
$nationality =$_POST['nationality'];
$dob = $_POST['dob'];
$birth_place = $_POST['birth_place'];
$religion = $_POST['religion'] ;
$caste = $_POST['caste'];
$address = $_POST['address'];
$paddress = $_POST['per_address'];
$fqualif = $_POST['f_qualification'];
$foccup = $_POST['f_occupation'];
$mqualif = $_POST['m_qualification'];
$moccup = $_POST['f_occupation'];
$docs = $_POST['documents'];
$state  = $_POST['state'];
$contact = $_POST['contact_number'];
$aadhar = $_POST['aadhar_no'];
$gender = $_POST['gender'];
$session = $_POST['session_year'];
$mdm = $_POST['medium'];
$std = $_POST['standard'];
$sec = $_POST['section'];
$lschool = $_POST['last_school'];
$amd = $_POST['admission_date'];
$status = $_POST['pay_status'];
$type = $_POST['type_of_adm'];





$sql = "INSERT INTO `sch_details` (`unique_id`, `Gr_num`, `Enroll`, `name`, `f_name`, `m_name`, `sex`, `DOB`, `birth_place`, `cont_num`, `address`, `off address`, `occupation`, `docs`, `religion`, `caste`, `nationality`, `last_school`,
  `adhar_num`, `status`, `timestamp`, `father_qualification`, `mother_qualification`, `mother_occupation`,
  `type_of_admission`, `state`, `doa`
) 
VALUES
  ($id , '".$enroll."' , '".$grno."', '".$sname."', '".$fname."', '".$mname."', '".$gender."', '".$dob."', '".$birth_place."', '".$contact."',
    '".$address."',  '".$paddress."', '".$foccup."', '".$docs."', '".$religion."', '".$caste."', '".$nationality."', '".$lschool."', '".$aadhar."', '".$status."', '',  '".$fqualif."', '".$mqualif."', '".$moccup."',
    '".$type."', '".$state."' , '".$amd."'
  ) ";


	$affectedRowCount = DB::execute($sql);




$sql1 = "INSERT INTO `user_sch`
 (`unique_id`, `Gr_num`, `Enroll`, `Name`, `Medium`, `Std`, `Section`, `roll_no`, `timestamp`
) 
VALUES
  ($id, '".$enroll."', '".$grno."', '".$sname."', '".$mdm."', '".$std."', '".$sec."', '".$rollno."', 'now()'
  )" ;
	$affectedRowCount1 = DB::execute($sql1);


	header("location:adm_form.php?gr_num='$enroll'");