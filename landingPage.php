<!DOCTYPE html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="landing.css">
    </head>
    <body>
        <!-- card login -->
        <div class="card" >
            <div class="card-body">
                <div class="title">
                    <h2>Login</h2>
                </div>
                <!-- Input Username -->
                <div class="input-group mb-3">
                    <input type="text" id="username" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Username" required>
                </div>

                <!-- Input Password -->
                <div class="input-group mb-3">
                    <input type="password" id="password" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Password" required password>
                </div>
                <div class="elements">
                    <a id="clickable" onclick="showhide()" >Show Password</a>
                </div>
                <div>
                    <button type="button" class="btn btn-primary" id="loginButton" style="width:100%; margin:0 auto; background-color :#513826 ">Login</button>
                </div>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#loginButton").click(function(){
                var username = $("#username").val();
                var password = $("#password").val();

                $.ajax({
                    type: 'POST',
                    url: 'php/login.php',
                    datatype: "json",
                    data: {
                        user: username,
                        password: password
                    },
                    success: function(data) {
                        alert(data);
                        window.location.href = "home/homePage.php";
                    }
                })
            });
        });
        function showhide(){
            var x = document.getElementById("password");
            var y = document.getElementById("clickable");
            if (x.type == "password") {
                x.type = "text";
                y.innerHTML = "Hide Password";
            }else{
                x.type = "password";
                y.innerHTML = "Show Password";
            }
        }
    </script>
</html>