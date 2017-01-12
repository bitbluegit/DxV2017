<?php require_once '../../includes/header.php'; ?>

<!-- ****************************
**** noc enroll filter ****
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
				<input type="number" id="enroll" name="enroll" class="full-width" placeholder=" Enroll Number "  required="required">
			</div> 
			<!-- Submit Button --> 
			<div class="col m12 l4 pad-top20 txt-left">
				<button type="button" class="btn bg-grey txt-ash full-width"  onclick="getStudentDetailForNoc(this)" style=" margin-top: 3px;">
					<i class="ion-android-send"></i>
					Submit
				</button>
			</div>
		</div><!-- ROW-1 END -->
	</section> <!-- Enroll Filter Section END -->

</section> <!-- search student -->





<!-- ****************************
**** Create NOC form ****
***************************** -->
<section class="bg-white overflow-x box-shadow margin-bottom30" id="noc-block">

	<!-- Bonafide Form Template Insert Here -->

</section> <!-- create-nonafide -->


<script src="../../../assets/js/app.js"></script>
<script src="genrateNoc.js"></script>
<!-- <script src="insertBonafide.js"></script> -->