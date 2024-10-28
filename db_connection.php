<?php

$servername="localhost";
$username="root";

$pass="qwerty";
$db="tekdi";


$conn=mysqli_connect($servername,$username,$pass,$db);

if($conn){

    
}
else{

    die(mysqli_connect_error());
}

?>
