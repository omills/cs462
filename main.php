<?php session_start(); ?>
<html>
	<head>
		<title>Client Viewer</title>
	</head>
	<body>
		<p>
			<h3>Welcome</h3>
		</p>
		<p>
			<b>New Member:</b>&nbsp Register with your foursquare account <a href="client.php?page=register&status=start">here</a>
		</p>
		<p>
			<?php
				if(isset($_SESSION['loginName']))
					echo "Currently Logged in as &nbsp".$_SESSION['loginName']."&nbsp<a href=\"logout.php\">Logout</a><br>".
					"View your profile <a href=\"./client.php?page=profile&id=".$_SESSION['loginName']."\">here</a><br>";
				else
				{
					echo "<b>Login: </b>"."<form action=\"login.php\" method=\"POST\">\n".
					"<input type=\"text\" name=\"loginId\"/>\n".
					"<input type=\"submit\" name=\"submit\" value=\"login\" />\n".
					"</form>\n";
				}
			?>
		</p>
		<p>
			List of users:<br>
			<?php
				echo "<ol>\n";				

				foreach($data as $key => $value)
				{
					echo "<li><a href=\"./client.php?page=profile&id=".$key."\">".
					$key."</a></li>\n";									
				};
				echo "</ol>";
			?>
			
		</p>
	</body>
</html>
