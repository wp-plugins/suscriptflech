<script>
	function asegura()
	{
		resultado = confirm('Seguro que deseas eliminarlo ?');
		return rc;
	}
</script>
<div class="wrap">
		<img class="logo" src="<?php echo  plugins_url('suscriptflech/imagenes/logo.png') ?>"> 
	<div id="icon-options-general" class="icon32"></div>
	<h2>Lista de suscriptores <?php bloginfo('name') ?></h2> 	
	
	<div id="poststuff">
	
		<div id="post-body" class="metabox-holder columns-2">
		
			<!-- main content -->
			<div id="post-body-content">
				
				<div class="meta-box-sortables ui-sortable">
					
					<div class="postbox">
					
						<h3><span>-- Listado ---</span></h3>
						<?php if($valor==3){echo '<span style="color:#FF0000;margin-left:15px;">El email se ha eliminado exitosamente !!!</span>';} ?>
						<div class="inside">
							
						<table class="widefat">
							<tr>
								<th class="row-title heid">Email</th>
								<th class="row-title heid">Acciones</th>
							</tr>
							<?php foreach ($datos as $dato): ?>
							<tr>
								<td class="row-title"><label for="tablecell"><?php echo $dato->email?></label></td>
								
								<td><a href="options-general.php?page=suscriptores&dato=<?php echo $dato->id?>" onclick="javascript:return asegura();"  class="btn danger">Eliminar</a></td>
							</tr>
							<?php endforeach; ?>
							
						</table>
						
						</div> <!-- .inside -->
					
					</div> <!-- .postbox -->
					
				</div> <!-- .meta-box-sortables .ui-sortable -->
				
			</div> <!-- post-body-content -->
					
			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">
				
				<div class="meta-box-sortables">
			
					<div class="postbox">
						<h3><span>Añadir Email</span></h3>
						<?php 
						if($valor == 1){ echo '<span style="color:#2011F9;margin-left:15px;">Email insertado con exito !!!</span>';}
						if($valor == 2){ echo '<span style="color:#FF0000;margin-left:15px;">El email ya esta en uso !!!</span>';}
						?>
						<div class="inside">
							<form method="post" action="" name="wp_suscriptweb_add">
								      <input type="hidden" name="wp_suscriptflech_email_add" value="add_email">
										
												<p><input name="wp_add_suscritflech_email" id="wp_add_suscritflech_email" type="email" value="<?php echo $wp_ojala_nombre_usuario ?>" class="add_em" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" placeholder="E-mail" required /></p>
									
										<p>
											<input class="button-primary" type="submit" name="wp_email_suscript_enviar" value="Insertar" /> 
										</p>
										</form>

						</div> <!-- .inside -->
						
					</div> <!-- .postbox -->
					
				</div> <!-- .meta-box-sortables -->



				<div class="meta-box-sortables">
			
					<div class="postbox">
					<h3><span>Pon tu logo</span></h3>
					<?php if($valor == 4){ echo '<span style="color:#2011F9;margin-left:15px;">Logo cambiado exitosamente !!!</span>';} ?>
						<div class="inside centrado">
						
								<img  src="<?php echo $imagen_flech; ?>" name="upload_image" id="upload_image" width="150" height="100" >	
						

								<form method="post"  name="imagen_sucriptlech" action="">
					

								<p> <input type="hidden" name="imagen" id="imagen" value=""  /></p>

								<p> <input type="hidden" name="imgflech" id="imgflech" value="si"  /></p>

                                 <p>  <input type="button" class='button-primary' id="upload_image_button" value="Subir imagen" /> 
                                
                                 <input type="submit"  class="button-primary" value="Guardar">
                                 </p>
										
                                 </form>
						</div> <!-- .inside -->
						
					</div> <!-- .postbox -->
					
				</div> <!-- .meta-box-sortables -->

				
			</div> <!-- #postbox-container-1 .postbox-container -->
			
		</div> <!-- #post-body .metabox-holder .columns-2 -->
		
		<br class="clear">
	</div> <!-- #poststuff -->
	
</div> <!-- .wrap -->