<?php 
require_once '../../includes/usr_sch_header.php'; 

//require_once '../../includes/header.php'; ?>
<!-- 
/********************
** student list filter **
********************/ -->



<!-- Student list  Filter Form -->
<div class="bg-white overflow-x box-shadow margin-bottom30  ">
	<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
		<i class="ion-android-settings margin-right20"></i>
		Enquiry Filter
	</h5>
	<!-- Expense Form -->
	<form class="row" method="post" name="student-filter" id="student-filter" action="#" onsubmit="return false">


		<!-- Medium -->
		<div class="col m12 l4">
			<label for="type" class="font-weight100 small-caps full-width">Type</label>
			<select id="type" name="type" class="full-width" title="Select your medium.">
				<!-- <option value="" disabled selected>Select One</option> -->
				<option value="student_list">Student List</option>
				<option value="idcard">Id Card</option>
			</select>
		</div>
		<!-- Medium -->
		<div class="col m12 l4">
			<label for="medium" class="font-weight100 small-caps full-width">Medium</label>
			<select id="medium" name="medium" class="full-width" title="Select your medium.">
				<option value="" disabled selected>Select Medium</option>
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
		<button type="submit" class="btn bg-grey txt-ash full-width" onclick="filterStudentData()">
			<i class="ion-android-send"></i>
			Submit
		</button>
	</div>
</form>
</div>



<!-- student list data Data -->
<div id="divHide">
<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
	<i class="ion-ios-paper-outline margin-right20"></i>
	Student Details
</h5>
<div class="bg-white overflow-x box-shadow margin-bottom30">
	<table class="full-width margin-bottom-zero">
		<thead>
			<tr class="txt-ash">     
				<th>Medium</th> <th>Standard</th> <th>Section</th> <th>Boys</th> <th>Girl</th>
				<th>Total</th>
			</tr>                                
		</thead>
		<tbody id="student-list-body">

			<?php 
     		// User Details 
			$sql = " 
			SELECT US.`Medium`,US.`Std`,US.`Section`,
			SUM( CASE WHEN SD.`sex` = 'male' THEN 1 ELSE 0 END ) as Boys ,
			SUM( CASE WHEN SD.`sex` = 'female' THEN 1 ELSE 0 END ) AS Girls ,
			COUNT(US.`Gr_num`) AS 'Total' 
			FROM sch_class AS SC
			INNER JOIN user_sch AS US ON US.`Medium`=SC.`Medium` AND US.`Std`=SC.`Std`
			INNER JOIN sch_details AS SD ON SD.`Gr_num`=US.`Gr_num` GROUP BY US.`Medium`,US.`Std`,US.`Section`
			ORDER BY FIELD(US.Medium,'English','Hindi','Marathi'),FIELD(US.`Std`,'nursery', 'jr.kg','junior.kg','sr.kg',
			'senior.kg','first','second','third','fourth','fifth','sixth','seventh','eighth','ninth','tenth','Mr.Dextro',
			'Left') , US.Section ";


			$userDataArr = DB::allRow($sql);
			foreach ($userDataArr as $user){
				// $user_id = array_pop($user);
				// $btn = "<button class='btn btn-green' onclick='updateUser({$user_id})'><i class='ion-ios-arrow-thin-up'></i> </button>
				// <button class='btn btn-red' onclick='updateUser({$user_id})'><i class='ion-ios-arrow-thin-down'></i> </button>";

				echo sprintf("<tr><td>%s</td></tr>",implode('</td><td>',$user));
			}


			?>

		</tbody>
	</table>
</div>
</div> <!-- div Hide -->


<!-- student list data Data -->
<div class="hide" id="showDiv">
<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
	<i class="ion-ios-paper-outline margin-right20"></i>
	Student Details
</h5>
<div class="bg-white overflow-x box-shadow margin-bottom30">
	<table class="full-width margin-bottom-zero">
		<thead>
			<tr class="txt-ash">     
				<th>Roll No</th> <th>Enroll No</th> <th>Photo</th> <th>Name</th> <th>Father Name</th> <th>Gender</th>
				<th>Date Of Birth</th> <th>Mobile No</th> <th>Address</th> 
			</tr>
		</thead>
		<tbody id="filter-data">

			





		</tbody>
	</table>
</div>


</div> <!-- student data block -->

</div>
<!-- /Container -->


<!-- scripts  -->
<script src="../../../assets/js/app.js"></script>
<script src="studentListFilter.js"></script>

<script type="text/javascript">
	
	function getSection(){
		// alert("hiiii");
		var mdm = elementById('medium').value,
		std = elementById('standard').value,
		callBackFunction =function(res){
			elementById('section').innerHTML = res;
		}; 

		AjaxPost('../db/getSection.php',{mdm:mdm,std:std},callBackFunction,'txt');
	}
</script>