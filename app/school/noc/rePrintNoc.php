<?php require_once '../../includes/header.php';
$srno=$_GET['srno'];
$sql = "SELECT * FROM sch_noc NOC  WHERE NOC.`noc_no`=$srno ";
$result = DB::oneRow($sql);
var_dump($result);