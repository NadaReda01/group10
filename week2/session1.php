<?php 
    
//    include 'includeSessio.php';
      // require 'includeSession.php';
    // $CookieName  = "student";
    // $CookieValue = "Root Account";  
    // // 86400 1 day 
    //  setcookie($CookieName,$CookieValue,time()-86400,'/');


    // //   unset($_COOKIE['student']);
      //    $_COOKIE['student'] = "test";
     //     ECHO $_COOKIE['student'];




    //  $_SESSION['user'] = "User Account";


    //  echo $age.'<br>';

    //  echo 'test Account';


//  text file 

//     $file = fopen('test.txt',"a") or die('unable to open file');

//     $message = "php course \n";
    
//     fwrite($file, $message);

//     $message = "c#  course\n";
    
//     fwrite($file, $message);

//    fclose($file);


 
// $file = fopen('test1.txt',"r") or die('unable to open file');   // (echo   ,   exit();)

// //  echo   nl2br(fread($file,filesize('test.txt')));
 
//     //  while(!feof($file)){
//     //      echo    fgets($file).'<br>';
//     //  }
//     while(!feof($file)){
//          echo    fgetc($file).'<br>';
//      }

// fclose($file);




//    echo  nl2br("test \nuser");



# date & time ..... 
   
// date(format,timestamp);


//   echo date('d.m.y  h:i:s a');


  /*
    d     01-31 
    D     mon,sat 
    m     01 ,12
    M     jan 
    y     22,21  
    Y     2022,2021 

    h   01-12 
    H   00-23 
    i   00-59
    s   00-59
    a   am,pm
    A   AM,PM 
  
  */



  // echo time();    // 1641732265     


  // echo date('d.m.y  h:i:s a',1641732265);   //09.01.22 01:44:25 pm


    //  echo  strtotime('09/25/22 01:44:25 pm');  // 1664624665       m/d/y

   // echo date('d.m.y  h:i:s a',1664106265);     // 25.09.22 01:44:25 pm




 //  echo date('d.m.y  h:i:s a');

    //  echo  date_default_timezone_get();

    date_default_timezone_set('africa/cairo');

    echo date('d.m.y  h:i:s a');



 function Clean($input){

      //  $input =  trim($input);
      //  $input =  strip_tags($input);
      //  $input =  stripslashes($input);
      //  return $input;

      return  trim(strip_tags(stripslashes($input)));
    }



if($_SERVER['REQUEST_METHOD'] == "POST"){



  $name     = Clean($_POST['name']); 
  $email    = Clean($_POST['email']);
  $password = Clean($_POST['password']);



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
      
      # store data ...... 


   $file = fopen('test.txt',"a") or die('unable to open file');

    $studentData = $name."|".$email."\n";
    
    fwrite($file, $studentData);

   fclose($file);

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



</body>
</html>

