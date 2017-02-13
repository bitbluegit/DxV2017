<?php require_once '../../includes/header.php';

$receipt_no = $_GET['srno'];

$sql =" select * from clg_expenses EXP where EXP.`receipt_no`= $receipt_no";
$result = DB::oneRow($sql);
var_dump($result);