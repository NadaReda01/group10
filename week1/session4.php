<?php 
session_start();
    //    $url = "https://google/feed/";
    //    var_dump(strpos($url,'https://www.linkedin.com'));


        // testAcc@yahoo.com 

   //$str = "testyahoo.com";
      
  // var_dump(filter_var($str,FILTER_VALIDATE_EMAIL));


     //   $str = "https://google/feed/";
      
     //   var_dump(filter_var($str,FILTER_VALIDATE_URL));

     //  $age = "20test";
      
     //   var_dump(filter_var($age,FILTER_VALIDATE_INT));

     //     $status = 5;
      
        //   var_dump(filter_var($status,FILTER_VALIDATE_BOOLEAN));
    
        // $ip = 'test';

        // var_dump(filter_var($ip,FILTER_VALIDATE_IP));

        // filter_list()

        // $name = "test1234";


        // $age = "__1*&&@@#root0test";

        //  ECHO   filter_var($age,FILTER_SANITIZE_NUMBER_INT);


        // $email = "test(fci)@yahoo.com";
        // $email = filter_var($email,FILTER_SANITIZE_EMAIL);
        // var_dump(filter_var($email,FILTER_VALIDATE_EMAIL));



        //   $url = "https://www.w3schoo��ls.co�m";           
        //   var_dump(filter_var($url,FILTER_VALIDATE_URL));
        //   echo    filter_var($url,FILTER_SANITIZE_URL);


        //  $str = "<h1>test message</h1>";
        //   echo $str;
        //  echo  strip_tags($str);  // test message

         //    echo    filter_var($str,FILTER_SANITIZE_STRING);  // test message
            // echo     htmlspecialchars($str); 
             // <h1>test message</h1>
             // &lt;   h1  &gt; test message &lt; /h1 &gt; gt;

            //  $str = "                     test                                 ";

            //     echo strlen($str);


           //  $_SESSION[]



           echo $_SESSION['name'].'<br>';
           echo $_SESSION['email'];


           print_r($_SESSION['user']);

?>