<?php 
define('SITEURL', 'http://localhost/messydb/');
$connection=mysqli_connect("localhost:3308","root","","messydb");
if(!$connection)
  die("could not connect" .mysqli_connect_error());

?>