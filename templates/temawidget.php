<form name="wp_id_suscriptflech">
		<div id="loading"></div>
		<div class="exito1" id="exito1">Se ha suscripto corectamente, gracias</div>
			<div class="aviso1" id="aviso1">El email ya esta en uso</div>
			<div class="aviso2" id="aviso2">Tienes que escribir un email</div><br>
				<div>
				<p><input name="wp_email_sucriptflech" id="wp_email_sucriptflech" type="email"  class="regular-text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" placeholder="E-mail" required/> 

				<input class="boton" name="botonsuscripcion" value="Enviar" onclick="suscripcion(wp_email_sucriptflech.value);" /> </p>
				</div>
	
</form>