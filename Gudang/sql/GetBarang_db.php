<?php 
	require_once "../../php/connect.php";

	$data_rak=array("rak"=>array());
	$data_barang=array("id_barang" => null, "nama_barang" => null, "kuantitas" => 0, "id_rak" => null, "level" => 0);
	if(isset($_GET['id_rak']) && isset($_GET['id_rak']) != ""){
		$id_rak=$_GET['id_rak'];
		$query=mysqli_query($con,"SELECT * FROM barang WHERE id_rak = $id_rak");
		if(!empty($query)){
			while ($row = mysqli_fetch_assoc($query)) {
				$data_barang["id_barang"] = $row["id_barang"];
				$data_barang["nama_barang"] = $row["nama_barang"];
				$data_barang["kuantitas"] = $row["kuantitas"];
				$data_barang["id_rak"] = $row["id_rak"];
				$data_barang["level"] = $row["level"];
				array_push($data_rak["rak"],$data_barang);
			}
		}
	}

	echo json_encode($data_rak);

?>