<?php


	try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=to_do_list;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));// ce dernier paramettre permet d'afficher les erreurs SQL
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}
	 function verification($bdd)
	 {
	 	$name=$_POST['C_user'];
	 	$mdp=$_POST['C_mdp'];
	 	$select=$bdd->prepare('SELECT * FROM `utilisateur` WHERE USERNAME=:name and PASSWORD=:mdp');
		$select->bindValue(':name',$name,PDO::PARAM_INT);
		$select->bindValue(':mdp',$mdp,PDO::PARAM_STR);
		$select->execute();

		if($select->rowCount())
		{
			$max=$bdd->query('SELECT max(IDUSER) as id FROM utilisateur');
			$max=$max->fetch();
			return($max['id']);
		}
		else
		{
			return false ;
		}
	 }
	  function inscription($bdd)
	 {
	 	$name=$_POST['i_user'];
	 	$mdp=$_POST['i_mdp'];
	 	$mail=$_POST['i_mail'];
	 	$select=$bdd->prepare('INSERT INTO `utilisateur`( `USERNAME`, `EMAIL`, `PASSWORD`) VALUES (:name,:mail,:mdp);');
		$select->bindValue(':name',$name,PDO::PARAM_STR);
		$select->bindValue(':mdp',$mdp,PDO::PARAM_STR);
		$select->bindValue(':mail',$mail,PDO::PARAM_STR);
		try 
		{
			$select->execute();
			if($select->rowCount())
			{
				$max=$bdd->query('SELECT max(IDUSER) as id FROM utilisateur');
				$max=$max->fetch();
				return($max['id']);
			}
		} 
		catch (Exception $e)
		{
			return false ;	
		}

	 }
	 function tache_add($bdd)
	 {
	 	$nom=$_POST['Nom'];
	 	$Etat=$_POST['Etat'];
	 	$heure=$_POST['heure'];
	 	$jour=$_POST['jour'];
	 	$descr=$_POST['Description'];
	 	$insert=$bdd->prepare('INSERT INTO `tache`( `IDUSER`, `ETAT`,`DATECREATION`,`DATEFIN`, `TITRE`, `DESCRIPTION`) VALUES (:id,:etat,:debut,:fin,:nom,:descr)');
	 	$insert->bindValue(':nom',$nom,PDO::PARAM_STR);
	 	$insert->bindValue(':etat',$Etat,PDO::PARAM_STR);
	 	$insert->bindValue(':descr',$descr,PDO::PARAM_STR);
	 	$insert->bindValue(':debut',date("Y-m-d H:i:s"),PDO::PARAM_STR);
	 	$insert->bindValue(':fin',$jour.' '.$heure,PDO::PARAM_STR);
	 	$insert->bindValue(':id',$_SESSION['idUser_list'],PDO::PARAM_INT);

	 	try 
	 	{
	 		$insert->execute();
	 		return true;
	 	} catch (Exception $e) 
	 	{
	 		return false ;
	 	}
	 }
	function show_tache($bdd,$etat,$id_tache=false)
	{
	 	$taches=$bdd->prepare('SELECT * from tache where IDUSER= :id and ETAT= :etat');
	 	$taches->bindValue(':id',$_SESSION['idUser_list'],PDO::PARAM_INT);
	 	$taches->bindValue(':etat',$etat,PDO::PARAM_STR);
	 	$taches->execute();

	 	while($tache=$taches->fetch())
	 	{
	 		if($etat=="A faire")
	 		{
	 			$bt='<button onclick="set(\''.$tache['IDTACHE'].'\',\'1\')">
		 				Demarrer
		 			 </button>';
	 		}
	 		elseif($etat=="En cours")
	 		{
	 			$bt='<button onclick="set(\''.$tache['IDTACHE'].'\',\'2\')">
		 				Terminer
		 			 </button>';	
	 		}
	 		else
	 		{
	 			$bt="<br> <strong> Tache terminée </strong> ";
	 		}



	 echo '<div class="list" id="list_">
	 			<div class="titre">
	 				'.$tache['TITRE'].'
	 			</div>
	 			<div class="description">
	 				'.$tache['DESCRIPTION'].'
	 			</div>
	 			<div class="heure">
	 				<div>
	 					<strong class="desc_date">début:</strong> '. convert_date($tache['DATECREATION']).'
	 				</div>
	 				<div>
	 					<strong class="desc_date">fin :</strong> '. convert_date($tache['DATEFIN']).'
	 				</div>
	 			</div>	
	 			'.$bt.'
	 		</div>';
	 	}

	}
	function historique ($bdd,$id)
	{
		$hist=$bdd->prepare('INSERT INTO `historique`( `DATEHISTORIQUE`) VALUES (:date_h)');
		$hist->bindValue(':date_h',date("Y-m-d H:i:s"),PDO::PARAM_STR);
		$hist->execute();

		$max=$bdd->query('SELECT max(IDHISTORIQUE) as id FROM historique');
		$max=$max->fetch();

		$selects=$bdd->query('SELECT IDTACHE as id_T, ETAT FROM `tache` WHERE IDUSER='.$id);
		while($select=$selects->fetch())
		{
			$insert=$bdd->query('INSERT INTO `historique_has_tache`(`IDTACHE`, `IDHISTORIQUE`, `ETAT`) VALUES ('.$select['id_T'].','.$max['id'].',"'.$select['ETAT'].'")');
		}
	}

	function convert_date($date)
		{
			try 
			{
				list($total_day,$how) = explode(" ", $date);
				list($year,$month,$day)=explode("-", $total_day);
				$how=substr($how,0,-3);
				$months = array("jan", "fev", "mars", "avr", "mai", "juin",
	    		"juil", "août", "sept", "oct", "nov", "dec");

	    		return $how." ".$day."-".$months[$month-1]."-".$year;// ajouter ceci si on veut aussi afficher les heures." à ".$hour."h".$min."min"
			} 
			catch (Exception $e) 
			{
				return "erreur";
			}
				
			
				 
		} 
	function lis_date($bdd,$id)
	{
		$datas=$bdd->query('SELECT DISTINCT historique_has_tache.IDHISTORIQUE as id_his FROM historique_has_tache,tache WHERE historique_has_tache.IDTACHE=tache.IDTACHE and tache.IDUSER='.$id);

		while ($data=$datas->fetch()) 
		{
			$date_hist=$bdd->query('SELECT date(`DATEHISTORIQUE`) as jour FROM `historique` WHERE IDHISTORIQUE='.$data['id_his']);
			$date_hist=$date_hist->fetch();

			echo '<option value ="'.$data['id_his'].'">'.$date_hist['jour'].'</option>';
		}
	}

	function show_history($bdd,$id,$etat)
	{
		
		$taches=$bdd->prepare('SELECT tache.DATECREATION, tache.DATEFIN, tache.TITRE, tache.DESCRIPTION FROM `historique_has_tache`, tache WHERE tache.IDTACHE=historique_has_tache.IDTACHE and historique_has_tache.IDHISTORIQUE=:id and historique_has_tache.ETAT = :etat');
	 	$taches->bindValue(':id',$id,PDO::PARAM_INT);
	 	$taches->bindValue(':etat',$etat,PDO::PARAM_STR);
	 	$taches->execute();
	 	while($tache=$taches->fetch())
	 	{


			 echo '<div class="list" >
			 			<div class="titre">
			 				'.$tache['TITRE'].'
			 			</div>
			 			<div class="description">
			 				'.$tache['DESCRIPTION'].'
			 			</div>
			 			<div class="heure">
			 				<div>
			 					<strong class="desc_date">début:</strong> '. convert_date($tache['DATECREATION']).'
			 				</div>
			 				<div>
			 					<strong class="desc_date">fin :</strong> '. convert_date($tache['DATEFIN']).'
			 				</div>
			 			</div>	
			 			
			 		</div>';
	 	}

	}
