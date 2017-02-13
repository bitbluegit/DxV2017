<?php
require_once "../../../helper/db.php";
$reqdata = json_decode($_POST['data'], true);
$data = extract($reqdata);
$sql = "DELETE FROM `admin_sch` WHERE `unique_id` = $userid ";
$result = DB::execute($sql);
