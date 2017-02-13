<?php 

// include('../../db.php');
$con = mysqli_connect("localhost","admin","12345","dx2017");


$reqData = json_decode($_POST['data'],true);
$mdm = $reqData['mdm'];
$yr = $reqData['yr'];
$cors = $reqData['cors'];
$corsName = $reqData['corsName'];

$sql = mysqli_query($con," SELECT DISTINCT  SE.sec FROM clg_exams SE WHERE SE.`mdm`='{$mdm}' AND SE.yr='{$yr}' AND SE.cors='{$cors}' AND SE.corsname='{$corsName}' ORDER BY SE.sec ");

if($sql && $sql->num_rows > 0 ){
	echo '<option value="default"> Select One </option>';
	while( $exam = mysqli_fetch_assoc($sql)) {
		echo sprintf('<option value="%s">%s</option>',$exam['sec'] ,$exam['sec']);
	}

}else{
	echo '<option value="default"> No Exam Div </option>';
}
