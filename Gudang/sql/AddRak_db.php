<?php 
require_once "../../php/connect.php";
$output = array('success' => false, 'message' => null);
$checkQuery = true;
if($_POST){
	//echo json_encode($_POST['id_gudang']);
	$id_gudang=$_POST['id_gudang'];
	$data_rak=json_decode($_POST['data_rak']);
	$temp_data_to_query = json_decode($_POST['temp_data']);
	$output["success"] = true;
	for($i=0;$i<count($data_rak);$i++)	{
		$nama_grup = $data_rak[$i]->nama_grup;
		$sql = "SELECT id_gruprak FROM grup_rak WHERE nama_grup = '$nama_grup' AND id_gudang = $id_gudang";
		$result_search = $con->query($sql);
		$id_grup_rak = 0;

		// Check jika grup rak sudah ada
		if($result_search->num_rows > 0){
			$id_grup_rak = 0;
			while($row = $result_search->fetch_assoc()){
				$id_grup_rak = $row["id_gruprak"];
			}

			for($k=0;$k<count($temp_data_to_query);$k++){
				if($nama_grup == $temp_data_to_query[$k]->nama_grup){
					$length = count($data_rak[$i]->value);
					$temp_length = count($temp_data_to_query[$k]->value);	
					for($j=$length - $temp_length;$j<$length;$j++){
						$koordinat_x=$data_rak[$i]->koordinat[$j][0];
						$koordinat_y=$data_rak[$i]->koordinat[$j][1];
						$posisi_urutan=$data_rak[$i]->value[$j];
						$query2=mysqli_query($con,"INSERT INTO rak VALUES (0, $koordinat_x,$koordinat_y,$posisi_urutan,0,$id_grup_rak)");
						if(!$query2){
							$checkQuery = false;
						}
					}				
					break;
				}
			}
		}
		else{
			$color=$data_rak[$i]->color;
			$level=$data_rak[$i]->level;
			$query=mysqli_query($con,"INSERT INTO grup_rak(nama_grup, color, id_gudang, jumlah_level) VALUES('".$nama_grup."', '".$color."','".$id_gudang."','".$level."')");
			$id_grup_rak=mysqli_insert_id($con);
			
			if($query){
				for($j=0;$j<count($data_rak[$i]->value);$j++){
					$koordinat_x=$data_rak[$i]->koordinat[$j][0];
					$koordinat_y=$data_rak[$i]->koordinat[$j][1];
					$posisi_urutan=$data_rak[$i]->value[$j];
					$query2=mysqli_query($con,"INSERT INTO rak VALUES (0, $koordinat_x,$koordinat_y,$posisi_urutan,0,$id_grup_rak)");
					if(!$query2){
						$checkQuery = false;
					}
				}
				
				// $get_rak= "SELECT id_rak FROM rak WHERE id_gruprak = $id_grup_rak";
				// $res = $con->query($get_rak);
				// while($row=$res->fetch_assoc()){
				// 	$temp_idrak = $row["id_rak"];
				// 	for($x=0;$x<$level;$x++){
				// 		$generate_barang=mysqli_query($con, "INSERT INTO barang(id_barang,nama_barang,id_rak,level) VALUES(0, '$nama_grup', $temp_idrak, $x+1)");
				// 	}
				// }
			}
			
			
			else{
				$checkQuery = false;
			}
		}


	}
	
	// if($checkQuery){
    //     $output['message'] = "Rak berhasil ditambahkan!";
    //     $output["success"] = true;
    // }else{
    //     $output['message'] = "Rak gagal ditambahkan!";
    //     $output["success"] = false;
    // }
}
echo json_encode($output);


?>

