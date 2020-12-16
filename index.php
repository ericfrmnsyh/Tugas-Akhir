<!DOCTYPE html>
<html lang="en">

<head>
	<title>Ini Index</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
	<?php
	session_start();
	?>
	<header>
		<div class='app-bar'>
			Title
		</div>
		<div class='nav'>
			<?php
			if (!isset($_SESSION['isAdmin'])) {
				echo "<a href='login.php'>Sign In</a>";
			} else {
				echo "<a href='logout.php'>Sign Out</a>";
			};
			?>
			<a href="">Diskusi</a>
			<a href="">Profile</a>
		</div>
	</header>
	<main>
		<?php
		if (!isset($_SESSION['isAdmin'])) {
			include 'home.inc';
		} else{
			echo "Ini Index";
		}
		?>
	</main>
</body>

</html>