<?php 

$link = mysqli_connect("localhost", "admin", "12345", "dx2017");


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



if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
 header("location:printAward.php?enroll=$enroll");