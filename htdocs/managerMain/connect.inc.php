<?php


$mySQL_host = 'localhost';
$mySQL_username = 'root'; // Mysql username 
$mySQL_pass = ''; // Mysql password 
$db_name = 'myPizzaPalace'; // Database name 
  
// Connect to server and select databse.
try 
{
    $db = new PDO("mysql:host=$mySQL_host;dbname=$db_name", $mySQL_username, $mySQL_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch(PDOException $e)
{
    echo 'Connection failed: '.$e->getMessage().'<br><br>';
    echo $e->getTraceAsString();
}

?>