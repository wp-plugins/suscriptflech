<?php 
/*
Plugin Name: Suscriptflech
Plugin URI: http://www.webandroid.es
Description: Plugin para la suscripción del sitio web manda por correo el último post insertado a todos Sus usuarios suscritos.
Version: 0.9
Author: Félix Luján
Author URI: http://www.webandroid.es
License: GPL2
*/

register_activation_hook(__FILE__, 'fx_create_tables_suscriptflech');

function fx_create_tables_suscriptflech ()
{
	global $wpdb;
	$tablename = $wpdb->prefix . "suscriptflech";

	if($wpdb->get_var("SHOW TABLES LIKE ".$tablename) != $tablename)
	{
		$sql = "CREATE TABLE ".$tablename." (

						id INTEGER(11) UNSIGNED AUTO_INCREMENT,
						email VARCHAR(255) NOT NULL,
						PRIMARY KEY (id))";

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);

		$opciones = array();
		
		$opciones['nombre_imagen_suscriptflech'] =  plugins_url('suscriptflech/imagenes/logo2.png');
		$opciones['ultima_actualizacion'] = time();

		update_option('wp_imagen_susciptflech', $opciones);
	}
}

register_deactivation_hook(__FILE__, 'fx_desactivate_tables_suscriptflech');

function fx_desactivate_tables_suscriptflech()
{
	error_log('plugin deactivated');
}

add_action('admin_menu', 'Administrador_Menu_Backend');

add_action('widgets_init', 'fx_widget_init');

add_action('admin_head', 'Estilos_backend_Suscriptflech');

add_action('publish_post', 'email_usuarios');

add_action('wp_ajax_suscribete', 'insert_suscriptflech');

add_action('wp_head', 'mostrar_function_ajax_sucriptflech');

add_filter('wp_mail_from', 'email_nuevo');

add_filter('wp_mail_from_name', 'nombre_nuevo');

if (isset($_GET['page']) && $_GET['page'] == 'suscriptores') {

	add_action('admin_print_scripts', 'my_admin_scripts');
	add_action('admin_print_styles', 'my_admin_styles');
}

wp_register_script('codigo', plugins_url('/js/codigo.js', __FILE__), array('jquery'));
wp_enqueue_script('jquery');
wp_enqueue_script('codigo');

$url_plugin = WP_PLUGIN_URL . '/suscriptflech';

$opciones = array();

function Administrador_Menu_Backend()
{
	add_options_page('Listado Suscriptores', 'Suscriptores Admin', 'manage_options', 'suscriptores', 'Estilo_backend_Suscriptores_Admin');
}

function Estilos_backend_Suscriptflech()
{

	wp_enqueue_style('Estilos_backend_Suscriptflech', plugins_url('suscriptflech/css/wp_suscriptfech_estilos.css'));
}

function Estilo_backend_Suscriptores_Admin()
{
	if(!current_user_can('manage_options'))
	{
		wp_die('Usted no tiene los permisos necesarios para acceder a la página');
	}

	global $wpdb;
	global $opciones;


	if($_POST['imgflech'] && $_POST['imgflech'] = "si")
	{
		
		$opciones['nombre_imagen_suscriptflech'] =  $_POST['imagen'];
		$opciones['ultima_actualizacion'] = time();

		update_option('wp_imagen_susciptflech', $opciones);

		$valor = 4;
	}

	$opciones = get_option('wp_imagen_susciptflech');

	if($opciones != '')
	{
		$imagen_flech = $opciones['nombre_imagen_suscriptflech'];
	}

	$tablename = $wpdb->prefix . "suscriptflech";

	if($_GET['dato'])
	{

		$wpdb->query($wpdb->prepare("DELETE FROM ".$tablename." WHERE id=%d", $_GET['dato']));
		$valor = 3;
	}

	if($_POST['wp_suscriptflech_email_add'] && $_POST['wp_suscriptflech_email_add'] != "")
	{
		$email_add_suscriptflech_backend =  esc_html($_POST['wp_add_suscritflech_email']);

		$result = $wpdb->get_results($wpdb->prepare("SELECT id FROM ".$tablename." WHERE email=%s", $email_add_suscriptflech_backend));

			if(sizeof($result)==""){

		$wpdb->query( $wpdb->prepare("INSERT INTO ".$tablename." (email) VALUES (%s) ",$email_add_suscriptflech_backend));
		         $valor = 1;
		    }else{
				 $valor = 2;	
			}
    }
    $datos = $wpdb->get_results("SELECT id, email FROM ".$tablename." ORDER BY id DESC");

	require('templates/backend.php');
}

