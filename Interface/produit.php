<!DOCTYPE html>
<html lang="fr">

<?php include 'header.php'; ?>

	<section class="row">

		<div class="col-xs-12"> 
			<h2>
<?php echo $_GET['nom'];?>
			</h2>
		</div>

		<div id="desc" class="col-xs-6">
			<h4> détails du produit </h4>	
		</div>

		<div id="comm"class=" col-xs-offset-1 col-xs-5">
			<h4> Commander le produit </h4>
			<form>
				<fieldset class="form-group">
    			<label for="choix">Choix taille / type / quantité</label>
				<select class="form-control" id="choix">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				</select>
  				</fieldset>
				<button type="submit" class="btn btn-default"> Envoyer au panier</button>
			</form>
		</div>

	</section>

<?php include 'footer.php'; ?>
