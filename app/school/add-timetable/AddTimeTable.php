 <?php //require_once '../../includes/header.php';
 require_once '../../includes/usr_sch_header.php'; ?>


<!-- ****************************
**** add Time table  Block ****
***************************** -->

<section class="bg-white overflow-x box-shadow margin-bottom30" id="add-timetable-block">

	<!-- Title -->
	<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
		<i class="ion-android-settings margin-right20"></i>
		Add Time Table
	</h5> 

	<!-- Create Class Form -->
	<form method="post" action="" id="createClass" enctype="multipart/form-data" onsubmit="return false">

		<!-- ROW - 1  -->
		<div class="row">

			<!-- title -->
			<div class="col m12 l4">
				<label for="title" class="font-weight100 small-caps full-width">Title</label>
				<input type="text" id="title" name="title" class="full-width" title="Enter  title." required="required" placeholder="Enter Title">

			</div>

			<!-- details -->
			<div class="col m12 l4">
				<label for="description" class="font-weight100 small-caps full-width">Description</label>
				<input type="text" class="full-width" id="description" name="description"  title="Enter Description." required placeholder="Enter Description">

			</div>
			<!-- common -->
			<div class="col m12 l4">
				<label for="common" class="font-weight100 small-caps full-width">Common</label>
				<select class="full-width" id="common" name="common" onchange="showContent()"  title="Enter Description." required="required" >
					<option value="">Select One</option>
					<option value="same_for_all">Same For All</option>
				</select>
			</div>

			<div id="hideContent" class="hide" >
				<!-- medium -->
				<div class="col m12 l4">
					<label for="medium" class="font-weight100 small-caps full-width">Medium</label>
					<select id="medium" name="medium" class="full-width" title="Select your Medium." required="required">
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
		</div> <!-- hide content div end -->

		<!-- img -->
		<div class="col m12 l4">
			<label for="eImg" class="font-weight100 small-caps full-width">Event Image</label>
			<input class="full-width" type="file" id="eImg" name="eImg"  placeholder="upload Event Image " title="Enter Divsion Count." required>
		</div>

		<!-- Submit Button -->
		<div class="col m12 pad-top10 txt-left">
			<button type="submit" class="btn bg-grey txt-ash full-width" id="addEventSubmit">
				<i class="ion-android-send"></i>
				Submit
			</button>
		</div>

	</div><!-- ROW-1 END -->

</form>

</section> <!-- add-event-block -->



<!-- ****************************
**** View Time Table data Block  ****
******************************-->

<section class="bg-white overflow-x box-shadow margin-bottom30" id="view-class-data-block">

	<!-- Title -->
	<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
		<i class="ion-ios-paper-outline margin-right20"></i>
		Added Time Table
	</h5>

	<!-- Event Details Table Block -->
	<div class="events-detail-table">

		<table class="full-width margin-bottom-zero">
			<thead>
				<tr class="txt-ash"> <th>Title</th> <th>Details</th> <th>Date</th>  
				</tr>      
			</thead>
			<tbody id="class-details-tbody">
				<?php 





      // User Details 
       //  $sql = " SELECT admin_sch.type , sch_class.Medium , sch_class.Std , sch_class.no_of_div ,admin_sch.uname, sch_class.unique_id  FROM sch_class INNER JOIN 
       //  admin_sch ON sch_class.unique_id=admin_sch.unique_id 
       //  ORDER BY FIELD(MEDIUM,'English','Hindi','Marathi'),FIELD(`Std`,'nursery', 'jr.kg','junior.kg','sr.kg',
       //  'senior.kg','first','second','third','fourth','fifth','sixth','seventh','eighth','ninth','tenth','Mr.Dextro','Left')";
       //  $userDataArr = DB::allRow($sql);
       //  foreach ($userDataArr as $user){
       //   $user_id = array_pop($user);
       //   $btn = "<button class='btn btn-red' onclick='updateUser({$user_id})'><i class='ion-ios-arrow-thin-down'></i> </button>";

       //   echo sprintf("<tr><td>%s</td><td>%s</td></tr>",implode('</td><td>',$user),$btn);
       // }
				?>




			</tbody>
		</table>

	</div> <!-- events Detail table blcok end -->
</section> 



<!-- scripts  -->
<script src="../../../assets/js/app.js"></script>
<script type="text/javascript">
	function getSection(){
		var mdm = elementByIdValue('medium') ,
		std = elementByIdValue('standard'),
		callBackFunction =function(res){
			elementById('section').innerHTML = res;
		}; 

		AjaxPost('../db/getSection.php',{mdm:mdm,std:std},callBackFunction,'txt');
	};

	function showContent(){
		var mode = document.getElementById('common').value;
		if(mode == ""){
			document.getElementById('hideContent').style.display = 'block';
		}
		else {
			document.getElementById('hideContent').style.display = 'none';

		}
		
	}
</script>