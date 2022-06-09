<?php
    include('config.php');
    if(isset($_POST['submit'])){
        $artistName = $_POST['sname'];
        $dob = $_POST['dob'];
        $bio = $_POST['bio'];

        $insert_data = "INSERT INTO artists(aname, dob, bio) VALUES('$artistName','$dob','$bio')";

        $run_data = mysqli_query($con, $insert_data);

        if($run_data){
            header("location: add-song.php");
        }else{
            echo "Data not insert";
        }
    }
?>
