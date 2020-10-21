<?php
    require_once "../../php/connect.php";
    $output = array('success' => false, 'message' => null, 'id'=> 0);

    if(isset($_POST["id"]) && $_POST["id"] != ""){
        $id = test_input($_POST["id"]);
        
        $sql = "DELETE gudang,grup_rak,rak 
        FROM gudang
        LEFT JOIN grup_rak ON gudang.id_gudang = grup_rak.id_gudang
        LEFT JOIN rak ON grup_rak.id_gruprak = rak.id_gruprak
        WHERE gudang.id_gudang = $id";

        $query = mysqli_query($con, $sql);

        if($query){
            $output['message'] = "Gudang berhasil dihapus!";
            $output["success"] = true;
        }else{
            $output['message'] = "Gudang gagal dihapus!";
            $output["success"] = false;
        }
    }
    echo json_encode($output);
?>