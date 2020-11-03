<?php
session_start();
require_once "../../php/connect.php";
$output = array('success' => false, 'message' => null);

if(isset($_POST["id_rak"]) && $_POST["id_rak"] != "" && isset($_POST["jumlah"]) && $_POST["jumlah"] != "" && isset($_POST["level"]) && $_POST["level"] != ""){
    $id_rak = $_POST["id_rak"];
    $jumlah = $_POST["jumlah"];
    $level = $_POST["level"];
    
    $get_current = mysqli_query($con, "SELECT kuantitas FROM barang WHERE id_rak = $id_rak AND level = $level");
    if(!empty($get_current)){
        while($row1 = mysqli_fetch_assoc($get_current)){
            $current_qtt = $row1["kuantitas"];
            $final_qtt = $current_qtt + $jumlah;

            $update_qtt = mysqli_query($con, "UPDATE barang SET kuantitas = $final_qtt WHERE id_rak = $id_rak AND level = $level");
            if(!empty($update_qtt)){
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
        $output['message'] = "Barang tidak ditemukan";
        $output["success"] = false;
    }
}
else {
    $output['message'] = "Data tidak masuk";
    $output["success"] = false;
}
echo json_encode($output);
?>