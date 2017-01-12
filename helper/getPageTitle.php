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

	'bonafide' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Bonafide'
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

	'expenses' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Expenses'
		),

	'enquiry' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Enquiry'
		),
	'enquiry_form' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Enquiry Form'
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
	'lc_reprint' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Lc RePrint'
		),
	'genrateNoc' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Genrate No Objection Certificate',
		),
	'viewNoc' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'View Created Noc',
		),
	'circular' => array(
		'icon-class' => 'ion-android-apps',
		'title' => 'Circular',
		),
	);

$pageTitleIcon = $pageTitleArr[GetPageTitle::getTitle($_SERVER['REQUEST_URI'])];


