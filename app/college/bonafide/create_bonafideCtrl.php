<?php 

require '../../../helper/db.php';
$reqData =  json_decode($_POST['data'],true);



$sql = " 
SELECT UC.Gr_num, CD.`name`, UC.year, CD.`f_name`, CD.`m_name`, CD.`DOB`, CD.`birth_place`, CD.`religion` 
FROM user_clg UC 
INNER JOIN clg_details CD ON UC.Gr_num = CD.Gr_num 
WHERE UC.Gr_num = '{$reqData['enroll']}' 
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
	Create Bonafide 
</h5> 

<!-- Create Class Form -->
<form method="post" action="insertBonafideCtrl.php" id="filter-data" onsubmit="" >

	<!-- ROW - 1  -->
	<div class="row">

		<div class="col m12 l4">
			<label for="enroll" class="font-weight100 small-caps full-width">Enroll Number</label>
			<input class="full-width" type="number" id="enroll" name="enroll" value="<?=$Gr_num?>"   required>
		</div>

		<div class="col m12 l4">
			<label for="Stu_name" class="font-weight100 small-caps full-width">Student Name</label>
			<input class="full-width" type="text" id="Stu_name" name="Stu_name"    value="<?=$name?>"   required>
		</div>

		<div class="col m12 l4">
			<label for="fname" class="font-weight100 small-caps full-width">Father's Name</label>
			<input class="full-width" type="text" id="fname" name="fname"    value="<?= $f_name ?>"   required>
		</div>

		<div class="col m12 l4">
			<label for="mname" class="font-weight100 small-caps full-width">Mother's Name</label>
			<input class="full-width" type="text" id="mname" name="mname"    value="<?= $m_name ?>"   required>
		</div>

		

		<div class="col m12 l4">
			<label for="year" class="font-weight100 small-caps full-width">Year</label>
			<input class="full-width" type="text" id="year" name="year"    value="<?= $year ?>"   required>
		</div>

		<div class="col m12 l4">
			<label for="dob" class="font-weight100 small-caps full-width">Date Of Birth</label>
			<input class="full-width" type="date" id="dob" name="dob"  value="<?= $DOB ?>"   required>
		</div>

		<div class="col m12 l4">
			<label for="birth-place" class="font-weight100 small-caps full-width">Place Of Birth</label>
			<input class="full-width" type="text" id="birth-place" name="birth-place" value="<?= $birth_place ?>"   required>
		</div>

		<div class="col m12 l4">
			<label for="religion" class="font-weight100 small-caps full-width">Religion</label>
			<input class="full-width" type="text" id="religion" name="religion" value="<?= $religion ?>"   required>
		</div>

		<div class="col m12 l4">
			<label for="purpose" class="font-weight100 small-caps full-width">Purpose</label>
			<input class="full-width" type="text" id="purpose" name="purpose" required>
		</div>

		<!-- institute -->
		<!-- <div class="col m12 l4">
			<label for="medium" class="font-weight100 small-caps full-width">Institute</label>
			<select id="medium" name="medium" class="full-width" title="Select Your Institute." required="required">
				<option value="" disabled selected>Select Institute</option>
				<option value="Dextro">Dextro</option>

			</select>
		</div> -->


		<!-- Submit Button -->
		<div class="col m12 pad-top10 txt-left">
			<button type="submit" class="btn bg-grey txt-ash full-width" id="createBonafideSubmit" >
				<i class="ion-android-send"></i>
				Submit
			</button>
		</div>

	</div><!-- ROW-1 END -->

</form>

<!-- <script src="../../../assets/js/app.js"></script>
 <script src="insertBonafide.js"></script> -->