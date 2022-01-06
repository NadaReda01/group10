<?php 
session_start();


//$students = ['y','x','z'];
// print_r($students);
// sort($students);
// rsort($students);

// print_r($students);



 //$student = ["name" => "test" ,"calss" => 'a' ,"age" => 20 , 'gpa' => 3.4];

   // asort($student);     //Array ( [calss] => a [name] => test [gpa] => 3.4 [age] => 20 )
   //   arsort($student);   //Array ( [age] => 20 [gpa] => 3.4 [name] => test [calss] => a )
   
   // ksort($student);     // Array ( [age] => 20 [calss] => a [gpa] => 3.4 [name] => test )
  //    krsort($student);  // Array ( [name] => test [gpa] => 3.4 [calss] => a [age] => 20 )

   //    print_r($student);    


/*** 
 *  SUPERGLOBALS .... 
 * 
 * ***/


 //   1-  $GLOBALS[]
 
//  $age = 20;
//  $name = "Root";

//  function getAge(){
//     //  global $age;

//      echo $GLOBALS['name'].'||'.$GLOBALS['age'];
//  }

//   getAge();



// 2- $_SERVER[]

/*
    echo  $_SERVER['PHP_SELF'];
    echo  $_SERVER['SERVER_NAME'];
    echo  $_SERVER['SCRIPT_NAME'];
    echo  $_SERVER['HTTP_HOST'];
    echo  $_SERVER['HTTP_USER_AGENT'];
    echo  $_SERVER['QUERY_STRING'];
    echo  $_SERVER['SERVER_PORT'];
    echo  $_SERVER['REMOTE_ADDR'];   // 127.0.0.1
    echo  $_SERVER['SERVER_ADDR'];
    echo  $_SERVER['REQUEST_METHOD'];
*/


/*
 * * REQUEST METHODS .......  
*/
   
# GET VS POST .....  
   
# $_POST[]     - post 
# $_GET[]      - get 
# $_REQUEST[]  

// print_r( count($_POST));
//   echo $_POST['name'];

  //  test\root    /    \   


 function Clean($input){

      //  $input =  trim($input);
      //  $input =  strip_tags($input);
      //  $input =  stripslashes($input);
      //  return $input;

      return  trim(strip_tags(stripslashes($input)));
    }



if($_SERVER['REQUEST_METHOD'] == "POST"){


    // echo $_REQUEST['name'];

    // if(isset($_POST['register'])){

    // echo $_POST['name'].'||'.$_POST['email'].'||'.$_POST['password'];

    // }else{
    //     echo $_POST['title'];
    // }


  $name     = Clean($_POST['name']); 
  $email    = Clean($_POST['email']);
  $password = Clean($_POST['password']);

//    var_dump($name);
//    exit();

   $errors = [];

  # Validate Name ... 
   if(empty($name)){
      $errors['Name'] = "Field Required";
  }

  # Validate Email 
  if(empty($email)){
      $errors['Email'] = "Field Required";
  }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $errors['Email'] = "Invalid Email";
  }

  # Validate Password 
  if(empty($password)){
      $errors['Password'] = "Field Required";
  }elseif(strlen($password) < 6){
    $errors['Password'] = "Length must be >= 6 chars";
  }


   if(count($errors) > 0){
       foreach ($errors as $key => $value) {
           # code...
           echo '* '.$key.' : '.$value.'<br>';
       }
   }else{
      
      $_SESSION['name']  = $name;
      $_SESSION['email'] = $email;
      

     $_SESSION['user'] = ["name" => $name , "email" => $email];

      echo 'Data Saved In Session';


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
 
 
 
  <form   action="<?php  echo  $_SERVER['PHP_SELF'];?>"  method="post">
 
   <input type="hidden"   value="1" name="register">
  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" id="exampleInputName"  required name="name" aria-describedby="" placeholder="Enter Name">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail">Email address</label>
    <input type="email"   class="form-control" id="exampleInputEmail1" required name="email" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword">New Password</label>
    <input type="password"   class="form-control" id="exampleInputPassword1" required name="password" placeholder="Password">
  </div>
 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>






 <a href="http://localhost/group10/action.php?id=20130299">User Details</a>


</body>
</html>

