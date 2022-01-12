<?php

require '../UserCrud/dbConnection.php';
require '../UserCrud/helpers.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $key = Clean($_POST['key']);


    $errors = [];

    # Validate Name ...
    if (!Validate($key,1)) {
        $errors['Key'] = 'Field Required';
    }


    if (count($errors) > 0) {
       
        # Print Errors 
        Errors($errors);

    } else {
        

    $sql = "select * from users where name like '%$key%' or email like '%$key%'";
    $op = mysqli_query($con,$sql);

    if(mysqli_num_rows($op) > 0){
        // display data .... 
      
        while($data = mysqli_fetch_assoc($op)){
            echo '* '.$data['id'].' || '.$data['name'].'<br>';
        }


    }else{
        echo 'No Result found';
    }


    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Search</h2>


        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

            <div class="form-group">
                <label for="exampleInputName">Search Key</label>
                <input type="text" class="form-control" id="exampleInputName" name="key" aria-describedby=""
                    placeholder="Search Here .... ">
            </div>



            <button type="submit" class="btn btn-primary">GO!!</button>
        </form>



</body>

</html>
