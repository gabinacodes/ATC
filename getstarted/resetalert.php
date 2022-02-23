<?php include('app_logic.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>alert</title>
	<link rel="stylesheet" href="main.css">
</head>
<body>

	<form class="login-form" action="restalert" method="post" style="text-align: center;">
		<p>
			We sent an email to  <b><?php echo $_GET['email'] ?></b> to help you recover your account. 
		</p>
	    <p>Please login into your email account and click on the link we sent to reset your password</p>
	</form>
		<script>
		setTimeout(function(){ 
			location.replace("../getstarted") }, 3000);
		</script>
</body>
</html>