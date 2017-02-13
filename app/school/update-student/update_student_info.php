<?php require_once '../../includes/header.php' ; ?>

<!-- student Filter Form -->
<div class="bg-white overflow-x box-shadow margin-bottom30  ">
	<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
		<i class="ion-android-settings margin-right20"></i>
		Search By Enroll Or Name
	</h5>
	<!-- Expense Form -->
	<form class="row" method="post" action="" onsubmit="return false">
		<!-- student Enroll -->
		<div class="col m12 l4">
			<label for="enroll_no" class="font-weight100 small-caps full-width">Enroll Number</label>
			<input type="number" id="enroll_no" class="full-width" placeholder="Enter Enroll Number" title="Enter Student Enroll Number.">
		</div>

		<!--Password -->
		<div class="col m12 l4">
			<label for="name" class="font-weight100 small-caps full-width">Name</label>
			<input type="text" id="name" class="full-width" placeholder="Enter Student Name" title="Enter Student Name.">
		</div>

		<!-- User type -->
		<div class="col m12 l4">
			<label for="standard" class="font-weight100 small-caps full-width">Standard</label>
			<select id="standard" class="full-width" title="Select Student Standard.">
				<option value="" disabled selected >Select One</option>
				   <?php foreach($GLOBALS['STD'] as $std){ echo sprintf("<option value='%s'>%s</option>",$std,$std); } ?>
			</select>
		</div>

		<!-- Submit Button -->
		<div class="col m12 pad-top10 txt-left">
			<button type="submit" class="btn bg-grey txt-ash full-width" onclick="getStudentDetailToUpdate(this)">
				<i class="ion-android-send"></i>
				Submit
			</button>
		</div>
	</form>
</div>





<section  id="bonafide-block">

	<!-- student Data Template Insert Here -->

</section> 


<?php require_once '../../includes/footer.php'; ?>
<script type="text/javascript">
	
	function getStudentDetailToUpdate(){
		var grNum = elementById('enroll_no').value.trim();
			name  = elementById('name').value.trim();
		standard  = elementById('standard').value;
		// alert(grNum);
		
		if( grNum =='' || grNum == undefined && name ){
			alert('Please Enter Valid Enroll Number ');
			return false;
		}
			// if( name =='' || name == undefined ){
			// 	alert('Please Enter Valid Name ');
			// 	return false;
			// }


		
		var callBackFun = function(res){
			document.getElementById('bonafide-block').innerHTML = res;
		};

		AjaxPost('updStudentCtrl.php',{enroll:grNum, name:name, standard:standard},callBackFun,'txt');
	}



	
</script>