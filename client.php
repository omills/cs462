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
	else if($page=="create"){
		echo "create<br>\n";
	}
	else if($page=="register"){
		register();
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

?>
