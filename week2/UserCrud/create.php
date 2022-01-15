<?php

require 'dbConnection.php';
require 'helpers.php';


# Fetch Department Data ..... 
$sql = "select * from departments";
$dep_op  = mysqli_query($con,$sql); 





if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = Clean($_POST['name']);
    $email = Clean($_POST['email']);
    $password = Clean($_POST['password']); 
    $dep_id   = $_POST['dep_id'];
    $phone    = Clean($_POST['phone']);
    $address    = Clean($_POST['address']);


  
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


    # Validate Password
    if (!Validate($password,1)) {
        $errors['Password'] = 'Field Required';
    } elseif (!Validate($password,3)) {
        $errors['Password'] = 'Length must be >= 6 chars';
    }

    
     # Validate dep_id .... 
     if (!Validate($dep_id,1)) {
        $errors['Department'] = 'Field Required';
    }elseif(!Validate($dep_id,4)){
        $errors['Department'] = "Invalid Id";
    }



     # Validate phone .... 
     if (!Validate($phone,1)) {
        $errors['Phone'] = 'Field Required';
    } elseif (!Validate($phone,5)) {
        $errors['phone'] = 'Length must be = 11  number';
    }



      # Validate Address ...
      if (!Validate($address,1)) {
        $errors['Address'] = 'Field Required';
    }



    if (count($errors) > 0) {
       
        # Print Errors 
        Errors($errors);

    } else {
        $password = md5($password);

        # store data ......
        $sql = "insert into users (name,email,password,dep_id) values ('$name','$email','$password',$dep_id)";

        $op = mysqli_query($con, $sql);

        if ($op) {

            # insert Contact Data .... 
            $std_id = mysqli_insert_id($con);
            $sql = "insert into contactinfo (phone,address,student_id) values ('$phone','$address',$std_id)";

            $op = mysqli_query($con, $sql);

            if($op){
                $Message = 'Raw Inserted';

            }else{
                $Message = 'Error try Again : ' . mysqli_error($con);
            }
        } else {
            $Message = 'Error try Again : ' . mysqli_error($con);
        }

        $_SESSION['Message'] = $Message;
        header('Location: index.php');
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Register</h2>


        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby=""
                    placeholder="Enter Name">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail">Email address</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="email"
                    aria-describedby="emailHelp" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">New Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                    placeholder="Password">
            </div>



            <div class="form-group">
                <label for="exampleInputPassword">Department</label>
                <select  class="form-control" id="exampleInputPassword1" name="dep_id">

                  <?php 
                       while($data = mysqli_fetch_assoc($dep_op)){
                    ?>

                        <option  value="<?php echo $data['id'];?>"><?php echo $data['title'];?></option>

                   <?php } ?> 

            </select>    
            </div>


            <div class="form-group">
                <label for="exampleInputName">Phone</label>
                <input type="text" class="form-control" id="exampleInputName" name="phone" aria-describedby=""
                    placeholder="Enter phone">
            </div>


            <div class="form-group">
                <label for="exampleInputName">address</label>
                <input type="text" class="form-control" id="exampleInputName" name="address" aria-describedby=""
                    placeholder="Enter Address">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>



</body>

</html>
