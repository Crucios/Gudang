<!DOCTYPE html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>

        <!-- jumbotron-->
        <div class="jumbotron jumbotron-fluid" id="jumbotron" style="height: 200px; background-image: background-position: center; background-size: cover;">
        <div class="container">
          <h1 class="text1" style="text-align: center; font-family: NunitoBold;">Storage Management</h1>
          <p class="text2" style="text-align: center; font-family: fontCode;">Manage your storage, manage your world</p>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-9">
            <h1 style="margin-left:10%;">List Gudang</h1>
        </div>
        <div class="col-sm-3">
            <!-- search bar-->
            <div class="form-group" style="width : 40%;">
                <input type="text" class="form-control" id="search" placeholder="search . . .">
            </div>
            <!--button-->
            <div>
                <button type="button" id="addPage">Add Gudang</button>
            </div>
        </div>
      </div>
      
      <!-- tabel list gudang-->
      <div id="listGudang" style="margin-top:30px;"></div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            refreshhome();
            function refreshhome(search_val){
                $.ajax({
                    url: 'sql/search_db.php',
                    type: 'POST',
                    data: {
                        search:search_val
                    },
                    success: function(response){
                        $("#listGudang").html(response);
                    }
                });
            }

            $("#search").on("input", function(){
                var search_val = $(this).val();
                refreshhome(search_val);
            });

            $("#addPage").click(function(){
                window.location.href="../Gudang/AddGudang.php";
            });

        });

        function editGudang(id){
            var thisID = id;
            window.location.href = "../Gudang/EditGudang.php?id=" + thisID;
        }

        function viewGudang(id){
            var thisID = id;
            window.location.href = "../Gudang/ViewGudang.php?id=" + thisID;
        }

        function deleteGudang(id){
            var thisID = id;
            $.ajax({
                url: '../Gudang/sql/DeleteGudang_db.php',
                type: 'POST',
                datatype: 'json',
                data: {
                    id:thisID
                },
                success: function(response){
                    var responseJSON = $.parseJSON(response);
                    alert(responseJSON.message);
                    
                    //refresh home
                    $.ajax({
                        url: 'sql/search_db.php',
                        type: 'POST',
                        success: function(response){
                            $("#listGudang").html(response);
                        }
                    });
                }
            });
        }
    </script>
    </body>
</html>