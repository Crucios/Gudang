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
                        <h6 class="card-subtitle mb-2 text-muted">Isi setiap kolom dengan lengkap dan benar</h6>

                        <!-- Input Nama Gudang -->
                        <div class="input-group mb-3" style="margin-bottom:20px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Nama Gudang</span>
                            </div>
                            <input type="text" id="nama" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                        </div>

                        <!-- Input Alamat Gudang -->
                        <div class="input-group mb-3" style="margin-bottom:20px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Alamat Gudang</span>
                            </div>
                            <input type="text" id="alamat" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                        </div>

                        <!-- Input Panjang -->
                        <div class="input-group mb-3" style="margin-bottom:20px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Panjang</span>
                            </div>
                            <input type="number" id="ukuran_x_input" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                        </div>

                        <!-- Input Lebar -->
                        <div class="input-group mb-3" style="margin-bottom:20px;">
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
                var nama_gudang = $("#nama").val();
                var alamat = $("#alamat").val();

                var ukuran_x = $("#ukuran_x_input").val();
                var ukuran_y = $("#ukuran_y_input").val();
                $.ajax({
                    url: 'sql/AddGudang_db.php',
                    type: 'POST',
                    datatype: 'json',
                    data: {
                        nama:nama_gudang,
                        alamat:alamat,
                        ukuran_x:ukuran_x,
                        ukuran_y:ukuran_y
                    },
                    success: function(response){
                        var responseJSON = $.parseJSON(response);
                        alert(responseJSON.message);
                        window.location.href="EditGudang.php?id=" + responseJSON.id;
                    }
			    });
            });

        });
    </script>
    </body>
</html>