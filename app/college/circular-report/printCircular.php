<?php require_once '../../includes/header.php';

$cirno = $_GET['cirno'];
$sql =" select * from circular where circular.`cir_no`=$cirno";
$result = DB::oneRow($sql);
var_dump($result);