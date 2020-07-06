<?php
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = 'root';
$DB_NAME = 'php_CRUD';

try{
   $link = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
   if ($link->connect_error) { 
      die('Connect Error ('.$link->connect_errno.') '.$link->connect_error);
   }
   $link->set_charset('utf8');
}
catch(Exception $error){
   echo $error->getMessage();
}

//showing php errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//print what is saved
print_r($_GET);
echo '<br>';
print_r($_POST);
echo '<br>';