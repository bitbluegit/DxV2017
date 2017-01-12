<?php 

$link = mysqli_connect("localhost", "admin", "12345", "dx2017");


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



if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
  header("location:nocCertificate.php");
 


