<?php

$email = 'zoro@gmail.com';

if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){ 
echo "<center>Invalid email</center>"; 
}else{
echo "<center>Valid Email</center>";}  

?>