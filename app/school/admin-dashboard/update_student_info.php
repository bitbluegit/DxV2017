<?php require_once '../../includes/header.php' ; ?>

<!-- student Filter Form -->
<div class="bg-white overflow-x box-shadow margin-bottom30  ">
	<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
		<i class="ion-android-settings margin-right20"></i>
		Search By Enroll Or Name
	</h5>
	<!-- Expense Form -->
	<form class="row" method="post" action="">
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
				<option value="first">First</option>
				<option value="second">Second</option>
			</select>
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




<!-- student detail update form -->
<div class="bg-white overflow-x box-shadow margin-bottom30  ">
	<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
		<i class="ion-android-settings margin-right20"></i>
		Personal And Acadamic Details
	</h5>
	<!-- Expense Form -->
	<form class="row" method="post" action="">
		<!-- dummy image -->
		<div class="col m12 l4">
			<img src="../../../dummy_student.png" class="dummyimg">
			<!-- <label for="enroll_no" class="font-weight100 small-caps full-width">Enroll Number</label>
			<input type="number" id="enroll_no" class="full-width" title="Enter Student Enroll Number."> -->
		</div>


		<!-- student image -->
		<div class="col m12 l4">
			<label for="upload_img" class="font-weight100 small-caps full-width">Upload Image</label>
			<input type="file" id="upload_img" class="full-width" title="Upload Student Image.">
		</div>

		<!--enroll number -->
		<div class="col m12 l4">
			<label for="enroll_no" class="font-weight100 small-caps full-width">Enroll Number</label>
			<input type="number" id="enroll_no"  value="1"class="full-width" title="Enter Student Enroll Number." readonly>
		</div>

		<!--gr number -->
		<div class="col m12 l4">
			<label for="gr_no" class="font-weight100 small-caps full-width">Gr Number</label>
			<input type="number" id="gr_no"  value="1"class="full-width" title="Enter Student Gr Number.">
		</div>

		<!--student name -->
		<div class="col m12 l4">
			<label for="student_name" class="font-weight100 small-caps full-width">Student Name</label>
			<input type="text" id="student_name" class="full-width" title="Enter Student Name.">
		</div>

		

		<!--father name -->
		<div class="col m12 l4">
			<label for="f_name" class="font-weight100 small-caps full-width">Father Name</label>
			<input type="text" id="f_name" name="f_name" class="full-width" title="Enter Student Father Name.">
		</div>

		<!--mother name -->
		<div class="col m12 l4">
			<label for="m_name" class="font-weight100 small-caps full-width">Mother Name</label>
			<input type="text" id="m_name" name="m_name" class="full-width" title="Enter Student Mother Name">
		</div>
		

		<!--nationality -->
		<div class="col m12 l4">
			<label for="nationality" class="font-weight100 small-caps full-width">Nationality</label>
			<input type="text" id="nationality" name="nationality" class="full-width" title="Enter Student Nationality">
		</div>

		<!--date of birht -->
		<div class="col m12 l4">
			<label for="dob" class="font-weight100 small-caps full-width">Date Of Birth</label>
			<input type="date" id="dob" name="dob" class="full-width" title="Enter Student Date Of Brith">
		</div>

		<!--birth place -->
		<div class="col m12 l4">
			<label for="birth_place" class="font-weight100 small-caps full-width">Birth Place</label>
			<input type="text" id="birth_place" name="birth_place" class="full-width" title="Enter Student Birth Place">
		</div>

		<!--religion -->
		<div class="col m12 l4">
			<label for="religion" class="font-weight100 small-caps full-width">Religion</label>
			<input type="text" id="religion" name="religion" class="full-width" title="Enter Student Religion">
		</div>

		<!--caste -->
		<div class="col m12 l4">
			<label for="caste" class="font-weight100 small-caps full-width">Caste</label>
			<input type="text" id="caste" name="caste" class="full-width" title="Enter Student Caste eg. OBC">
		</div>

		<!--address -->
		<div class="col m12 l4">
			<label for="address" class="font-weight100 small-caps full-width">Address</label>
			<input type="text" id="address" name="address" class="full-width" title="Enter Student Address">
		</div>


		<!--contact number -->
		<div class="col m12 l4">
			<label for="contact_number" class="font-weight100 small-caps full-width">Contact Number</label>
			<input type="text" id="contact_number" name="contact_number" class="full-width" title="Enter Contact Number">
		</div>

		<!--aadhar number -->
		<div class="col m12 l4">
			<label for="aadhar_no" class="font-weight100 small-caps full-width">Aadhar Number</label>
			<input type="text" id="aadhar_no" name="aadhar_no" class="full-width" title="Enter Student Aadhar number">
		</div>


		<!--gender -->
		<div class="col m12 l4">
			<label for="Gender" class="font-weight100 small-caps full-width">Gender</label>
			<select id="gender" name="gender" class="full-width" title="Select Student Gender.">
				<option value="" disabled selected >Select One</option>
				<option value="male">Male</option>
				<option value="female">Female</option>
			</select>
		</div>	



		<!-- session year -->
		<div class="col m12 l4">
			<label for="session_year" class="font-weight100 small-caps full-width">Session Year</label>
			<select id="session_year" name="session_year" class="full-width" title="Select Student Standard.">
				<option value="" disabled selected >Select One</option>
				<option value="2016-2017">2016-2017</option>
				<option value="2017-2018">2017-2018</option>
			</select>
		</div>

		<!-- medium -->
		<div class="col m12 l4">
			<label for="medium" class="font-weight100 small-caps full-width">Medium</label>
			<select id="medium" name="medium" class="full-width" title="Select Student medium.">
				<option value="" disabled selected >Select One</option>
				<option value="english">English</option>
				<option value="hindi">Hindi</option>
			</select>
		</div>

		<!-- standard -->
		<div class="col m12 l4">
			<label for="standard" class="font-weight100 small-caps full-width">Medium</label>
			<select id="standard" name="standard" class="full-width" title="Select Student standard.">
				<option value="" disabled selected >Select One</option>
				<option value="first">First</option>
				<option value="second">Second</option>
			</select>
		</div>

		<!-- division -->
		<div class="col m12 l4">
			<label for="division" class="font-weight100 small-caps full-width">Medium</label>
			<select id="division" name="division" class="full-width" title="Select Student Division.">
				<option value="" disabled selected >Select One</option>
				<option value="a">A</option>
				<option value="b">B</option>
			</select>
		</div>


		<!--last school -->
		<div class="col m12 l4">
			<label for="last_school" class="font-weight100 small-caps full-width">Student Name</label>
			<input type="text" id="last_school" name="last_school" class="full-width" title="Enter Student Last School">
		</div>

		<!--date of addmission -->
		<div class="col m12 l4">
			<label for="admission_date" class="font-weight100 small-caps full-width">Student Name</label>
			<input type="text" id="admission_date" name="admission_date" class="full-width" title="Enter Admission Date">
		</div>

		<!-- paying status -->
		<div class="col m12 l4">
			<label for="pay_status" class="font-weight100 small-caps full-width">Paying Status</label>
			<select id="division" name="division" class="full-width" title="Select Paying Status.">
				<option value="" disabled selected >Select One</option>
				<option value="paying">Paying </option>
				<option value="non_paying">Non Paying</option>
			</select>
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





</div>
<!-- /Container -->
