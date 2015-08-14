<?php

class Custom_PostTypes {

	function __construct() {
		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );
		add_action( 'init', array( $this, 'register_post_types' ), 0 );
	}

	function activate() {
		$this->register_post_types();
		$this->register_taxonomies();
		flush_rewrite_rules();
	}

	function deactivate() {
		flush_rewrite_rules();
	}

	function register_post_types() {
		if ( isset( $_REQUEST['action'] ) && 'deactivate' == $_REQUEST['action'] ) {
			return;
		}
		


		register_post_type('emails', array(
			'public' 				=> true,
			'publicly_queryable' 	=> true,
			'exclude_from_search'	=> false,
			'show_ui' 				=> true, 
			'show_in_menu' 			=> true,
			'query_var' 			=> true,
			'rewrite' 				=> array( 'slug' => 'emails', 'with_front' => TRUE ),
			'capability_type' 		=> 'post',
			'has_archive' 			=> 'emails', 
			'hierarchical' 			=> false,
			'menu_position' 		=> 99,
			'menu_icon'				=> 'dashicons-email-alt',
			'supports' => array(
					//'title',
					//'editor',
					//'author',
					//'thumbnail',
					//'excerpt',
					// 'trackbacks',
					// 'comments',
					'revisions'
				),
			'labels' => array(
					'name' 					=> 'Suscriptores',
					'singular_name' 		=> 'Suscriptores',
					'add_new' 				=> 'Añadir',
					'all_items'				=> 'Todos',
					'add_new_item' 			=> 'Añadir nuevo',
					'edit_item' 			=> 'Editar',
					'new_item' 				=> 'Nuevo',
					'view_item' 			=> 'Ver',
					'search_items' 			=> 'Buscar',
					'not_found' 			=> 'Item no encontrado',
					'not_found_in_trash' 	=> 'Item no encontrado', 
					'parent_item_colon' 	=> '',
					'menu_name' 			=> 'Suscriptores'
				)
			)
		);
		
	}
	
}

class Custom_Taxonomies {

	function __construct() {
		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ), 0 );
	}

	function activate() {
		$this->register_post_types();
		$this->register_taxonomies();
		flush_rewrite_rules();
	}

	function deactivate() {
		flush_rewrite_rules();
	}

	function register_taxonomies() {
		if ( isset( $_REQUEST['action'] ) && 'deactivate' == $_REQUEST['action'] ) {
			return;
		}
		$this->define_columns(); // Llamamos a la funcion para las columnas
	}	
	// Creamos las columnas personalizadas
	function define_columns() {


		add_filter('manage_edit-emails_columns', function( $columns ){

			return array(
				'email'     =>  __('Email', 'fx'),
				'activo'  		=>  __('Estado suscripción', 'fx'),
				'acciones'      =>  __('Acciones', 'fx')
			);
		});

		add_action('manage_emails_posts_custom_column', function( $columns, $post_id ){

			switch ( $columns ) {
                            

				case 'email':
						
					echo '<span class="dashicons dashicons-email-alt"></span> ' . get_post_meta($post_id, '_email', true);


				break;

				case 'activo':

					$estado = get_post_meta($post_id, '_activo', true);

					if($estado == "1") {
						
						echo '<span class="activado">Activada</span>';

					}else{
						echo '<span class="desactivado">Desactivada</span>';
					}

				break;


				case 'acciones':
						
					edit_post_link('Editar Email');

					echo '<a class="borrar" href="'.get_delete_post_link($post_id,'', true).'">Borrar Email</a>';

				break;

				default:

				break;
			}

		},10,2);


	}
}

?>