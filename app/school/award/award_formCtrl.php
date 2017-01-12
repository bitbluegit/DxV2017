<?php 

require '../../../helper/db.php';
$reqData =  json_decode($_POST['data'],true);



$sql = " 
SELECT US.`Gr_num`,  SC.`name`,US.`Medium`, US.`Std`,US.`Section` 
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


// current date
$date = date('Y-d-m');


?>


<!-- Title -->
<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
	<i class="ion-android-settings margin-right20"></i>
	Add Award 
</h5> 

<!-- Create Class Form -->
<form method="post" action="addAwardCtrl.php" id="filter-data"  >

	<!-- ROW - 1  -->
	<div class="row">

		<div class="col m12 l4">
			<label for="enroll" class="font-weight100 small-caps full-width">Enroll Number</label>
			<input class="full-width" type="number" id="enroll" name="enroll" value="<?=$Gr_num?>"   required>
		</div>

		<div class="col m12 l4">
			<label for="date" class="font-weight100 small-caps full-width">Date </label>
			<input class="full-width" type="date" id="date" name="date"  value="<?php echo $date; ?>"   required>
		</div>

		<div class="col m12 l4">
			<label for="Stu_name" class="font-weight100 small-caps full-width">Student Name</label>
			<input class="full-width" type="text" id="Stu_name" name="Stu_name"    value="<?=$name?>"   required>
		</div>
		

		<div class="col m12 l4">
			<label for="medium" class="font-weight100 small-caps full-width">Medium</label>
			<input class="full-width" type="text" id="medium" name="medium"    value="<?= $Medium ?>"   required>
		</div>

		
		<div class="col m12 l4">
			<label for="standard" class="font-weight100 small-caps full-width">Standard</label>
			<input class="full-width" type="text" id="standard" name="standard"    value="<?= $Std ?>"   required>
		</div>

		<div class="col m12 l4">
			<label for="section" class="font-weight100 small-caps full-width">Section</label>
			<input class="full-width" type="text" id="section" name="section"    value="<?= $Section ?>"   required>
		</div>

		<div class="col m12 l4">
			<label for="competition" class="font-weight100 small-caps full-width">Name Of competition</label>
			<input class="full-width" type="text" id="competition" name="competition" required>
		</div>


		<div class="col m12 l4">
			<label for="remark" class="font-weight100 small-caps full-width">Remark</label>
			<input class="full-width" type="text" id="remark" name="remark" required>
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
			<button type="submit" class="btn bg-grey txt-ash full-width" onclick="printAward()" >
				<i class="ion-android-send"></i>
				Submit
			</button>
		</div>

	</div><!-- ROW-1 END -->

</form>

<!-- <script src="../../../assets/js/app.js"></script>
 <script src="insertBonafide.js"></script> -->

 <script type="text/javascript">
 	function printAward(){
 		alert ("grno");
 	}
 </script>