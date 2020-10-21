<?php 

require_once "../../php/connect.php";

if($_POST){
	//echo json_encode($_POST['id_gudang']);

	$a=json_decode($_POST['data_rak']);
	echo json_encode(count($a[1]->value));	
	// for($x=0;$x<count($a[0]))	

}



// for($x = 0; $x<$a[0]->count($a[0]->value);$x++){

// }


?>

