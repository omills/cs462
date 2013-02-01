<?php
$CLIENT_ID = "XR5OLRW00QQZZ5FZLDI5PHHHXAJKPBV2KTSK0VLJKC4TU145";
$CLIENT_SECRET = "TD40334ORNQ3OSJ0LH23QIDE4SVM1O0PNVRA02XSXTNAOHDZ";
$REGISTERED_REDIRECT_URI = "";


if(isset($_GET['status']) && $_GET['status']=="start"){
echo "<a href=\"https://foursquare.com/oauth2/authenticate
    ?client_id=".$CLIENT_ID.
    "&response_type=code
    &redirect_uri=".$REGISTERED_REDIRECT_URI."\\\">Click here to sign in with 4square!</a>";

}
else if(isset($_GET['code'])){
	$code = $_GET['code'];
	
	$accountCode = json_decode(
	file_get_contents("https://foursquare.com/oauth2/access_token
    ?client_id=".$CLIENT_ID.
    "&client_secret=".$CLIENT_SECRET.
    "&grant_type=authorization_code
    &redirect_uri=".$REGISTERED_REDIRECT_URI.
    "&code=".$code));
	
	include "registerUser.php";

}
else if(isset($_GET['status']) && $_GET['status']=="finish"){
	$accountCode = $_GET['account'];
	$userName = $_GET['userName'];
	array_push($data,$userName,$accountCode);
	file_put_contents("data.json", json_encode($data));
} 


?>