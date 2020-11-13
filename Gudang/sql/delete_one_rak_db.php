<?php 

require_once "../../php/connect.php";
$output = array('success' => false, 'message' => null);
$checkQuery = true;
if($_POST){
	//echo json_encode($_POST['id_gudang']);
	$id_gudang=$_POST['id_gudang'];
	$nomor_rak=$_POST['nomor_rak'];
	$nama_grup = $_POST['nama_grup'];


	$id_rak=0;
	$sql = "SELECT id_gruprak FROM grup_rak WHERE nama_grup = '$nama_grup' AND id_gudang = $id_gudang";
	$result_search = $con->query($sql);
	$id_grup_rak = 0;

    // Check jika grup rak sudah ada
	if($result_search->num_rows > 0){
		$id_grup_rak = 0;
		while($row = $result_search->fetch_assoc()){
			$id_grup_rak = $row["id_gruprak"];
			break;
		}

		$sql="SELECT id_rak FROM rak WHERE posisi_urutan='$nomor_rak' AND id_gruprak='$id_grup_rak'";
		$result_search=$con->query($sql);
		while($row=$result_search->fetch_assoc()){
			$id_rak=$row['id_rak'];
			break;
		}
		$query=mysqli_query($con,"DELETE FROM barang WHERE id_rak='$id_rak'");
		if($query){
			$query=mysqli_query($con,"DELETE FROM rak WHERE id_rak='$id_rak'");
			if($query){
				$output['message']="Berhasil menghapus rak";
				$output['success']=true;
			}else{
				$output['message']="Gagal menghapus rak";
			}
		}else{
			$output['message']="Gagal menghapus barang";
		}
	}
	

}
echo json_encode($output);


?>

