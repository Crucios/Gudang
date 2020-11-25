<?php
    session_start();
    if (($_SESSION["login"]) == false) {
    header("Location: ../landingPage.php");
    }
?>
<!DOCTYPE html>
    <head>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="css/addBarang.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </head>
           
    <body>
        <!-- jumbotron-->
        <div class="jumbotron jumbotron-fluid" id="jumbotron" style="padding:0;height: 200px; background: linear-gradient(0deg, rgba(216,207,181,1) 0%, rgba(184,157,100,1) 100%);">
        <a class="btn" id="back" style="margin:2% 0 0 5%;"><i class='fas fa-arrow-left' style='font-size:24px; '></i><b style="font-size:24px"> &nbsp;Back</b></a>
            <div class="container">
                <h1 class="text1" style="text-align: center;">Manajemen Barang</h1>
                <div id="name"></div>
            </div>
        </div>

        <div class = "footer" align = "center">
        <button type="button" class="btn" onclick= "home()" style='color:  #513826; background-color: #b89d64; margin-bottom : 10px;' ><b>Home</b></button>
        </div>
        
            <!-- tabel list gudang-->
        <div>
            <p style="text-align : center;margin : 0">*Klik grid yang mau tambahi barang</p>
            <div class="col-sm-2"></div>
            <div id="box" class="col-lg-8" style="border: 3px solid black;">
                <div id="grid"></div>
            </div>
            <div class="col-sm-2"></div>
        </div>
        <div class="container" id="listGrupRak">
    
        </div>

        

        <div class="modal fade" id="addBarangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="labelModal"></h3>
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
            refreshBox();
            getListGrupRak();
            $("#back").click(function(){
                var idgud = <?php echo $_GET['id']; ?>;
                window.location.href="EditGudang.php?id="+idgud;
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

            function getListGrupRak(){
                var idgudang = <?php echo $_GET['id']; ?>;
                
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
                            var colorRak=grup_rak.color;

                            var rak=response.rak[i];

                            //tiap kolom grup_rak
                            var b = [];
                            var a = [];
                            for(var j=0;j<rak.length;j++){
                                var posisi_urutan = rak[j].posisi_urutan;
                                $("#"+posisi_urutan).css({'background-color':colorRak});
                                // $("#"+posisi_urutan).html(nama_grup);

                                var koor=[rak[j].koordinat_x, rak[j].koordinat_y];                    
                                a.push(koor);
                                b.push(posisi_urutan);
                            }
                            
                            temp_data_grup_rak.push({
                                nama_grup: nama_grup,
                                koordinat:a,
                                value:b,
                                color:colorRak
                            });

                            data_grup_rak.push({
                                nama_grup: nama_grup,
                                koordinat:a,
                                value:b,
                                color:colorRak
                            });
                        }
                        refreshListGrupRak();
                    }
                })
            }

            function refreshListGrupRak(){
                console.log(data_grup_rak);
                var length = temp_data_grup_rak.length;
                var markup = "";
                for (var i = 0; i < length; i++) {
                    
                        var name = temp_data_grup_rak[i].nama_grup;
                        var color = temp_data_grup_rak[i].color;
                        markup += '<div class="row">' + '<div class="col-sm-2"></div>' +
                        '<p class="col-sm-2">' + name + '</p>' +
                        '<input type="color" value="'+ color +'" list="color_list" disabled> &nbsp;&nbsp;';

                        if(temp_data_grup_rak[i].nama_grup.toLowerCase() != "pintu" && temp_data_grup_rak[i].nama_grup.toLowerCase() != "lintasan"){
                            markup += '<button class="btn btn-info col-sm-2 select_grup" onClick="selectGrup(\'' + name + '\')">Select</button> &nbsp;&nbsp;&nbsp;' +
                        '<button class="btn btn-info col-sm-2 delete_grup" onClick="deleteGrup(\'' + name + '\')">Delete</button>';
                        }
                        markup += '</div><br>';
                        
                }  
                $("#listGrupRak").html(markup);
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
            console.log(number);
            console.log(id_gudang);
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
                        if(response.nama_grup != "Pintu" && response.nama_grup != "lintasan" && response.nama_grup != null){
                            showModal(response.idRak);
                        }
                    }
                });
        }

        function showModal(id_rak){
            console.log(id_rak);
            $.ajax({
                    url:'sql/GetBarang_db.php',
                    type:'GET',
                    datatype:'json',
                    data:{
                        id_rak:id_rak
                    },
                    success:function(response){
                        console.log(response);
                        response = $.parseJSON(response);
                        console.log(response.jumlah_level);
                        if(response.message == "Gagal"){
                            var markup = "<div><label>Rak masih kosong! Silahkan masukkan barang</label></div>";
                            markup += "<div><label>Nama barang yang ingin ditambahkan</label></div>";
                            markup += "<div><input type='text' id='nama_barang' placeholder='Nama Barang' style='width: 100%; padding: 10px;'></div>";
                            markup += "<div><label>Jumlah barang yang ingin ditambahkan</label></div>";
                            markup += "<div><input type='text' id='jumlah_barang' value=0 style='width: 100%; padding: 10px;'></div>";
                            markup += "<div><label>Berat satuan (Kg)</label></div>";
                            markup += "<div><input type='text' id='berat_barang' value=0 style='width: 100%; padding: 10px;'></div>";
                            markup += "<div class='dropdown' style='margin-top:20px;'><button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown' style='background-color: #513826;color: #b89d64;'><b>Select Level</b></button>";
                            markup += "<div class='dropdown-menu' id='levelRak'>";
                            for(var i=0; i<response.jumlah_level;i++){
                                markup += "<a class='dropdown-item' href='#' value = "+(i+1)+" >" +(i+1)+"</a>";
                            }
                            markup += "</div></div>";
                            
                            var markup2 = "<button type='button' class='btn' onclick = 'confirmButton("+id_rak+")' style='color:  #513826; background-color: #b89d64;'><b>Confirm</b></button>";
                            $("#labelModal").html("Detail Rak " + response.nama_grup);
                            $("#addBarang").html(markup);
                            $("#footer_add").html(markup2);
                            $(".dropdown-item").click(function(){
                                selectedLevel = $(this).text();
                                $(".dropdown-toggle").html("Level " + selectedLevel);
                            })
                            $('#addBarangModal').modal('show');
                        }
                        else if(response.message == "Berhasil") {
                            console.log(response.rak);
                            idRak = response.rak[0].id_rak;
                            var markup = "<div id=\"modalOverflow\" style='border: 1px solid black;margin-top:0px'>";
                            for(var i=0; i<response.rak.length;i++){
                                markup += "<div><label>" + (i+1) + "</label>"
                                markup += "<label style='margin-left:10px;'>Nama Barang : " +response.rak[i].nama_barang+ "</label></div>";
                                markup += "<div><label style='margin-left:30px;'>Level " +response.rak[i].level+ "</label></div>";
                                markup += "<div><label style='margin-left:30px;'>Jumlah Sekarang : " +response.rak[i].kuantitas+ "</label></div>";
                                markup += "<div><label style='margin-left:30px;'>Berat Satuan (Kg) : " +response.rak[i].berat+ "</label></div>";
                            }
                            markup += "</div>";
                            markup += "<div><label>Nama barang yang ingin ditambahkan</label></div>";
                            markup += "<div><input type='text' id='nama_barang' placeholder='Nama Barang' style='width: 100%; padding: 10px;'></div>";
                            markup += "<div><label>Jumlah barang yang ingin ditambahkan</label></div>";
                            markup += "<div><input type='text' id='jumlah_barang' value=0 style='width: 100%; padding: 10px;'></div>";
                            markup += "<div><label>Berat satuan (Kg)</label></div>";
                            markup += "<div><input type='text' id='berat_barang' value=0 style='width: 100%; padding: 10px;'></div>";
                            markup += "<div class='dropdown' style='margin-top:20px;'><button type='button' class='btn dropdown-toggle bruh' data-toggle='dropdown' style='background-color: #513826;color: #b89d64;'><b>Select Level</b></button>";
                            markup += "<div class='dropdown-menu' id='levelRak'>";
                            for(var i=0; i<response.jumlah_level;i++){
                                markup += "<a class='dropdown-item' href='#' value = "+(i+1)+" >" +(i+1)+"</a>";
                            }
                            markup += "</div></div>";
                            
                            var markup2 = "<button type='button' class='btn' onclick = 'confirmButton("+response.rak[0].id_rak+")' style='color:  #513826; background-color: #b89d64;'><b>Confirm</b></button>";
                            $("#labelModal").html("Detail Rak " + response.nama_grup);
                            $("#addBarang").html(markup);
                            $("#footer_add").html(markup2);
                            $(".dropdown-item").click(function(){
                                selectedLevel = $(this).text();
                                $(".dropdown-toggle").html("Level " + selectedLevel);
                            })
                            $('#addBarangModal').modal('show');
                        }
                        
                    }
                });
        }

        function confirmButton(id_rak){
            var nama_barang = $("#nama_barang").val();
            var jumlah = $("#jumlah_barang").val();
            var berat = $("#berat_barang").val();
            selectedLevel = parseInt(selectedLevel);
            console.log(nama_barang);
            console.log(selectedLevel);
            alert(jumlah)
            $.ajax({
                    url:'sql/AddBarang_db.php',
                    type:'POST',
                    datatype:'json',
                    data:{
                        id_rak:id_rak,
                        nama:nama_barang,
                        jumlah:jumlah,
                        berat:berat,
                        level:selectedLevel
                    },
                    success:function(response){
                        console.log(response);
                        response = $.parseJSON(response);
                        console.log(response.message);
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