<?php 
if (!isset($_SESSION['idUser_list']))
 {
  	$redirect;
 }
 ?>
<div class="A_container">
	 <header>
		 <h3>
				<img id="logo" src="assets/image/logo.png">
				TO DO LIST
		 </h3>
		 <nav >
		 	<a id="hist" href=""> 
		 		Historique
		 	</a>
		 	<a id="off" href="index.php?module=deconnexion">
		 		Cloturer
		 	</a>
		 </nav>
	 </header>
	 	<form method="POST" action="index.php?module=Historique">
				<div class="fo_search">
					<select name="search">
						<option selected disabled>
							choisir une date
						</option>
						<?php lis_date($bdd,$_SESSION['idUser_list']);  ?>
					</select>
					<button class ="fo_btsearch">
						<i id="fo_btsearch" class="fa fa-search" aria-hidden="true"></i>
					</button>

				</div>
		</form>
	 	<input type="text" hidden id="id_U" value= <?php  echo $_SESSION['idUser_list'];?>>
	<div class="A_bloc">
	 	<div class="A_Bloc_list">
	 		<h4>
	 			A faire
	 		</h4>
	 		<div class="list_container">
	 			<?php show_tache($bdd,"A faire"); ?>
	 		</div>
	 		
	 		<div class="new_tache">
	 			+ nouvelle tache
	 		</div>
	 	</div>
	 	<div class="A_Bloc_progress ">
	 		<h4>
	 			En Cours
	 		</h4>
	 		<div class="list_container">
	 			<?php show_tache($bdd,"En cours"); ?>
	 		</div>
	 		<div class="new_tache">
	 			+ nouvelle tache
	 		</div>
	 	</div> 	
		<div class="A_Bloc_done">
		 		<h4>
		 			Terminé
		 		</h4>
		 		<div class="list_container">
	 			<?php show_tache($bdd,"Terminé"); ?>
		 		</div>
		 		<div class="new_tache">
		 			+ nouvelle tache
		 		</div>
		</div>
	</div>

	<form class="fo_form_forum" method="POST" action= "">				
		<label for="T_nom" >Nom de la tache</label><br/>
		<input type="text" name="Nom" id="T_nom" required ><br/> 
		<label>Etat</label><br/>
		<select name="Etat" id="T_etat"> 
				<option>A faire</option>
				<option>En cours</option>
				<option>Terminé</option>
		</select> <br/>
		<div class="fo_new_cat">
			<label for="fo_titre_s_cat" >Fin</label><br/>
			<input type="date"  name="jour" class="fo_date" id="jour"> 
			<input type="time" name="heure" class="fo_date" id="heure">
		</div>
		<label for="T_desc" >Description</label><br/>
		<textarea name="Description" id="T_desc" required></textarea> <br/> <br/>
		<div id="fo_send_box">
			<button id="fo_send_bt" type="submit"> créer</button>
			<button id="fo_reset_bt" type="reset"> Annuler</button>
		</div>

	</form>	

	<?php
		if(isset($_POST['Nom']))
		{
			if(tache_add($bdd))
			{
				unset ($_POST['Nom']);
				unset ($_POST['Etat']);
				unset ($_POST['heure']);
				unset( $_POST['jour']);
				unset ($_POST['Description']);
			}
			else
			{
				echo "<script>
					        alert('vérifiez vos données');
				      </script>";
			}
		}
	  ?>
</div>

