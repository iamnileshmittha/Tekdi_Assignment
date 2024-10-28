<?php

include('db_connection.php');


// code for Update modal
if(isset($_POST['click_update_btn'])){

    $id=$_POST['emp_id'];

    $arr=[];

    $sql="SELECT * FROM `employee` WHERE id='$id'";

    $result=mysqli_query($conn,$sql);

    while($row=mysqli_fetch_array($result)){
        array_push($arr,$row);
        header('content-type:application/json');
        echo json_encode($arr);
    }


}

// code for delete modal
if(isset($_POST['click_delete_btn'])){

    $id1=$_POST['emp_id'];

    $sql1="DELETE FROM `employee` WHERE id='$id1'";

    $result1=mysqli_query($conn,$sql1);


}

if(isset($_POST['click_add_btn'])){


    $name=$_POST['fname'];
    $email=$_POST['email'];
    $address=$_POST['Address'];
    $pass=$_POST['password'];
    $phone=$_POST['Mobile'];

    $exitsql="SELECT * FROM Employee where email='$email'";
    $result3=mysqli_query($conn,$exitsql);
    $num=mysqli_num_rows($result);

    if($num>0){
    
     $showExit=true;
    }
    else{

  

      $hashpass=password_hash($pass,PASSWORD_DEFAULT);

      $sql2="INSERT INTO `Employee` (`name`,`email`,`address`,`phone`,`password`) values('$name','$email','$address','$phone','$hashpass')";
      $result2=mysqli_query($conn,$sql);

        if($result2)
        {
          header("location:index.php");
          $alert=true;
        }
    }
    


}




?>