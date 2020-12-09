<?php
    require_once('update.php');

    $username = filter_input(INPUT_POST, 'username');
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone');
    $pass = filter_input(INPUT_POST, 'pass');
    $confirm = filter_input(INPUT_POST, 'confirm');

    if(isset($_POST['add'])){
		function checkUser($username)
		{
			$dbc = new PDO('mysql:host=localhost;dbname=forum','root','');
			$query = $dbc->prepare("SELECT * FROM expert WHERE username = :username");
			$query->bindValue(':username', $_POST['username']);
			$query->execute();
			return $query->rowCount() > 0;
		}
		if (checkUser($_POST['username'])){
			$username_error = 'Username telah digunakan';
		}
	}
	else if(isset($_POST['back'])){
		header('Location: http://localhost/index.php');
		exit();
	}

    if (empty($username)) {
        $username_error = 'username harus diisi!';
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $username)) {
        $username_error = 'Isi username anda hanya dengan huruf!';
    }

    if (empty($email)) {
        $email_error = 'Email harus diisi!';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = 'Format email anda salah!';
    }

    if (empty($phone)) {
        $phone_error = 'Nomor HP harus diisi!';
    } elseif (!preg_match("/^[0-9 ]*$/", $phone)) {
        $phone_error = 'Nomor HP hanya boleh angka';
    } elseif (strlen($phone) < 12) {
        $phone_error = 'Nomor HP minimal 12 digit';
    }

    if (empty($pass)) {
        $pass_error = 'password harus diisi';
    } elseif (!preg_match("/^[a-zA-Z0-9._]+[a-zA-Z0-9._]+$/", $pass)) {
        $pass_error = 'isi password anda dengan kombinasi huruf dan angka';
    } elseif (strlen($pass) < 8) {
        $pass_error = 'password minimal 8 karakter';
    }

    if (empty($confirm)) {
        $confirm_error = ' Password tidak sama';
    } elseif ($confirm != $pass) {
        $confirm_error = ' Password tidak sama';
    }

    if (empty($username_error) && empty($email_error) && empty($hp_error) && empty($pass_error) && empty($confirm_error)) {
        $state = $dbc->prepare("INSERT INTO expert (username,password,phone,email) VALUES (:username,SHA2(:pass,0),:phone,:email)");
        $state->bindValue(':username', $_POST['username']);
        $state->bindValue(':pass', $_POST['pass']);
        $state->bindValue(':phone', $_POST['phone']);
        $state->bindValue(':email', $_POST['email']);
        $state->execute();
        include('index.php');
    } else {
        include('expert_form.php');
    }
?>