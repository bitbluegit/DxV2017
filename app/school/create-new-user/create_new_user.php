<?php require_once '../../includes/header.php'; ?>



<!-- Transaction Filter Form -->
<div class="bg-white overflow-x box-shadow margin-bottom30  ">
	<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
		<i class="ion-android-settings margin-right20"></i>
		User Detail
	</h5>
	<!-- Expense Form -->
	<form class="row" method="post" action="">
		<!-- User Name -->
		<div class="col m12 l4">
			<label for="username" class="font-weight100 small-caps full-width">User Name</label>
			<input type="text" id="username" class="full-width" title="Enter User Name.">
		</div>

		<!--Password -->
		<div class="col m12 l4">
			<label for="password" class="font-weight100 small-caps full-width">password</label>
			<input type="password" id="password" class="full-width" title="Enter Password.">
		</div>

		<!-- User type -->
		<div class="col m12 l4">
			<label for="usertype" class="font-weight100 small-caps full-width">User Type</label>
			<select id="usertype" class="full-width" title="Select User type.">
				<option>Select One</option>
				<option value="sch_user">School-User</option>
				<option value="clg_user">College-User</option>
			</select>
		</div>

		<!-- Full name -->
		<div class="col m12 l4">
			<label for="fullname" class="font-weight100 small-caps full-width">Full Name</label>
			<input type="text" id="fullname" class="full-width" title="Enter user full name.">
		</div>

		<!-- contact no -->
		<div class="col m12 l4">
			<label for="contactno" class="font-weight100 small-caps full-width">Contact No.</label>
			<input type="number" id="contactno" class="full-width" title="Enter user contact number.">
		</div>

		<!-- Submit Button -->
		<div class="col m12 pad-top10 txt-left">
			<button type="submit" class="btn bg-grey txt-ash full-width" onclick="creatUser()">
				<i class="ion-android-send"></i>
				Submit
			</button>
		</div>
		
	</form>
</div>

<!-- ENquiry details Data -->
<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
	<i class="ion-ios-paper-outline margin-right20"></i>
	Created User
</h5>
<div class="bg-white overflow-x box-shadow margin-bottom30">
	<table class="full-width margin-bottom-zero user-details">
		<tbody>
			<tr class="txt-ash">     
				<th>Name.</th>
				<th>User name</th>
				<th>Type</th>
				<th>Contact No.</th>
				<th>Update</th>

			</tr>
			<tr>                               
				<td>hr</td>
				<td>School</td>
				<td>school-user</td>
				<td>7896541235</td>
				<td>
					<i class="ion-edit"></i>
				</td>

			</tr>
			<tr>
				<td>hr</td>
				<td>School</td>
				<td>school-user</td>
				<td>7896541235</td>
				<td>
					<i class="ion-edit"></i>
				</td>
			</tr>
		</tbody>
	</table>
</div>



</div>
<!-- /Container -->


<script type="text/javascript">
function creatUser(){
	alert("hiii");

}
	
</script>