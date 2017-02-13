<?php
// include('../../db.php');
$con = mysqli_connect("localhost","admin","12345","dx2017");

$query2=mysqli_query($con,"SELECT  unique_id,Name  FROM admin_sch WHERE type='teacher'");
$i=0;
while($result1=mysqli_fetch_row($query2)){
 ?>
<option value='<?php echo $result1[0];?>'><?php echo $result1[1]; ?></option>
<?php
    $i++;
}
exit;
?>