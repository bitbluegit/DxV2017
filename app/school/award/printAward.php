<?php require_once '../../includes/header.php' ; 

$sql= "SELECT * FROM sch_awards AW ORDER BY AW.`sr_no` DESC LIMIT 1";
$result = DB::oneRow($sql);
var_dump($result);