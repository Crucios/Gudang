<?php
	$con = mysqli_connect("localhost","root","","dbgudang");
	  if(!$con)
	  {
	    die('Could not connect: ' . mysqli_error());
      }

	  function test_input($data)
	  {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
	  
		  return $data;
	  }
?>