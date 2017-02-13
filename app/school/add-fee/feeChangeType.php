<?php
// include('../../db.php');
require_once '../../../helper/db.php';

$reqData =  json_decode($_POST['data'],true);
$mdm     =$reqData['mdm'];
$std     =$reqData['std'];
$feeType = $reqData['feeType'];
$resposeArr = array();


$sql="SELECT fee,lfee,one_time FROM sch_cls_fee SF
WHERE SF.`Medium`='{$mdm}' AND SF.`Std`='{$std}' AND  SF.`fee_type`='{$feeType}'" ;
$result = DB::oneRow($sql);
extract($result);

if ($one_time == "Per Year"){
	$resposeArr['tmp_str'] =  "<div class='col m12 l4'>
	<label for='frequency' class='font-weight100 small-caps full-width'>One Time</label>
	<select class='full-width'  id='frequency' name='frequency'  required>
		<option value='one-time' >One Time</option>
	</select>
</div>

<div class='col m12 l4'>
	<label for='late' class='font-weight100 small-caps full-width'>Lait paid</label>
	<select class='full-width'  id='late' name='late' required>
		<option value='yes'>No</option>
		<option value='no'>Yes</option>
	</select>
</div>";
}else{
	$resposeArr['tmp_str'] =  "

	<div class='col m12 l4'>
		<label for='frequency' class='font-weight100 small-caps full-width'>One Time</label>
		<select class='full-width'  id='frequency' name='frequency'  required>
		<option value='Monthly' >Monthly</option>
		</select>
	</div>
	<div class='col m12 l4 hide'>
		<label for='feeAmount' class='font-weight100 small-caps full-width'>feeAmount</label>
		<input class='full-width'  id='feeAmount' name='feeAmount' value='$fee' required>
		
	</div>
	<div class='col m12 l4 hide'>
		<label for='actualLateFee' class='font-weight100 small-caps full-width'>lateFee</label>
		<input class='full-width'  id='actualLateFee' name='actualLateFee' value='$lfee' required>
		
	</div>

	<div class='table-responsive max-center ' >
		<table class='full-width'>
			<tbody id='month_name_list'>
				<tr> <td>#</td> <td>Jul</td><td>Aug</td><td>Sep</td><td>Oct</td><td>Term 2</td><td>Nov</td><td>Dec</td><td>Jan</td><td>Feb</td><td>Mar</td><td>Apr</td><td>May</td></tr>
				<tr class='month_name_cls'> <td>Months</td>
					<td class='sel_mon_span'><input class='sel_mon'   onclick='calCulateTotalMonthlyfee($fee)' type='checkbox' value='Jul'></td>
					<td class='sel_mon_span'><input class='sel_mon'  onclick='calCulateTotalMonthlyfee($fee)' type='checkbox' value='Aug'></td>
					<td class='sel_mon_span'><input class='sel_mon'  onclick='calCulateTotalMonthlyfee($fee)' type='checkbox' value='Sep'></td> 
					<td class='sel_mon_span'><input class='sel_mon'  onclick='calCulateTotalMonthlyfee($fee)' type='checkbox' value='Oct'></td>
					<td class='sel_mon_span'><input class='sel_mon'  onclick='calCulateTotalMonthlyfee($fee)' type='checkbox' value='Term 2'></td>
					<td class='sel_mon_span'><input class='sel_mon'  onclick='calCulateTotalMonthlyfee($fee)' type='checkbox' value='Nov'></td>
					<td class='sel_mon_span'><input class='sel_mon'  onclick='calCulateTotalMonthlyfee($fee)' type='checkbox' value='Dec'></td>
					<td class='sel_mon_span'><input class='sel_mon'  onclick='calCulateTotalMonthlyfee($fee)' type='checkbox' value='Jan'></td>
					<td class='sel_mon_span'><input class='sel_mon'  onclick='calCulateTotalMonthlyfee($fee)' type='checkbox' value='Feb'></td>
					<td class='sel_mon_span'><input class='sel_mon'  onclick='calCulateTotalMonthlyfee($fee)' type='checkbox' value='Mar'></td>
					<td class='sel_mon_span'><input class='sel_mon'  onclick='calCulateTotalMonthlyfee($fee)' type='checkbox' value='Apr'></td>
					<td class='sel_mon_span'><input class='sel_mon'  onclick='calCulateTotalMonthlyfee($fee)' type='checkbox' value='May'></td>
				</tr>
				<tr class='month_late_cls'> <td>Late</td> <td class='sel_mon_late_span'>
					<input class='sel_mon_late' onclick='calCulateTotalLfee($lfee) ' type='checkbox' value='Jul'></td>
					<td class='sel_mon_late_span'><input class='sel_mon_late' onclick='calCulateTotalLfee($lfee)' type='checkbox' value='Aug'></td>
					<td class='sel_mon_late_span'><input class='sel_mon_late' onclick='calCulateTotalLfee($lfee)' type='checkbox' value='Sep'></td>  
					<td class='sel_mon_late_span'><input class='sel_mon_late' onclick='calCulateTotalLfee($lfee)' type='checkbox' value='Oct'></td>  
					<td class='sel_mon_late_span'><input class='sel_mon_late' onclick='calCulateTotalLfee($lfee)' type='checkbox' value='Term 2'></td>  
					<td class='sel_mon_late_span'><input class='sel_mon_late' onclick='calCulateTotalLfee($lfee)' type='checkbox' value='Nov'></td>  
					<td class='sel_mon_late_span'><input class='sel_mon_late' onclick='calCulateTotalLfee($lfee)' type='checkbox' value='Dec'></td>  
					<td class='sel_mon_late_span'><input class='sel_mon_late' onclick='calCulateTotalLfee($lfee)' type='checkbox' value='Jan'></td>  
					<td class='sel_mon_late_span'><input class='sel_mon_late' onclick='calCulateTotalLfee($lfee)' type='checkbox' value='Feb'></td>  
					<td class='sel_mon_late_span'><input class='sel_mon_late' onclick='calCulateTotalLfee($lfee)' type='checkbox' value='Mar'></td>  
					<td class='sel_mon_late_span'><input class='sel_mon_late' onclick='calCulateTotalfee($lfee)' type='checkbox' value='Apr'></td>  
					<td class='sel_mon_late_span'><input class='sel_mon_late' onclick='calCulateTotalfee($lfee)' type='checkbox' value='May'></td> </tr></tbody>
				</table>
			</div>


			";


		}



		$resposeArr['fee_details'] = $result;

		echo json_encode($resposeArr); 
		exit;