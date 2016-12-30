<?php require_once '../../includes/header.php'; ?>

<!-- student Filter Form -->
<div class="bg-white overflow-x box-shadow margin-bottom30  ">
	<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
		<i class="ion-android-settings margin-right20"></i>
		Search By Enroll Or Name
	</h5>
	<!-- Expense Form -->
	<form class="row" method="post" >
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
			<button type="submit" class="btn bg-grey txt-ash full-width" >
				<i class="ion-android-send"></i>
				Submit
			</button>
		</div>
	</form>
</div>



<!-- ENquiry details Data -->
<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
	<i class="ion-ios-paper-outline margin-right20"></i>
	Student Details
</h5>
<div class="bg-white overflow-x box-shadow margin-bottom30">
	<table class="full-width margin-bottom-zero user-details">
		<tbody>
			<tr class="txt-ash">     
				<th>Name.</th>
				<th>Enroll Number</th>
				<th>Standard</th>
				<th>Show</th>
				
			</tr>
			<tr>                               
				<td>hr</td>
				<td>School</td>
				<td>school-user</td>
				
				<td>
					<button class="btn bg-red txt-ash">Show</button>
				</td>

			</tr>
			<tr>                               
				<td>hr</td>
				<td>School</td>
				<td>school-user</td>
				
				<td>
					<button class="btn bg-red txt-ash">Show</button>
				</td>

			</tr>
		</tbody>
	</table>
</div>




<!-- student detail  -->
<div class="bg-white overflow-x box-shadow margin-bottom30  ">
	<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
		<i class="ion-android-settings margin-right20"></i>
		Student Details
	</h5>
	<!-- Expense Form -->
	<form class="row" method="post" action="">
		<!-- dummy image -->
		<div class="col m12 l4">
			<img src="../../../dummy_student.png" class="dummyimg">
			
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
		
		<!--date of birht -->
		<div class="col m12 l4">
			<label for="dob" class="font-weight100 small-caps full-width">Date Of Birth</label>
			<input type="date" id="dob" name="dob" class="full-width" title="Enter Student Date Of Brith">
		</div>

		<!--religion -->
		<div class="col m12 l4">
			<label for="religion" class="font-weight100 small-caps full-width">Religion</label>
			<input type="text" id="religion" name="religion" class="full-width" title="Enter Student Religion">
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
			<label for="standard" class="font-weight100 small-caps full-width">Standard</label>
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

	</form>
</div>

<!-- paid fee details Data -->
<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
	<i class="ion-ios-paper-outline margin-right20"></i>
	Paid Fee Detail
</h5>
<div class="bg-white overflow-x box-shadow margin-bottom30">
	<table class="full-width margin-bottom-zero user-details">
		<tbody>
			<tr class="txt-ash">  
				<th>Date</th>
				<th>User</th>
				<th>Reciepi No.</th>
				<th>Amount</th>   
				<th>Fee Name.</th>
				<th>Month</th>
				<th>Pay Mode</th>
				<th>Cheque No.</th>
				<th>Late Fee</th>
				<th>Discount</th>
				<th>Reason</th>
				<th>Delete/ Print</th>
			</tr>
			<tr>                               
				<td>12/12/2018</td>
				<td>School_user</td>
				<td>RC-001</td>
				<td>1200</td>
				<td>admission fee</td>
				<td>November</td>
				<td>Cash</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>-</td>
				<td>
					<button><i class="ion-trash-a"></i></button>
					<button><i class="ion-printer"></i></button>
				</td>
				
			</tr>
			
		</tbody>
	</table>
</div>


<!-- attandance details Data -->
<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
	<i class="ion-ios-paper-outline margin-right20"></i>
	Attandance Detail
</h5>
<div class="bg-white overflow-x box-shadow margin-bottom30">
	<table class="full-width margin-bottom-zero user-details">
		<tbody>
			<tr class="txt-ash">  
				<th>Months</th>
				<th>Dates Of Absent</th>
			</tr>
			<tr>                               
				<td>january</td>
				<td>12 , 18 , 28</td>				
			</tr>
			
		</tbody>
	</table>
</div>


<!-- award details Data -->
<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
	<i class="ion-ios-paper-outline margin-right20"></i>
	Student Details
</h5>
<div class="bg-white overflow-x box-shadow margin-bottom30">
	<table class="full-width margin-bottom-zero user-details">
		<tbody>
			<tr class="txt-ash">     
				<th>Compitition Name</th>
				<th>Award prize</th>
				<th>Date</th>
				<th>View Detail</th>
				
			</tr>
			<tr>                               
				<td>GK Quize</td>
				<td>Second prize</td>
				<td>11/12/16</td>				
				<td>
					<button title="Click To View Detail"><i class="ion-trophy"></i></button>
				</td>
			</tr>
			<tr>                               
				<td>GK Quize</td>
				<td>Second prize</td>
				<td>11/12/16</td>				
				<td>
					<button ><i class="ion-trophy"></i></button>
				</td>
			</tr>
		</tbody>
	</table>
</div>



<!-- onlime result  details Data -->
<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
	<i class="ion-ios-paper-outline margin-right20"></i>
	REsult:Online
</h5>
<div class="bg-white overflow-x box-shadow margin-bottom30">
	<table class="full-width margin-bottom-zero user-details">
		<tbody>
			<tr class="txt-ash">     
				<th>Exam Name</th>
				<th>Subject</th>
				<th>Date</th>
				<th>Marks</th>
				
			</tr>
			<tr>                               
				<td>quarterly</td>
				<td>hindi</td>
				<td>11/12/16</td>				
				<td>24</td>
			</tr>
			<tr>                               
				<td>quarterly</td>
				<td>hindi</td>
				<td>11/12/16</td>				
				<td>24</td>
			</tr>
		</tbody>
	</table>
</div>

<!-- acadamic result  details Data -->
<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
	<i class="ion-ios-paper-outline margin-right20"></i>
	Academic Result
</h5>
<div class="bg-white overflow-x box-shadow margin-bottom30">
	<table class="full-width margin-bottom-zero user-details">
		<tbody>
			<tr class="txt-ash">     
				<th>Exam Name</th>
				<th>Status</th>
				<th>View Result</th>				
			</tr>
			<tr>                               
				<td>annual exam</td>
				<td>Pass</td>
				<td><button class="btn bg-red txt-ash">view</button></td>				
			</tr>
			<tr>                               
				<td>annual exam</td>
				<td>Pass</td>
				<td><button class="btn bg-red txt-ash">view</button></td>				
			</tr>
		</tbody>
	</table>
</div>

<!-- pending fee  details Data -->
<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
	<i class="ion-ios-paper-outline margin-right20"></i>
	Pending Fee Details
</h5>
<div class="bg-white overflow-x box-shadow margin-bottom30">
	<table class="full-width margin-bottom-zero user-details">
		<tbody>
			<tr class="txt-ash">     
				<th>Fee Type</th>
				<th>Amount</th>
				<th>Frequency</th>
				<th>Late Fee</th>
				<th>Remaining Month(If Per Month)</th>
				<th>Pending</th>				
			</tr>
			<tr>                               
				<td>Monthly</td>
				<td>1200</td>
				<td>Monthly</td>
				<td>0</td>
				<td>February</td>
				<td>560</td>				
			</tr>
			<tr>                               
				<td>Monthly</td>
				<td>1200</td>
				<td>Monthly</td>
				<td>0</td>
				<td>February</td>
				<td>560</td>				
			</tr>
		</tbody>
	</table>
</div>



 </div> <!--container -->