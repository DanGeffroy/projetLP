<!DOCTYPE html>
<html lang="fr">

<?php include 'header.php'; ?>
	<section class="row">
		<div id="panier" class="col-xs-12"> 
			<h2>Mon Panier</h2>
			<?php 
			if (isset($_POST['choix1'])){
					echo "Finition : ".$_POST['choix1']."<br/>";
				}
			if (isset($_POST['choix2'])){
					echo "Quantité : ".$_POST['choix2']."<br/>";
				}
			if (isset($_POST['choix3'])){
					echo "Impression : ".$_POST['choix3']."<br/>";
				}
			?>
		</div>
	</section>
<?php include 'footer.php'; ?>
