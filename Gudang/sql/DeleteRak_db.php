<?php 

require_once "../../php/connect.php";
$output = array('success' => false, 'message' => null);
$checkQuery = true;
if($_POST){
	//echo json_encode($_POST['id_gudang']);
	$id_gudang=$_POST['id_gudang'];
    $data_rak=json_decode($_POST['data_rak']);
    $nama_grup = $_POST['nama_grup'];
    $checkQuery = false;
    
    $sql = "SELECT id_gruprak FROM grup_rak WHERE nama_grup = '$nama_grup' AND id_gudang = $id_gudang";
		$result_search = $con->query($sql);
		$id_grup_rak = 0;

    // Check jika grup rak sudah ada
    if($result_search->num_rows > 0){
        $id_grup_rak = 0;
        while($row = $result_search->fetch_assoc()){
            $id_grup_rak = $row["id_gruprak"];
        }
	    for($i=0;$i<count($data_rak);$i++)	{
			if($nama_grup == $data_rak[$i]->nama_grup){
                $sql = "DELETE grup_rak, rak
                FROM grup_rak
                LEFT JOIN rak ON grup_rak.id_gruprak = rak.id_gruprak
                WHERE grup_rak.id_gruprak = $id_grup_rak";
                $query = mysqli_query($con, $sql);
                $checkQuery = true;
                if(!$query){
                    $checkQuery = false;
                }			
                break;
            }
		}
    }
	
	if($checkQuery){
        $output['message'] = "Rak berhasil dihapus!";
        $output["success"] = true;
    }else{
        $output['message'] = "Rak gagal dihapus!";
        $output["success"] = false;
    }
}
echo json_encode($output);


?>

