<?php 

function Clean($input){

     return  trim(strip_tags(stripslashes($input)));
}


  function Validate($input,$flag){

    $status = true;

     switch ($flag) {
         case 1:
             # code...
             if (empty($input)) {
                $status = false;
             }
             break;
      
        case 2: 
         # code .... 
         if (!filter_var($input, FILTER_VALIDATE_EMAIL)){
            $status = false;
         } 
          break;


        case 3: 
           #code .... 
           if (strlen($input) < 6){
               $status = false;
           }  
           break;
 

        case 4: 
         # code .... 
         if (!filter_var($input, FILTER_VALIDATE_INT)){
            $status = false;
         } 
          break;    



          case 5: 
           #code .... 
           if (strlen($input) != 11){
               $status = false;
           }  
           break;  



           case 6: 
              #code .... 
              if(!preg_match('/^[a-zA-Z\s]*$/',$input)){
                 $status = false;
              }
              break;

     }

     return $status;

  }



   function Messages($Message){
    foreach ($Message as $key => $value) {
            # code...
            echo '* ' . $key . ' : ' . $value . '<br>';
            
        }

   }



?>