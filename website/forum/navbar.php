<?php
session_start();
echo'
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Forum website</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">Aboutus</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </a>
          <ul class="dropdown-menu">';
          //code is used for display a category on navbar 
          $sql="SELECT `category_name`,`category_id` FROM `category`";
          $res=mysqli_query($conn,$sql);
          while($row=mysqli_fetch_assoc($res))
          {
            echo'<li><a class="dropdown-item" href="threadlist.php?catid='.$row['category_id'].'">',$row['category_name'],'</a></li>';

            // <li><a class="dropdown-item" href="#">Another action</a></li>
            // <li><hr class="dropdown-divider"></li>
            // <li><a class="dropdown-item" href="#">Something else here</a></li>
          }
          echo'</ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php" tabindex="-1">contact</a>
        </li>
      </ul>';
    if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true)
    {
     echo' <form class="d-flex" role="search" action="search.php" method="get">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success " type="submit">Search</button><!-- outline is used to light color button-->
       <p class="text-light my-0 mx-3 mb-0 mt-2"> ',$_SESSION['loginemail'],'</p>
       <a href="logout.php" class=" btn btn-success" role="button">Logout</a>
       </form>';
    }
    else
    {
     echo' <form class="d-flex" role="search" action="search.php" method="get">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success " type="submit">Search</button><!-- outline is used to light color button-->
      </form>
      <button class="btn btn-success mx-2" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button><!--success is color of button we give any like danger warning etc-->
      <button class="btn btn-success mx-2" data-bs-toggle="modal" data-bs-target="#signupmodal">Signup</button>';
    }
    echo'</div>
  </div>
</nav>';
require 'loginmodal.php';
require 'signupmodal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true")
{
  echo'<div class="container mt-3 alert alert-success alert-dismissible fade show" role="alert"> 
  <strong>Successfully Signup! </strong>
  </div>';
}
if(isset($_GET['error']))
{
  // echo $_GET['error'];
  echo'<div class="container mt-3 alert alert-danger alert-dismissible fade show" role="alert"> 
  <strong>',$_GET['error'],'</strong>
  </div>';
  
}
if(isset($_GET['loginerror']))
{
  // echo $_GET['error'];
  echo'<div class="container mt-3 alert alert-danger alert-dismissible fade show" role="alert"> 
  <strong>',$_GET['loginerror'],'</strong>
  </div>';
  
}


?>