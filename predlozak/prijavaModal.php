<div class="reveal" id="exampleModal1" data-reveal>
	<form method="post" action="autoriziraj.php">
    	<label>Korisnik
    		<input type="text" required="required" name="korisnik"
    		placeholder="pero" value="<?php echo isset($_GET["korisnik"]) ? $_GET["korisnik"] : "" ?>"/>
    		</label>
    		
    	<label>Lozinka
    		<input type="password" required="required" name="lozinka" />
    		</label>
    		
    		<input class="expanded button" type="submit" name="autorizacija" value="Prijava" />
    		
    		
    </form>
	<button class="close-button" data-close aria-label="Close modal" type="button">
		<span aria-hidden="true">&times;</span>
	</button>
</div>