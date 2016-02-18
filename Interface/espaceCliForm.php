<!DOCTYPE html>
<html lang="fr">
<?php include 'header.php'; ?>
	<section class="row">

		<div class="col-xs-12"> 
			<h2>Espace client</h2>

		<div id="client" class="col-xs-5"> 
			<h4> Je suis déjà client </h4>		
		<form>
			<fieldset class="form-group">
				<label for="exampleInputEmail1">Adresse email</label>
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Entrer l'adresse email">
			</fieldset>
			<fieldset class="form-group">
				<label for="exampleInputPassword1">Mot de passe</label>
				<input type="password" class="form-control" id="exampleInputPassword1" placeholder="mot de passe">
			</fieldset>
			<button type="submit" class="btn btn-default">Continuer</button>
		</form>
		</div>

		<div id="nonCli"class="col-xs-offset-1 col-xs-5">
			<h4> Je souhaite créer mon compte </h4>
			<form>
				<fieldset class="form-group">
					<label for="exampleInputEmail1">Adresse email</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Entrer l'adresse email">
				</fieldset>
				<fieldset class="form-group">
				    <label for="exampleInputPassword1">Mot de passe</label>
				    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="mot de passe">
				</fieldset>
					<fieldset class="form-group">
				    <label for="exampleInputPassword1">Répéter</label>
				    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="mot de passe">
				</fieldset>
				  
				<button type="submit" class="btn btn-default">Continuer</button>
			</form>
		</div>

		</div>	
	</section>
<?php include 'footer.php'; ?>
