<?php 


class GetPageTitle{


	 // get Page Title from page 
	public static function getTitle($url){
		$title = '' ;
			// dxv201/school/tran.php?x=2&y=3
		$dirArr = explode('/',$url);
		if(isset($dirArr[0])){
			$pageArr = explode('.php',$dirArr[count($dirArr)-1]);
		}

		if(isset($pageArr[0])){
			$title =  $pageArr[0];
		}
		return $title;
	}

}	


GetPageTitle::getTitle($_SERVER['REQUEST_URI']);

// Page Title Array 
$pageTitleArr =  array(
	
	'index' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'DashBoard'
		),
	'add_student' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Admission Form'
		),
	'addEvent' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Add Event'
		),
	'addExam' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Add Exams'
		),

	'addFee' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Add Student Fee'
		),

	'AddTimeTable' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Add Time Table'
		),

	'AssignTeacher' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Assign Teacher '
		),

	'bonafide' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Bonafide'
		),
	'bonafide_print' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Print Bonafide Certificate'
		),
	'ReprintBonafide' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'RePrint Bonafide'
		),

	'birthdayList' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Student Birthday List'
		),

	'create_new_user' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Create New User'
		),

	'create_bus_fee' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Create Bus fee'
		),

	'create_new_class' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Create New Class',
		'js'=>'create_new_class'
		),

	'dx_green_sheet' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Green Sheet',
		// 'js'=>'create_new_class'
		),

	'expenses' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Expenses'
		),
	'expensePrint' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Print Expense'
		),
	'expensesReport' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Expense Report'
		),
	'exam' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Add Exam'
		),

	'holiday' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Holidays'
		),
	'printExpenses' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Reprint Expenses'
		),

	'enquiry' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Enquiry'
		),
	'enquiry_form' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Enquiry Form'
		),
	'enquiryPrintForm' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Enquiry Form Print'
		),
	'edit_profile' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Edit Profile'
		),

	'filter_bus_fee' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Fiilter Bus Fee'
		),

	'lcreport' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'LC Report'
		),

	'PrintLC' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'LC Print'
		),

	'today_tran' => array(
		'icon-class' => 'ion-android-apps',
		'title' => "Today's Transaction "
		),

	'today_exp' => array(
		'icon-class' => 'ion-android-apps',
		'title' => "Today's Expenses "
		),

	'admission_revenue' => array(
		'icon-class' => 'ion-android-apps',
		'title' => "Admission Revenue "
		),

	'message_template' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Message Template'
		),

	'message_report' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Message Report'
		),

	'set_class_fee' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Set Class fee'
		),

	'student_src' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Student Search'
		),

	'transaction' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Transaction'
		),

	'update_student_info' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Update Student Info'
		),
	'bonafide_form' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Create Bonafide'
		),
	'lc_form' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Create Lc'
		),
	'add_award' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Add Award'
		),
	'printAward' => array (
		'icon-class' => 'ion-android-apps',
		'title' => 'Award Certificate'
		),
	'awardFilter' => array (
		'icon-class' => 'ion-android-apps',
		'title' => 'Award Report'
		),
	'rePrintAward' => array (
		'icon-class' => 'ion-android-apps',
		'title' => 'Award Certificate'
		),
	'lc_reprint' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Lc RePrint'
		),
	'genrateNoc' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Genrate No Objection Certificate',
		),
	'nocCertificate' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Print No Objection Certificate',
		),
	'viewNoc' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'View Created Noc',
		),
	'circular' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Circular',
		),
	'circularPrint' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Circular Print',
		),
	'circularFilter' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Circular Report',
		),
	'printCircular' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'RePrint Circular',
		),


	'student_list' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Student List',
		),
	'upd_student_details' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Update Student List',
		),
	);

$pageTitleIcon = $pageTitleArr[GetPageTitle::getTitle($_SERVER['REQUEST_URI'])];


