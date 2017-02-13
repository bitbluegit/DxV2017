<?php 

require '../../../helper/db.php';
$reqData =  json_decode($_POST['data'],true);
extract($reqData);


$sql = " 
SELECT *  FROM user_sch US 
WHERE US.Gr_num = '{$enroll}' 
";

$data  = DB::oneRow($sql);
if($data){
	extract($data);
}else{
	echo '<p class="error-msg">No Student Detail Found </p>';
	
};


$sql_fee =" SELECT  SCL.`fee_type`, SCL.`fee`, SCL.`lfee`,SCL.`one_time` FROM `sch_cls_fee` AS SCL 
INNER JOIN user_sch AS US  ON US.`Medium`=SCL.`Medium` AND US.`Std`=SCL.`Std` WHERE US.`Gr_num`='{$enroll}'";

$result = DB::allRow($sql_fee);
// extract($result);
// $fee_type = array_column($result, 'fee_type');
// foreach ($fee_type as $fee) {
// 	$OptionStr .= sprintf('<option value="%s">%s</option>',$fee,$fee);
// }


foreach ($result as $key => $value) {
	$OptionStr .= sprintf('<option value="%s">%s</option>',$value['fee_type'],$value['fee_type']);
}


// get gr number 
$recieptNo="SELECT ST.`Reciept` FROM adm_sch_tran AS ST ORDER BY ST.`Reciept` DESC LIMIT 1 ";
$reciept_no_data = DB::oneRow($recieptNo);
$reciept_no = $reciept_no_data['Reciept'] + 1 ;
?>



<!-- Title -->
<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
	<i class="ion-android-settings margin-right20"></i>
	Student Details 
</h5> 

<!-- Create Class Form -->
<form method="post" action="#" id="feeForm" onsubmit="return false" >

	<!-- ROW - 1  -->
	<div class="row">
			<div class="col m12 l4">
			<label for="reciept" class="font-weight100 small-caps full-width">Reicept No</label>
			<input class="full-width" type="text" id="reciept" name="reciept" value="<? echo $reciept_no ?>"   readonly>
		</div>

		<div class="col m12 l4">
			<label for="Stu_name" class="font-weight100 small-caps full-width">Student Name</label>
			<input class="full-width" type="text" id="Stu_name" name="Stu_name" value="<?=$Name?>"   readonly>
		</div>
		<div class="col m12 l4">
			<label for="enroll" class="font-weight100 small-caps full-width">Enroll Number</label>
			<input class="full-width" type="number" id="enroll" name="enroll" value="<?=$Gr_num?>"   readonly>
		</div>

		<div class="col m12 l4">
			<label for="medium" class="font-weight100 small-caps full-width"> Medium </label>
			<input class="full-width" type="text" id="medium" name="medium"    value="<?= $Medium ?>"   readonly>
		</div>

		<div class="col m12 l4">
			<label for="standard" class="font-weight100 small-caps full-width">Standard</label>
			<input class="full-width" type="text" id="standard" name="standard"    value="<?= $Std ?>"   readonly>
		</div>

		<div class="col m12 l4">
			<label for="section" class="font-weight100 small-caps full-width">Section</label>
			<input class="full-width" type="text" id="section" name="section"    value="<?= $Section ?>"   readonly>
		</div>
		<!-- <div class="col m12 l4">
			<label for="section" class="font-weight100 small-caps full-width">Reciept No.</label>
			<input class="full-width" type="text" id="section" name="section"    value="<?= $Section ?>"   readonly>
		</div>-->
		<!-- fee_type -->
		<div class="col m12 l4"> 

			<label for="feeType" class="font-weight100 small-caps full-width">Fee Type</label>
			<select class="full-width" type="text" id="feeType" name="feeType" onchange="feeElement()"  readonly>
				<option value="" disabled selected> Select Fee Type</option>
				<?php echo $OptionStr; ?>

			</select>
		</div>
		<!-- <div class="col m12 l4">
			<label for="frequency" class="font-weight100 small-caps full-width">Frequency</label>
			<select class="full-width"  id="frequency" name="frequency"    readonly>
				<?php  //echo $OptionString; ?>
			</select>
		</div> -->
		<div id="oneTimeFeeTmp" >

			<!-- monthly fee table here -->
		</div>

		
		<!-- Mode -->
		<div class="col m12 l4" >
			<label for="mode" class="font-weight100 small-caps full-width">Mode</label>
			<select id="mode" name="mode" onchange="getChequeDetails()" class="full-width" title="Select your payment mode.">
				<option value="Cash">Cash</option>
				<option value="Cheque">Cheque</option>
			</select>
		</div>


		<!-- Cheque Fileds -->
		<div id="chequedetailsFields" style="display: none">
			<!-- cheque no -->
			<div class="col m12 l4">
				<label for="chequeno" class="font-weight100 small-caps full-width">Cheque Number</label>
				<input type="number" id="chequeno" name="chequeno" value="0" class="full-width"  title="Enter Cheque Number.">
			</div>
			<!-- Bank Name -->
			<div class="col m12 l4">
				<label for="bankname" class="font-weight100 small-caps full-width">Bank Name</label>
				<input type="text" id="bankname" name="bankname" class="full-width" value="" title="Enter bank name ">
			</div>
			<!-- cheque date -->
			<div class="col m12 l4">
				<label for="chequedate" class="font-weight100 small-caps full-width">Cheque Date</label>
				<input type="date" id="chequedate" name="chequedate" value="" class="full-width" title="Select Cheque Date ">
			</div>
		</div> <!-- chequedetailsFields -->

		<!-- amount -->
		<div class="col m12 l4" >
			<label for="totalAmount" class="font-weight100 small-caps full-width">Total Amount</label>
			<input type="number" id="totalAmount" name="totalAmount"  class="full-width" value="{$feeAmount}" >
			
		</div>

		<!-- amount -->
		<div class="col m12 l4" id="paidhide" >
			<label for="paidAmount" class="font-weight100 small-caps full-width">Paid Amount</label>
			<input type="number" id="paidAmount" name="paidAmount"   class="full-width"  >
			
		</div>

		<div class="col m12 l4" >
			<label for="totalLateAmount" class="font-weight100 small-caps full-width">Late Fee</label>
			<input type="number" id="totalLateAmount" name="totalLateAmount" class="full-width" >
			
		</div>

		
		<div class="col m12 l4" >
			<label for="discount" class="font-weight100 small-caps full-width">Discount</label>
			<input type="number" id="discount" name="discount" value="0" class="full-width" >
			
		</div>
		<div class="col m12 l4" >
			<label for="reasone" class="font-weight100 small-caps full-width">Reasone</label>
			<input type="text" id="reasone" name="reasone" class="full-width" >
			
		</div>

		<!-- institute -->
		<!-- <div class="col m12 l4">
			<label for="medium" class="font-weight100 small-caps full-width">Institute</label>
			<select id="medium" name="medium" class="full-width" title="Select Your Institute." readonly="required">
				<option value="" disabled selected>Select Institute</option>
				<option value="Dextro">Dextro</option>

			</select>
		</div> -->


		<!-- Submit Button -->
		<div class="col m12 pad-top10 txt-left">
			<button type="submit" class="btn bg-grey txt-ash full-width" onclick="addFeeSection()"  id="createBonafideSubmit" >
				<i class="ion-android-send"></i>
				Add Fee

			</button>
		</div>

	</div><!-- ROW-1 END -->

