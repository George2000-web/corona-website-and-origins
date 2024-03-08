<?php
	
	
$host = 'localhost';
$user= 'root';
$password = 'kimani6512';
$dbname= 'corona';

//set DSN

$dsn = 'mysql:host='. $host .';dbname='.$dbname;

//create pdo instance
$pdo = new PDO($dsn,$user,$password);

$pdoOptions = array(

	PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_EMULATE_PREPARES => false
);

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
?>


