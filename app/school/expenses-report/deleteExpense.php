<?php
require_once "../../../helper/db.php";
$reqdata = json_decode($_POST['data'], true);
$data = extract($reqdata);
// echo $receipt_no;
$sql = "DELETE FROM `expenses` WHERE `receipt_no` = $receipt_no ";
$result = DB::execute($sql);
