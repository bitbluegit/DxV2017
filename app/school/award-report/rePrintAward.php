<?php require_once '../../includes/header.php'; 
$srno = $_GET['srno'];
$sql=" SELECT * FROM sch_awards AW WHERE AW.sr_no= $srno ";
$result = DB::oneRow($sql);
var_dump($result);
?>