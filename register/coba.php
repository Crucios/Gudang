<?php 
$error = array("error"=>true,"username_err"=>null, "password_err"=>null, "confirm_password_err"=>null, "nama_err" =>null, "email_err"=>null);

foreach ($error as $key => $value) {
	if($key!="error")
		print("key: ".$key." value: ".$value);
}
 ?>