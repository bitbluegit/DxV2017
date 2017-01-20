<?php require_once '../../includes/header.php';

$sql ="SELECT * FROM sch_noc NOC ORDER BY NOC.`noc_no` DESC LIMIT 1	";
$result = DB::onerow($sql);
var_dump($result);