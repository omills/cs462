<?php session_start(); ?>
<?php

$string=file_get_contents("data.json");
$data=json_decode($string,true);

if(empty($data)){
echo "no data<br>\n";
}

if(!isset($_GET['page'])){
	main();
	exit;
}
else{
	$page = $_GET['page'];
	if($page=="main"){
		main();
	}
	else if($page=="register"){
		register();
	}
	else if($page == "profile"){
		profile();
	}
}

function main(){
	global $data;
	include 'main.php';
}

function register(){
	global $data;
	include 'register.php';
}
function profile(){
	global $data;
	include 'profile.php';
}

?>
