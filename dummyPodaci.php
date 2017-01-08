<?php




for($i=1;$i<1200;$i++){
	$sifra = "00000000000" . $i;
	$sifra=substr($sifra, count($sifra)-11);
	echo "
	values ('" . $sifra . "','klasa " . $i . "', 'rasa" . $i . "','talenti " . $i . "', 'racun" . $i . "'),<br />";
}









