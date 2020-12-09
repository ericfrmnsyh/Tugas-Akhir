<?php
if (isset($_POST['login'])) {
	function checkPassword($username, $password)
	{
		$dbc = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
		$query = $dbc->prepare("SELECT * FROM expert WHERE username = :username AND password = SHA2(:password, 0)");
		$query->bindValue(':username', $_POST['username']);
		$query->bindValue(':password', $_POST['password']);
		$query->execute();
		return $query->rowCount() > 0;
	}
	if (checkPassword($_POST['username'], $_POST['password'])) {
		session_start();
		$_SESSION['isAdmin'] = true;
		header('Location: http://localhost/Tugas Akhir/index.php');
		exit();
	}
} else if (isset($_POST['back'])) {
	header('Location: http://localhost/index.php');
	exit();
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Form</title>
	<link rel="stylesheet" type="text/css" href="form.css">
</head>

<body>
	<fieldset>
		<h1>Expert Sign In</h1>
		<div class='form'>
			<form name='myform' action="expert_login.php" method="POST">
				<?php
				include 'login.inc';
				?>
				<div class="box">
                    <label>Don't have account?</label>
                    <a href="expert_form.php">Sign Up</a>
                </div>
			</form>
		</div>
	</fieldset>
</body>

</html>