<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
	<?php include "header.php"; ?>
	<style type="text/css">
		.error{
			color: red;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			form=$("form");
			form.submit(function(event){
				
				event.preventDefault();
				console.log(form.serialize())
				var allForm=$(".form-control");
				var cek=0;
				for(var i=0;i<allForm.length;i++){
					if(allForm[i].value==""){
						cek=1;
					}
				}
				if(cek==1){
					alert("data belum lengkap");
				}
				else{

					$.ajax({
						url:'sregister.php',
						type:'post',
						dataType:'json',
						data:form.serialize(),
						beforeSend:function(){
							console.log("Before send")
						},
						success:function(response){							
							console.log(response);
							console.log(response);
							if(response.error==true){
								for(var prop in response){
									if(prop!="error"){
										$("#"+prop).html(response[prop]);
									}
								}
							}else{
								alert("success add your account!");
							}
						},
						error:function(xhr,textStatus,errorThrown){
							var str = "ERROR: Server errror<br>"+xhr+"<br>"+textStatus+"<br>"+errorThrown;
							console.log(str)
							console.warn(xhr.responseText)
						}

					})	
				}
				
			})
		});
	</script>
</head>
<body style="margin-top: 60px;">
	<div class="container">
		<h3 style="margin-bottom: 60px;">Create Account</h3>


		<form>

			<!-- Nama -->
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="nama" placeholder="Nama..." class="form-control">
				<p class="error" id="nama_err"></p>
			</div>

			<!-- Email -->

			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" placeholder="Email..." class="form-control">
				<p class="error" id="email_err"></p>
			</div>

			<!-- Username -->

			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" placeholder="Username..." class="form-control">
				<p class="error" id="username_err"></p>
			</div>

			<!-- Password -->

			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" placeholder="Password..." class="form-control">
				<p class="error" id="password_err"></p>
			</div>

			<!-- Confirm Passsword -->

			<div class="form-group">
				<label>Confirm Password</label>
				<input type="password" name="confirm_password" placeholder="Confim password..." class="form-control">
			</div>
			<p class="error" id="confirm_password_err"></p>

			<!-- Submit -->

			<div class="from-group">
				<input type="submit" class="btn btn-primary" value="Create Account" name="">
			</div><br><br>
			<p>Sudah punya akun? <a href="login.php" class="login">Login Here</a></p>
		</form>
	</div>
</body>
</html>