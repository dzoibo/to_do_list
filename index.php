<?php 
session_start();
?>
<!DOCTYPE html>
<html>
		<head>
			<link rel="stylesheet" type="text/css" href="assets/CSS/style.css">
			<link rel="stylesheet" type="text/css" href="assets/fontawesome-free-5.15.1-web/css/all.css">
		    <meta name="viewport" content="width-device-width, initial-scale=1.0">
		    <script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
			<script type="text/javascript" src="assets/js/Connexion.js"></script>
			<script type="text/javascript" src="assets/js/acceuil.js"></script>
		</head>
		<body>

			<?php	
				include'modeles/modele1.php';
					$redirect="<script>
					                   window.location = 'index.php';
					               </script>";
					if(!isset($_SESSION['idUser_list']))
					{
						
						if (isset($_POST['C_user']) and isset($_POST['C_mdp']))
					 	{
					 		$correct=verification($bdd);
					 		if($correct)
					 		{
					 			$_SESSION['idUser_list']= $correct;
					 			echo $redirect;
					 		}
					 		else
					 		{
					 			$C_erreur='nom d\'utilisateur ou mot de passe incorect'; 
					 		}
					 		;
					 	}
					 	if (isset($_POST['i_user']) and isset($_POST['i_mdp'])  and isset($_POST['i_mail'])) 
					 	{
					 		$inscrit=inscription($bdd);
					 		if($inscrit)
					 		{
					 			$_SESSION['idUser_list']= $inscrit;
					 			echo $redirect;
					 		}
					 		else
					 		{
					 			$i_erreur='Veuillez remplir correctement tout les champs'; 
					 		}
					 	}

				        
				        if (isset($_GET['module']) and ($_GET['module']='inscription'))
				        {
				        	include'modules/inscription.php';
				        	try 
				        	{
				        		unset($_POST['C_user']);
				        		unset($_POST['C_mdp']);
				        	} 
				        	catch (Exception $e) {
				        		
				        	}
				        }
				        else
				        {
				        	include 'modules/connexion.php';
				        }
			 		}
			 		else
			 		{
				 		if (isset($_GET['module'])) 
				 		{
				 			$module='modules/'.$_GET['module'];
				 			 try 
				 			 {
				 			 	include $module.'.php';
				 			 } 
				 			 catch (Exception $e)
				 			 {
				 			 	include	'modules/acceuil.php';
				 			 }
				 		}
				 		else
				 		{
				 			include	'modules/acceuil.php';
				 		}
			 		}


			 ?>


		</body>
</html>