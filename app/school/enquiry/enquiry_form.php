<?php //require_once '../../includes/header.php';
require_once '../../includes/usr_sch_header.php'; ?>


<!-- ****************************
**** Create User Main Block ****
***************************** -->
<!-- title -->
<section class="bg-white overflow-x box-shadow margin-bottom30  ">
	<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
		<i class="ion-android-settings margin-right20"></i>
		Enquiry Form	
	</h5>

	<!-- Create User Form -->
	<form class="row" method="post" action="" id="" onsubmit="return false">

		<!-- User Name -->
		<div class="col m12 l4">
			<label for="name" class="font-weight100 small-caps full-width">Student Name</label>
			<input type="text" id="name" name="name" class="full-width" title="Enter User Name." required>
		</div>

		<!-- father Name -->
		<div class="col m12 l4">
			<label for="fname" class="font-weight100 small-caps full-width">Father Name</label>
			<input type="text" id="fname" name="fname" class="full-width" title="Enter User Name." required>
		</div>

		<!-- mother Name -->
		<div class="col m12 l4">
			<label for="mname" class="font-weight100 small-caps full-width">Mother Name</label>
			<input type="text" id="mname" name="mname" class="full-width" title="Enter User Name." required>
		</div>

		<!-- Gender -->
		<div class="col m12 l4">
			<label for="gender" class="font-weight100 small-caps full-width">Gender</label>
			<select id="gender" name="gender" class="full-width" title="Select your Gender.">
				<option value="" disabled selected>Select Gender</option>				
				<option value="Male">Male</option>
				<option value="Female">Female</option>				
			</select>
		</div>

		<!-- dob -->
		<div class="col m12 l4">
			<label for="dob" class="font-weight100 small-caps full-width">Date Of Birth</label>
			<input type="date" id="dob" name="dob" class="full-width" title="Select Student Date Of Birth." required>
		</div>

		<!-- present address -->
		<div class="col m12 l4">
			<label for="address" class="font-weight100 small-caps full-width">Present Address</label>
			<input type="text" id="address" name="address" class="full-width" title="Enter Present Address." required>
		</div>

		<!-- contact no-->
		<div class="col m12 l4">
			<label for="contact" class="font-weight100 small-caps full-width">Contact number</label>
			<input type="number" id="contact" name="contact" class="full-width" title="Enter 10 Digit Contact number." required>
		</div>

		<!-- Medium -->
		<div class="col m12 l4">
			<label for="medium" class="font-weight100 small-caps full-width">Medium</label>
			<select id="medium" name="medium" class="full-width" title="Select your medium.">
				 <?php foreach($GLOBALS['MEDIUM'] as $mdm){echo sprintf("<option value='%s'>%s</option>",$mdm,$mdm); } ?>
			</select>
		</div>

		<!-- standard -->
		<div class="col m12 l4">
			<label for="standard" class="font-weight100 small-caps full-width">Standard</label>
			<select id="standard" name="standard" class="full-width" title="Select your Standard."
			onchange="getSection()">
			<option value="" disabled selected>Select Std</option>
			 <?php foreach($GLOBALS['STD'] as $std){ echo sprintf("<option value='%s'>%s</option>",$std,$std); } ?>
		</select>
	</div>
	<!-- User type -->
	<div class="col m12 l4">
		<label for="section" class="font-weight100 small-caps full-width">Section</label>
		<select id="section" name="section" class="full-width" title="Select Student Section." required>
			<option value="" disabled selected>Select One</option>
			
		</select>
	</div>


	<!-- Submit Button -->
	<div class="col m12 pad-top10 txt-left">
		<button type="submit" class="btn bg-grey txt-ash full-width" id="addEnquirySubmit" onclick="redirect()">
			<i class="ion-android-send"></i>
			Submit
		</button>
	</div>

</form>
</section>




<!-- ****************************
**** View User Data Block  ****
******************************-->





</div>
<!-- /Container -->

<script src="../../../assets/js/app.js"></script>
<script src="addEnquiry.js"></script>
<script type="text/javascript">

	function updateUser(userid)
	{
		alert(userid);
	}

	function getSection(){
		var mdm = elementByIdValue('medium') ,
		std = elementByIdValue('standard'),
		callBackFunction =function(res){
			elementById('section').innerHTML = res;
		}; 

		AjaxPost('../db/getSection.php',{mdm:mdm,std:std},callBackFunction,'txt');
	}
</script>
