<?php 
require '../../../helper/db.php';

$reqData =  json_decode($_POST['data'],true);

$mdm = $reqData['mdm'];
$std = $reqData['std']; 
$year = $reqData['Year'];

// $OptionStr ='<option value="" disabled selected> Select One </option>';



$sql = " SELECT  CC.`CourseName` AS 'CourseName' FROM clg_class CC WHERE CC.`Medium` ='{$mdm}' AND CC.`Course`='{$crs}'
 AND CC.`Year`='{$year}' ";
$result  = DB::oneRow($sql);
// $divCount = $result['divCount'];

// $divArr = array_slice($divArr,0, $divCount);

// echo sprintf('<option value="%s" >%s</option>',implode('</option><option>',$result),$result);
foreach ($result as $user){
				// $user_id = array_pop($user);
				// $btn = "<button onclick='updateUser({$user_id})'> <i class='ion-edit'></i> </button>";

				echo sprintf("<option value='%s'>%s</option>",implode('</option><option>',$user) );
			}
// echo $OptionStr;