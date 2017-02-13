<?php require_once '../../includes/header.php'; ?>


<!-- ****************************
**** Create User Main Block ****
***************************** -->
<!-- title -->
<section class="bg-white overflow-x box-shadow margin-bottom30  ">
	<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
		<i class="ion-android-settings margin-right20"></i>
		Assign Teacher	
	</h5>

	<!-- Create User Form -->
	<form class="row" method="post" action="" id="" onsubmit="return false">

		
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
	<!-- section -->
	<div class="col m12 l4">
		<label for="section" class="font-weight100 small-caps full-width">Section</label>
		<select id="section" name="section" class="full-width" onchange="getExmType()" title="Select Student Section." required>
			<option value="" disabled selected>Select One</option>

		</select>
	</div>

	<!-- exam type -->
	<div class="col m12 l4">
		<label for="exmtype" class="font-weight100 small-caps full-width">Exam Type</label>
		<select id="exmtype" name="exmtype" class="full-width" onchange="getExmType()" title="Select Student Section." required>
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
<!--<script src="addEnquiry.js"></script> -->
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


	function getExmType(){
		var mdm = elementByIdValue('medium') ,
		std = elementByIdValue('standard'),
		sec = elementByIdValue('section'),
		callBackFunction =function(res){
			elementById('exmtype').innerHTML = res;
		}; 

		AjaxPost('getExmType.php',{mdm:mdm,std:std,sec:sec},callBackFunction,'txt');
	}
</script>
