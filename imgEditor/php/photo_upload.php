<?php
	$numCommande = "leNumDeCommande";
	$nomImage = time();
	$localisation = "../commandes";

	mkdir($localisation);

	$data = $_POST ['photo']; 
	list ( $type , $data )  = explode ( ';' , $data ); 
	list (, $data )       = explode ( ',' , $data ); 
	$data = base64_decode ( $data );

	mkdir($localisation."/".$numCommande);

	$name = $localisation."/".$numCommande."/".$nomImage.'.png';
	
	file_put_contents($name, $data);


?>