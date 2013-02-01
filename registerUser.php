<html>
<head>
<title>Register User</title>
</head>
<body>
<form method="GET" action="client.php">
	<input type="hidden" name="page" value="register" />
	<input type="hidden" name="status" value="finish" />
	<input type="hidden" name="account" value="<? echo $accountCode['access_token']; ?>" />
	<input type="text" name="userName" value="" />
	<input type="submit" name="submit" value="Create" />
</form>
</body>
</html>