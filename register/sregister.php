<?php 

require_once "config.php";
$username=$nama=$password=$confirm_password=$email="";
$error = array("error"=>false,"username_err"=>null, "password_err"=>null, "confirm_password_err"=>null, "nama_err" =>null, "email_err"=>null,"db_error"=>null);

if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty(trim($_POST["username"]))){
		$error["username_err"]="Please enter username.";
	}else{
		if(preg_match("[ ]", $_POST["username"])){
			$error["username_err"]="Username Cannot contain spaces";
		}
		else{
			$sql = "SELECT username FROM user WHERE username = ?";

			if($stmt = mysqli_prepare($con,$sql)){
				mysqli_stmt_bind_param($stmt,"s",$param_username);
				$param_username = trim($_POST["username"]);
				if(mysqli_stmt_execute($stmt)){
					mysqli_stmt_store_result($stmt);
					if(mysqli_stmt_num_rows($stmt)==1){
						$error["username_err"] = "Username already exists";
					}
					else{
						$username=test_input($_POST["username"]);
					}
				}
				mysqli_stmt_close($stmt);
			}
		}
	} 
	//cek password

	if(empty(trim($_POST["password"]))){
		$error["password_err"]="Password masih kosong";
	}elseif(strlen(trim($_POST["password"]))<6){
		$error["password_err"]="Password minimal 6 karakter";
	}elseif(preg_match("[ ]", $_POST["password"])){
		$error["password_err"]="Password tidak bisa mengandung spasi";
	}else{
		$password=$_POST["password"];
	}

				//cek confirm pasword
	if(empty(trim($_POST["confirm_password"]))){
		$error["confirm_password_err"] = "Please enter confirm password";     
	}else{
		if(empty($password_err)&&($_POST["password"]!=trim($_POST["confirm_password"]))){
			$error["confirm_password_err"]="Password did not match";
		}else{
			$confirm_password=trim($_POST["confirm_password"]);
		}
	}

				//cek nama
	if(empty($_POST["nama"]))
		$error["nama_err"] = "Please enter name";
	else{
		if(!preg_match("/^[a-zA-Z ]*$/", test_input($_POST["nama"]))){
			$error["nama_err"] = "Can only contain letters and spaces";
		}
		else{
			$nama=test_input($_POST["nama"]);
		}
	}

		// cek email
	if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$error["email_err"]="format email salah";
	}else{
		$email=$_POST["email"];
	} 

	foreach ($error as $key => $value) {
		if($value!=null){
			$error['error']=true;
		}	
	}

	if($error['error']==false){			
		$exec = mysqli_query($con,"INSERT INTO user VALUES ('".$username."','".password_hash($password, PASSWORD_DEFAULT)."','".$email."','".$nama."')");
		if($exec){
			$error['error']=false;
		}
	}
}
mysqli_close($con);
echo json_encode($error);
function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;	

}

?>
