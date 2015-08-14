<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<?php
$plantilla = get_options_page('color_plantilla');
switch ($plantilla)
{
    case 'gris':
        $azul = '#24CAFE';
        $azul_titulo = '#24CAFE';
        $color_texto_enlace = '#666';
        $blanco = '#fff';
        $fondo = '#f1f1f1';
        $colorLetra = '#666';
        $borde = '#ddd';
    break;
    case 'rosa':
        $azul = '#fff';
        $azul_titulo = '#fff';
        $color_texto_enlace = '#d41ed6';
        $blanco = '#d41ed6';
        $fondo = '#f1f1f1';
        $colorLetra = '#fff';
        $borde = '#fff';
    break;
    case 'azul':
        $azul = '#fff';
        $azul_titulo = '#fff';
        $color_texto_enlace = '#24CAFE';
        $blanco = '#24CAFE';
        $fondo = '#f1f1f1';
        $colorLetra = '#fff';
        $borde = '#fff';
    break;
    case 'verde':
        $azul = '#fff';
        $azul_titulo = '#fff';
        $color_texto_enlace = '#019930';
        $blanco = '#019930';
        $fondo = '#f1f1f1';
        $colorLetra = '#fff';
        $borde = '#fff';
    break;
    case 'negro':
        $azul = '#fff';
        $azul_titulo = '#fff';
        $color_texto_enlace = '#000';
        $blanco = '#000';
        $fondo = '#f1f1f1';
        $colorLetra = '#fff';
        $borde = '#fff';
    break;
    case 'amarillo':
        $azul = '#fff';
        $azul_titulo = '#fff';
        $color_texto_enlace = '#e5dd00';
        $blanco = '#e5dd00';
        $fondo = '#f1f1f1';
        $colorLetra = '#fff';
        $borde = '#fff';
    break;
}
?>
<body style="background-color: <?php echo $fondo;?>; color: <?php echo $colorLetra; ?>;font-family: 'Roboto', sans-serif;margin:0;">
    <div class="main" style="margin: 0 0.5em;">
<div class="header" style="margin:5px auto;max-width:480px;background:<?php echo $blanco;?>;border:1px solid <?php echo $borde; ?>;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;">
    <span class="logo" style="float: left;padding: 0.5em 1em;">
        <?php $logo = get_options_page('logo_email');
			 if(empty($logo)) :?>
        <img src="<?php echo plugins_url( 'suscriptflech/admin/assets/images/logo.jpg' ) ?>" width="80" height="80">
        <?php else:?>  
            <img src="<?php echo $logo; ?>" width="80" height="80"> Logo
        <?php endif;  ?>
    </span> <span class="azul" style="color: <?php echo $color_texto_enlace;?>;text-transform: uppercase;float: right;font-weight: bold;background-color: #e5e6e9;padding: 0.5em 1em;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;margin: 2em 1em 1em 1em;"><?php echo get_bloginfo('name');?></span>   
<div class="flot" style="clear: both;"></div>
</div>
<div class="titulo" style="margin:5px auto;max-width:480px;background:<?php echo $blanco;?>;border:1px solid <?php echo $borde; ?>;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;text-align: center;">
    <span class="titulo-post" style="font-size: 18px;color:<?php echo $azul_titulo;?>;font-weight: bold;text-transform: uppercase;margin: 0.3em 0;display: block;"><a style="text-decoration:none;color:<?php echo $azul;?>;font-weight: bold;" href="<?php echo get_permalink($post->ID);?>"><?php the_title_attribute();?></a></span>                 
</div>
<?php
$imgs = get_options_page('mostrar_imagen');
if($imgs == 'si'):?>       
<div class="imagen" style="margin:5px auto;max-width:480px;background:<?php echo $blanco;?>;border:1px solid <?php echo $borde; ?>;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;">
    <?php
    $imagen = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
    $ruta_imagen = $imagen[0];
    ?>
    <span class="imagen-url"><img style="display: block;max-width: 100%;height: auto;margin: 1em auto;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;" src="<?php echo $ruta_imagen;?>" width="450"></span>
</div>
<?php endif;?>        
        
        
<div class="cuerpo" style="margin:5px auto;max-width:480px;background:<?php echo $blanco;?>;border:1px solid <?php echo $borde; ?>;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;">
    <span class="texto-cuerpo" style="font-size: 15px;text-align: justify;margin: 1em 1em;display: block;"><?php echo nl2br(substr($post->post_content, 0, 250));?> ...</span>
</div>
<div class="leer" style="margin:5px auto;max-width:480px;background:<?php echo $blanco;?>;border:1px solid <?php echo $borde; ?>;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;">
    <span class="leer-mas"><a style="margin:1em;display: block;background-color: <?php echo $azul;?>;padding: 1em 2em;text-align: center;color:<?php echo $color_texto_enlace;?>;text-decoration: none;text-transform: uppercase;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;-webkit-transition: all .2s ease;-moz-transition: all .2s ease;-ms-transition: all .2s ease;-o-transition: all .2s ease;transition: all .2s ease;" href="<?php echo get_permalink($post->ID);?>">Leer más</a></span>
</div>
        
<?php 

$face = get_options_page('icono_facebook');
$twi  = get_options_page('icono_twetter');
$go   = get_options_page('icono_google');
$pi   = get_options_page('icono_pinterest');
$yot    = get_options_page('icono_youtube');

if( !empty($face) or !empty($twi) or !empty($go) or !empty($pi) or !empty($yot) ):?> 
        
        
        
<div class="redsocial" style="margin:5px auto;max-width:480px;background:<?php echo $blanco;?>;border:1px solid <?php echo $borde; ?>;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;">
    <span class="redes-sociales" style="text-align: center;display: block;">
        <?php if(!empty($face)):?>
        <span class="facebook"><a href="<?php echo $face;?>"><img style="padding-top: 0.5em;" src="<?php echo plugins_url( 'suscriptflech/admin/assets/images/facebook.png' ) ?>" alt=""></a></span> 
        <?php endif;?>
        <?php if(!empty($twi)):?>
        <span class="twitter"><a href="<?php echo $twi;?>"><img style="padding-top: 0.5em;" src="<?php echo plugins_url( 'suscriptflech/admin/assets/images/twitter.png' ) ?>" alt=""></a></span> 
        <?php endif;?>
        <?php if(!empty($go)):?>
        <span class="google"><a href="<?php echo $go;?>"><img style="padding-top: 0.5em;" src="<?php echo plugins_url( 'suscriptflech/admin/assets/images/google.png' ) ?>" alt=""></a></span>
        <?php endif;?>
        <?php if(!empty($pi)):?>
        <span class="pinterest"><a href="<?php echo $pi;?>"><img style="padding-top: 0.5em;" src="<?php echo plugins_url( 'suscriptflech/admin/assets/images/pinterest.png' ) ?>" alt=""></a></span>
        <?php endif;?>
        <?php if(!empty($yot)):?>
        <span class="youtube"><a href="<?php echo $yot;?>"><img style="padding-top: 0.5em;" src="<?php echo plugins_url( 'suscriptflech/admin/assets/images/youtube.png' ) ?>" alt=""></a></span></span>
        <?php endif;?>
</div>
<?php endif;?>
        

<div class="footer" style="margin:5px auto;max-width:480px;background:<?php echo $blanco;?>;border:1px solid <?php echo $borde; ?>;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;text-align: center;font-size: 10px;">
    <span class="texto-footer" style="margin: 0.3em 0;display: block;">Copyright © <?php echo get_bloginfo('name');?></span>
</div>
</div>
</body>
</html>