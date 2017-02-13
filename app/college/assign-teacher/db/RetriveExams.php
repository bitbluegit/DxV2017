<?php
// include('../../db.php');
$con = mysqli_connect("localhost","admin","12345","dx2017");

$mdm=$_POST['mdm'];
$std=$_POST['std'];
$sec=$_POST['sec'];
$query=mysqli_query($con,"SELECT DISTINCT  exam_id,exam_name FROM sch_exams WHERE mdm='$mdm' AND std='$std' AND sec='$sec'");

$i=0;
while($result=mysqli_fetch_row($query)){
    
?>
<option value='<?php echo $result[0];?>'><?php echo $result[1] ?></option>
<?php
    $i++;
}
exit;
?>