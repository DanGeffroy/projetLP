<?php

	function delTree($dir) { 
	   $files = array_diff(scandir($dir), array('.','..')); 
	    foreach ($files as $file) { 
	      (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
	    } 
	    return rmdir($dir); 
	}

	$numCommandeP = $_POST ['numCommandeP'];
	$idProduit = $_POST ['idProduit'];
	$localisation = "../commandes";
	if (is_dir($localisation."/".$numCommandeP."/".$idProduit)) {
    	delTree($localisation."/".$numCommandeP."/".$idProduit);
	}else{
		return false;
	}
    

?>
