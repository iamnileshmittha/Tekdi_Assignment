<?php

include("db_connection.php");

$update=false;
$email=false;

if(isset($_POST['update_data'])){

   $name=$_POST['fname'];
   $mail=$_POST['email'];
   $add=$_POST['Address'];
   $mobile=$_POST['Mobile'];
   $id=$_POST['id'];


   $exit="SELECT * FROM `employee` WHERE id='$mail'";

   $show=mysqli_query($conn,$exit);

   $rows=mysqli_num_rows($show);



   if($rows>0){

    $email=true;

   }

   else{


   $sql="UPDATE `employee` SET name='$name', email='$mail', address='$add', phone='$mobile' WHERE id='$id'";

   $result=mysqli_query($conn,$sql);

   if($result){

    $update=true;
   }
  
}
}





?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<?php

require '_nav.php';

?>

<?php 

if($update){

  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Updated Successfully!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}

if($email){

  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>EmailID already Exits!</strong>!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}


?>

<div class="" style="margin-top:30px;">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-9"><h3>Employee List</h3></div>
          <div class="col-md-3" align="right">
          <a class="btn btn-primary add_btn" role="button">ADD</a>
          </div>
        </div>
      </div>
    </div>

</div>
      
        
          <table class="table table-dark table-striped">
          <thead>
    <tr>
      <th scope="col">SON</th>
      <th scope="col">Name</th>
      <th scope="col">Mail</th>
      <th scope="col">Address</th>
      <th scope="col">Password</th>
      <th scope="col">Created_At</th>
      <th scope="col">Updated_at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
            <tbody>

  <tbody>

  <?php

  $sql="Select * from `employee` ORDER BY `id` DESC";

  $result=mysqli_query($conn,$sql);

  $rows=mysqli_num_rows($result);

  

  while($rows = mysqli_fetch_assoc($result)){


    echo '<tr>
      <th scope="row" class="emp_id">'.$rows['id'].'</th>
      <td>'.$rows['name'].'</td>
      <td>'.$rows['email'].'</td>
      <td>'.$rows['address'].'</td>
      <td>'.$rows['password'].'</td>
      <td>'.$rows['created_at'].'</td>
      <td>'.$rows['updated_at'].'</td>
      <td>
      
    <a  class="btn btn-success btn-sm edit_btn">Edit</a>
        <a class="btn btn-danger mx-2 delete_btn">Delete</a>
      </td>
    </tr>';
  }


?>
    

</tbody>
  
</table>

</div>




<!-- model for edit -->
 <div>
<div class="modal fade " id="update_data">
  <div class="modal-dialog  modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="update_dataLabel">Update Employee</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="card-body">
<form action="index.php" method="post">
        <div class="container mt-3">
            <div class="row">
                <div class="col">
                  <strong><label for="fname " class="ms-2">Name:</label></strong>
                    <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter Name"  required>
                </div>
                <div class="col">
                <strong><label for="email " class="ms-2">Email:</label></strong>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row">
                <div class="col">
                <strong><label for="address " class="ms-2">Address:</label></strong>
                    <input type="text" class="form-control" placeholder="Address" id="address" name="Address" required>
                </div>
                <div class="col">
                <strong><label for="mobile " class="ms-2">Mobile:</label></strong>
                    <input type="number" class="form-control" minlength="10" placeholder="Mobile" id="mobile" name="Mobile">
                </div>
                
            </div>
        </div>
        <div class="container mt-3">
            <div class="row">
                <div class="col">
                    <input type="hidden" class="form-control" placeholder="Address" id="id" name="id" required>
                </div>
                
                
            </div>
        </div>

      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancle</button>
        <button type="submit" class="btn btn-primary" name="update_data">Update</button>
      </div>

      </form>
</div>
</div>
    </div>
  </div>
</div>
</div>




<!-- Modal for ADD Employee -->

<div class="modal fade " id="add_data">
  <div class="modal-dialog  modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="update_dataLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="card-body">
      <div class="container mt-1">
        <div class="card">
            <div class="card-header text-center">
                <h3>Add New Employee</h3>
            </div>
            <div class="card-body">
<form action="AddUser.php" method="post">
        <div class="container mt-3">
            <div class="row">
                <div class="col">
                    <input type="text" name="fname" class="form-control" placeholder="Enter Name" required>
                </div>
                <div class="col">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Address" name="Address" required>
                </div>
                <div class="col">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row">
                <div class="col">
                    <input style="width:49%;" type="number" class="form-control" placeholder="Mobile" name="Mobile" required>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <button class="btn btn-primary w-100 py-2 fw-semi-bold" type="submit">Sign Up</button>
                </div>
            </div>
        </div>
    </form>
    </div>
        </div>
    </div>

</div>
</div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>

  <script>

    $(document).ready(function (){

      $('.edit_btn').click(function (e){

        e.preventDefault();


        var emp_id=$(this).closest('tr').find('.emp_id').text();
    

        $.ajax({

          method:"POST",
          url:"code.php",
          data:{

            'click_update_btn':true,
            'emp_id':emp_id,
          },

          success:function(response){

           

            $.each(response, function (key,value){


              $('#fname').val(value['name']);
              $('#email').val(value['email']);
              $('#address').val(value['address']);
              $('#mobile').val(value['phone']);
              $('#id').val(value['id']);
            });

            $('#update_data').modal("show");
          
}
        });

        
      }) ;




    });
//end



// jQuery for Add Employee

$(document).ready(function (){

$('.add_btn').click(function (e){

  e.preventDefault();

  console.log("hiiii");


  

  $.ajax({

    method:"POST",
    url:"code.php",
    data:{

      'click_add_btn':true
    },

    success:function(response){

      $('#add_data').modal("show");
    }
  });

  
}) ;




});

//end


    // Jquery for delete Action

   
      $(document).ready(function (){



$('.delete_btn').click(function (e){

  if (confirm("Are you Sure to delete data!") == true) {


  var emp_id=$(this).closest('tr').find('.emp_id').text();


  $.ajax({

    method:"POST",
    url:"code.php",
    data:{

      'click_delete_btn':true,
      'emp_id':emp_id,
    },

    success:function(response){

      window.location.reload();   
}
  });

}

  
});





});



    

</script>

    
</body>
</html>


