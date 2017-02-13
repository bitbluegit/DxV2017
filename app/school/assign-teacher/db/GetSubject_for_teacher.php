<?php
// include('../../db.php');
$con = mysqli_connect("localhost","admin","12345","dx2017");

$id=$_COOKIE['Id'];
$mdm=$_POST['Medium'];
$std=$_POST['Std'];
$sec=$_POST['Section'];
$exam=$_POST['ExamType'];
$inc=1;
$get_subject="SELECT  ES.exam_sub_id,ES.`subject_name`  FROM `sch_exam_subjects`  AS ES
        INNER JOIN sch_exams AS SE ON SE.exam_id=ES.exam_id 
        WHERE SE.mdm='".$mdm."' AND SE.std='".$std."' AND SE.exam_id='".$exam."' AND is_assign='0' ";
$result=mysqli_query($con,$get_subject);

if(mysqli_num_rows($result)!=0)
{

    while($row=mysqli_fetch_row($result)){	
     echo " <input type='checkbox' name='check_list' value='".$row[0]."' > ".$row[1]  ;   
         if($inc %3==0)
        {
            echo '<br/><br/>';
        }
        $inc++ ;
    }
}
else
{
echo "<p class='text-warning' style='text-align:center;'> No Subject Left To Assign !! </p>";
}

exit;
?>


