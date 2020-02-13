<?php
  include("userfunction.php");
 $domain = $_SERVER['HTTP_HOST'];
echo $domain."/itservice/";

echo "<br/><a href='http://".$domain."/itservice/'>xxxxxxxxxxxxxx</a>";
echo "<br/><a href='http://".$_SERVER['HTTP_HOST']."/itservice/'>CLICK MORE DETAIL</a>";

   sendMail();

?>