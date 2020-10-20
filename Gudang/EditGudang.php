<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<link rel="stylesheet" href="css/EditGudang.css">
<body>
    <!-- jumbotron-->
    <div class="jumbotron jumbotron-fluid" id="jumbotron" style="height: 300px; background-image: background-position: center; background-size: cover;">
        <div class="container">
            <h1 class="text1" style="text-align: center; font-family: NunitoBold;" onclick="home()">Storage Management</h1>
            <p class="text2" style="text-align: center; font-family: fontCode;">Manage your storage, manage your world</p>
        </div>
    </div>

    <!-- isi data rak -->

    <div class="container">        
        <table class="col-sm-8 offset-2" style="">
            <tr>
                <td>Nama Grup:</td>
                <td><input type="text" name="grup_rak" id="nama_grup" placeholder="Grup Rak" class="form-control"></td>                        
            </tr>                    
            <tr>
                <td>Warna: </td>
                <td><input type="color" id="color"></td>
            </tr>            
        </table>
        <br>
        <button class="btn btn-primary col-sm-8 offset-2"  id="btn_pilihrak">Pilih Rak</button><br><br>
        <div id="div_selesai"></div>
    </div>
    <!-- tabel list gudang-->
    <div id="box">
        <div id="grid"></div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        var data_grup_rak=[]
        var list_rak=[]
        $(document).ready(function(){
            var first_grid_width = 0;
            refreshGrid();
            $("#addPage").click(function(){
                window.location.href="../php/AddGudang.php";
            });

            $("#btn_pilihrak").click(function(){
                
                if($("#nama_grup").val()!=""){
                    var btn_tambahrak="<button class=\"btn btn-success col-sm-8 offset-2\" id=\"btn_tambahrak\">Tambah Rak</button>";
                    $("#div_selesai").append(btn_tambahrak);
                    $("#nama_grup").attr("disabled", true);
                    $("#color").attr("disabled", true);
                    $(this).attr("disabled", true);                    
                }else{
                    alert("Nama grup rak masih kosong")
                }


            });
            $( window ).resize(function() {
                refreshBox();
            });

            function refreshBox(){
                var window_width = $( window ).width();
                $('#box').css({'width':window_width-100+'px'});
                $('#grid').css({'width':first_grid_width+'px'});

                var rw = $('.rowWidth').outerWidth();
                $('.gridCells').css({'width':50+'px'});
                var cw = $('.gridCells').outerWidth();
                $('.gridCells').css({'height':cw+'px'});
            }

            function refreshGrid(){
                var idgudang = <?php echo $_GET['id']; ?>;
                $.ajax({
                    url: 'sql/GetGudang_db.php',
                    type: 'GET',
                    datatype: 'json',
                    data: {
                        id:idgudang
                    },
                    success: function(response){
                        var responseJSON = $.parseJSON(response);
                        var ukuran_x = responseJSON.x
                        var ukuran_y = responseJSON.y

                        
                        var markup = "";
                        var count=0
                        var markup = "<table>";
                        for(let i=0;i<ukuran_y;i++){
                            markup += "<tr>";
                            for(let j=0;j<ukuran_x;j++){
                                markup += "<td class='gridCells gridkosong' id='"+count+"' onclick='btnRak("+count+")'>" + count + "</td>";
                                count++;
                            }
                            markup += "</tr>";
                        }
                        markup += "</table>";
                        $("#grid").html(markup);

                        if(first_grid_width == 0){
                            first_grid_width = 50*ukuran_x;
                        }

                        refreshBox();
                    }
                });
            }

        });
        function home(){
            window.location.href = "../Home/homePage.php";
        }
        function btnRak(number){
            console.log(number)
            var warna= document.querySelector('#color').value
            var id_kolom="#"+number
            $(id_kolom).css({'background-color': warna})    
        }
    </script>
</body>
</html>