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
	<form  method="post" action="" id="" onsubmit="return false">

		<!-- ROW 1 START -->
		<div class="row">

			<!-- User Name -->
			<div class="col m12 l4">
				<label for="username" class="font-weight100 small-caps full-width">User Name</label>
				<input type="text" id="username" class="full-width" title="Enter User Name." placeholder="Enter User Name." required>
			</div>

			<!--Password -->
			<div class="col m12 l4">
				<label for="password" class="font-weight100 small-caps full-width">password</label>
				<input type="password" id="password" class="full-width" title="Enter Password." placeholder="Enter Password." required>
			</div>

			<!-- User type -->
			<div class="col m12 l4">
				<label for="usertype" class="font-weight100 small-caps full-width">User Type</label>
				<select id="usertype" class="full-width" title="Select User type." required>
					<option value="" disabled selected>Select User Type</option>
					<option value="Admin">Admin</option>
					<option value="School">School User</option>
					<option value="College">College User</option>
					<option value="teacher">School Teacher</option>
					<option value="clgTeacher">College Teacher</option>
					<option value="common">School Common</option>
					<option value="clgCommon">College Common</option>
				</select>
			</div>
		</div> <!-- ROW 1 END -->

		
		<!-- ROW 2 START -->
		<div class="row">
			<!-- Full name -->
			<div class="col m12 l4">
				<label for="fullname" class="font-weight100 small-caps full-width">Full Name</label>
				<input type="text" id="fullname" class="full-width" title="Enter user full name." placeholder="Enter User Full Name" required>
			</div>

			<!-- contact no -->
			<div class="col m12 l4">
				<label for="contactno" class="font-weight100 small-caps full-width">Contact No.</label>
				<input type="number" id="contactno" class="full-width" title="Enter user contact number." placeholder="Enter 10 Digit Mobile number" required>
			</div>
		</div><!-- ROW 2 END -->



		<!-- ROW 3 START -->
		<div class="row">
			<!-- Submit Button -->
			<div class="col m12 pad-top10 txt-left">
				<button type="submit" class="btn bg-grey txt-ash full-width" id="createNewUserSubmit">
					<i class="ion-android-send"></i>
					Submit
				</button>
			</div> 
		</div><!-- ROW 3 START -->

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
			<tr class="txt-ash"> <th>Name.</th> <th>User name</th> <th>Type</th> <th>Contact No.</th> <th>Delete</th> </tr>
		</thead>
		<tbody>
			<?php 
			// User Details 
			$sql = " 
			SELECT AD.Name , AD.uname , AD.type ,AD.p_num,  AD.unique_id
			FROM admin_sch AD
			ORDER BY FIELD(AD.`type`,'Admin','School','College','teacher','clgTeacher','common','clgCommon')
			";
			$userDataArr = DB::allRow($sql);
			foreach ($userDataArr as $user){
				$user_id = array_pop($user);
			 $btn = "<button class='btn btn-red' onclick='deleteUser({$user_id})'> <i class='ion-trash-b'></i> </button>";

				echo sprintf("<tr><td>%s</td><td>%s</td></tr>",implode('</td><td>',$user),$btn);
			}
			?>
		</tbody>
	</table>
</section>


</div> <!-- /Container -->


<!-- FOOTER HERE  -->
<?php  require_once('../../includes/footer.php') ?>
<script type="text/javascript">

	function createUserResponseHandler(res){
		console.log(res);
	}

	DX.eById('createNewUserSubmit').addEventListener('click',function(){

		var uname 	 = DX.eByIdVal('username');		
			pswd 	 = DX.eByIdVal('password');		
			usrtype  = DX.eByIdVal('usertype');
			fullname = DX.eByIdVal('fullname');
		   contactno = DX.eByIdVal('contactno');

		callBackFun = function(res){
		 alert(res.msg);
		 DX.pageReload();
		};

 if( uname != "" &&  pswd !="" && usrtype !="" && fullname !="" && contactno !=""  ){
		DX.AjaxPost('createUserCtrl.php',params,callBackFun,'json');
		 }else{
  alert('Please Insert Valid Details');
}

	});

	function deleteUser(userid)
	{
		var ok = confirm("Are You Sure To Delete?")
    if (ok)   {

        var params = {} ,
        callBackFun = function(){
            // alert("hello");
         }; 

         params.userid = userid;

         AjaxPost('deleteUser.php',params,callBackFun,'txt');

         window.location.reload();
     };
	}
</script>
