<?php 

session_start();
$log;
if(isset($_SESSION['username']) && $_SESSION['loggedin'] == true){


  $log=true;
  
}
else{

  $log=false;

}

echo '<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">';


  if($log){

    echo '<a class="navbar-brand" href="#">Hi '.$_SESSION['username'].'</a>';
  }
  else{

        echo '<a class="navbar-brand" href="#">Employee</a>';
  }


  

    echo '<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">';

    
      
    if($log){
  echo '
      <a class="btn btn-primary my-2 my-sm-0" href="logout.php" style="margin-left: auto;">Logout</a>
        ';
    }
    else{
      echo '<a class="btn btn-primary my-2 my-sm-0" href="login.php" style="margin-left: auto;">Login</a>';
    }
      echo '</div></div></nav>';

      
      ?>