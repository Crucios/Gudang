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
            <div class="container" id="listGrupRak">
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
        var temp_data_grup_rak = []
        var data_grup_rak = []
        $(document).ready(function(){
            $("#back").click(function(){
                window.location.href="../home/homePage.php";
            });
            var first_grid_width = 0;
            refreshGrid();
            getListGrupRak();
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
                        var count=0
                        var alpha = 'A';
                        $("#name").html("<div class='title'><h1 style='text-align:center; margin-bottom:50px;'>View " + nama + "</h1></div>");
                        markup += "<table>";
                        var count = 0;
                        for(let i=0;i<ukuran_y;i++){
                            markup += "<tr>";
                            for(let j=0;j<ukuran_x;j++){
                                markup += "<td class='gridCells' id='"+count+"'>"+ alpha + j +"</td>";
                                count++;
                            }
                            markup += "</tr>";
                            alpha = letters.increment(alpha);
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

                            var id_grup = grup_rak.id_gruprak;
                            var nama_grup=grup_rak.nama_grup;
                            var color=grup_rak.color;

                            var rak=response.rak[i];
                            //tiap kolom grup_rak
                            for(var j=0;j<rak.length;j++){
                                var posisi_urutan = rak[j].posisi_urutan;
                                $("#"+posisi_urutan).css({'background-color':color});

                                if(nama_grup != "Pintu" && nama_grup != "lintasan"){
                                    $("#"+posisi_urutan).html(id_grup);
                                }
                                
                                // $("#"+posisi_urutan).html(nama_grup);
                            }
                            
                            
                        }
                    }
                });
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

                            var id_grup = grup_rak.id_gruprak;
                            var nama_grup=grup_rak.nama_grup;
                            var colorRak=grup_rak.color;

                            var rak=response.rak[i];

                            //tiap kolom grup_rak
                            var b = [];
                            var a = [];
                            for(var j=0;j<rak.length;j++){
                                var posisi_urutan = rak[j].posisi_urutan;
                                $("#"+posisi_urutan).css({'background-color':colorRak});

                                if(nama_grup != "Pintu" && nama_grup != "lintasan"){
                                    $("#"+posisi_urutan).html(id_grup);
                                }

                                var koor=[rak[j].koordinat_x, rak[j].koordinat_y];                    
                                a.push(koor);
                                b.push(posisi_urutan);
                            }
                            
                            temp_data_grup_rak.push({
                                id_grup: id_grup,
                                nama_grup: nama_grup,
                                koordinat:a,
                                value:b,
                                color:colorRak
                            });

                            data_grup_rak.push({
                                id_grup: id_grup,
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
                console.log(temp_data_grup_rak);
                var length = temp_data_grup_rak.length;
                var markup = "";
                for (var i = 0; i < length; i++) {
                        var id = temp_data_grup_rak[i].id_grup;
                        var name = temp_data_grup_rak[i].nama_grup;
                        var color = temp_data_grup_rak[i].color;

                        if(name != "Pintu" && name != "lintasan"){
                            markup += '<div class="row">' + '<div class="col-sm-2"></div>' +
                            '<p class="col-sm-2">' + name + '&nbsp (' + id + ') </p>';
                        }
                        else{
                            markup += '<div class="row">' + '<div class="col-sm-2"></div>' +
                            '<p class="col-sm-2">' + name + '</p>';
                        }
                        
                        markup += '<input type="color" value="'+ color +'" list="color_list" disabled> &nbsp;&nbsp;';
                        markup += '</div><br>';
                        
                }  
                $("#listGrupRak").html(markup);
            }

        });
        var letters = (function() {
            var pub = {};
            var letterArray = [];

            pub.increment = function (c) {
                letterArray = c.split("");

                if(isLetters(letterArray)){
                    return(next(c));
                } else {
                    throw new Error('Letters Only');
                }                
            };

            function isLetters(arr) {
                for (var i = 0; i < arr.length; i++) {
                    if(arr[i].toLowerCase() != arr[i].toUpperCase()){
                    } else {
                        return false;
                    }
                }
                return true;
            }            

            function next(c) {
                var u = c.toUpperCase();
                if (same(u,'Z')){
                    var txt = '';
                    var i = u.length;
                    while (i--) {
                        txt += 'A';
                    }
                    return (txt+'A');
                } else {
                    var p = "";
                    var q = "";
                    if(u.length > 1){
                        p = u.substring(0, u.length - 1);
                        q = String.fromCharCode(p.slice(-1).charCodeAt(0));
                    }
                    var l = u.slice(-1).charCodeAt(0);
                    var z = nextLetter(l);
                    if(z==='A'){
                        return p.slice(0,-1) + nextLetter(q.slice(-1).charCodeAt(0)) + z;
                    } else {
                        return p + z;
                    }
                }
            }
            
            function nextLetter(l){
                if(l<90){
                    return String.fromCharCode(l + 1);
                }
                else{
                    return 'A';
                }
            }

            function same(str,char){
                var i = str.length;
                while (i--) {
                    if (str[i]!==char){
                        return false;
                    }
                }
                return true;
            }

                //API
                return pub;
        }());        
        
        function home(){
            window.location.href = "../Home/homePage.php";
        }
        setTimeout(() => {
            
        }, timeout);
    </script>
    </body>
</html>