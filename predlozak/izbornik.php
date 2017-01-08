<div data-sticky-container>
  <div class="sticky" id="example" data-sticky data-margin-top="0" style="width:100%;" data-margin-bottom="0" data-top-anchor="topAnchorExample" data-btm-anchor="bottomOfContentId:bottom">
    <nav data-magellan>
      <ul class="horizontal menu expanded">
      <li><a href="<?php echo $putanjaAPP ?>index.php">Početna</a></li>
      <li><a href="<?php echo $putanjaAPP ?>onama.php">Info</a></li>
      <?php if(isset($_SESSION["autoriziran"])): ?>
      	<li><a href="<?php echo $putanjaAPP ?>privatno/index.php">Nadzorna ploča</a></li>
      	<?php endif; ?>
      <li>
      	<?php if(isset($_SESSION["autoriziran"])): ?>
      		<a   href="<?php echo $putanjaAPP ?>odjava.php">Odjavi <?php echo $_SESSION["autoriziran"]->ime . " ". $_SESSION["autoriziran"]->prezime ?></a>
      		<?php else: ?>
      	<a  data-open="exampleModal1" href="#">Prijava</a>
      	<?php endif; ?>
      	</li>
      </ul>
    </nav>
  </div>
</div>