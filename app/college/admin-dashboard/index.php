<?php require_once '../../includes/header.php';
$date = date('Y-m-d');
// Total Enquiris
$enqCount = "select count(ENQ.`sr_no`) AS count from enquiry ENQ";
$result =DB::oneRow($enqCount);
$data =extract($result);

 // todays Enquiries

$enq = "SELECT COUNT(ENQ.`sr_no`) as todayEnquiry FROM enquiry ENQ WHERE ENQ.`enq_date`= '{$date}'";
$result =DB::oneRow($enq);
$data =extract($result);


// total admission
$totalAdm = "SELECT COUNT(SD.`Gr_num`) as totalAdmission FROM sch_details SD ";
$result =DB::oneRow($totalAdm);
$data =extract($result);

// today admission
$totalAdm = "SELECT COUNT(SD.`Gr_num`) as todayAdmission FROM sch_details SD WHERE SD.`doa`= '{$date}'
";
$result =DB::oneRow($totalAdm);
$data =extract($result);


// total expenses-amount 
$totalExp = "SELECT SUM(EXP.amount) as totalExpense FROM expenses EXP
";
$result =DB::oneRow($totalExp);
$data =extract($result);
// today expense
$totalExp = "SELECT SUM(EXP.amount) as todayExpense FROM expenses EXP WHERE EXP.`date` ='{$date}'
";
$result =DB::oneRow($totalExp);
$data =extract($result);

// total Transaction

$sql ="SELECT
(
	SELECT SUM(AT.Amount)+SUM(AT.late_fee) FROM adm_sch_tran AT
	)+
	(
	SELECT SUM(ST.Amount)+SUM(ST.late_fee) FROM sch_tran ST
	)AS total_amount ";
	$result =DB::oneRow($sql);
	extract($result);


	$sql1 = "SELECT SUM(AT.Amount)+SUM(AT.late_fee) as t1 FROM adm_sch_tran AT WHERE AT.date= '{$date}' ";
	$result= DB::oneRow($sql1);
	extract($result);

	
	$sql2=  "SELECT SUM(ST.Amount)+SUM(ST.late_fee) as t2 FROM sch_tran ST WHERE ST.date = '{$date}'  ";
	$result= DB::oneRow($sql2);
	extract($result);
$todayTransacrion = $t1 +$t2;
	?>



	<!-- Revenue -->
	<div class="col m12 l4 margin-bottom30">
		<a class="display-block bg-white pad10 box-shadow" href="">
			<h4 class="txt-black">
				Revenue
				<span class="badge-blue float-right">
					<i class="ion-ios-pulse"></i>
					<i class="ion-ios-pulse"></i>
				</span>
			</h4>
			<span class="font12 txt-ash">
				View Revenue Details
			</span>
		</a>
	</div>

	<!-- Transaction -->
	<div class="col m12 l4 margin-bottom30">
		<a class="display-block bg-white pad10 box-shadow" href="../transaction/transaction.php">
			<h4 class="txt-black">
				Transactions
				<span class="badge-green float-right"><?=$total_amount?></span>
			</h4>
			<span class="font12 txt-ash">
				Today's Total Transaction:<span class="font-weight700 font14 txt-ash"><?=$todayTransacrion?></span>
			</span>

		</a>
	</div>

	<!-- Expenses -->
	<div class="col m12 l4 margin-bottom30">
		<a class="display-block bg-white pad10 box-shadow" href="../expenses-report/expensesReport.php">
			<h4 class="txt-black">
				Expenses
				<span class="badge-pink float-right"><?=$totalExpense?></span>
			</h4>
			<span class="font12 txt-ash">
				Today's Total Expense:<span class="font-weight700 font14 txt-ash"><?=$todayExpense?></span>
			</span>
		</a>
	</div>

	<!-- Enquiries -->
	<div class="col m12 l4 margin-bottom30">
		<a class="display-block bg-white pad10 box-shadow" href="../enquiry/enquiry.php">
			<h4 class="txt-black">
				Enquiries
				<span class="badge-yellow float-right"><?=$count?></span>
			</h4>
			<span class="font12 txt-ash">
				Today's Enquiries: <span class="font-weight700 font14 txt-ash"><?=$todayEnquiry?></span>
			</span>
		</a>
	</div>

	<!-- Admissions -->
	<div class="col m12 l4 margin-bottom30">
		<a class="display-block bg-white pad10 box-shadow" href="">
			<h4 class="txt-black">
				Admissions
				<span class="badge-orange float-right"><?=$totalAdmission?>	</span>
			</h4>
			<span class="font12 txt-ash">
				Today's Admissions: <span class="font-weight700 font14"><?=$todayAdmission?></span>
			</span>

		</a>
	</div>




<!-- a href="../admin-dashboard/today_tran.php"><h4>Today Transaction = 0</h4></a>
<a href="../admin-dashboard/today_exp.php"><h4>Today Expense  = 0 </h4></a>


 <div class="total-revenue m l4" style="background-color: #ddd;">

<a href="../admin-dashboard/admission_revenue.php"><h5>Admission Fee </h5></a>
<a href=""><h5>Monthly Fee </h5></a>
<a href=""><h5>One Time Fee </h5></a>

 </div> -->