<?php
session_start();
require_once("../../php/connect.php");
$output = array('success' => false, 'message' => null, 'id'=> 0);
if (isset($_POST["user"]) && isset($_POST["password"]) && isset($_POST["email"])) {
	$user = $_POST["user"];
    $pass = $_POST["password"];
    $email = $_POST["email"];
	
    
    $cek = mysqli_query($con, "SELECT username FROM user WHERE username ='" . $user . "'");
    if($cek->num_rows > 0){
        $output['message'] = "Username telah terdaftar!";
        $output["success"] = false;
        
    }
    else {
        if(empty(trim($_POST["password"]))){
            $output['message']="Password masih kosong";
        }elseif(strlen(trim($_POST["password"]))<6){
            $output['message']="Password minimal 6 karakter";
        }elseif(preg_match("[ ]", $_POST["password"])){
            $output['message']="Password tidak bisa mengandung spasi";
        }else{
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $query = mysqli_query($con, "INSERT INTO user (username, password, email, type) VALUES('$user', '$pass', '$email', 1)");
            if($query){
                $output['message'] = "User berhasil ditambahkan!";
                $output["success"] = true;
            }
            else {
                $output['message'] = "User gagal ditambahkan!";
                $output["success"] = false;
            }
        }        
    }

    echo json_encode($output);
}
else {
    echo "data ga lengkap";
}
?>