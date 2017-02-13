<?php 
require_once '../../../helper/require.php';

$unique_id = $_COOKIE['Id'];
$cheque_no= $_POST['chequeno'] ?: 'null';
$bank_name= $_POST['bankname'] ?: 'null';
$cheque_date= $_POST['chequedate'] ?: 'null';
// $remark = trim($_POST['remark']);
// $name= trim($_POST['name']);

extract($_POST);

$sql = "INSERT INTO expenses (`unique_id`, `receipt_no`, `to`, `mode`, `cheque_no`, `amount`, `remark`, 
		`date`, `title`, `b_name`, `cheq_date`, `branch`)
		VALUES ($unique_id, $voucher, '$name', '$mode', '$cheque_no', '$totalExpAmount', '$remark' , '$date(Y-m-d)', '$title', '$bank_name', '$cheque_date', '$branch' )";


$result = DB::execute($sql);

if($result){
	echo "inserted";
}
else
{
	echo "some error";
};

header("location:expensePrint.php");

?>