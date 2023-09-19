
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
    $thread_id=$_GET['threadid']; 
    $sql="SELECT * FROM `threads` WHERE `thread_id`= $thread_id";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($res))
      {
        $threadtitle=$row['thread_title'];
        $threaddesc=$row['thread_description'];
        //code for posted by in jumbotron of thread
        $threaduserid=$row['thread_user_id'];
        $sql3="SELECT * FROM `users` where `user_id`='$threaduserid'";
        $res3=mysqli_query($conn,$sql3);
        $row3=mysqli_fetch_assoc($res3);
        $postedby=$row3['user_email'];
      }

    ?>

    <!-- code for inserting a comment in database when  user click on post comment -->
<?php
$showalert=false;
$method=$_SERVER['REQUEST_METHOD'];
if($method=="POST")
{ 
  $comment_description=$_POST['commentdescription']; 
  //this replacement is used to save from xss attack when user write script in comment box it automatically executed so we can replace tag element
  $comment_description=str_replace("<","&lt;",$comment_description);
  $comment_description=str_replace(">","&gt;",$comment_description);
  $user_id=$_POST['user_id']; 
  if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true)
  { 
  $sql="INSERT INTO `comments` ( `comment_by`, `comment_description`, `thread_id`, `comment_time`) VALUES ('$user_id', '$comment_description', '$thread_id', current_timestamp());";
  $res=mysqli_query($conn,$sql);
  $showalert=true;
  if($showalert)
  {
    echo'<div class="container mt-3 alert alert-success alert-dismissible fade show" role="alert"> 
    <strong>success! </strong>
    Your response submit successfully!....
    </div>';
  }
}
// else{
//   echo'<div class="container mt-3 alert alert-danger alert-dismissible fade show" role="alert"> 
//   <strong>Error! </strong>
//   You have Login first to Give Suggestion...<button class="btn btn-success btn-t mx-2" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>
//   </div>';
}
?>
<!-- this is jumbotron -->
<div class="container my-3">
<div class=" bg-info text-dark bg-opacity-25 rounded jumbotron">
  <h1 class="display-6"><?php echo"$threadtitle"?></h1>
  <p><?php echo"$threaddesc"?></p>
  <p>Asked by:-&nbsp <b class=" h6 fs-6"><?php echo $postedby; ?></b></p>
  <hr class="my-2">
  <p class="font-weight-light">This is peer to peer forums for sharing knowledge with each other.Forum Guidelines.-Do not spam,Warn about Wrong Content,Do not offer to Pay for Help,Do not Post About Commercial Product..</p></p>
</div>
</div>
<!-- form for submit a comment-->
 <?php
if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true)
{
echo'<div class="container mb-5 "> 
  <h1 class="py-3 text-center">Post your comment</h1>
  <form action="',$_SERVER["REQUEST_URI"],'"method="POST"> <!-- this action is used to redirect on same page if click on submit button and also get a category id in url -->
      <div class="container row mx-auto col-10 col-md-8 col-lg-6">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Ellaborate Your Concern</label>
    <textarea name="commentdescription"  row="4" cols="50" class="form-control" id="textarea"> </textarea>
    <input type="hidden" name="user_id" value="',$_SESSION['user_id'],'">
  </div>
  <button type="submit" class="btn btn-primary">Post</button>
      </div>
</form>
    </div>';
 }
else{
  echo'<div class="container mt-3 alert alert-warning alert-dismissible fade show" role="alert"> 
  <strong>Login! </strong>
  You have Login first to Give Suggestion...<button class="btn btn-primary btn-t mx-2" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>
  </div>';
  echo'<div class="container mb-5 "> 
  <h1 class="py-3 text-center">Post your comment</h1>
  <form> <!-- this action is used to redirect on same page if click on submit button and also get a category id in url -->
      <div class="container row mx-auto col-10 col-md-8 col-lg-6">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Ellaborate Your Concern</label>
    <textarea name="commentdescription"  row="4" cols="50" class="form-control" id="textarea"> </textarea>
  </div>
  <button type="submit" class="btn btn-primary" disabled>Post</button>
      </div>
</form>
    </div>';
}
?> 
 <div class="container mb-3 ">
    <h4 class="ml-4">Comments</h4>
</div>

 <!-- code for showing all comments    -->

 <?php
    $comments=false;
    // catid is passed from image url in index php page line number 57
    $thread_id=$_GET['threadid']; 
    $sql="SELECT * FROM `comments` WHERE `thread_id`= $thread_id";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($res))
      {
        $comments=true;
        $commentid=$row['comment_id'];
        $commentdesc=$row['comment_description'];
        $commenttime=$row['comment_time'];
        //comment_by also a foreign key that take a user id 
        $commentby=$row['comment_by'];
        $sql2="SELECT * FROM `users` where `user_id`='$commentby'";
        $res2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($res2);
        

       echo'<div class="container">
       <div class="media">
  <img class="mr-3" src="../img/user.jfif"  width="90px" alt="Generic placeholder image">
  <div class="media-body">
    <h6 class="fs-6  mt-2">',$row2['user_email'],'&nbspat ',$commenttime,'</h6>',$commentdesc,
    
  '</div>
</div>
</div>';
      }
      if(!$comments)
      {
        echo'<div class="container my-3">
        <div class=" jumbotron ">
          <h1 class="display-6">No comments found</h1>
          <p class="lead">Be the first to response the question</p>
        </div>
        </div>';
      }


    ?>

<?php require 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
