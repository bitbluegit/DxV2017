<?php require_once '../../includes/header.php';

$sql = "SELECT  * FROM Expenses EXP ORDER BY EXP.`receipt_no`  DESC LIMIT 1";
$result = DB::oneRow($sql);
var_dump($result);





require_once '../../includes/footer.php';
?>

