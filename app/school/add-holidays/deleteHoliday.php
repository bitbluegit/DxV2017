<?php
require_once "../../../helper/db.php";
$reqdata = json_decode($_POST['data'], true);
$data = extract($reqdata);
// echo $sr_no;
$sql = "DELETE FROM `holidays` WHERE `holiday_id` = $holiday_id ";
$result = DB::execute($sql);
