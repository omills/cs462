<?php
$CLIENT_ID = "XR5OLRW00QQZZ5FZLDI5PHHHXAJKPBV2KTSK0VLJKC4TU145";
$CLIENT_SECRET = "TD40334ORNQ3OSJ0LH23QIDE4SVM1O0PNVRA02XSXTNAOHDZ";
$REGISTERED_REDIRECT_URI = "http://students.cs.byu.edu/~omills/CS462/register.php";


if(isset($_GET['status']) && $_GET['status']=="start"){
echo "<a href=\"https://foursquare.com/oauth2/authenticate".
    "?client_id=".$CLIENT_ID.
    "&response_type=code".
    "&redirect_uri=".$REGISTERED_REDIRECT_URI."\\\">Click here to sign in with 4square!</a>";

}
else if(isset($_GET['code'])){
	$code = $_GET['code'];
	
	$url = "https://foursquare.com/oauth2/access_token".
    "?client_id=".$CLIENT_ID.
    "&client_secret=".$CLIENT_SECRET.
    "&grant_type=authorization_code".
    "&redirect_uri=".$REGISTERED_REDIRECT_URI.
    "&code=".$code;
	
	$accountCode = json_decode(file_get_contents($url),true);
	echo $accountCode['access_token'];
	include "registerUser.php";

}
else if(isset($_GET['status']) && $_GET['status']=="finish"){
	
	$string=file_get_contents("data.json");
	$data=json_decode($string,true);
	
	$accountCode = $_GET['account'];
	$userName = $_GET['userName'];
	$account = array('account'=>$accountCode);
	$data[$userName] = $account;
	file_put_contents("data.json", json_encode($data,JSON_FORCE_OBJECT));
	
	echo "Thank you, click <a href=\"../client.php\">here to return</a>";
} 


?>
