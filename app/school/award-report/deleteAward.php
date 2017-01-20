<?php
require_once "../../../helper/db.php";
$reqdata = json_decode($_POST['data'], true);
$data = extract($reqdata);
// echo $sr_no;
$sql = "DELETE FROM `sch_awards` WHERE `sr_no` = $sr_no ";
$result = DB::execute($sql);
