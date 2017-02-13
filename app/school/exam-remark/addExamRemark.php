<?php require_once '../../includes/header.php'; ?>


<!-- ****************************
**** add exam Remark Block ****
***************************** -->

<section class="bg-white overflow-x box-shadow margin-bottom30" id="add-holiday-block">

	<!-- Title -->
	<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
		<i class="ion-android-settings margin-right20"></i>
		Add Holidays 
	</h5> 
	
	<!-- Create Class Form -->
	<form method="post" action="" id="addHoliday" onsubmit="return false">

		<!-- ROW - 1  -->
		<div class="row">

			<!-- Medium -->
			<div class="col m12 l4">
				<label for="title" class="font-weight100 small-caps full-width">Title</label>
				<select id="title" name="title" class="full-width" title="Enter Holiday Title."  required="required">
					<option value="Progress">Progress</option>
					<option value="Hobbies">Hobbies</option>
					<option value="Improvement">Improvement</option>
				</select>
			</div>

			<!-- from date -->
			<div class="col m12 l4">
				<label for="fromDate" class="font-weight100 small-caps full-width">From Date</label>
				<input type="date" class="full-width" id="fromDate" name="fromDate"  title="Select Start Date." required>
				
			</div>
			<!-- To date -->
			<div class="col m12 l4">
				<label for="toDate" class="font-weight100 small-caps full-width">To Date</label>
				<input type="date" class="full-width" id="toDate" name="toDate"  title="Select End Date." required>				
			</div>

			<!-- reason -->
			<div class="col m12 l4">
				<label for="reason" class="font-weight100 small-caps full-width">Reason</label>
				<input class="full-width" type="text" id="reason"  name="reason"  placeholder="Enter Holiday Reason" title="Enter Holiday Reason"  required>
			</div>
			<!-- for -->
			<div class="col m12 l4">
				<label for="forWho" class="font-weight100 small-caps full-width">Holiday For</label>
				<select class="full-width" t id="forWho"  name="forWho"  placeholder="Enter Holiday Reason" title="Enter Holiday Reason"  required>
					<option value="" disabled selected>Select One</option>
					<option value="all">All</option>
					<option value="School">School</option>
					<option value="College">College</option>
				</select>
			</div>

			<!-- Submit Button -->
			<div class="col m12 pad-top10 txt-left">
				<button type="submit" class="btn bg-grey txt-ash full-width" id="addHolidaySubmit">
					<i class="ion-android-send"></i>
					Submit
				</button>
			</div>

		</div><!-- ROW-1 END -->

	</form>

</section> <!-- afdd-holiday-block -->



<!-- ****************************
**** View Class data Block  ****
******************************-->

<section class="bg-white overflow-x box-shadow margin-bottom30" id="view-class-data-block">

	<!-- Title -->
	<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
		<i class="ion-ios-paper-outline margin-right20"></i>
		Created Class
	</h5>

	<!-- Class Details Table Block -->
	<div class="class-detail-table">

		<table class="full-width margin-bottom-zero">
			<thead>
				<tr class="txt-ash"> <th>Title</th> <th>From Date</th> <th>To Date</th> <th>Reason</th> <th>Delete</th>
				</tr>      
			</thead>
			<tbody id="class-details-tbody">
				<?php 

      //Holiday List 
				$sql = " SELECT HD.`holiday_title`,HD.`from_date`,HD.`to_date`,HD.`reason`,HD.`holiday_id` FROM holidays HD ORDER BY HD.`holiday_id` DESC ";

				$result = DB::allRow($sql);
				foreach ($result as $class){

					$h_id = array_pop($class);
					$btn = "<button class='btn btn-red' onclick='deleteHoliday({$h_id})'><i class='ion-trash-b'></i> </button>";
					echo sprintf("<tr><td>%s</td><td>%s</td></tr>",implode('</td><td>',$class),$btn);
				}
				?>
				

			</tbody>
		</table>

	</div> <!-- class Detail table blcok end -->
</section> <!-- view-class-data-block -->




<!-- FOOTER HERE  -->
<?php  require_once('../../includes/footer.php') ?>


<!-- scripts  -->
<script type="text/javascript">


// Form Submit Event Handler 
elementById('addHolidaySubmit').addEventListener('click',function(){
	var title = DX.eByIdVal('title'),
	fDate = DX.eByIdVal('fromDate'),
	toDate = DX.eByIdVal('toDate'),
	reason = DX.eByIdVal('reason'),
	forWho = DX.eByIdVal('forWho');


	var CallBackFn = function(jsonResponse){
    // alert(jsonResponse.msg);
    window.location.reload();
};

if( title != "" &&  fDate !="" && toDate !="" && reason !="" && forWho != "" ){
	DX.AjaxPost('addHolidayCtrl.php',{title:title , fDate:fDate, toDate:toDate, reason:reason, forWho:forWho,},CallBackFn,'txt');
}else{
	alert('Please fill Valid Details');
}
});


function deleteHoliday(id){

	var ok = confirm("Are You Sure To Delete?")
	if (ok)   {     

		var params = {} ,
		fn = function(){
             // alert('hello');
         }; 

         params.holiday_id = id;

         AjaxPost('deleteHoliday.php',params,fn,'txt');

         window.location.href= "holiday.php";
     };
 }



</script>