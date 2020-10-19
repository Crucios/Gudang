<?php
// session_start();
require_once "../../php/connect.php";
$output = array('success' => false, 'message' => null, 'x' => 0, 'y' => 0);

// $idgudang = $_SESSION['idgudang'];
$idgudang = $_GET["id"];

$query = mysqli_query($con, "SELECT ukuran_x,ukuran_y FROM gudang WHERE id_gudang = $idgudang");
if(!empty($query)){
    while ($row = mysqli_fetch_assoc($query)) {
        $output['x'] = $row['ukuran_x'];
        $output['y'] = $row['ukuran_y'];
    }
}
else{
    // Gudang gagal diambil database
}

echo json_encode($output);
?>