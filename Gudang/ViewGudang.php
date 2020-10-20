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
        <!-- tabel list gudang-->
        <div class="container" id="grid">
        </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            refreshGrid();
            $("#addPage").click(function(){
                window.location.href="../php/AddGudang.php";
            });

            $( window ).resize(function() {
                refreshGrid();
            });

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
                        markup += "<div class='title'><h2 style='text-align:center; margin-bottom:50px;'>" + nama + "</h2></div>";
                        for(let i=0;i<ukuran_y;i++){
                            markup += "<div class='row rowWidth'>";
                            for(let j=0;j<ukuran_x;j++){
                                markup += "<div class='gridCells'>" + j + "</div>";
                            }
                            markup += "</div>";
                        }

                        $("#grid").html(markup);

                        var rw = $('.rowWidth').outerWidth();
                        $('.gridCells').css({'width':rw/ukuran_x+'px'});
                        var cw = $('.gridCells').outerWidth();
                        $('.gridCells').css({'height':cw+'px'});
                    }
			    });
            }

        });
        function home(){
            window.location.href = "../Home/homePage.php";
        }
    </script>
    </body>
</html>