<?php

session_start();




if($_SERVER["SERVER_NAME"]==="localhost"){
	$putanjaAPP="/zimskazadaca2/";
	$server="localhost";
	$imeBaze="igra";
	$korisnik="edunova";
	$lozinka="edunova";
}else{
	$putanjaAPP="/";
	$server="sql207.byethost15.com";
	$imeBaze="b15_19207069_igra";
	$korisnik="b15_19207069";
	$lozinka="yomya1998.";
}


$veza = new PDO(
	"mysql:host=" . $server . ";dbname=" . $imeBaze,
	$korisnik,
	$lozinka,
	array(
		PDO::ATTR_EMULATE_PREPARES=> false,
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET utf8",
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
	)
);






