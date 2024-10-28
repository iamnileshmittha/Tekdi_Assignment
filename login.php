<?php

  include('db_connection.php');
  $login=false;
  $err=false;
 
  if($_SERVER['REQUEST_METHOD']== 'POST')
  {

    $username=$_POST['uname'];
    
    $pass=$_POST['pass1'];


      $sql="SELECT * FROM `employee` WHERE email='$username'";
      $result=mysqli_query($conn,$sql);
      $num=mysqli_num_rows($result);

        if($num == 1)
        {

          while($rows=mysqli_fetch_assoc($result))

          {

            if(password_verify($pass,$rows['password'])){


              $login=true;
          session_start();
          $_SESSION['loggedin']=true;
          $_SESSION['username']=$rows['name'];

          header("location: index.php");


            }

          }
          
        }
        else{
          $err=true;
        }
    }
    
  
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  <?php  require '_nav.php'  ?>

  <?php
  

    if($err)
    {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>OOps Sorry we Can not Procced! Username and Password Mismatch!</strong> !
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
  
  ?>

  <div class="container mt-5 col-md-4" style="background-color:#41C9E2;">
    <h1 class="text-center">Login Now!</h1>
<form action="login.php" method="post">

  <div class="mb-3">
    <label for="uname" class="form-label">Username</label>
    <input type="text" name="uname" class="form-control" id="uname" aria-describedby="emailHelp" require>
    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>


  <div class="mb-3">
    <label for="pass" class="form-label">Password</label>
    <input type="password" name="pass1" class="form-control" id="pass" require>
  </div>
  
  <button type="submit" class="btn btn-primary" style="margin:0% 0% 1% 40%; ">Submit</button>
</form>
</div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>