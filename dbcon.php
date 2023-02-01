<?php

$dbhost = "localhost";
$dbuser = "root"; 
$dbpass = ""; 
$dbname = "db_shop"; 

if(!$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("failed to connect");
}