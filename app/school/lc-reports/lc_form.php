<?php require_once '../../includes/usr_sch_header.php'; 
//require_once '../../includes/header.php';?>

<!-- ****************************
**** bonafide enroll filter ****
***************************** -->

<section class="bg-white overflow-x box-shadow margin-bottom30" id="search-student-block">
	<!-- Title -->
	<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
		<i class="ion-android-settings margin-right20"></i>
		Search Student 
	</h5> 
	<!-- serach student Form -->
	<section  id="enroll-filter" name="enroll-filter" >
		<!-- ROW - 1  -->
		<div class="row">
			<!-- Enter Enroll Number -->
			<div class="col m12 l4"   style="margin-bottom: 9px;" >
				<label for="enroll" class="font-weight100 small-caps full-width">Enroll Number</label>
				<input type="number" id="enroll" name="enroll" class="full-width" placeholder=" Enroll Number " required="required">
			</div> 
			<!-- Submit Button --> 
			<div class="col m12 l4 pad-top20 txt-left">
				<button type="button" class="btn bg-grey txt-ash full-width" 
				onclick="getStudentDetailForLc(this)" style=" margin-top: 3px;">
					<i class="ion-android-send"></i>
					Submit
				</button>
			</div>
		</div><!-- ROW-1 END -->
	</section> <!-- Enroll Filter Section END -->

</section> <!-- search student -->





<!-- ****************************
**** Create bonafide form ****
***************************** -->
<section class="bg-white overflow-x box-shadow margin-bottom30" id="lc-block">

	<!-- Bonafide Form Template Insert Here -->

</section> <!-- create-nonafide -->


<script src="../../../assets/js/app.js"></script>
<!-- <script src="bonafide_form.js"></script> -->
<!-- <script src="insertBonafide.js"></script> -->

<script type="text/javascript">
		function getStudentDetailForLc(){
		var grNum = elementById('enroll').value.trim();
		// var std   = elementById("standard").value.trim();
		// if (std == 'Mr.Dextro'){
		// 	alert ('LC Already Issued');
		// }
		
		if( grNum =='' || grNum == undefined ){
			alert('Please Enter Valid Enroll Number ');
			return false;
		}
		
		var callBackFun = function(res){
			document.getElementById('lc-block').innerHTML = res;
		};

		AjaxPost('create_LcCtrl.php',{enroll:grNum},callBackFun,'txt');
	}


</script>