</form>

	</div> <!-- class Detail table blcok end -->


</section> <!-- view-class-data-block -->



					<!-- ****************************
					**** View fees data Block  ****
					******************************-->

<section class="bg-white overflow-x box-shadow margin-bottom30" id="view-fee-data-block" style="min-height: 200px;">

	<!-- Title -->
	<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
		<i class="ion-ios-paper-outline margin-right20"></i>
		Added Fees
	</h5>

	<!-- add Fee Details Table Block -->

	<div class="class-detail-table">

		<table class="full-width margin-bottom-zero" id="feeDataTable">
			<thead>
				<tr class="txt-ash"> 
					<th>Reciept No.</th> <th>Enroll No</th> <th>Paid </th> <th>Balance</th> <th>Fee Type</th>
					<th>Frequency</th> <th>Pay Mode</th> <th>Cheque No</th> <th>Late Fee</th>
					 <th>Discount</th> <th>Reason</th> <th>Bank Name</th> <th>Cheque Date</th> <th>Delete</th>
				</tr>      
			</thead>
			<tbody id="addfeesection">
			
			
			</tbody>
	
	
			
		</table>
		<tfoot>
<div id="totalamountsection">
<!-- <span id="totalAmountDisplay">Total Amount: </script> </span> -->

		</div>
			</tfoot>
		</div>
			<div class="col m12 txt-left" style="margin-top: 50px; ">
			<button type="submit" class="btn bg-grey txt-ash full-width" onclick="insertFee()"  id="insertFeeSubmit" >
				<i class="ion-android-send"></i>
				Submit

			</button>
		</div>

</div>
</section>
<!-- add fee section template -->






<!-- ****************************
**** View Class data Block  ****
******************************-->

<section class="bg-white overflow-x box-shadow margin-bottom30" id="view-class-data-block">

  <!-- Title -->
  <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
    <i class="ion-ios-paper-outline margin-right20"></i>
    Fee Availabel For This Class
  </h5>

  <!-- Class Details Table Block -->
  <div class="class-detail-table">

    <table class="full-width margin-bottom-zero">
      <thead>
        <tr class="txt-ash"> <th>Fee Type</th> <th> Fee</th> <th>Late Fee</th> <th>One Time</th> 
        </tr>      
      </thead>
      <tbody id="class-details-tbody">
        <?php 





      // User Details 
        $sql = "
        		 SELECT  SCL.`fee_type`, SCL.`fee`, SCL.`lfee`,SCL.`one_time` FROM `sch_cls_fee` AS SCL 
				INNER JOIN user_sch AS US  ON US.`Medium`=SCL.`Medium` AND US.`Std`=SCL.`Std` WHERE US.`Gr_num`='{$enroll}'
			  ";

        $userDataArr = DB::allRow($sql);
        foreach ($userDataArr as $user){
         // $user_id = array_pop($user);
        

         echo sprintf("<tr><td>%s</td></tr>",implode('</td><td>',$user),$user);
       }
       ?>
       
    


  </tbody>
</table>

</div> <!-- class Detail table blcok end -->
</section> <!-- view-class-data-block -->




















<!-- <script src="../../../assets/js/app.js"></script>
	<script src="insertBonafide.js"></script> -->

</script>