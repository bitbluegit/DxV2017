<?php 
 require_once '../../../helper/db.php';

 $cir_no = $_POST['cnumber'];
$desc = $_POST['desc'];
$subject =$_POST['subject'];
$date = $_POST['date'];
$branch = $_POST['branch'];
$circular_for = $_POST['for'];
$sql = "INSERT INTO `circular`( `cir_desc`, `cir_subject`,`cir_date`, `cir_for`, `created_at`, `updated_at`) 
    VALUES ('".$desc."','".$subject."','".$date."','".$circular_for."','".date('Y-m-d h:m:s')."' ,'".date('Y-m-d h:m:s')."' )";

  
			$affectedRowCount = DB::execute($sql);
			if($affectedRowCount !== null ){
				$response['status'] = 'success';
				$response['msg'] = 'Circular Created Success Fully ';
			}else{
				$response['status'] = 'failed';
				$response['msg'] = 'Circular Not Created Please try Again ';
			}

header("location:circularPrint.php?cir_no=$cir_no");

?>