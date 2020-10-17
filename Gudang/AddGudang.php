<!DOCTYPE html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
        <link rel="stylesheet" href="css/AddGudang.css">
    <body>
        <!-- tabel list gudang-->
        <div style="margin-top:30px;">
            <div class="card" style ="width:40%; margin:0 auto;">
                <div class="card-body">
                    <form>
                        <h5 class="card-title">Tambah Gudang Baru</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Masukkan Panjang dan Lebar Gudang Baru</h6>

                        <!-- Input Panjang -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Panjang</span>
                            </div>
                            <input type="number" id="ukuran_x_input" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                        </div>
                        <!-- Input Lebar -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Lebar</span>
                            </div>
                            <input type="number" id="ukuran_y_input" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                        </div>

                        <button type="button" class="btn btn-primary" id="submitGudang">Next</button>
                        <a href="../Home/homePage.php" class="card-link">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $("#addPage").click(function(){
                window.location.href="../php/AddGudang.php";
            });

            $("#submitGudang").click(function(){
                // var username = ;
                var ukuran_x = $("#ukuran_x_input").val();
                var ukuran_y = $("#ukuran_y_input").val();
                $.ajax({
                    url: 'sql/AddGudang_db.php',
                    type: 'POST',
                    datatype: 'json',
                    data: {
                        ukuran_x:ukuran_x,
                        ukuran_y:ukuran_y
                    },
                    success: function(response){
                        console.log(response);
                        // var responseJSON = $.parseJSON(response);
                        // console.log(responseJSON.success);
                        // console.log(responseJSON.message);
                        // $("#passwordErrorHandler").html(responseJSON.errorOld);
                        // $("#change_passwordErrorHandler").html(responseJSON.errorNew);
                        // $("#confirm_passwordErrorHandler").html(responseJSON.errConfirm);

                        // if(responseJSON.message == "Password successfully changed!"){
                        //     var alert = "success";
                        // }else{
                        //     var alert = "danger";
                        // }

                        // var alert = "<div class='alert alert-" + alert + " alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>" + responseJSON.message + "</strong></div>";
                        // $("#alert").html(alert);

                        window.location.href="../php/AddGudang.php";
                    }
			    });
            });

        });
    </script>
    </body>
</html>