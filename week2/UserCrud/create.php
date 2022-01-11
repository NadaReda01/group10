<?php

require 'dbConnection.php';

function Clean($input)
{
    return trim(strip_tags(stripslashes($input)));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = Clean($_POST['name']);
    $email = Clean($_POST['email']);
    $password = Clean($_POST['password']);

    $errors = [];

    # Validate Name ...
    if (empty($name)) {
        $errors['Name'] = 'Field Required';
    }

    # Validate Email
    if (empty($email)) {
        $errors['Email'] = 'Field Required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['Email'] = 'Invalid Email';
    }

    # Validate Password
    if (empty($password)) {
        $errors['Password'] = 'Field Required';
    } elseif (strlen($password) < 6) {
        $errors['Password'] = 'Length must be >= 6 chars';
    }

    if (count($errors) > 0) {
        foreach ($errors as $key => $value) {
            # code...
            echo '* ' . $key . ' : ' . $value . '<br>';
        }
    } else {
        $password = md5($password);

        # store data ......
        $sql = "insert into users (name,email,password) values ('$name','$email','$password')";

        $op = mysqli_query($con, $sql);

        if ($op) {
            $Message = 'Raw Inserted';
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
                <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                    aria-describedby="emailHelp" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">New Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                    placeholder="Password">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>



</body>

</html>
