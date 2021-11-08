
<?php
if (isset($_SESSION['idUser_list']))
 {
  	$redirect;
 }?>
	<div class="C_container">
		<form class="C_bloc" method="POST" action="" >
	        <h2 class="C_login">
	           Login
	        </h2>
	        <div class="C_input">
		        <div class="C_info">
		        	<input type="text" name="C_user" id="C_user" class="C_user" placeholder="username"/>
		            <br/>
		            <i class="fa fa-user"></i>
		        </div><br/>
		        <div class="C_info">
		            <input type="password" name="C_mdp" id="mdp" class="C_mdp" placeholder="password"/><br/>
		            <i class="fa fa-lock"></i>
		        </div><br/><br/>
	        </div>
	        <input type="submit" name="submit" id="C_submit" value="Envoyer" class="C_submit">
	        <div class="C_erreur">
	         	<?php  if(isset($C_erreur))
		          {
		          	echo $C_erreur;
		          }?>
	        </div>
	    </form>

	    <div id="C_lien">
	    	Pas encore inscrit ? <a href="index.php?module=inscription"> S'inscrire </a>
	    </div>
	</div>