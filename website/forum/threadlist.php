<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
  <?php require 'dbms.php'; ?>
    <?php require 'navbar.php'; ?>
    <?php
    // catid is passed from image url in index php page line number 57
    $id=$_GET['catid']; 
    $sql="SELECT * FROM `category` WHERE `category_id`= $id";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($res))
      {
        $catname=$row['category_name'];
        $catdesc=$row['category_description'];
      }

    ?>
<!-- code for inserting a thread in database when  user click on submit button -->
<?php
$showalert=false;
$method=$_SERVER['REQUEST_METHOD'];
if($method=="POST")
{
  $thread_title=$_POST['question']; 
  $thread_user_id=$_POST['user_id']; 
  $thread_description=$_POST['description']; 
  //code for avoidng a xss attack to execute script in thread description
  $thread_description=str_replace("<","&lt;",$thread_description);
  $thread_description=str_replace(">","&gt;",$thread_description);
  // if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true)
  // {
  $sql="INSERT INTO `threads` (`thread_title`, `thread_description`, `thread_category_id`, `thread_user_id`, `threadtimestamp`) VALUES ( '$thread_title', '$thread_description', '$id', '$thread_user_id', current_timestamp());";
  $res=mysqli_query($conn,$sql);
  $showalert=true;
  if($showalert )
  {
    echo'<div class="container mt-3 alert alert-success alert-dismissible fade show" role="alert"> 
    <strong>success! </strong>
    waiting for response of community..
    </div>';
  }
}
  // else{
  //   echo'<div class="container mt-3 alert alert-danger alert-dismissible fade show" role="alert"> 
  //   <strong>Error! </strong>
  //   You have Login first to Start Discussion..<button class=" btn btn-success btn-t mx-2" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>
  //   </div>';
  // }

// }
?>    
<!-- this is jumbotron -->
<div class="container my-3">
<div class=" bg-info text-dark bg-opacity-25 rounded jumbotron">
  <h1 class="display-6"><?php echo"$catname"?></h1>
  <p class="lead"><?php echo"$catdesc"?></p>
  <hr class="my-2">
  <p>This is peer to peer forums for sharing knowledge with each other.Forum Guidelines.-Do not spam,Warn about Wrong Content,Do not offer to Pay for Help,Do not Post About Commercial Product..</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
  </p>
</div>
</div>
<?php
if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true)
{
echo'<div class="container mb-5 ">
  <h1 class="py-3 text-center">Start a Discussion</h1>
  <!-- form for question -->
  <form action="', $_SERVER["REQUEST_URI"],'" method="POST"> <!-- this action is used to redirect on same page if click on submit button and also get a category id in url -->
      <div class="container row mx-auto col-10 col-md-8 col-lg-6">
  <div class="mb-3">
    <label for="questiontitle" class="form-label">Problem Title</label>
    <input type="text" name="question" class="form-control" id="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">ensure that minimum length of question title</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <textarea name="description"  row="4" cols="50" class="form-control" id="textarea"> </textarea>
    <input type="hidden" name="user_id" value="',$_SESSION['user_id'],'">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
      </div>
</form>
    </div>';
}
else{
  echo'<div class="container mt-3 alert alert-warning alert-dismissible fade show" role="alert"> 
  <strong>Login! </strong>
  You have Login first to Ask Question...<button class=" btn btn-primary btn-t mx-2" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>
  </div>';
  echo'<div class="container mb-5 ">
  <h1 class="py-3 text-center">Start a Discussion</h1>
  <!-- form for question -->
  <form > 
      <div class="container row mx-auto col-10 col-md-8 col-lg-6">
  <div class="mb-3">
    <label for="questiontitle" class="form-label">Problem Title</label>
    <input type="text" name="question" class="form-control" id="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">ensure that minimum length of question title</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <textarea name="description"  row="4" cols="50" class="form-control" id="textarea"> </textarea>
  </div>
  <button type="submit" class="btn btn-primary" disabled>Submit</button>
      </div>
</form>
    </div>';
}
?>
  <div class="container mb-3 ">
    <h4 class="ml-4">Browse a Questions</h4>
</div>

<!-- php code for dispalying a threads questions -->
  <?php
    $question=false;
    // catid is passed from image url in index php page line number 57
    $id=$_GET['catid']; 
    $sql="SELECT * FROM `threads` WHERE `thread_category_id`= $id";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($res))
      {
        $question=true;
        $threadid=$row['thread_id'];
        $threadtitle=$row['thread_title'];
        $threaddesc=$row['thread_description'];
        $threadtime=$row['threadtimestamp'];
        // this code is used to get a user detail by thread_user_id we also used foregignkey 
        $threaduserid=$row['thread_user_id'];
        $sql2="SELECT * FROM `users` where `user_id`='$threaduserid'";
        $res2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($res2);
       echo'<div class=" container mb-3">
       <div class="media">
  <img class="mr-3" src="../img/user.jfif"  width="90px" alt="Generic placeholder image">
  <div class="media-body">
    <h5 class="mt-2"> <a class=" text-decoration-none text-dark " href="thread.php?threadid=',$threadid,'">',$threadtitle,' </a></h5>',$threaddesc,'<br><h5 class="fs-6">',$row2['user_email'],'&nbspat ',$threadtime,
    '<h5><!-- thread id used to view thred and their comment text decoration classes used to manage a link on thread-->
    
  </div>
</div>
</div>';
      }
      if(!$question)
      {
        echo'<div class="container my-3">
        <div class=" jumbotron ">
          <h1 class="display-6">No Question found</h1>
          <p class="lead">Be the first to ask question</p>
        </div>
        </div>';
      }


    ?>
<!-- </div> -->
<?php require 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
