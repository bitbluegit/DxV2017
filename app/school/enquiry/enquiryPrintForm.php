<?php require_once '../../includes/header.php';
$sql = "SELECT * FROM enquiry ORDER BY sr_no DESC LIMIT 1";
$result = DB::OneRow($sql);
var_dump($result);

 ?>
