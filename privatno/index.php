<?php
include_once '../konfiguracija.php';
if(!isset($_SESSION["autoriziran"])){
	header("location: ../odjava.php");
}
?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
	<head>
		<?php
		include_once '../predlozak/head.php';
		?>
	</head>
	<body>
		<?php
		include_once '../predlozak/izbornik.php';
		?>
		
		

<div id="container" style="min-width: 410px; height: 500px; margin: 0 auto"></div>
<script>
$(function () {
    Highcharts.chart('container', {
        title: {
            text: 'Daily Average Log-ins',
            x: -20 //center
        },
        subtitle: {
            text: ,
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: ''
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Tokyo',
            data: [3000, 2000, 1000, 2000, 3000, 4000, 2000, 1200, 2333, 1833, 1329, 9236]
        }, {
            name: 'New York',
            data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
        }, {
            name: 'Berlin',
            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
        }, {
            name: 'London',
            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
        }]
    });
});
</script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
		

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
	include_once "../predlozak/skripta.php";
		
		?>
		
	</body>
</html>
