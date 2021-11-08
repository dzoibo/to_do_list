<?php 
if (isset($_SESSION['idUser_list']))
 {
  	$redirect;
 }?>
	<div class="C_container">
		<form class="C_bloc" method="POST">
	        <h2 class="C_login">
	           Inscription
	        </h2>
	        <div class="C_input" >
		        <div class="C_info" class="C_input_inscription">
		        	<input type="text" name="i_user" id="i_user" class="C_user" placeholder="username"/>
		            <br/>
		        </div><br/>
		        <div class="C_info" class="i_input_inscription">
		        	<input type="email" name="i_mail" id="i_mail" class="C_user" placeholder="email"/>
		            <br/>
		        </div><br/>
		        <div class="C_info" class="C_input_inscription">
		        	<input type="password" name="i_mdp" id="i_mdp" class="C_user" placeholder="password"/>
		            <br/>
		        </div><br/>
		        <div class="C_info" class="C_input_inscription">
		        	<input type="password" name="i_mdp_confirm" id="i_mdp_confirm" class="C_user" placeholder="confirmer password"/>
		            <br/>
		        </div><br/>
	        </div>
	        <input type="submit" name="i_password2" id="i_submit" value="S'inscrire" class="C_submit">
	        <div class="C_erreur" id="i_erreur">
	          	<?php  if(isset($i_erreur))
		          {
		          	echo $i_erreur;
		          }?>
	        </div>
	    </form>
	</div>