<?php
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = 'root';
$DB_NAME = 'php_CRUD';
    
try{
    $dsn = 'mysql:host=' . $DB_HOST . ';dbname=' . $DB_NAME;
    $pdo = new PDO($dsn, $DB_USER, $DB_PASS);
    
    //setting default fetch mode
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    //setting errors for exceptions for try/catch
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $error){
    echo $error->getMessage();
}
finally{
    //$pdo = null;
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