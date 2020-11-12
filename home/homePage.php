<?php
    session_start();
    if (($_SESSION["login"]) == false) {
    header("Location: ../landingPage.php");
    }
?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="style.css">  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>    
</head>

<body>
    <!-- jumbotron-->
    <div class="jumbotron jumbotron-fluid" id="jumbotron" style="height: 200px;">
        <div class="container">
            <h2 class="text1" style="text-align: center; ">Sistem Manajemen Gudang</h2>
            <p class="text2" style="text-align: center; "></p>
        </div>
        <!--<p style="float:right; margin-right:20px;" id="logoutButton">Logout</p>-->
    </div>

    <div class="wrapper">
        <div class="row">   
            <p class="btn" id="logoutButton" style="font-size : 20pt; width:min-content; margin: auto 10% 2% auto">Logout</p>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <h1 style="margin-left:10%;">List Gudang</h1>
            </div>
            <div class="col-sm-3 searchbar">
                <!-- search bar-->
                <div class="form-group"                                     >
                    <input type="text" class="form-control" id="search" placeholder="Search . . .">
                </div>
                <!--button-->
                <div id="buttons">
                    
                </div>
            </div>
        </div>
    
        <!-- tabel list gudang-->
        <div id="listGudang" style="margin-top:30px;"></div>

        <!-- add User Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Add User</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label>Username : </label>
                        <input type="text" name="username" id="a_user" placeholder="Masukkan username anda.." style="width: 100%; padding: 10px;">
                        <label style="margin-top: 10px;">Password : </label>
                        <input type="password" name="password" id="a_password" placeholder="Masukkan password anda.." style="width: 100%; padding: 10px;">
                        <label style="margin-top: 10px;">Email : </label>
                        <input type="email" name="email" id="a_email" placeholder="Masukkan email anda.." style="width: 100%; padding: 10px;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" onclick = "confirmButton()" style="color: #b89d64; background-color: #513826;">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        addUserButton();
        refreshhome();
        $("#addPage").click(function(){
            window.location.href="../Gudang/AddGudang.php";
        });

        $("#logoutButton").click(function(){
            window.location.href="../php/logout.php";
        });

        $("#search").on("input", function(){
            var search_val = $(this).val();
            refreshhome(search_val);
        });

        function refreshhome(search_val){
            $.ajax({
                url: 'sql/search_db.php',
                type: 'POST',
                data: {
                    search:search_val
                },
                success: function(response){
                    $("#listGudang").html(response);
                }
            });
        }
    });
    
    function editGudang(id){
        var thisID = id;
        window.location.href = "../Gudang/EditGudang.php?id=" + thisID;
    }

    function viewGudang(id){
        var thisID = id;
        window.location.href = "../Gudang/ViewGudang.php?id=" + thisID;
    }

    function deleteGudang(id){
        var thisID = id;
        $.ajax({
            url: '../Gudang/sql/DeleteGudang_db.php',
            type: 'POST',
            datatype: 'json',
            data: {
                id:thisID
            },
            success: function(response){
                var responseJSON = $.parseJSON(response);
                alert(responseJSON.message);
                
                //refresh home
                $.ajax({
                    url: 'sql/search_db.php',
                    type: 'POST',
                    success: function(response){
                        $("#listGudang").html(response);
                    }
                });
            }
        });
    }

    function addUserButton(){
        var type = <?php echo $_SESSION["type"]; ?> ;
        if(type == 0) {
            var add = "<button type='button' class='btn' id='adduser' onclick='addUser()' style='margin-right:10px;'>Add User</button>";
            add += "<button type='button' class='btn' id='addPage'>Add Gudang</button>";
            $("#buttons").html(add);    
        }
    }

    function addUser(){
        $("#a_user").val("");
        $("#a_password").val("");
        $("#a_email").val("");
        $('#addUserModal').modal('show');
    }

    function confirmButton(){
        var username = $("#a_user").val();
        var password = $("#a_password").val();
        var email = $("#a_email").val();

        $.ajax({
                type: 'POST',
                url: '../Gudang/sql/addUser.php',
                datatype: "json",
                data: {
                    user: username,
                    password: password,
                    email: email
                },
                success: function(data) {
                    alert(data);
                }
        })
    }
</script>
</html>