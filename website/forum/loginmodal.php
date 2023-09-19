<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginmodal">
  Launch demo modal
</button> -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- icon link for icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
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

<!-- Modal -->
<div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="loginmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="loginmodalLabel">Login</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="loginhandle.php" method="POST">
      <div class="modal-body">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <div class="input-container">
    <i class="bi-envelope-fill icon" ></i>
    <input type="email" name="loginemail" class="form-control" id="loginemail" aria-describedby="emailHelp">
      </div>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <div class="input-container">
    <i class="bi-key-fill icon" ></i>
    <input type="password" name="loginpassword" class="form-control" id="loginpassword">
      </div>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
       </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> 
      </div>  -->
</form>
    </div>
  </div>
</div>
</body>
</html>