<?php
include_once 'konfiguracija.php';


if(isset($_POST["autorizacija"])){
	
	
	$izraz=$veza->prepare("select * from operater 
	where email=:korisnik and lozinka=md5(:lozinka)");
	unset($_POST["autorizacija"]);
	$izraz->execute($_POST);
	$operater = $izraz->fetch(PDO::FETCH_OBJ);
	
	if($operater!=null){
		$_SESSION["autoriziran"]=$operater;
		header("location: privatno/index.php");
		exit;
	}
	else {
		header("location: autorizacija.php?korisnik=".$_POST["korisnik"]);
	}
}
