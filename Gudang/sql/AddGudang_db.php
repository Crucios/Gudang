<?php
session_start();
require_once "../../php/connect.php";
$output = array('success' => false, 'message' => null, 'id'=> 0);

if(isset($_POST["ukuran_x"]) && $_POST["ukuran_x"] != "" && isset($_POST["ukuran_y"]) && $_POST["ukuran_y"] != "" && isset($_POST["nama"]) && $_POST["nama"] != "" && isset($_POST["alamat"]) && $_POST["alamat"] != ""){
    $namaGudang = test_input($_POST["nama"]);
    $alamatGudang = test_input($_POST["alamat"]);
    $ukuran_x = test_input($_POST["ukuran_x"]);
    $ukuran_y = test_input($_POST["ukuran_y"]);
    
    $query = mysqli_query($con, "INSERT INTO gudang (id_gudang, nama, alamat, ukuran_x, ukuran_y) VALUES(NULL, '$namaGudang', '$alamatGudang', $ukuran_x, $ukuran_y)");
    $last_id = mysqli_insert_id($con);

    if($query){
        $output['message'] = "Gudang berhasil ditambahkan!";
        $output["success"] = true;
        $output["id"] = $last_id;
    }else{
        $output['message'] = "Gudang gagal ditambahkan!";
        $output["success"] = false;
    }
}
echo json_encode($output);
?>