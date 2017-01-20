<?php 

require '../../../helper/db.php';
$reqData =  json_decode($_POST['data'],true);



$sql = " 
SELECT US.*,SD.* FROM user_sch AS US 
INNER JOIN sch_details AS SD ON SD.Gr_num=US.Gr_num WHERE US.Gr_num = '{$reqData['enroll']}' ";



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
	Create Lc 
</h5> 

<!-- Create Class Form -->
<form method="post" action="insertLcCtrl.php" id="filter-data" onsubmit="" >

	<!-- ROW - 1  -->
	<div class="row">

		<div class="col m12 l4">
			<label for="enroll" class="font-weight100 small-caps full-width">Enroll Number</label>
			<input class="full-width" type="number" id="enroll" name="enroll" value="<?=$Gr_num?>" required>
		</div>

		<div class="col m12 l4">
			<label for="grno" class="font-weight100 small-caps full-width">Gr Number</label>
			<input class="full-width" type="number" id="grno" name="grno" value="<?= $Enroll?>" required>
		</div>

		<div class="col m12 l4">
			<label for="name" class="font-weight100 small-caps full-width">Student Name</label>
			<input class="full-width" type="text" id="name" name="name" value="<?=$name?>" required>
		</div>

		<div class="col m12 l4">
			<label for="fname" class="font-weight100 small-caps full-width">Father's Name</label>
			<input class="full-width" type="text" id="fname" name="fname"    value="<?= $f_name ?>" required>
		</div>

		<div class="col m12 l4">
			<label for="mname" class="font-weight100 small-caps full-width">Mother's Name</label>
			<input class="full-width" type="text" id="mname" name="mname"    value="<?= $m_name ?>" required>
		</div>

		<div class="col m12 l4">
			<label for="religion" class="font-weight100 small-caps full-width">Religion</label>
			<input class="full-width" type="text" id="religion" name="religion" value="<?= $religion ?>" required>
		</div>

		<div class="col m12 l4">
			<label for="cast" class="font-weight100 small-caps full-width">Cast And SubCast</label>
			<input class="full-width" type="text" id="cast" name="cast" value="<?= $caste ?>" required>
		</div>

		<div class="col m12 l4">
			<label for="nationality" class="font-weight100 small-caps full-width">Nationality</label>
			<input class="full-width" type="text" id="nationality" name="nationality" value="<?= $nationality ?>" required>
		</div>

		<div class="col m12 l4">
			<label for="birth-place" class="font-weight100 small-caps full-width">Place Of Birth</label>
			<input class="full-width" type="text" id="birth-place" name="birth-place" value="<?= $birth_place ?>" required>
		</div>

		<div class="col m12 l4">
			<label for="dob" class="font-weight100 small-caps full-width">Date Of Birth</label>
			<input class="full-width" type="date" id="dob" name="dob"  value="<?= $DOB ?>" required>
		</div>

		<div class="col m12 l4">
			<label for="last-sch" class="font-weight100 small-caps full-width">Last School Attend</label>
			<input class="full-width" type="text" id="last-sch" name="last-sch"  value="<?= $last_school ?>" required>
		</div>

		<div class="col m12 l4">
			<label for="doa" class="font-weight100 small-caps full-width">Date Of Admission</label>
			<input class="full-width" type="date" id="doa" name="doa"  value="<?= $doa ?>" required>
		</div>

		<div class="col m12 l4">
			<label for="progress" class="font-weight100 small-caps full-width">Progress</label>
			<input class="full-width" type="text" id="progress" name="progress"  value="<?= $progress ?>" >
		</div>

		<div class="col m12 l4">
			<label for="conduct" class="font-weight100 small-caps full-width">Conduct</label>
			<input class="full-width" type="text" id="conduct" name="conduct"  value="<?= $conduct ?>" >
		</div>

		<div class="col m12 l4">
			<label for="std" class="font-weight100 small-caps full-width">Std/Class Studying</label>
			<input class="full-width" type="text" id="std" name="std"  value="<?= $Std ?>" required>
		</div>

		<div class="col m12 l4">
			<label for="dol" class="font-weight100 small-caps full-width">Date Of Leaving</label>
			<input class="full-width" type="date" id="dol" name="dol"  value="<?= $DOB ?>" required>
		</div>

		<div class="col m12 l4">
			<label for="rol" class="font-weight100 small-caps full-width">Reason Of Leaving</label>
			<input class="full-width" type="text" id="rol" name="rol"  value="" >
		</div>
		<div class="col m12 l4">
			<label for="remark" class="font-weight100 small-caps full-width">Remark</label>
			<input class="full-width" type="text" id="remark" name="remark"  required>
		</div>		



		<!-- Submit Button -->
		<div class="col m12 pad-top10 txt-left">
			<button type="submit" class="btn bg-grey txt-ash full-width">
				<i class="ion-android-send"></i>
				Submit
			</button>
		</div>

	</div><!-- ROW-1 END -->

</form>

<!-- <script src="../../../assets/js/app.js"></script>
 <script src="insertBonafide.js"></script> -->
 <script type="text/javascript">

 </script>