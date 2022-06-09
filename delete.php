<?php

include('config.php');
$id = $_GET['id'];
$delete = "DELETE FROM songs WHERE id = $id";
$run_data = mysqli_query($con, $delete);

if($run_data){
	header('location:add-song.php');
}else{
	echo "Donot Delete";
}


?>