<?php
session_start();
require_once "../../php/connect.php";
$output = array('success' => false, 'message' => null, 'bug' => null, 'nama' => null, 'level' => null);

if(isset($_POST["id_rak"]) && $_POST["id_rak"] != "" && isset($_POST["jumlah"]) && $_POST["jumlah"] != "" && isset($_POST["nama"]) && $_POST["nama"] != "" && isset($_POST["level"]) && $_POST["level"] != ""){
    $id_rak = $_POST["id_rak"];
    $nama = $_POST["nama"];
    $jumlah = $_POST["jumlah"];
    $level = $_POST["level"];
    $output['nama'] = $nama;
    $output['level'] = $level;
    $cek_barangSama = mysqli_query($con, "SELECT * FROM barang WHERE nama_barang = '$nama' AND `level` = $level");
    $output['bug'] = mysqli_num_rows($cek_barangSama);
    if(mysqli_num_rows($cek_barangSama) > 0){
        while($row1 = mysqli_fetch_assoc($cek_barangSama)){
            $current_qtt = $row1["kuantitas"];
            $final_qtt = $current_qtt + $jumlah;

            $update_qtt = mysqli_query($con, "UPDATE barang SET kuantitas = $final_qtt WHERE id_rak = $id_rak AND `level` = $level AND nama_barang = '$nama'");
            if($update_qtt){
                $output['message'] = $final_qtt;
                $output["success"] = true;
            }
            else{
                $output['message'] = $final_qtt;
                $output["success"] = false;
            }
        }
    }
    else {
        $insert_barang = mysqli_query($con, "INSERT INTO barang(id_barang, nama_barang, kuantitas, id_rak, `level`) VALUES(0, '".$nama."', '".$jumlah."', '".$id_rak."', '".$level."')");
        if($insert_barang){
            $output['message'] = "Berhasil";
            $output["success"] = true;
        }
        else {
            $output['message'] = "Gagal";
            $output["success"] = false;
        }
    }
}
else {
    $output['message'] = "Data tidak masuk";
    $output["success"] = false;
}
echo json_encode($output);
?>