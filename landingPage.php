<!DOCTYPE html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>

    <!-- card login -->
    <div class="card" style="width:30%; margin:0 auto; ">
        <div class="card-body">

            <!-- Input Username -->
            <div class="input-group mb-3" style="margin-bottom:20px;">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Username</span>
                </div>
                    <input type="text" id="username" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
            </div>

            <!-- Input Password -->
            <div class="input-group mb-3" style="margin-bottom:20px;">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
                </div>
                    <input type="password" id="password" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required password>
            </div>

            <div><button type="button" class="btn btn-primary" id="loginButton" style="width:100%; margin:0 auto;">Login</button></div>
        </div>
    </div>
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

    </script>
    </body>
</html>