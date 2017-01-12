<?php require_once '../../includes/header.php'; ?>

<!-- ****************************
**** cerate circular ****
***************************** -->

<section class="bg-white overflow-x box-shadow margin-bottom30" id="create-circular-block">
	<!-- Title -->
	<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
		<i class="ion-android-settings margin-right20"></i>
		Create Circular 
	</h5> 
	<!-- serach student Form -->
	<form   id="circular-form" name="circular-form" method="post" action="#" >
		<!-- ROW - 1  -->
		<div class="row">
			<!-- circular description -->
			<div class="col m12 l4"   >
				<label for="desc" class="font-weight100 small-caps full-width">Circular Description</label>
				<textarea type="number" id="desc" name="desc" class="full-width" placeholder="Write Circular Description " style="height: 140px"  >
				</textarea>
			</div> 

			<!-- circular l Number -->
			<div class="col m12 l4"    >
				<label for="snumber" class="font-weight100 small-caps full-width">Circular Number</label>
				<input type="number" id="snumber" name="snumber" class="full-width" value="1"  >				
			</div> 
			<!-- circular Subject -->
			<div class="col m12 l4"   >
				<label for="subject" class="font-weight100 small-caps full-width">Circular Subject</label>
				<input type="number" id="subject" name="subject" class="full-width" placeholder="Enter Circular Subject"  >				
			</div> 
			<!-- circular date -->
			<div class="col m12 l4"   >
				<label for="date" class="font-weight100 small-caps full-width">Circular Date</label>
				<input type="number" id="date" name="date" class="full-width" placeholder="Enter Circular Date"  >				
			</div> 
			<!-- Select Branch -->
			<div class="col m12 l4"   >
				<label for="branch" class="font-weight100 small-caps full-width">Branch</label>
				<select id="branch" name="branch" class="full-width" >
				<option value="" disabled selected>Select Your Branch</option>
				</select>				
			</div> 

			<!-- Select For -->
			<div class="col m12 l4"  >
				<label for="branch" class="font-weight100 small-caps full-width">Circular For</label>
				<select id="branch" name="branch" class="full-width" >
				<option value="school">School</option>
				<option value="college">College</option>
				<option value="common">All</option>
				</select>				
			</div> 

			<!-- Submit Button --> 
			<div class="col m12 pad-top10 txt-left" style="    margin-bottom: 10px;">
      <button type="submit" name="cir_submit" class="btn bg-grey txt-ash full-width" >
        <i class="ion-android-send"></i>
        Submit
      </button>
    </div>
		</div><!-- ROW-1 END -->
	</section> <!-- circular form  -->

</section> <!-- circular  -->



<?php 
if(isset($_POST['cir_submit'])){


}
?>
<!-- 
<script src="../../../assets/js/app.js"></script>
<script src="bonafide_form.js"></script> -->
