<html>
	<head>
		<title>Client Viewer</title>
	</head>
	<body>
		<p>
			<h3>Welcome</h3>
		</p>
		<p>
			Login here
		</p>
		<p>
			List of users:<br>
			<?php
				echo "<ol>\n";				
				
				foreach($data as $key => $value)
				{
					echo "<li><a href=\"./client.php?page=profile&id="$key"\">".
					$key."</a></li>\n";									
				};
				echo "</ol>";
			?>
			
		</p>
	</body>
</html>