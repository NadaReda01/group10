<?php 

 echo $id = $_GET['id'];


 $file = fopen('test.txt',"r") or die('unable to open file');   // (echo   ,   exit();)

//  echo   nl2br(fread($file,filesize('test.txt')));
    $finalText = '';
     while(!feof($file)){
     
      $line = fgets($file);

       $data =  explode('|',$line);

       if($data[0] == $id  ){
           continue;
       }else{
        $finalText .=$line."\n"; 
       }


     }


     echo $finalText;

fclose($file);


?>