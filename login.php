<?php
if (isset($_POST['login'])) {
    function checkPassword($username, $password)
    {
        $dbc = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
        $query = $dbc->prepare("SELECT * FROM user WHERE user_username = :username AND user_password = SHA2(:pass, 0)");
        $query->bindValue(':username', $_POST['username']);
        $query->bindValue(':pass', $_POST['pass']);
        $query->execute();
        return $query->rowCount() > 0;
    }
    if (checkPassword($_POST['username'], $_POST['pass'])) {
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
        <h1>User Sign In</h1>
        <div class='form'>
            <form name='myform' action="login.php" method="POST">
                <?php
                include 'login.inc';
                ?>
                <div class="box">
                    <a href="expert_login.php">Sign In as Expert</a>
                </div>
                <div class="box">
                    <label>Don't have account?</label>
                    <a href="form.php">Sign Up</a>
                </div>
            </form>
        </div>
    </fieldset>
</body>

</html>