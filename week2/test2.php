<?php 
//  include 'includeSession.php';

//  echo $age;




 
$file = fopen('test.txt',"r") or die('unable to open file');   // (echo   ,   exit();)

//  echo   nl2br(fread($file,filesize('test.txt')));
 
     while(!feof($file)){
        $data = explode('|',fgets($file));
             
        print_r($data);
   
     }

fclose($file);

 ?>