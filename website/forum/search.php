
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
<div class="container mb-5 ">
    <h1>Search result for:- "<i><?php echo $_GET['search']?></i>"</h1>
    <?php
    $noresult=true;
    $search=$_GET['search']; 
    $sql="SELECT * from threads where match (`thread_title`,`thread_description`)against ('$search');";
    $res=mysqli_query($conn,$sql);
    //iterate to get search value 
    while($row=mysqli_fetch_assoc($res))
    {
        $noresult=false;
        $threadtitle=$row['thread_title'];
        $threaddesc=$row['thread_description'];
        $threadid=$row['thread_id'];
       echo' <div class="container">
        <h4><a class=" text-decoration-none text-dark " href="thread.php?threadid=',$threadid,'">',$threadtitle,'</a></h4>
        <p>'.$threaddesc.'</p>
    </div>';
    }
    //if searches are not found 
    if($noresult)
    {
        echo'<div class="container my-3">
        <div class=" bg-danger text-dark bg-opacity-25 rounded jumbotron">
         <h1 class="display-6">No Result Found!..</h1>
         <p class="lead">
         <ul>
         <li>Make sure that all words are spelled correctly</li>
         <li>Try different keyword </li>
         <li>Try more general keyword</li>
         </ul>
         </p>
        </div>
    </div>';
    }
    ?>
</div>

    <div class=" fixed-bottom container-fluid bg-dark text-light">
<p class=" text-center mb-0">Copyright Discuss Coding Forums 2023|All right reserved</p>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
