<?php require_once '../../includes/header.php'; ?>

<!-- ****************************
**** Create User Main Block ****
***************************** -->
<!-- title -->
<section class="bg-white overflow-x box-shadow margin-bottom30  ">
	<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
		<i class="ion-android-settings margin-right20"></i>
		User Detail
	</h5>

	<!-- Create User Form -->
	<form class="row" method="post" action="" id="" onsubmit="return false">

		<!-- User Name -->
		<div class="col m12 l4">
			<label for="username" class="font-weight100 small-caps full-width">User Name</label>
			<input type="text" id="username" class="full-width" title="Enter User Name." required>
		</div>

		<!--Password -->
		<div class="col m12 l4">
			<label for="password" class="font-weight100 small-caps full-width">password</label>
			<input type="password" id="password" class="full-width" title="Enter Password." required>
		</div>

		<!-- User type -->
		<div class="col m12 l4">
			<label for="usertype" class="font-weight100 small-caps full-width">User Type</label>
			<select id="usertype" class="full-width" title="Select User type." required>
				<option value="" disabled selected>Select One</option>
				<option value="Admin">Admin</option>
				<option value="School">School User</option>
				<option value="College">College User</option>
				<option value="teacher">School Teacher</option>
				<option value="clgTeacher">College Teacher</option>
				<option value="common">School Common</option>
				<option value="clgCommon">College Common</option>
			</select>
		</div>

		<!-- Full name -->
		<div class="col m12 l4">
			<label for="fullname" class="font-weight100 small-caps full-width">Full Name</label>
			<input type="text" id="fullname" class="full-width" title="Enter user full name." required>
		</div>

		<!-- contact no -->
		<div class="col m12 l4">
			<label for="contactno" class="font-weight100 small-caps full-width">Contact No.</label>
			<input type="number" id="contactno" class="full-width" title="Enter user contact number." required>
		</div>

		<!-- Submit Button -->
		<div class="col m12 pad-top10 txt-left">
			<button type="submit" class="btn bg-grey txt-ash full-width" id="createNewUserSubmit">
				<i class="ion-android-send"></i>
				Submit
			</button>
		</div>
		
	</form>
</section>




<!-- ****************************
**** View User Data Block  ****
******************************-->
<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
	<i class="ion-ios-paper-outline margin-right20"></i>
	Created User
</h5>
<section class="bg-white overflow-x box-shadow margin-bottom30">
	<table class="full-width margin-bottom-zero user-details">
		<thead>
			<tr class="txt-ash"> <th>Name.</th> <th>User name</th> <th>Type</th> <th>Contact No.</th> <th>Update</th> </tr>
		</thead>
		<tbody>
			<?php 
			// User Details 
			$sql = " SELECT AD.`Name` , AD.`uname` , AD.`type` ,AD.`p_num`,  AD.`unique_id`
			FROM admin_sch AD
			ORDER BY FIELD(AD.`type`,'Admin','School','College','teacher','clgTeacher','common','clgCommon')";
			$userDataArr = DB::allRow($sql);
			foreach ($userDataArr as $user){
				$user_id = array_pop($user);
				$btn = "<button onclick='updateUser({$user_id})'> <i class='ion-edit'></i> </button>";

				echo sprintf("<tr><td>%s</td><td>%s</td></tr>",implode('</td><td>',$user),$btn);
			}
			?>
		</tbody>
	</table>
</section>


</div>
<!-- /Container -->


<script src="../../../assets/js/app.js"></script>
<script src="create_user.js"></script>


