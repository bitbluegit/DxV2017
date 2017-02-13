<?php require_once '../../includes/header.php';

$receipt_no = $_GET['srno'];

$sql =" select * from expenses where expenses.`receipt_no`= $receipt_no";
$result = DB::oneRow($sql);
var_dump($result);