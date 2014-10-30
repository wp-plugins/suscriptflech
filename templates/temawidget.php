<form name="wp_id_suscriptflech">
		<img id="carga" style="display:none" src="<?php echo plugins_url('suscriptflech/imagenes/cargando.gif'); ?>" widht="16" height="16">
				<div>
				<p><input name="wp_email_sucriptflech" id="wp_email_sucriptflech" type="email"  class="regular-text form-control" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" placeholder="E-mail" required> 

				<input class="boton" name="botonsuscripcion" value="Enviar" onclick="suscripcion(wp_email_sucriptflech.value);" /> </p>
				</div>
			
			<div class="exito1" id="exito1">Se ha suscripto corectamente, gracias</div>
			<div class="aviso1" id="aviso1">El email ya esta en uso</div>
			<div class="aviso3" id="aviso3"></div>
			<div class="aviso2" id="aviso2">Tienes que escribir un email</div>
	
</form>