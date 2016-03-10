<!DOCTYPE html>
<html lang="fr">

<?php
try
{
	$bdd = new PDO('mysql:host=infoweb;dbname=impressiondirect;charset=utf8', 'lpsil-2015-impdi', 'impdirecte');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}?>

<?php include 'header.php'; ?>
	<section class="row">
		<div class="col-xs-12" id="list"> 
			<h2>Liste des produits</h2>
			<?php $reponse = $bdd->query("SELECT * FROM `productCat` where productCatGroupId = 3 AND productCat.show = 'Y' order by label");

					while ($donnees = $reponse->fetch()) 
					{
							echo "<figure><a href='produit.php?nom=".$donnees['label']."&cat=Produits'><img src='img/noimg.png' alt='image non trouvée' /><figcaption>".$donnees['label']."</figcaption></a></figure>";
					} 
			?>
		</div>
	</section>
<?php include 'footer.php'; ?>
