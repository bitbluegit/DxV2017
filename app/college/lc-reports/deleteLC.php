<?php
require_once "../../../helper/db.php";
$reqdata = json_decode($_POST['data'], true);
$data = extract($reqdata);
// echo $sr_no;
$sql = "DELETE FROM `clg_lc` WHERE `lc_no` = $lc_no ";
$result = DB::execute($sql);
