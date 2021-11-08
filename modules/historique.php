<?php 
if (!isset($_SESSION['idUser_list']) )
 {
  	$redirect;
 }
 elseif(!isset($_POST['search']))
 {
 	echo "<script>
					                   window.location = 'index.php';
					               </script>";
 }
 ?>
<div class="A_container">
	 <header>
		 <h3>
				<img id="logo" src="assets/image/logo.png">
				TO DO LIST
		 </h3>
		 <h4>
			Historique des taches
		</h4>
		 <nav >
		 	<a id="hist" href=""> 
		 		Historique
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
	<div class="A_bloc">
		
	 	<div class="A_Bloc_list">
	 		<h4>
	 			A faire
	 		</h4>
	 		
	 		<div class="list_container">
		 		<?php show_history($bdd,$_POST['search'],"A faire")  ?>
	 		</div>
	 	</div>
	 	<div class="A_Bloc_progress ">
	 		<h4>
	 			En cours
	 		</h4>

	 		<div class="list_container">
		 		<?php show_history($bdd,$_POST['search'],"En cours")  ?>
	 		</div>
	 		
	 	</div> 	
		<div class="A_Bloc_done">
		 	<h4>
		 		Terminé
		 	</h4>
		 	<div class="list_container">
		 		<?php show_history($bdd,$_POST['search'],"Terminé")  ?>
	 		</div>
		</div>
	</div>

	
</div>

