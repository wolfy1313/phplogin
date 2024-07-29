<?php 
$success=0;
$user=0;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  include 'connect.php';
  $username=$_POST['username'];
  $password=$_POST['password'];

  


  $sql="Select * from `registration` where username='$username'";

  $result=mysqli_query($con,$sql);
  if($result){
    $num=mysqli_num_rows($result);
    if($num>0){
      // echo "User already exists";
      $user=1;
    }else{
      $sql="insert into `registration` (username, password) values('$username', '$password')";
      $result=mysqli_query($con,$sql);

      if($result){
        $success=1;
        header('location:login.php');
      } else {
        die(mysqli_error($con));
      }
    }
  }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php 
    if($user){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Yikes, Sorry!</strong> User Already Exists!!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
    ?>
    <?php 
    if($success){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>AWW YISS </strong> Sign-up Successful!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
    ?>
    <h1 class="text-center">Sign up Page</h1>
    <div class="container mt-5">

    <form action="sign.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">USERNAME</label>
    <input type="text" class="form-control" placeholder="Enter your username" name="username">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" placeholder="Enter your password" name="password">
  </div>
  <button type="submit" class="btn btn-primary w-100">Sign Up</button>
</form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>