<?php 
/*
* Auther : Tauseed Zaman
*/

$host = "localhost";
$username = "root";
$password = "";

$db = "testPHP";

$conn = mysqli_connect($host, $username, $password) or die('connection error');

// create database if not esits
// $query = "create database if not exists `chatapp`";

// mysqli_query($conn,$query) or die("con't create database");

$query = "USE $db";

mysqli_query($conn,$query) or die(" database dones not selected");


$query="CREATE TABLE IF NOT EXISTS `users` ( 
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT , 
	`email` VARCHAR(255) NOT NULL , 
	`username` VARCHAR(255) NOT NULL , 
	`password` VARCHAR(255) NOT NULL , 
	`created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP , 
	`updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP , 
	PRIMARY KEY (`id`)) ENGINE = InnoDB";
mysqli_query($conn, $query) or die("con't create users table". mysqli_error($conn));


		$query = "CREATE TABLE IF NOT EXISTS `phonesDirectory` ( 
			`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT , 
			`name` VARCHAR(100) NOT NULL , 
			`phone` VARCHAR(25) NOT NULL , 
			`created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP , 
			`updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP , 
			PRIMARY KEY (`id`)) ENGINE = InnoDB";
		
		mysqli_query($conn, $query) or die("con't create phonesDirectory table". mysqli_error($conn));
 ?>