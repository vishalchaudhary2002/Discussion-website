
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <!-- icon link for icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
    .icon{
            /* //padding is used for size of icon with input filled  */
            padding:10px;
            /* min-width:50px; */
            text-align:center;
            /* width is used for set width of icon */
            min-width:50px;
            background:dodgerblue;
            color:white;
            /* font-size:2.5em; */
        }
        .input-container{
            display:flex;
            margin-bottom:15px;
        }
    </style>
  </head>
  <body>
    <?php require 'dbms.php'; ?>
    <?php require 'navbar.php'; ?>
    <?php
  $showalert=false;
  $method=$_SERVER['REQUEST_METHOD'];
  if($method=="POST")
  {
    $name=$_POST['name']; 
    $email=$_POST['email']; 
    $number=$_POST['number']; 
    $feedback=$_POST['feedback']; 
    $gender=$_POST['samename']; 
    $sql="INSERT INTO `contact` ( `contact_name`,`contact_email`, `contact_number`, `contact_gender`, `contact_feedback`,`contact_timestamp`) VALUES ( '$name','$email', '$number', '$gender', '$feedback', current_timestamp());";
    $res=mysqli_query($conn,$sql);
    $showalert=true;
    if($showalert )
    {
      echo'<div class="container mt-3 alert alert-success alert-dismissible fade show" role="alert"> 
      <strong>success! </strong>
      Feedback submit successfully.....
      </div>';
    }
  }

?>

    <div class="container mb-5 mt-2 ">
    <form action="contact.php" method="POST">
  <h1 class="py-1 text-center">Contact us </h1>
      <div class="container row mx-auto col-10 col-md-8 col-lg-6">
  <div class="mb-2">
    <label for="questiontitle" class="form-label">Name</label>
    <div class="input-container">
    <i class="bi-person-fill icon" ></i>
    <input type="text" name="name" class="form-control" id="email" aria-describedby="emailHelp">
</div>
  </div>
  <div class="mb-2">
    <label for="questiontitle" class="form-label">Email</label>
    <div class="input-container">
    <i class="bi-envelope-fill icon" ></i>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
  </div>
  </div>
  <div class="mb-3">
    <label for="questiontitle" class="form-label">Mobile Number</label>
    <div class="input-container">
    <i class="bi-telephone-fill icon" ></i>
    <input type="number" name="number" class="form-control" id="email" aria-describedby="emailHelp">
  </div>
  </div>
  <div>
  <label for="questiontitle" class="form-label">Gender:</label>
  <div class="mb-3 form-check form-check-inline">
    <!-- we can give a same name in gender for request post method -->
    <input class="form-check-input" name="samename" type="radio" id="email" value="Male" required>
    <label class="form-check-label" for="inlineradio1">Male</label>
</div>
<div class="mb-3 form-check form-check-inline">
    <input class="form-check-input" name="samename" type="radio" id="email" value="Female" required>
    <label class="form-check-label" for="inlineradio2">Female</label>
</div>
</div>
  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Feedback</label>
    <textarea name="feedback"  row="4" cols="50" class="form-control" id="textarea"> </textarea>
    <!-- <input type="hidden" name="user_id" value="',$_SESSION['user_id'],'"> -->
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
<div class=" container-fluid bg-dark text-light">
<p class=" text-center mb-0">Copyright Discuss Coding Forums 2023|All right reserved</p>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
