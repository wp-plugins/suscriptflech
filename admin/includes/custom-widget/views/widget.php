<?php
extract($args, EXTR_SKIP);
$widget_string = $before_widget;
extract($args, EXTR_SKIP);
$title = apply_filters('widget_title', $instance['title']);


echo $before_title . $title . $after_title;
?>
<form name="wp_id_suscriptflech" onsubmit="return false">
    <div>
        <p class="form_fx">
            <span class="fx_input">
                <?php              
                $border_input = get_options_page('border_input');
                $color_fondo = get_options_page('color_fondo');
                $color_texto_input = get_options_page('color_input_texto');
                if($color_fondo == '#'){$color_fondo = '';};
                if($color_texto_input == '#'){$color_texto_input = '';};
                
                ?>
                <input <?php if(!empty($border_input) or (!empty($color_fondo)) or (!empty($color_texto_input))):?>style="<?php if(!empty($color_texto_input)):?>color:<?php echo $color_texto_input; ?>;<?php endif;?><?php if(!empty($color_fondo)):?>background-color: <?php echo $color_fondo; ?>;<?php endif;?>-<?php if(!empty($border_input)):?>webkit-border-radius: <?php echo $border_input;?>;-moz-border-radius: <?php echo $border_input;?>;border-radius: <?php echo $border_input;?>;<?php endif;?>"<?php endif;?> name="wp_email_sucriptflech" id="wp_email_sucriptflech" type="email"  class="regular-text form-control" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" placeholder="E-mail" autocomplete="off">
                 <img id="carga" style="display:none" src="<?php echo plugins_url('suscriptflech/public/assets/images/cargando.png'); ?>">
                <input type="hidden" name="ajax_fx_suscriptflech" value="<?php echo wp_create_nonce('ajax_suscriptflech_options_nonce'); ?>">
               
            </span> 
            <span id="humano"><input type="checkbox" id="checkbox" name="checkbox"> Sí, soy humano*</span> 
            
            <?php 
                $color_boton = get_options_page('color_boton');
                $border_boton = get_options_page('border_boton');
                $color_texto = get_options_page('color_texto');
                if(empty($border_boton)){$border_boton = '4px';}
                if($color_boton == '#'){$color_boton = '#428bca';}
                if($color_texto == '#'){$color_texto = '#ffffff';}
            ?>
            
            <input class="boton_suscriptflech" style="background-color: <?php echo $color_boton; ?>;color: <?php echo $color_texto;?>;-webkit-border-radius: <?php echo $border_boton;?>;-moz-border-radius: <?php echo $border_boton;?>;border-radius: <?php echo $border_boton;?>;" name="botonsuscripcion" type="submit" value="Enviar" onclick="suscripcion(wp_email_sucriptflech.value,ajax_fx_suscriptflech.value);" /> </p>  
    </div>
    <div class="exito1" id="exito1">
        
        <?php
        $texto1 = get_options_page('ok_email');
        if(empty($texto1)):?>
        Se ha enviado un mensaje de confirmación; por favor, haga clic en el enlace de confirmación para verificar su suscripción.
        <?php else:
            echo $texto1;
        endif;?>
    </div>
    <div class="aviso1" id="aviso1">
         <?php
        $texto2 = get_options_page('existe_email');
        if(empty($texto2)):?>
            El email ya esta en uso
          <?php else:
            echo $texto2;
        endif;?>
    </div>
    <div class="aviso2" id="aviso2">
         <?php
        $texto3 = get_options_page('fallo_email');
        if(empty($texto3)):?>
            Tienes que escribir un email
          <?php else:
            echo $texto3;
        endif;?>
    </div>

</form>