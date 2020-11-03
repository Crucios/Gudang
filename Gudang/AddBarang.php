<?php
    session_start();
    if (($_SESSION["login"]) == false) {
    header("Location: ../landingPage.php");
    }
?>
<!DOCTYPE html>
    <head>
    <link rel="stylesheet" href="css/EditGudang.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </head>
           
    <body>
        <!-- jumbotron-->
        <div class="jumbotron jumbotron-fluid" id="jumbotron" style="height: 300px; background-image: background-position: center; background-size: cover;">
            <div class="container">
                <h1 class="text1" style="text-align: center; font-family: NunitoBold;" onclick="home()">Storage Management</h1>
                <p class="text2" style="text-align: center; font-family: fontCode;">Manage your storage, manage your world</p>
            </div>
        </div>
            <!-- tabel list gudang-->
            <div><h1 style="text-align:center;">Add Stocks Page</h1></div>
            <div id="name"></div>
            <div id="box">
                <div id="grid"></div>
            </div>
        </div>

        <div class="modal fade" id="addBarangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" style="font-family: NunitoLight;" id="exampleModalLabel">Detail Rak</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="addBarang">
                        
                    </div>
                    <div class="modal-footer" id="footer_add">
                        
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        var first_grid_width = 0;
        var idRak = 0;
        var selectedLevel = 0;
        $(document).ready(function(){
            
            refreshGrid();
            

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
                        var ukuran_x = responseJSON.x;
                        var ukuran_y = responseJSON.y;
                        var nama = responseJSON.nama;
                        
                        var markup = "";
                        $("#name").html("<div class='title'><h2 style='text-align:center; margin-bottom:50px;'>" + nama + "</h2></div>");
                        markup += "<table>";
                        var count = 0;
                        for(let i=0;i<ukuran_y;i++){
                            markup += "<tr>";
                            for(let j=0;j<ukuran_x;j++){
                                markup += "<td class='gridCells' id='"+count+"' onclick='btnRak("+count+","+idgudang+")'></td>";
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

                $.ajax({
                    url:'sql/GetRak_db.php',
                    type:'GET',
                    datatype:'json',
                    data:{
                        id_gudang:idgudang
                    },
                    success:function(response){
                        response = $.parseJSON(response);
                        console.log(response);
                        for(var i=0;i<response.grup_rak.length;i++){
                            var grup_rak=response.grup_rak[i];

                            var nama_grup=grup_rak.nama_grup;
                            var color=grup_rak.color;

                            var rak=response.rak[i];
                            //tiap kolom grup_rak
                            for(var j=0;j<rak.length;j++){
                                var posisi_urutan = rak[j].posisi_urutan;
                                $("#"+posisi_urutan).css({'background-color':color});
                                $("#"+posisi_urutan).html(nama_grup);
                            }
                            
                            
                        }
                    }
                });
            }
            
        });
        
        function btnRak(number, id_gudang){
                $.ajax({
                    url:'sql/GetSpecifiedRak_db.php',
                    type:'GET',
                    datatype:'json',
                    data:{
                        posisi:number,
                        id_gudang:id_gudang
                    },
                    success:function(response){
                        response = $.parseJSON(response);
                        showModal(response.idRak);
                    }
                });
        }

        function showModal(id_rak){
            $.ajax({
                    url:'sql/GetBarang_db.php',
                    type:'GET',
                    datatype:'json',
                    data:{
                        id_rak:id_rak
                    },
                    success:function(response){
                        response = $.parseJSON(response);
                        idRak = response.rak[0].id_rak;
                        var markup = "<div><label style='font-family: NunitoLight;'>Nama Barang : " +response.rak[0].nama_barang+ "</label></div>";
                        for(var i=0; i<response.rak.length;i++){
                            markup += "<div><label style='font-family: NunitoLight;'>Level " +response.rak[i].level+ "</label>";
                            markup += "<label style='font-family: NunitoLight; margin-left:30px;'>Jumlah Sekarang : " +response.rak[i].kuantitas+ "</label></div>";
                        }
                        markup += "<div><label style='font-family: NunitoLight;'>Jumlah barang yang ingin ditambahkan</label></div>";
                        markup += "<div><input type='text' id='jumlah_barang' value=0 style='width: 100%; padding: 10px;'></div>";
                        markup += "<div class='dropdown'><button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown'>Select Level</button>";
                        markup += "<div class='dropdown-menu' id='levelRak'>";
                        for(var i=0; i<response.rak.length;i++){
                            markup += "<a class='dropdown-item' href='#' value = "+response.rak[i].level+" >" +response.rak[i].level+"</a>";
                        }
                        markup += "</div></div>";
                        
                        var markup2 = "<button type='button' class='btn' onclick = 'confirmButton("+response.rak[0].id_rak+")' style='color: white; background-color: #141f3d;'>Confirm</button>";
                        $("#addBarang").html(markup);
                        $("#footer_add").html(markup2);
                        $(".dropdown-item").click(function(){
                            selectedLevel = $(this).text();
                            $(".dropdown-toggle").html("Level " + selectedLevel);
                        })
                        $('#addBarangModal').modal('show');
                    }
                });
        }

        function confirmButton(id_rak){
            var jumlah = $("#jumlah_barang").val();
            alert(jumlah)
            $.ajax({
                    url:'sql/AddBarang_db.php',
                    type:'POST',
                    datatype:'json',
                    data:{
                        id_rak:id_rak,
                        jumlah:jumlah,
                        level:selectedLevel
                    },
                    success:function(response){
                        response = $.parseJSON(response);
                        console.log(response);
                    }
                });
            $("#addBarangModal").modal('hide');
        }
        function home(){
            window.location.href = "../Home/homePage.php";
        }
    </script>
    </body>
</html>