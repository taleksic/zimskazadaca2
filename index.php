<?php
include_once 'konfiguracija.php';
 ?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
	<head>
		<?php
		include_once 'predlozak/head.php';
		?>
	</head>
	<body>
		<?php
		include_once 'predlozak/izbornik.php';
		?>

		<div class="row">
			<?php
			
			$poStranici=6;
			
			$izraz = $veza -> prepare("select count(sifra) from racun");
			$izraz -> execute();
			$ukupno = $izraz->fetchColumn();
			
			$ukupnoStranica=ceil($ukupno/$poStranici);
			
			
			
			if(isset($_GET["stranica"])){
				$stranica=$_GET["stranica"];
			}else{
				$stranica=1;
			}
			
			if($stranica>$ukupnoStranica){
				$stranica=1;
			}
			
			if($stranica==0){
				$stranica=$ukupnoStranica;
			}
			
			$odKuda = $stranica*$poStranici-$poStranici;
			
			

			$izraz = $veza -> prepare("
		    
			select * from racun
    		");
			
			
			$izraz -> execute(array("odKuda"=>$odKuda,"poStranici"=>$poStranici));
			$niz = $izraz -> fetchAll(PDO::FETCH_OBJ);
			foreach ($niz as $izraz) {
				include 'predlozak/stavkaGrupa.php';
			}
			
			?>
		</div>

		<ul class="pagination text-center" role="navigation" aria-label="Pagination" data-page="6" data-total="16">
			<li class="pagination-previous">
				<a href="<?php echo "?stranica=" . ($stranica-1) ?>" >Prethodna <span class="show-for-sr">stranica</span></a>
			</li>
			
			<?php 
			
			
			for($i=1;$i<=$ukupnoStranica;$i++):
			if($i==$stranica):
			 ?>
			<li class="current"><span class="show-for-sr">Vi ste na stranici</span> <?php echo $i ?></li>

			
			<?php else: ?>
			<li>
				<a href="?stranica=<?php echo $i; ?>" ><?php echo $i; ?></a>
			</li>
			
			<?php endif; ?>
			
			<?php endfor; ?>
			
			
			<li class="pagination-next">
				<a href="<?php echo "?stranica=" . ($stranica+1) ?>">Sljedeća <span class="show-for-sr">stranica</span></a>
			</li>
		</ul>

		<?php
		include_once 'predlozak/prijavaModal.php';
		?>
		<?php
		include_once 'predlozak/skripta.php';
		?>
	</body>
</html>
