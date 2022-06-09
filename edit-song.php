<?php
include('config.php');

$id = $_GET['id'];

//Fetching privious image to update
if(isset($_GET['id'])){
    $edit_id = $_GET['id'];
    $edit_query = "SELECT * FROM songs WHERE id = $edit_id";
    $edit_query_run = mysqli_query($con, $edit_query);

    if(mysqli_num_rows($edit_query_run) > 0){
        
        $edit_row = mysqli_fetch_array($edit_query_run);
        $e_image = $edit_row['artwork'];
    }
    else{
        // header('location: index.php');
        echo "Error1";
    }
}
else{
    // header("location: index.php");
    echo "Error2";
}


if(isset($_POST['submit']))
{
    $songName = $_POST['sname'];
    $releaseDate = $_POST['rdate'];
    $artistName = $_POST['aname'];

	//artwork upload
    $image = $_FILES['artwork']['name'];
    if(empty($image)){
	    $image = $e_image;
	}
	$target = "uploads/".basename($image);

	if (move_uploaded_file($_FILES['artwork']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

	$update = "UPDATE songs SET sname='$songName', rdate = '$releaseDate', aname = '$artistName', artwork = '$image' WHERE id=$id ";
	$run_update = mysqli_query($con,$update);

	if($run_update){
		header('location:add-song.php');
	}else{
		echo "Data not update";
	}
}

?>