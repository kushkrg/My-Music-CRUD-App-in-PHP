<?php
include('config.php');

if(isset($_POST['submit'])){
	  $songName = $_POST['sname'];
    $releaseDate = $_POST['rdate'];
    $artistName = $_POST['aname'];

	//artwork upload
	$msg = "";
	$image = $_FILES['artwork']['name'];
	$target = "uploads/".basename($image);

	if (move_uploaded_file($_FILES['artwork']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

  	$insert_data = "INSERT INTO songs(sname, rdate, aname, artwork) VALUES('$songName','$releaseDate','$artistName','$image')";

  	$run_data = mysqli_query($con, $insert_data);

  	if($run_data){
		  echo "<script>alert('Song Added Successfully!')</script>";
  	}else{
  		echo "Data not insert";
  	}

}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  </head>
  <body>
      <!-- navigation bar start -->
      <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #152C55 ;">
        <a class="navbar-brand" href="#">Spotify</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add-song.php">Manage Songs & Artists</a>
            </li>
           
          
          </ul>
          <form class="form-inline my-2 my-lg-0">
            
            <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="fa fa-unlock"></i> Logout</button>
          </form>
        </div>
      </nav>
      <!-- navigation bar end  -->

      <!-- main part  -->
      <div class="jumboton px-2">
        <div class="row">
            <div class="col-sm-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title text-center">Add New Song</h5>
                  <hr>
                  <form method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Song Name</label>
                        <input type="text" name="sname" class="form-control" placeholder="Enter Song Name">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Release Date</label>
                        <input type="date" name="rdate" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Artwork</label>
                        <input type="file" name="artwork" class="form-control">
                      </div>
 
                      <div class="form-row">
                        <div class="col-md-8">
                          
                            <label for="inputState">Choose Artist</label>
                            <select id="inputState" name="aname" class="form-control">
                              <option selected>Choose...</option>
                             <?php 
                                 $get_data = "SELECT * FROM artists order by 1 desc";
                                 $run_data = mysqli_query($con, $get_data);
                               
                                   while($row = mysqli_fetch_array($run_data))
                                     {
                             ?>
                              <option><?php echo $row['aname'] ?></option>
                              <?php } ?>
                            </select>
                      
                        </div>
                        <div class="col-md-4">
                          <label for="inputState">Add New Artist</label>
                        
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter"></i> Add New</button>
                 
                        </div>
                      </div>
                      <br>
                   <input type="submit" name="submit" class="btn btn-info btn-large" value="Submit">
                  </form>
                 
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="card">
                <div class="card-body">
                 
                  <table class="table table-bordered table-striped table-hover" id="myTable">
                    <thead>
                    <tr>
                                    <th class='text-center' scope='col'>S.L</th>
                                    <th class='text-center' scope='col'>Artwork</th>
                                    <th class='text-center' scope='col'>Song Name</th>
                                    <th class='text-center' scope='col'>Release Date</th>
                                    <th class='text-center' scope='col'>Artist Name</th>
                                  
                                    <th class='text-center' scope='col'>Edit</th>
                                    <th class='text-center' scope='col'>Delete</th>
                                  </tr>
                                </thead>
                      <?php 
                        //fetching data from database
                            $get_data = "SELECT * FROM songs order by 1 desc";
                            $run_data = mysqli_query($con,$get_data);
                            $i = 0;
                                while($row = mysqli_fetch_array($run_data))
                                {
                                  $sl = ++$i;
                                  $id = $row['id'];
                                  $sname = $row['sname'];
                                  $rdate = $row['rdate'];
                                  $aname = $row['aname'];
                                  $artwork = $row['artwork'];
                                  echo "
                                  <tr>
                                    <td class='text-center'>$sl</td>
                                    <td class='text-left'><img src='uploads/$artwork' width='50px' height='50px' style='border-radius: 5px'></td>
                                    <td class='text-left'>$sname</td>
                                    <td class='text-left'> $rdate</td>
                                    <td class='text-center'> $aname</td>
                                  
                                
                                    <td class='text-center'>
                                      <span>
                                      <a href='#' class='btn btn-warning mr-3 edituser' data-toggle='modal' data-target='#edit$id' title='Edit'><i class='fa fa-pencil-square-o fa-lg'></i></a>
                                          
                                          
                                      </span>
                                      
                                    </td>
                                    <td class='text-center'>
                                      <span>
                                      
                                        <a href='#' class='btn btn-danger' title='Delete'>
                                            <i class='fa fa-trash-o fa-lg' data-toggle='modal' data-target='#delete$id' aria-hidden='true'></i>
                                        </a>
                                      </span>
                                      
                                    </td>
                                  </tr>                                 
                             ";
                            }
                           ?>         
                    </table>
                </div>
              </div>
            </div>
          </div>
      </div>


         <!-- add modal start -->
      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action='add-artists.php' method='post' enctype='multipart/form-data'>

                    <div class='form-group'>
                    <label for='artistName'>Artist Name</label>
                    <input type='text' class='form-control' name='sname' required>
                    </div>
                    <div class='form-group'>
                    <label for='dob'>Release Date</label>
                    <input type='date' class='form-control' name='dob'required>
                    </div>

                    <div class='form-group'>
                    <label for='artistName'>Artists Name</label>
                    <textarea name="bio" class='form-control' rows="3"></textarea>
                  
                    </div>
                
                    <div class='modal-footer'>
                      <input type='submit' name='submit' class='btn btn-info btn-large' value='Submit'>
                      <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                    </div>
              </form>
          </div>
        
        </div>
      </div>
</div>
  <!-- add modal end  -->

  <!-- delete modal start  -->
 <!-- Modal -->
<?php

$get_data = "SELECT * FROM songs";
$run_data = mysqli_query($con, $get_data);

while($row = mysqli_fetch_array($run_data))
{
	$id = $row['id'];
	echo "
<div id='delete$id' class='modal fade' role='dialog'>
  <div class='modal-dialog'>
    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
      <h4 class='modal-title text-center'>Are you want to sure?</h4>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
      </div>
      <div class='modal-body text-center'>
        <a href='delete.php?id=$id' class='btn btn-danger'>Delete</a>
      </div>
      
    </div>
  </div>
</div>
	";
	
}


//Edit data modal 

$get_data = "SELECT * FROM songs";
$run_data = mysqli_query($con,$get_data);

while($row = mysqli_fetch_array($run_data))
{
	  $id = $row['id'];
    $sname = $row['sname'];
    $rdate = $row['rdate'];
    $aname = $row['aname'];
    $artwork = $row['artwork'];
	echo "
      <div id='edit$id' class='modal fade' role='dialog'>
        <div class='modal-dialog'>
          <!-- Modal content-->
          <div class='modal-content'>
            <div class='modal-header'>
            <h4 class='modal-title text-center'>Edit your Data</h4> 
                  <button type='button' class='close' data-dismiss='modal'>&times;</button>
            </div>
            <div class='modal-body'>
              <form action='edit-song.php?id=$id' method='post' enctype='multipart/form-data'>

                <div class='form-group'>
                <label for='songName'>Song Name</label>
                <input type='text' class='form-control' name='sname' value='$sname' required>
                </div>
                <div class='form-group'>
                <label for='releaseDate'>Release Date</label>
                <input type='date' class='form-control' name='rdate' value='$rdate' required>
                </div>

                <div class='form-group'>
                <label for='artistName'>Artists Name</label>
                <input type='text' class='form-control' name='aname' value='$aname' required>
                </div>
                      
                <div class='form-group'>
                  <label>Artwork</label>
                  <input type='file' name='image' class='form-control'>
                  <img src = 'uploads/$artwork' style='width:50px; height:50px'>
                </div>
                      
                <div class='modal-footer'>
                  <input type='submit' name='submit' class='btn btn-info btn-large' value='Submit'>
                  <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
	    ";
}
?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>
  </body>
</html>

