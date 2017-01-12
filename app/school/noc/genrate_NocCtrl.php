<?php 

require '../../../helper/db.php';


$reqData =  json_decode($_POST['data'],true);



$sql = " 
SELECT US.Gr_num, SC.`name`,US.`roll_no`, US.Std, SC.`f_name`, SC.`m_name`, SC.`DOB`, SC.`birth_place`, SC.`religion` 
FROM user_sch US 
INNER JOIN sch_details SC ON US.Gr_num = SC.Gr_num 
WHERE US.Gr_num = '{$reqData['enroll']}' 
";

$data  = DB::oneRow($sql);
if($data){
	extract($data);
}else{
	echo '<p class="error-msg">No Student Detail Found </p>';
	exit;
}

?>


<!-- Title -->
<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
	<i class="ion-android-settings margin-right20"></i>
	Genrate NOC 
</h5> 

<!-- Create Class Form -->
<form method="post" action="insertNocCtrl.php" id="filter-data" onsubmit="" >

	<!-- ROW - 1  -->
	<div class="row">

		<div class="col m12 l4">
			<label for="enroll" class="font-weight100 small-caps full-width">Enroll Number</label>
			<input class="full-width" type="number" id="enroll" name="enroll" value="<?=$Gr_num?>"   required>
		</div>

		<div class="col m12 l4">
			<label for="issuedate" class="font-weight100 small-caps full-width">Issue Date</label>
			<input class="full-width" type="date" id="issuedate" name="issuedate" value="<?php echo date('Y-m-d');?>"   required>
		</div>
		<div class="col m12 l4">
			<label for="Stu_name" class="font-weight100 small-caps full-width">Student Name</label>
			<input class="full-width" type="text" id="Stu_name" name="Stu_name"    value="<?=$name?>"   required>
		</div>

		<div class="col m12 l4">
			<label for="rollno" class="font-weight100 small-caps full-width">Roll Number</label>
			<input class="full-width" type="number" id="rollno" name="rollno" value="<?=$roll_no?>"   required>
		</div>
		<div class="col m12 l4">
			<label for="hyear" class="font-weight100 small-caps full-width">Held Year</label>
			<select  class="full-width" type="text" id="hyear" name="hyear"  required>
				<option value="" disabled selected>Select Year</option>
				  <?php
						for ($year = 2016; $year <= 2025; $year++) {
						echo " <option value='$year'> $year </option>";
						} 
				   ?> 
			</select>
		</div>


		<div class="col m12 l4">
			<label for="standard" class="font-weight100 small-caps full-width">Standard</label>
			<input class="full-width" type="text" id="standard" name="standard"    value="<?= $Std ?>"   required>
		</div>

		<div class="col m12 l4">
			<label for="date" class="font-weight100 small-caps full-width">Date</label>
			<input class="full-width" type="date" id="date" name="date" value="<?php echo date('Y-m-d');?>"   required>
		</div>

		<div class="col m12 l4">
			<label for="letterno" class="font-weight100 small-caps full-width">Letter No</label>
			<input class="full-width" type="number" id="letterno" name="letterno" placeholder="Insert Letter Number"   required>
		</div>		

		

		<!-- Submit Button -->
		<div class="col m12 pad-top10 txt-left">
			<button type="submit" class="btn bg-grey txt-ash full-width" >
				<i class="ion-android-send"></i>
				Submit
			</button>
		</div>

	</div><!-- ROW-1 END -->

</form>

<!-- <script src="../../../assets/js/app.js"></script>
 <script src="insertBonafide.js"></script> -->