<?php
require_once "../../../helper/db.php";
$reqdata = json_decode($_POST['data'], true);
$data = extract($reqdata);
// echo $cir_no;
$sql = "DELETE FROM `circular` WHERE `cir_no` = $cir_no ";
$result = DB::execute($sql);
