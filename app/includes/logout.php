<?php 

require '../../helper/session.php';
Session::end();
$location ='../index.php';
header("Location: {$location}");