<?php 

	
	 require_once '../../../config/project-config.php';
	require_once '../../../helper/getPageTitle.php';
	require_once '../../../helper/db.php';
	require_once '../../../helper/session.php';   
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dextro Campus | School CRM Management System</title>
	
	<!-- Meta Tags  -->
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" /> 
	<meta name="author" content="http://www.bitbluetech.com/" />
	<meta name="publisher" content="http://www.bitbluetech.com/" />
	<meta name="Content-Language" content="english" />
	<meta name="description" content="school managment system" />
	<meta name="keywords" content="school, college,education,managment"  />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"  />
	
	<!-- <meta http-equiv="cache-control" content="no-cache"> 
	 <meta name="audience" content="all"> 
	 <meta name="GENERATOR" content="Microsoft FrontPage 4.0"> 
	 <meta name="page-topic" content="Free Computer help">
	 <meta name="page-type" content="Technical Support">
	<meta name="ProgId" content="FrontPage.Editor.Document">
	 <meta name="revisit-after" content="15 days"> 
	 <meta name="ROBOTS" content="Index, ALL"> 
	 <meta name="ROBOTS" content="Index, FOLLOW"> 
	 <meta http-equiv="X-UA-Compatible" content="IE=edge" 
	 <meta name="robots" content="NOODP,NOYDIR" /> 
	 <meta http-equiv="refresh" content="30"> -->
	
	<!-- Links -->
	<link rel="shortcut icon" href="assets/img/dx-icon.jpg" />
	<link rel="icon" sizes="16x16 32x32 64x64" href="assets/img/dx-icon.jpg" />
	
	<!-- styles -->
	<link rel="stylesheet" type="text/css" href="../../../assets/css/vendor/bricks.css" />
	 <link rel="stylesheet" type="text/css" href="../../../assets/css/vendor/ionicons/ionicons.min.css">
	<link rel="stylesheet" type="text/css" href="../../../assets/css/utilities.css" />
	<link rel="stylesheet" type="text/css" href="../../../assets/css/custom.css">
	<link rel="stylesheet" type="text/css" href="../../../assets/css/login.css">
 
</head>

<body>

<!-- Main-Row  -->
<div class="row">

	<aside class="col m12 left-panel bg-red txt-white gutter-less overflow-y left-pane">
			<h4 class="pad-top10 pad-bottom10 txt-center small-caps">Dextro Admin</h4>
			
			<nav class="pad-left15 pad-right15">
	<a class="active">
		<i class="ion-android-apps"></i>
		Dashboard
	</a>
	
	<a href="../college/add-student/add_student.php">
		<i class="ion-person-add"></i>
		Add Student
	</a>

	<a href="#">
		<i class="ion-edit"></i>
		Update Class
	</a>

	
	<a href="#">
		<i class="ion-arrow-graph-up-right"></i>
		Transaction
	</a>
	

	<!-- <a  href="../expenses-report/expensesReport.php">
		<i class="ion-arrow-graph-up-right"></i>
		Expenses Report
	</a> -->


	<a href="#">
		<i class="ion-ios-list-outline"></i>
		Search Student
	</a>

	<a href='../college/bonafide/bonafide_form.php'>
		<i class="ion-ios-paper-outline"></i>
		Bonafide
	</a>

	<a href='../college/circular/circular.php'>
		<i class="ion-ios-compose-outline"></i>
			Circular
		</a>

	<a href="../college/lc-reports/lc_form.php">
		<i class="ion-ios-list"></i>
Expense	</a>
	<a href="../college/expenses/expenses.php">
		<i class="ion-printer"></i>
		LC
	</a>

	
	


	
</nav>

		</aside> <!-- Left Panel End -->
	<!-- Right pane  -->
	<?php  require_once 'right_pane.php' ?>




