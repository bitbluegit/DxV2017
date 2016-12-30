<?php

// Require Files 
require 'db.php';
require 'session.php';
require '../config/routes.php';



class Auth {

	public static function AuthUser($data)
	{
		$md5Pwd =  md5($data['user_pwd']);
		$sql = " select AD.* from admin_sch AD where AD.uname=:uname and AD.pwd =:pwd  ";
		$params = array(':uname'=>$data['user_name'], ':pwd'=>$md5Pwd);

		$result = DB::oneRow($sql,$params);		
		if($result){
		    // Session Data
			Session::start(); 
			Session::put('user-type',$result['type']);
			Session::put('user-id',$result['unique_id']);
			Session::put('user-name',$result['Name']);

			$virtual_location = '../app';
			// $default_page =  'index.php';

			//echo $result['type'];
			if ($result['type'] == 'admin'){
				header(sprintf("Location:%s/school/admin-dashboard/index.php",$virtual_location));
			}
			else if ($result['type'] == 'sch_user'){
				header(sprintf("Location:%s/school/dashboard/index.php",$virtual_location));
			}
			else if ($result['type'] == 'clg_user'){
				header(sprintf("Location: %s/college/dashboard/index.php",$virtual_location));
			}
			

		}else{
			echo 'Not A Valid User ';
		}
	}
}



Auth::AuthUser($_POST);









