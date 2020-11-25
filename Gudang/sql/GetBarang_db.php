<?php 
	require_once "../../php/connect.php";

	$data_rak=array("rak" => array(), 'message' => null, 'nama_grup' => null, 'jumlah_level' => 0);
	$data_barang=array("id_barang" => null, "nama_barang" => null, "kuantitas" => 0, "id_rak" => null, "level" => 0, "berat" => 0);
	if(isset($_GET['id_rak']) && isset($_GET['id_rak']) != ""){
		$id_rak=$_GET['id_rak'];
		$jumlah_level = 0;
		$get_nama = mysqli_query($con, "SELECT grup_rak.nama_grup, grup_rak.jumlah_level FROM grup_rak INNER JOIN rak ON grup_rak.id_gruprak = rak.id_gruprak WHERE rak.id_rak = $id_rak");
		if(!empty($get_nama)){
			while($row1 = mysqli_fetch_assoc($get_nama)){
				$data_rak['nama_grup'] = $row1["nama_grup"];
				$data_rak['jumlah_level'] = $row1["jumlah_level"];
			}
		}
		else {
			$data_rak['message'] = "Nama Grup tidak ada";
		}

		$query=mysqli_query($con,"SELECT * FROM barang WHERE id_rak = '" .$id_rak. "'");
		if(mysqli_num_rows($query) > 0){
			while ($row = mysqli_fetch_assoc($query)) {
				$data_barang["id_barang"] = $row["id_barang"];
				$data_barang["nama_barang"] = $row["nama_barang"];
				$data_barang["kuantitas"] = $row["kuantitas"];
				$data_barang["id_rak"] = $row["id_rak"];
				$data_barang["level"] = $row["level"];
				$data_barang["berat"] = $row["berat"];
				array_push($data_rak["rak"], $data_barang);
				$data_rak['message'] = $data_barang["id_barang"];
			}
			$data_rak['message'] = "Berhasil";
			
		}
		else {
			$data_rak['message'] = "Gagal";
		}
	}
	else{
		$data_rak['message'] = "Data Belum Masuk";
	}

	echo json_encode($data_rak);

?>