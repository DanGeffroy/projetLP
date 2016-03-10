<?php

	function delTree($dir) { 
	   $files = array_diff(scandir($dir), array('.','..')); 
	    foreach ($files as $file) { 
	      (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
	    } 
	    return rmdir($dir); 
	}

	$numCommandeDelete = $_POST ['numCommandeDelete'];
	$localisation = "../commandes";
	if (is_dir($localisation."/".$numCommandeDelete)) {
    	delTree($localisation."/".$numCommandeDelete);
	}else{
		return false;
	}
    

?>
