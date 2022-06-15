<?php
$hostname="localhost";
$steve_user="root";
$steve_password="";
$steve_project="crud_101";

//creating a system connection //
$connect= mysqli_connect($hostname,$steve_user,$steve_password,$steve_project);

//check if the connection in the system is in the correct order//
if (!$connect){
    die("am sorry the connection has failed :" .mysqli_connect_error());
}
?>