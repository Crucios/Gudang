<?php 

require_once "../../php/connect.php";
$output = array('success' => false, 'message' => null);
if($_POST){
	//echo json_encode($_POST['id_gudang']);

	$data_rak=json_decode($_POST['data_rak']);
	
	// echo json_encode($data_rak[2]->value[0]);	
	//echo json_encode(count($data_rak));	
	for($i=0;$i<count($data_rak);$i++)	{
		$nama_grup=$data_rak[$i]->nama_grup;

		$color=$data_rak[$i]->color;
		$id_gudang=$_POST['id_gudang'];
		$query=mysqli_query($con,"INSERT INTO grup_rak(nama_grup, color, id_gudang) VALUES('".$nama_grup."', '".$color."','".$id_gudang."')");
		$id_grup_rak=mysqli_insert_id($con);
		
		if($query){
			for($j=0;$j<count($data_rak[$i]->value);$j++){
				$koordinat_x=$data_rak[$i]->koordinat[$j][0];
				$koordinat_y=$data_rak[$i]->koordinat[$j][1];
				$posisi_urutan=$data_rak[$i]->value[$j];
				$query2=mysqli_query($con,"INSERT INTO rak VALUES (0, $koordinat_x,$koordinat_y,$posisi_urutan,0,$id_grup_rak)");

			}
		}

	}
	if($query && $query2){
        $output['message'] = "Rak berhasil ditambahkan!";
        $output["success"] = true;
    }else{
        $output['message'] = "Rak gagal ditambahkan!";
        $output["success"] = false;
    }
	

	

}
echo json_encode($output);


?>

