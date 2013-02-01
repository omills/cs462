<?php session_start() ?>
<html>
<head><title>Profile Page</title></head>
<body>
	<h3>Profile Page</h3>
<?php	
	$ownPage = false;
	if(!isset($_GET['id'])){
		echo "<b>Error - invalid profile</b>";
		exit;
	}	

	
	$profile = $_GET['id'];

	if(!isset($data[$profile])||!isset($data[$profile]['account']))
	{
		echo "<b>Error - profile not found</b>";
		exit;
	}
	
	$accountId = $data[$profile]['account'];

	if(isset($_SESSION['loginName']) && $_SESSION['loginName']==$profile){
		$ownPage = true;
	}
	
	
	$url = "https://api.foursquare.com/v2/users/self/checkins?oauth_token=".$accountId;
	
	$result = json_decode(file_get_contents($url),true);
	$checkins = $result['response']['checkins'];
		
	if($ownPage == true)
	{
		echo "<h4>IT'S MY PROFILE!!!!</h4>\n";
		$count = $checkins['count'];
		echo "<h5>".$count." checkins recorded</h5>";
		
		$items = $checkins["items"];	
		
		echo "<ul>\n";
		
		foreach($items as $checkin){
			echo "<li>";
			
			if(isset($checkin['shout'])){
				echo $checkin['shout']." - "; 
			}
			else {
				echo "no shout - ";
			}
			
			if(isset($checkin['venue']['name'])){
				echo $checkin['venue']['name']." - "; 
			}
			else {
				echo "nowhere - ";
			}
			
			$dateString = $checkin['createdAt'];
			
			echo gmdate("m-d-yy h:i:s", $dateString);
			
			echo "</li>\n";
			
			
		}	
		
		echo "</ul>\n";
		
	}
	else
	{
		echo "<h4>IT'S ".$profile."'s PROFILE!!!!</h4>\n";
		$count = $checkins['count'];
		echo "<h5>".$count." checkins recorded</h5>";
		
		$items = $checkins["items"];	
		
		echo "Latest: <ul>\n";
		
		$checkin = $items[0];
			echo "<li>";
			
			if(isset($checkin['shout'])){
				echo $checkin['shout']." - "; 
			}
			else {
				echo "no shout - ";
			}
			
			if(isset($checkin['venue']['name'])){
				echo $checkin['venue']['name']." - "; 
			}
			else {
				echo "nowhere - ";
			}
			
			$dateString = $checkin['createdAt'];
			
			echo gmdate("m-d-yy h:i:s", $dateString);
			
			echo "</li>\n";
			
			
			
		
		echo "</ul>\n";
		
		
	}
	
	
	
	
?>
<a href="client.php">return to main page</a>
</body>

</html>
