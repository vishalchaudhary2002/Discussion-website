
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
      .carousel-inner{
        height:300px;
      }
      .carousel-item,img{
        min-width:100%;
        height:100%;
        object-fit:cover;
      }

    </style>
  </head>
  <body>
  <?php require 'dbms.php'; ?>
    <?php require 'navbar.php'; ?>
    <!-- carsoul use for animation of images -->
    <!-- <div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../img/slider.jfif" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../img/temp.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../img/slider3.jfif" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div> -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="../img/slider1.jpg" alt="First slide">
      <!-- new -->
      <div class="carousel-caption d-none d-md-block">
        <p class="mb-0"><button class="btn btn-success">Technology</button>
          <button class="btn btn-danger">Development</button>
          <button class="btn btn-primary">coding</button>
        </p>
      </div>
      <!-- //uor -->
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../img/slider2.jfif" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <p class="mb-0"><button class="btn btn-success">Technology</button>
          <button class="btn btn-danger">Development</button>
          <button class="btn btn-primary">coding</button>
        </p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../img/slider3.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <p class="mb-0"><button class="btn btn-success">Technology</button>
          <button class="btn btn-danger">Development</button>
          <button class="btn btn-primary">coding</button>
        </p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



<!-- //used for comment -->
 <div class="mx-auto col-10 col-md-8 col-lg-6 my-4">   
<div class="row">
<!-- <div class=" mx-auto col-10 col-md-8 col-lg-6"> used to center any element -->
    <h2 class="d-flex justify-content-center">Category for Discuss</h2>
</div>
</div>
<div class="container">
<div class="row my-4">
      <?php
      $sql="SELECT * FROM `category`";
      $res=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($res))
      {
        $id=$row['category_id'];
        $cat=$row['category_name'];
        $descrip=$row['category_description'];
      echo'<!-- use while loop to iterate through category -->
      <div class=" col-md-4 my-4 "> <!--my-2 used for spacing-->
      <!-- <div class=" mx-auto col-10 col-md-8 col-lg-6"> -->
        <div class="card" style="width: 20rem;">
          <img src="../img/card',$id,'.jpeg" height="150px"class="card-img-top"  alt="..." style="height:13rem;">
          <div class="card-body">
            <h5 class="card-title"><a class="text-decoration-none" href="threadlist.php?catid='.$id.'">',$cat,'</a></h5>
            <p class="card-text">',substr($descrip ,0,90),'...</p>
            <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">View Thread</a>
          </div>
        </div>
      </div>';
      }  
      ?>   
</div>
</div>
    <?php require 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
