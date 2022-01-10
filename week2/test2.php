<?php 
//  include 'includeSession.php';

//  echo $age;




 
$file = fopen('test.txt',"r") or die('unable to open file');   // (echo   ,   exit();)

//  echo   nl2br(fread($file,filesize('test.txt')));
 
     while(!feof($file)){
     
      $line = fgets($file);

       $data =  explode('|',$line);

       if(count($data) > 0){ 
     

              echo $line;?> 
              
             <a href="remove.php?id=<?php echo $data[0] ?>">Remove</a> <br>
        <?php  
            }
     
   
     }

fclose($file);








 ?>