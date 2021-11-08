<?php  

include "modele1.php";
if (isset($_POST['id_T']) and isset($_POST['action'])) 
{
	$update=$bdd->prepare('UPDATE `tache` SET `ETAT`="'.$_POST['action'].'" WHERE IDTACHE='.$_POST['id_T'].' ');
	$update->execute();
}
if(isset($_POST['idUser']))
{
	historique($bdd,$_POST['idUser']);
}