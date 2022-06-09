<?php
include('config.php');

$songs = mysqli_query($con,"SELECT * FROM songs ORDER BY id DESC LIMIT 9");
$artists = mysqli_query($con, "SELECT * FROM artists ORDER BY id DESC LIMIT 9");
?>
<!doctype html>
<html lang="en">
  <head>
    <title>My Music App</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <script src="js.js"></script>
  </head>
  <body>
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
              <a class="nav-link" href="add-song.php">Manage Song & Artists</a>
            </li> 
          </ul>
          <form class="form-inline my-2 my-lg-0">
           
            <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="fa fa-lock" ></i> Login</button>
          </form>
        </div>
      </nav>
      <!-- hero section  -->
      <header>
        <div class="hero-text" style="display: none">
              <h1>Play millions of songs and podcasts, for free.</h1>
          </div>
          <div class="gener">
            <div class="category">Romantic</div>
            <div class="category">Old Classic</div>
            <div class="category">Rap Music</div>
            <div class="category">Rap Music</div>
          </div>
      </header>
      <!-- main start  -->
      <div class="jumbotron">
          <div class="d-flex justify-content-between">
              <div><h2>Trending Songs</h2></div>
              <div class="pull-right">
                  <a name="" class="btn btn-primary" href="add-song.php" role="button">Add Song</a>
              </div>
          </div>


          <div class="flex-container">
            <!-- php code for fetching songs data  -->
          <?php
              while($row=mysqli_fetch_array($songs)){
            ?>
              <div class="music-card">
                  <div class="img-card">
                      <img src="uploads/<?php echo $row['artwork']; ?>" alt="..." width="130px" height="140px">
                    </div>
                    <div class="text-card">
                      <h5><?php echo $row['sname']; ?></h5>
                      <p>
                        Artist Name: <?php echo $row['aname']; ?>
                      </p>
                      <b>Ratings</b>
                      <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <p class="card-text"><small class="text-muted">Release Date: <?php echo $row['rdate']; ?></small></p>
                    </div>
              </div>
            <?php  } ?>
    
          </div>
      </div>

      <!-- artists section start  -->

      <div class="jumbotron" style="background-color: #fff;">
        <div class="d-flex justify-content-between">
            <div><h2>Trending Artists</h2></div>
            <div class="pull-right">
                <a name="" class="btn btn-primary" href="#" role="button">Explore More</a>
            </div>
        </div>

        <div class="flex-container">
        <?php
              while($row=mysqli_fetch_array($artists)){
            ?>
          <div class="artists-card">
                <div class="text-card">
                  <h5><?php echo $row['aname'] ?></h5>
                    <small class="text-muted">Birthday: <?php echo $row['dob'] ?></small>
                    <p>
                        <strong>Bio:</strong> <?php echo $row['bio'] ?>
                      </p>
                      <a name="" id="" class="btn btn-primary btn-sm" href="#" role="button">Explore Songs</a>
                </div>
          </div>
        <?php } ?>
      
       
        </div>
      </div>
      

      <footer>
          <p>&copy; 2022 | Design & Developed by Prajwal</p>
      </footer>
     
      <!-- main end  -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
