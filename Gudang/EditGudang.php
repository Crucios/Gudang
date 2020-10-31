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
    <table class="col-sm-8 offset-2" style="">

    <div class="container">        
        <button class="btn btn-info col-sm-8 offset-2"  id="btn_pilihpintu">1. Pilih Pintu Masuk</button><br><br>
        <table class="col-sm-8 offset-2" style="">

            <tr>
                <td>Nama Grup:</td>
                <td><input type="text" name="grup_rak" id="nama_grup" placeholder="Grup Rak" class="form-control"></td>                        
            </tr>                    
            <tr>
                <td>Warna: </td>
                <td><input type="color" id="color" value="#edc4b3" list="color_list"></td>
            </tr>            
        </table>
        <br>
        
        <button class="btn btn-info col-sm-8 offset-2"  id="btn_pilihrak">2. Pilih Rak</button><br><br>
        <button class="btn btn-info col-sm-8 offset-2" id="btn_tambahrak" style="display:none;">Simpan</button>
    </div>
    <datalist id="color_list">
        <option>#cb997e</option>
        <option>#eddcd2</option>
        <option>#fff1e6</option>
        <option>#f0efeb</option>
        <option>#ddbea9</option>
        <option>#a5a58d</option>
        <option>#b7b7a4</option>
    </datalist>
    <!-- tabel list gudang-->
    <div id="box">
        <div id="grid"></div>
    </div><br><br>
    <div class="container" id="listGrupRak">
    
    </div>

    <button class="btn btn-info col-sm-8 offset-2" id="btn_pilihlintasan">3. Pilih Lintasan</button><br><br>
    <button class="btn btn-primary col-sm-8 offset-2" id="btn_save">Simpan ke Database</button><br><br>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" href="js/EditGudang.js">
        var temp_data_grup_rak=[];
        var data_grup_rak=[];
        var list_rak=[];
        var pilih_rak=false;
        var temprak=[];
        var ukuran_x;
        var ukuran_y;
        var cek_tambahpintu=false;
        var cek_tambahlintassan=false;
        var btn_lintasan_clicked=false;
        
        // for select in table
        var temp_select = false;
        var name_selected = "";
        var temp_data_to_query = [];
        var first_grid_width = 0;

        $(document).ready(function(){
            refreshGrid();
            getListGrupRak();

            $("#addPage").click(function(){
                window.location.href="../php/AddGudang.php";
            });
            //save

            $("#btn_save").click(function(){
                var idgudang = <?php echo $_GET['id']; ?>;
                if(data_grup_rak.length==0){
                    alert("Rak Belum Dipilih");
                // }else if(!cek_tambahlintassan){
                //     alert("Lintasan belum di pilih")
                // }else if(!cek_tambahpintu){
                //     alert("Pintu belum di pilih")
                }else if(temprak.length>0){
                    alert("Rak yang dipilih belum tersimpan")
                }else{
                    //var idgudang = <?php echo $_GET['id']; ?>;
                    console.log(JSON.stringify(data_grup_rak));
                    $.ajax({
                        url: 'sql/AddRak_db.php',
                        type: 'POST',
                        datatype: 'json',
                        data: {
                            id_gudang:idgudang,
                            data_rak:JSON.stringify(data_grup_rak),
                            temp_data:JSON.stringify(temp_data_to_query)
                        },success:function(response){
                            alert(response);
                            var responseJSON = $.parseJSON(response);
                            alert(responseJSON.message);
                            window.location.href="AddBarang.php?id=" + idgudang;
                        },
                        error: function (jqXHR, exception) {
                            var msg = '';
                            if (jqXHR.status === 0) {
                                msg = 'Not connect.\n Verify Network.';
                            } else if (jqXHR.status == 404) {
                                msg = 'Requested page not found. [404]';
                            } else if (jqXHR.status == 500) {
                                msg = 'Internal Server Error [500].';
                            } else if (exception === 'parsererror') {
                                msg = 'Requested JSON parse failed.';
                            } else if (exception === 'timeout') {
                                msg = 'Time out error.';
                            } else if (exception === 'abort') {
                                msg = 'Ajax request aborted.';
                            } else {
                                msg = 'Uncaught Error.\n' + jqXHR.responseText;
                            }
                            $('#post').html(msg);
                        }
                    });
                }
            })
            $( window ).resize(function() {
                refreshBox();
            });

            $("#btn_pilihrak").click(function(){
                var input_nama_grup=$("#nama_grup").val().toUpperCase()
                var cek_nama=false
                console.log("input_nama_grup: ",input_nama_grup)
                for (var i = 0; i < data_grup_rak.length; i++) {
                    console.log("nama grup: ",data_grup_rak[i].nama_grup)

                    if(data_grup_rak[i].nama_grup == input_nama_grup){
                        cek_nama=true
                        console.log("sama")
                        break
                    }
                }
                if(cek_nama){
                    alert("Nama grup sudah ada")
                }else if(input_nama_grup=="PINTU"){
                    alert("Nama grup tidak bisa pintu")
                }else if(input_nama_grup=="LINTASAN"){
                    alert("Nama grup tidak bisa lintasan")
                }
                else if($("#nama_grup").val()!=""){
                    pilih_rak=true 
                    $("#btn_tambahrak").show();
                    $("#nama_grup").attr("disabled", true);
                    $("#color").attr("disabled", true);
                    $(this).attr("disabled", true); 
                    
                }else{
                    alert("Nama grup rak masih kosong")
                }


            });

            $("#btn_pilihpintu").click(function(){
                pilih_rak=true 
                $("#btn_tambahrak").show();
                $(this).attr("disabled", true);
            });

            $("#btn_pilihlintasan").click(function(){
                pilih_rak=true 
                btn_lintasan_clicked=true
                $("#btn_tambahrak").show();
                $("#btn_pilihrak").attr("disabled",true);
                $(this).attr("disabled", true);
            });

            $("#btn_tambahrak").click(function(){
                if(temprak.length>0){
                    var nama=""
                    var color=""
                    if(cek_tambahpintu){
                        nama="Pintu"
                        cek_tambahpintu=true
                        color="#fcba03"
                    }
                    else{
                        color=document.querySelector('#color').value
                        nama=$("#nama_grup").val();

                        if(btn_lintasan_clicked && !cek_tambahlintassan){
                            cek_tambahlintassan=true;
                            nama="lintasan";
                            color="#c4c7b5";
                        }
                        if(!cek_tambahlintassan){
                            $("#btn_pilihlintasan").attr("disabled",false);
                        }
                    }

                    var b = [];
                    var a = [];
                    if(temp_select){
                        for (var i = 0; i < temprak.length; i++) {
                            number = temprak[i];
                            var x = number%ukuran_x;
                            var y = Math.ceil((number- (number % ukuran_x))/ukuran_x);
                            var koor=[x,y]                    
                            a.push(koor)
                            b.push(number);
                        }

                        // Add koordinat
                        for(var i = 0; i < data_grup_rak.length; i++){
                            loop1:
                            if(data_grup_rak[i].nama_grup == name_selected){
                                var checkVal = true;
                                var name = colorRak = "";
                                loop2:
                                for(var j = 0; j < data_grup_rak[i].koordinat.length; j++){
                                    loop3:
                                    for(var k = 0; k < a.length; k++){
                                        if(data_grup_rak[i].koordinat[j] == a[k] && data_grup_rak[i].value[j] == b[k]){
                                            name = data_grup_rak[i].nama_grup;
                                            colorRak = data_grup_rak[i].color;
                                            checkVal = false;
                                            break loop3;
                                        }
                                    }
                                }
                                if(checkVal){
                                    name = data_grup_rak[i].nama_grup;
                                    colorRak = data_grup_rak[i].color;
                                    for(var k = 0; k < a.length; k++){
                                        data_grup_rak[i].koordinat.push(a[k]);
                                        data_grup_rak[i].value.push(b[k]);
                                    }

                                    temp_data_to_query.push({
                                        nama_grup: name,
                                        koordinat:a,
                                        value:b,
                                        color:colorRak
                                    });
                                }
                                break loop1;
                            }
                        }
                        temp_select = false;
                        $("#nama_grup").attr("disabled", false);
                        $(".select_grup").attr("disabled", false);
                        $(".delete_grup").attr("disabled", false); 
                    }else{
                        for (var i = 0; i < temprak.length; i++) {
                            number=temprak[i];
                            var x = number%ukuran_x;
                            var y = Math.ceil((number- (number % ukuran_x))/ukuran_x);
                            var koor=[x,y]                    
                            a.push(koor)
                            b.push(number);
                        }
                        data_grup_rak.push({
                            nama_grup: nama,
                            koordinat:a,
                            value:b,
                            color:color
                        })
                    }

                    temprak.splice(0)
                    console.log(temp_data_grup_rak);
                    console.log(data_grup_rak);

                    pilih_rak=false
                    $("#color").attr("disabled", false);
                    $("#btn_pilihrak").attr("disabled", false);
                    $("#nama_grup").attr("disabled", false);
                    $("#nama_grup").val("");
                    $(this).hide();    
                }else{
                    alert("Kolom belum dipilih")
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
                                $("#"+posisi_urutan).html(nama_grup);

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
        });
        
    function home(){
        window.location.href = "../Home/homePage.php";
    }


    function numbertoAlpha(num){
        var s = '', t;

        while (num > 0) {
            t = (num - 1) % 26;
            s = String.fromCharCode(65 + t) + s;
            num = (num - t)/26 | 0;
        }
        return s || undefined;
    }

    function btnRak(number){    
        if(pilih_rak){
            // cek sudah terisi atau belum
            var checkSelected=false;
            loop1:
            for (var i = 0; i < data_grup_rak.length; i++) {
                for(var j=0;j<data_grup_rak[i].value.length;j++){
                    if(data_grup_rak[i].value[j]==number){
                        checkSelected=true;
                        break loop1;
                    }
                }
            }  
            if(!checkSelected){
                var warna= getColor(number)
                var id_kolom="#"+number
                $(id_kolom).css({'background-color': warna})        
            }

        }
    }  

    function searchObjectByName(name){
        for(var i = 0; i < data_grup_rak.length; i++){
            if(data_grup_rak[i].nama_grup == name){
                console.log(data_grup_rak[i]);
                console.log(name);
                return data_grup_rak[i];
            }
        }
    }

    function getColor(number){
        var gridcolor=""
        for (var i = 0; i < temprak.length; i++) {
            if(temprak[i]==number){
                gridcolor="#ffffff"
                temprak.splice(i,1);
                $("#"+number).html("");
                return gridcolor;
            }
        }
        temprak.push(number)
        // return warna pintu
        if(cek_tambahpintu){
            $("#"+number).html("Pintu");
            return "#fcba03"
        }
        //return warna lintasan
        if(btn_lintasan_clicked && !cek_tambahlintassan){
            return "#c4c7b5"
        }
        //return warna grup rak yang dipilih
        if(temp_select){
            gridcolor = searchObjectByName(name_selected).color;
            return gridcolor;
        }
        return gridcolor=document.querySelector('#color').value
    }

    function selectGrup(name){
        pilih_rak=true;
        temp_select = true;
        name_selected = name;
        $("#btn_tambahrak").show();
        $("#nama_grup").attr("disabled", true);
        $("#color").attr("disabled", true);
        $("#btn_pilihrak").attr("disabled",true);
        $(".select_grup").attr("disabled", true);
        $(".delete_grup").attr("disabled", true); 
    }

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

    function refreshBox(){
        var window_width = $( window ).width();
        $('#box').css({'width':window_width-100+'px'});
        $('#grid').css({'width':first_grid_width+'px'});

        var rw = $('.rowWidth').outerWidth();
        $('.gridCells').css({'width':50+'px'});
        var cw = $('.gridCells').outerWidth();
        $('.gridCells').css({'height':cw+'px'});
    }

    function refreshListGrupRak(){
        console.log(data_grup_rak);
        var markup = "";
        for (var i = 0; i < temp_data_grup_rak.length; i++) {
            if(temp_data_grup_rak[i].nama_grup.toLowerCase() != "pintu" && temp_data_grup_rak[i].nama_grup.toLowerCase() != "lintasan"){
                var name = temp_data_grup_rak[i].nama_grup;
                markup += '<div class="row">' +
                '<p class="col-sm-4">' + name + '</p>' +
                '<button class="btn btn-info col-sm-2 select_grup" onClick="selectGrup(\'' + name + '\')">Select</button> &nbsp;&nbsp;&nbsp;' +
                '<button class="btn btn-info col-sm-2 delete_grup" onClick="deleteGrup(\'' + name + '\')">Delete</button>' +
                '</div> <br>';
            }
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
                ukuran_x = responseJSON.x
                ukuran_y = responseJSON.y

                var markup = "";
                var count=0
                var markup = "<table>";
                var alpha = 'A';
                for(let i=0;i<ukuran_y;i++){
                    markup += "<tr>";
                    for(let j=0;j<ukuran_x;j++){
                        markup += "<td class='gridCells' id='"+count+"' onclick='btnRak("+count+")'>" + alpha + j + "</td>";
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
    }

    function deleteGrup(name){
        var idgudang = <?php echo $_GET['id']; ?>;
        $.ajax({
            url: 'sql/DeleteRak_db.php',
            type: 'POST',
            datatype: 'json',
            data: {
                id_gudang:idgudang,
                nama_grup:name,
                data_rak:JSON.stringify(data_grup_rak),
            },success:function(response){
                alert(response);
                var responseJSON = $.parseJSON(response);
                alert(responseJSON.message);
                refreshGrid();
                refreshListGrupRak();
            },
            error: function (jqXHR, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                $('#post').html(msg);
            }
        });
    }
</script>
</body>
</html>