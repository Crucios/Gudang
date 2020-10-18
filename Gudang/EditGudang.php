<!DOCTYPE html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
        <link rel="stylesheet" href="css/EditGudang.css">
    <body>
        <!-- tabel list gudang-->
        <div class="container" id="grid">
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
                $.ajax({
                    url: 'sql/GetGudang_db.php',
                    type: 'POST',
                    datatype: 'json',
                    success: function(response){
                        var responseJSON = $.parseJSON(response);
                        var ukuran_x = responseJSON.x
                        var ukuran_y = responseJSON.y
                        var window_width = $( window ).width();
                        var grid_width = ukuran_x * 100;

                        if(grid_width > window_width - 100){
                            grid_width = window_width - 100;
                        }
                        $('#grid').css({'width':grid_width+'px'});
                        
                        var markup = "";
                        for(let i=0;i<ukuran_y;i++){
                            markup += "<div class='row section-box'>";
                            for(let j=0;j<ukuran_x;j++){
                                markup += "<div class='col gridCells'>" + j + "</div>";
                            }
                            markup += "</div>";
                        }

                        $("#grid").html(markup);

                        var cw = $('.gridCells').outerWidth();
                        console.log(cw);
                        $('.gridCells').css({'height':cw+'px'});
                    }
			    });
            }

        });
    </script>
    </body>
</html>