<?php
if (isset($_POST['logout'])) {
	session_start();
	unset($_SESSION['isAdmin']);
	header('Location: http://localhost/Tugas Akhir/index.php');
} else if (isset($_POST['cancel'])) {
	header('Location: http://localhost/Tugas Akhir/index.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Logged Out</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
	<header>
		<div class='app-bar'>
			Logged Out
		</div>
	</header>
	<main>
		<fieldset>
			<legend>Logged Out</legend>
			<div class='form'>
				<form action="logout.php" method="POST">
					<div class="button">
						<input name='logout' type="submit" class="kontrol-form" value="LOGOUT"/>
						<input name='cancel' type="submit" class="kontrol-form" value="CANCEL"/>
					</div>
				</form>
			</div>
		</fieldset>
	</main>
</body>

</html>