<?php
// if (!empty($id_user) && (droits() == 1 || droits() == 2 || $_SESSION['id_user'] == $id_user)) {
// 	if(_SESSION['id_user'] == $id_user){
// var_dump($id_user);
	$tab = $db->query("SELECT * FROM user
	JOIN commande ON commande.id_user = user.id_user
	JOIN adresse ON adresse.id_user = user.id_user
	WHERE user.id_user =".$id_user)->fetchAll(PDO::FETCH_ASSOC);
	
	$i=0;
	if (isset($tab[0])){
		
		$nom = htmlentities($tab[0]['nom']);
		$prenom = htmlentities($tab[0]['prenom']);
		$email = htmlentities($tab[0]['email']);
		$date_naissance = $tab[0]['date_naissance'];
		$telephone = htmlentities($tab[0]['telephone']);
		$date_naissance = $tab[$i]['date_naissance'];
		require('views/user_single.phtml');

		$i=0;
		while (isset($tab[$i])){
			$prenom_adresse = htmlentities($tab[$i]['prenom_adresse']);
			$nom_adresse = htmlentities($tab[$i]['nom_adresse']);
			$ligne1 = htmlentities($tab[$i]['ligne1']);
			$ligne2 = htmlentities($tab[$i]['ligne2']);
			$ville = htmlentities($tab[$i]['ville']);
			$code = htmlentities($tab[$i]['code']);
			$pays = htmlentities($tab[$i]['pays']);
			$i++;
			require('views/user_adresse.phtml');
		}
		require('views/user_single_end.phtml');
	}
// }
// else {
// 	$erreur = "Vous n'avez pas les droits pour afficher cette page !";
// 	require('./views/erreur.phtml');
// }
?>