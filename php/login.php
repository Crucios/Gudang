<?php
session_start();
require_once("connect.php");
if (isset($_POST["user"]) && isset($_POST["password"])) {
	$user = $_POST["user"];
    $pass = $_POST["password"];
	$cek = mysqli_query($con, "SELECT username,password,type FROM user WHERE username='" . $user . "'");
	$res = $cek->fetch_assoc();
	if ($cek->num_rows == 0) {
		echo "Username yang dimasukkan salah atau belum terdaftar!";
	} elseif (password_verify($pass, $res["password"])) {
		$_SESSION["login"] = true;
        $_SESSION["username"] = $res["username"];
		$_SESSION["type"] = $res["type"];
		echo "Login sukses!";
	} else {
		echo "Password yang dimasukkan salah!";
	}
}
?>