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

		<div class="col-xs-12"> 
			<h2>
<?php $i = 0;
echo $_GET['nom'];?>
			</h2>

		<div id="desc" class="col-xs-6">
			<?php $reponse = $bdd->query('SELECT * FROM `productCatGroup`, `productCat` WHERE productCatGroup.label ="'.$_GET['cat'].'" and productCat.label ="'.$_GET['nom'].'" ');

					while ($donnees = $reponse->fetch()) 
					{
							if (empty($donnees['comment']) && empty($donnees['comment_haut_pdt'])){
								echo "/!\ Il n'y a pas d'informations à afficher pour ce produit. /!\\";
							}
							echo $donnees['comment_haut_pdt'];
							echo $donnees['comment'];
							$i = $donnees['id'];
					} 
			?> 	
		</div>
		

		<?php if ($_GET['cat'] != "Autres produits" && $_GET['cat'] != "Services internet") { ?>
		<div id="comm"class=" col-xs-offset-1 col-xs-5">
			<h4> Commander le produit </h4> 
			<form action="panier.php" method="post">
				<?php $reponse1 = $bdd->query('SELECT DISTINCT finition.label FROM finition, product where product.productCatId ="'.$i.'" and finition.id = product.finition'); 
				$donnees1 = $reponse1->fetch();
				if (isset($donnees1['label']))
				{
				?>
				<fieldset class="form-group">
    			<label for="choix"> Finition </label>
				<select class="form-control" name="choix1">
				<?php while ($donnees1 = $reponse1->fetch()) 
					{
							echo "<option value='".$donnees1['label']."'>".$donnees1['label']."</option>";
					}  
				?>
				</select>
				</fieldset>
				<?php } ?>
				<?php $reponse2 = $bdd->query('SELECT DISTINCT qte FROM product WHERE productCatId="'.$i.'"');
				?> 
				<fieldset class="form-group">
    			<label for="choix"> Quantité </label>
				<select class="form-control" name="choix2">
				<?php while ($donnees2 = $reponse2->fetch()) 
					{
						
							echo "<option value='".$donnees2['qte']."'>".$donnees2['qte']."</option>";
					}  
				?>
				</select>
  				</fieldset>
				<?php $reponse3 = $bdd->query('SELECT DISTINCT impression.label FROM impression, product where product.productCatId ="'.$i.'" and impression.id = product.impression'); 
				$donnees3 = $reponse3->fetch();
				if (isset($donnees3['label']))
				{
				?>
				<fieldset class="form-group">
    			<label for="choix"> Impression </label>
				<select class="form-control" name="choix3">
				<?php while ($donnees3 = $reponse3->fetch()) 
					{
							echo "<option value='".$donnees3['label']."'>".$donnees3['label']."</option>";
					}  
				?>
				</select>
				</fieldset>
				<?php } ?>
				<p>Prix total : <?php echo ""; ?> €</p>
				<button type="submit"  class="btn btn-default"> Envoyer au panier</button>
			</form>
		</div>
		<?php } ?>
		</div>
	</section>

<?php include 'footer.php'; ?>
