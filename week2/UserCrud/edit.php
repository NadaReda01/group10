<?php

require 'dbConnection.php';
require 'checkLogin.php';
require 'helpers.php';

$id = $_GET['id'];

# Check if Id ex ...
$sql = "select * from users where id = $id ";
$data = mysqli_query($con, $sql);

if (mysqli_num_rows($data) == 1) {
    # fetch data
    $Userdata = mysqli_fetch_assoc($data);
} else {
    $Message = 'Invalid Id ';
    $_SESSION['Message'] = $Message;
    header('Location: index.php'); 
}



# Fetch Department Data ..... 
$sql = "select * from departments";
$dep_op  = mysqli_query($con,$sql); 




if($_SERVER['REQUEST_METHOD'] == "POST"){

$name     = Clean($_POST['name']);
$email    = Clean($_POST['email']);
$dep_id   = $_POST['dep_id'];




 $errors = [];

 # Validate Name ...
 if (!Validate($name,1)) {
        $errors['Name'] = 'Field Required';
    }

    # Validate Email
    if (!Validate($email,1)) {
        $errors['Email'] = 'Field Required';
    } elseif (!Validate($email,2)) {
        $errors['Email'] = 'Invalid Email';
    }


   # Validate dep_id .... 
   if (!Validate($dep_id,1)) {
        $errors['Department'] = 'Field Required';
    }elseif(!Validate($dep_id,4)){
        $errors['Department'] = "Invalid Id";
    }




 if(count($errors) > 0){
        # Print Errors 
        Errors($errors);
 }else{

    $sql = "update users set name='$name' , email = '$email' , dep_id = $dep_id where id  = $id"; 

    $op  = mysqli_query($con,$sql);

    if($op){
        $Message = "Raw Updated";
    }else{
        $Message = "Error Try Again ".mysqli_error($con) ;
    }

    $_SESSION['Message'] = $Message;
    header("Location: index.php");

}

}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Update</h2>


        <form action="edit.php?id=<?php echo $Userdata['id']; ?>" method="post">

            
            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="text" class="form-control" id="exampleInputName" name="name" value="<?php echo $Userdata['name']; ?>"
                    aria-describedby="" placeholder="Enter Name">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                    value="<?php echo $Userdata['email']; ?>" aria-describedby="emailHelp" placeholder="Enter email">
            </div>


            <div class="form-group">
                <label for="exampleInputPassword">Department</label>
                <select  class="form-control" id="exampleInputPassword1" name="dep_id">

                  <?php 
                       while($data = mysqli_fetch_assoc($dep_op)){
                    ?>

                        <option  value="<?php echo $data['id'];?>"  <?php if($data['id'] == $Userdata['dep_id']){ echo 'selected';} ?> ><?php echo $data['title'];?></option>

                   <?php } ?> 

            </select>    
            </div>



            <button type="submit" class="btn btn-primary">Edit</button>
        </form>



</body>

</html>
