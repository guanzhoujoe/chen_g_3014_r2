<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your admin panel</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<h1>welcome Company name to your admin page</h1>
	<?php echo $_SESSION['user_name'];  ?>
	<a href="admin_createuser.php">Create user</a>
	<a href="phpscripts/caller.php?caller_id=logout">Sign Out</a>
</body>
</html>
