<?php session_start(); ?>
<?php

$string=file_get_contents("data.json");
$data=json_decode($string,true);

if(isset($_POST['loginId'])){
	
	$login = $_POST['loginId'];
	$found = false;
	
	foreach ($data as $loginId=>$account){
		if($login==$loginId)
		{
			$found = true;
			$_SESSION['loginName'] = $loginId;
			break;
		}
		
	}
	
	if($found==true)
	{
		echo "<b>Thank you for logging in!</b>".
		"<p><a href=\"client.php\">Click here to return to main page</a></p>".
		"<p><a href=\"client.php?page=profile&id=".$_SESSION['loginName']."\">Click here to view your profile</a></p>";
	}
	else
	{
		echo "<b>SORRY! Invalid Login Id!</b><p><a href=\"client.php\">Click here to return</a></p>";
	}

}



?>
