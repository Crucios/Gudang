<?php 
	require_once "../../php/connect.php";

	$data_rak=array("grup_rak"=> array(),"rak"=>array());
	if(isset($_GET['id_gudang']) && isset($_GET['id_gudang']) != ""){
		$id_gudang=$_GET['id_gudang'];
		$query=mysqli_query($con,"SELECT * FROM grup_rak WHERE id_gudang=$id_gudang");
		if(!empty($query)){
			while ($row = mysqli_fetch_assoc($query)) {
				array_push($data_rak['grup_rak'],$row);
				$id_gruprak=$row["id_gruprak"];
				$query2=mysqli_query($con,"SELECT id_rak, posisi_urutan, kapasitas, koordinat_x, koordinat_y FROM rak WHERE id_gruprak = $id_gruprak");
				if(!empty($query2)){
					$arr_rak=array();
					while($row2=mysqli_fetch_assoc($query2)){
						array_push($arr_rak,$row2);

					}
					array_push($data_rak["rak"],$arr_rak);
				}
			}
		}
	}

	echo json_encode($data_rak);

?>