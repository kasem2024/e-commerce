<?php
$con= mysqli_connect('localhost','root','','mystore');
if(!$con)
{
  die(mysqli_error(mysqli_connect('localhost','root','','Mystore')));
  
}
?>