function fx_widget_init()
{
	register_widget(Suscriptflech_Widget);
}

class Suscriptflech_Widget extends WP_Widget
{
	function Suscriptflech_Widget()
	{
		$widger_options = array(
				'classname' => 'fx_widget',
				'description' => 'Formulario de suscripcion'
			);
		$this->WP_Widget('fx_id', 'Formulario de Suscripcion', $widger_options);
	}

	function form($instance)
	{
		$defaults = array('title' => 'Formulario de suscripción');
		$instance = wp_parse_args((array) $instance, $defaults);

		$title = esc_attr($instance['title']);
		echo '<p>Title <input class="widefat" name="'.$this->get_field_name('title').'" type="text" value="'.$title.'"</p>';
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}
	function  widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);

		echo $before_widget;
		echo $before_title.$title.$after_title;


		require('templates/temawidget.php');
		echo $after_widget;
	}
}

function email_nuevo($old) {
 	return get_bloginfo( 'admin_email' );
}

function nombre_nuevo($old) {
	 return ucfirst(get_bloginfo( 'name' ));
}
function email_usuarios($post_id)  {

   global $wpdb;
   global $opciones;

   $opciones = get_option('wp_imagen_susciptflech');

	if($opciones != '')
	{
		$imagen_flech = $opciones['nombre_imagen_suscriptflech'];
	}

    $site_title = get_bloginfo( 'name' );
    $emailmio = get_bloginfo( 'admin_email' );   
 
    if( ( $_POST['post_status'] == 'publish' ) && ( $_POST['original_post_status'] != 'publish' ) ) 
    {

        $post = get_post($post_id);
        $author = get_userdata($post->post_author);
        $tablename = $wpdb->prefix . "suscriptflech";
	    $user = $wpdb->get_results("SELECT email FROM ".$tablename."");
	    foreach ($user as $user)
	    {

	        $author_email = $user->email;

	        $email_subject = "Novedades de ".$author->display_name;
	        ob_start();
	        
	        require('templates/emailmandar.php');
	        $message = ob_get_contents();
	        ob_end_clean();

	        wp_mail( $author_email, $email_subject, $message, 'Content-type: text/html' );
   		}
    }
}
function my_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', WP_PLUGIN_URL .'/suscriptflech/js/script.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
}

function my_admin_styles() {
	wp_enqueue_style('thickbox');
}

function insert_suscriptflech()
{
		 global $wpdb;
		    
			$wp_email_suscriptflech = esc_html($_POST['email']);
			if($wp_email_suscriptflech !="")
			{
			   

			$tablename = $wpdb->prefix . "suscriptflech";
		    $result = $wpdb->get_results($wpdb->prepare("SELECT id FROM ".$tablename." WHERE email=%s", $wp_email_suscriptflech));

	                if(sizeof($result)==0)

						{
							    $wpdb->query( $wpdb->prepare("INSERT INTO ".$tablename." (email) VALUES (%s)", $wp_email_suscriptflech));
								echo '0';
					        }else{
							 	echo '1';	
						}
	        }else {

	        	echo '2';
	        }
}
function mostrar_function_ajax_sucriptflech()
{
	?>
	<script>
	var url_ajax = '<?php echo admin_url('admin-ajax.php'); ?>';
	</script>
	<?php
}

function carga_estilos_theme()
{
  wp_register_style( 'estilos', plugins_url('suscriptflech/css/estilos.css'));

  wp_enqueue_style( 'estilos' );
}
add_action('wp_print_styles', 'carga_estilos_theme');
?>