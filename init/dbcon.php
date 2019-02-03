<?php

require_once __DIR__.'/../config/config.php';

try {
	
     $dbcon =  new PDO("mysql:host=".DBHOST."; dbname=".DBNAME.";", DBUSER, DBPASS);
     $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     //echo "Connected............!!!";

    } catch (PDOException $e) {

     die("Connection failed............???");
     exit();	
}


