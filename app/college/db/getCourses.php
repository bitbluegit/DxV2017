<?php 
require '../../../helper/db.php';

$reqData =  json_decode($_POST['data'],true);

$mdm = $reqData['mdm'];

$year = $reqData['year'];

$OptionStr ='<option value="" disabled selected> Select Course </option>';



$sql = " SELECT  CC.`Course` AS 'Course' FROM clg_class CC WHERE CC.`Medium` ='{$mdm}' AND CC.`year`='{$year}'
 AND CC.`Year`='{$year}' ";
 
$result  = DB::oneRow($sql);


foreach ( $result as $user) {
				
$OptionStr .= sprintf('<option value="%s">%s</option>',$user,$user);
				// echo sprintf("<option value='%s'>%s</option>",implode('</option><option>',$user) );
			}
 echo $OptionStr;