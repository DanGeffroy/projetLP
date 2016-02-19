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

	$deformOK = fctdeformimage(815,1122,'','','../commandes/'.$numCommande."/",$nomImage.'.png');
	if ($deformOK == 1) { 
		return error_reporting(); 
	}else{
		return error_reporting();
	}

?>

<?php
	function fctdeformimage($W_fin, $H_fin, $rep_Dst, $img_Dst, $rep_Src, $img_Src) {
	   // Si certains paramètres ont pour valeur '' :
	   if ($rep_Dst == '') { $rep_Dst = $rep_Src; } // (même répertoire)
	   if ($img_Dst == '') { $img_Dst = $img_Src; } // (même nom)
	 // ------------------------
	 // si le fichier existe dans le répertoire, on continue...
	  if (file_exists($rep_Src.$img_Src) && ($W_fin!=0 || $H_fin!=0)) { 
	   // ------------------------
	   // extensions acceptées : 
		$extension_Allowed = 'jpg,jpeg,png';	// (sans espaces)
	   // extension fichier Source
		$extension_Src = strtolower(pathinfo($img_Src,PATHINFO_EXTENSION));
	   // ------------------------
	   // extension OK ? on continue ...
	   if(in_array($extension_Src, explode(',', $extension_Allowed))) {
	      // ------------------------
	      // récupération des dimensions de l'image Src
	      $img_size = getimagesize($rep_Src.$img_Src);
	      $W_Src = $img_size[0]; // largeur
	      $H_Src = $img_size[1]; // hauteur
	      // ------------------------
	      // condition de redimensionnement et dimensions de l'image finale
	      // Dans TOUS les cas : redimensionnement non-proportionnel
	      // ------------------------
	      // A- LARGEUR ET HAUTEUR fixes
	      if ($W_fin != 0 && $H_fin != 0) {
	         $W = $W_fin;
	         $H = $H_fin;
	      }
	      // ------------------------
	      // B- HAUTEUR fixe
	      if ($W_fin == 0 && $H_fin != 0) {
	         $W = $W_Src;
	         $H = $H_fin;
	      }
	      // ------------------------
	      // C- LARGEUR fixe
	      if ($W_fin != 0 && $H_fin == 0) {
	         $W = $W_fin;
	         $H = $H_Src;
	      }
	      // ------------------------------------------------
	      // REDIMENSIONNEMENT
	      // ------------------------------------------------
	      // creation de la ressource-image "Src" en fonction de l extension
	      switch($extension_Src) {
	      case 'jpg':
	      case 'jpeg':
	        $Ress_Src = imagecreatefromjpeg($rep_Src.$img_Src);
	        break;
	      case 'png':
	        $Ress_Src = imagecreatefrompng($rep_Src.$img_Src);
	        break;
	      }
	      // ------------------------
	      // creation d une ressource-image "Dst" aux dimensions finales
	      // fond noir (par defaut)
	      switch($extension_Src) {
	      case 'jpg':
	      case 'jpeg':
	        $Ress_Dst = imagecreatetruecolor($W,$H);
	        break;
	      case 'png':
	        $Ress_Dst = imagecreatetruecolor($W,$H);
	        // fond transparent (pour les png avec transparence)
	        imagesavealpha($Ress_Dst, true);
	        $trans_color = imagecolorallocatealpha($Ress_Dst, 0, 0, 0, 127);
	        imagefill($Ress_Dst, 0, 0, $trans_color);
	        break;
	      }
	      // ------------------------------------------------
	      // REDIMENSIONNEMENT (copie, redimensionne, re-echantillonne)
	      imagecopyresampled($Ress_Dst, $Ress_Src, 0, 0, 0, 0, $W, $H, $W_Src, $H_Src); 
	      // ------------------------------------------------
	      // ENREGISTREMENT dans le repertoire (avec la fonction appropriee)
	      switch ($extension_Src) { 
	      case 'jpg':
	      case 'jpeg':
	        imagejpeg ($Ress_Dst, $rep_Dst.$img_Dst);
	        break;
	      case 'png':
	        imagepng ($Ress_Dst, $rep_Dst.$img_Dst);
	        break;
	      }
	      // ------------------------
	      // liberation des ressources-image
	      imagedestroy ($Ress_Src);
	      imagedestroy ($Ress_Dst);
	      // ------------------------
	   }
	 }
	 // ---------------------------------------------------
	 // retourne : true si le redimensionnement et l'enregistrement ont bien eu lieu, sinon false
	 if (file_exists($rep_Dst.$img_Dst)) { return true; }
	 else { return false; }
	 // ---------------------------------------------------
	};
?>