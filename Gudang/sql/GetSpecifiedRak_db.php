<?php 
    require_once "../../php/connect.php";
    $data_rak=array('success' => false, 'message' => null, 'idRak' => 0);
    if(isset($_GET['posisi']) && isset($_GET['posisi']) != "" && isset($_GET['id_gudang']) && isset($_GET['id_gudang']) != ""){
        $posisi = $_GET["posisi"];
        $idGudang = $_GET["id_gudang"];

        $get_gruprak = mysqli_query($con,"SELECT id_gruprak FROM grup_rak WHERE id_gudang = $idGudang");
        if(!empty($get_gruprak)){
			while ($row = mysqli_fetch_assoc($get_gruprak)) {
                $id_gruprak = $row["id_gruprak"];
                $get_rak = mysqli_query($con, "SELECT id_rak FROM rak WHERE posisi_urutan = $posisi AND id_gruprak = $id_gruprak");
                if(!empty($get_rak)){
                    while ($id = mysqli_fetch_assoc($get_rak)) {
                        $data_rak['idRak'] = $id['id_rak'];
                        $data_rak['success'] = true;
                        $data_rak['message'] = "rak ketemu";
                    }
                }
                else {
                    $data_rak['message'] = "rak gaada";
                }
            }
        }
        else {
            $data_rak['message'] = "grup rak gaada";
        }
        
    }
    else {
        $data_rak['message'] = "data kosong";
    }
    echo json_encode($data_rak);
?>
