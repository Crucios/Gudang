<?php
    session_start();
    if (($_SESSION["login"]) == false) {
    header("Location: ../landingPage.php");
    }
?>
<!DOCTYPE html>
    <head>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
        <link rel="stylesheet" href="css/viewGudang.css">
    <body>
        <!-- jumbotron-->
        <div class="jumbotron jumbotron-fluid" id="jumbotron" style="padding:0;height: 200px; background: linear-gradient(0deg, rgba(216,207,181,1) 0%, rgba(184,157,100,1) 100%);">
        <a class="btn" id="back" style="margin:2% 0 0 5%;"><i class='fas fa-arrow-left' style='font-size:24px; '></i><b style="font-size:24px"> &nbsp;Back</b></a>
            <div class="container" id='name'>
                <!-- <h1 id="name" class="text1" style="text-align: center;" >View</h1> -->
            </div>
        </div>
            <!-- tabel list gudang-->
            <!-- <div id="name"></div> -->
            <!-- <p style="text-align : center;margin : 0">*Klik grid yang mau dilihat</p> -->
            <div class="col-sm-2"></div>
            <div id="box" class="col-lg-8" style="border: 3px solid black;">
                <div id="grid"></div>
            </div>
            <div class="col-sm-2"></div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $("#back").click(function(){
                window.location.href="../home/homePage.php";
            });
            var first_grid_width = 0;
            refreshGrid();
            $("#addPage").click(function(){
                window.location.href="../php/AddGudang.php";
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
                        var ukuran_x = responseJSON.x;
                        var ukuran_y = responseJSON.y;
                        var nama = responseJSON.nama;
                        
                        var markup = "";
                        $("#name").html("<div class='title'><h1 style='text-align:center; margin-bottom:50px;'>View " + nama + "</h1></div>");
                        markup += "<table>";
                        var count = 0;
                        for(let i=0;i<ukuran_y;i++){
                            markup += "<tr>";
                            for(let j=0;j<ukuran_x;j++){
                                markup += "<td class='gridCells' id='"+count+"'></td>";
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
        function home(){
            window.location.href = "../Home/homePage.php";
        }
        setTimeout(() => {
            
        }, timeout);
    </script>
    </body>
</html>