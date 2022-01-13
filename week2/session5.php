<?php
/*
# Relations ...... 
1:1 
1:m (m:1)
m:m 


** students    [name , email ,password , gender]   , [phone , whatsapp, address , parent phone]


  Student Table 
  id  name  email password  gender     dep_id        
  1    x    x@x    123       male        2           


 Conatct Info 
id phone    whatsapp address  parentphone     std_id
1   010xx   015xx     alex     012xxx         1





student     contact  
1            1
1            1
===============
1            1 

############################################################################################################



# dep 
id   title   code      
1     CS     cs12      
2     IT     it01
3     IS     is45


# SUb-dep 
id   title    dep_id
1     AI        1 
2     ML        1


std    sub-dep 
1         m 
m         1
============
m          m 



dep    sub-dep 
1        m 
1        1
============
1        m 




students   departments 
1               1
m               1
===================
m               1 






############################################################################################################

# Subjects 
id  Title 
1   pl1 
2   pl2 
3   AI


students   subjects 
1           m 
m           1
===============
m           m 


# Student_sub
id  std_id    sub_id      date 
1    1          3          
2    1          2 


################################################################################################################## 

# Task .... 
Hospital management system that have 3 main types of users 1-admins 2-doctors 3-Patients.
With the following data.
Admins   (name, email, password ) ,
Patients (name, email, password)  ,
Doctors  (name, email, password   , specialize(text) , gender).....
nurse (name,email,password)

Doctors have appointments(day , from , to) and
Patients can reserve these appointments.
Note : doctor can accept or refuse reservations.
Requirments : create a database structure.



# Admin 
id    name    email    password 
1     admin   a@a     123 


# Patients 
id   name    email    password    
1    patient  p@p     456


# Nurse 
id   name    email    password    
1    nurse   p@p     456




# Doctors 
id name    email  password  specialize  gender 
1   doctor  d@d    456       x           male 


############################################################################################

 # roles .... 
 id  title 
 1    Admin 
 2    Patient 
 3    doctors 
 4    nurse


 # Users 
 id   name    email    password    role_id 
 1    patient  p@p     456          2
 2    admin    a@a     123          1
 3    doctor   d@d     456          3
 4    nurse    n@n     456          4
 5    patient2 p2@p    56           2 
 

 # doctor-more-info
  id     specialize  gender      doc_id
  1        x          male       3


 roles    users 
 1         m 
 1         1
===============
1          m 






# Appointments 
id   day   from   to    doc_id    
1    sun    3:00  3:30   3           




doctor     appointment 
1              M 
1              1 
==================
1              M




patinet     appointments 
1              M 
m              1 
================= 
m              M 



# Reservation 
id      pat_id    app_id     date    status 
1        1          1         1/13     0
2        5          1         1/20     0 






*/



?>