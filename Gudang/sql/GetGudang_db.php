<?php
// session_start();
require_once "../../php/connect.php";
$output = array('success' => false, 'message' => null, 'output' => "", 'nama'=> "");

// $idgudang = $_SESSION['idgudang'];
$idgudang = $_GET["id"];

$query = mysqli_query($con, "SELECT nama,ukuran_x,ukuran_y FROM gudang WHERE id_gudang = $idgudang");
if(!empty($query)){
    while ($row = mysqli_fetch_assoc($query)) {
        $output['nama'] = $row['nama'];
        $count = 0;
        $markup = "<table>";
        $cell_query = mysqli_query($con, 
            "SELECT gr.nama_grup AS nama_grup_rak, gr.color AS color, r.koordinat_x AS koordinat_x, r.koordinat_y AS koordinat_y, r.posisi_urutan AS posisi_urutan
            FROM grup_rak AS gr
            LEFT JOIN
            rak AS r ON gr.id_gruprak = r.id_gruprak
            WHERE gr.id_gudang = $idgudang");
        
        $cells = array();
        if(!empty($cell_query)){
            while($row_cell = mysqli_fetch_assoc($cell_query)){
                $index = strval($row_cell['posisi_urutan']);
                $cells[$index] = $row_cell['color'];
            }
        }
        
        $alpha = 'A';
        for($i=0;$i<$row['ukuran_y'];$i++){
            $markup .= "<tr>";
            for($j=0;$j<$row['ukuran_x'];$j++){
                $shelf_num = $alpha . $j;

                if(isset($cells[strval($count)]) && $cells[strval($count) != '']){
                    $markup .= "<td class='gridCells' id='".$count."' onclick='btnRak(".$count.")' style='background-color: " . $cells[strval($count)] . "'>" . $shelf_num . "</td>";
                }
                else{
                    $markup .= "<td class='gridCells' id='".$count."' onclick='btnRak(".$count.")'></td>";
                }         
                $count++;
            }
            $markup .= "</tr>";
            $alpha++;
        }
        $markup .= "</table>";

        $output['output'] = $markup;
    }
}
else{
    // Gudang gagal diambil database
}

echo json_encode($output);
?>