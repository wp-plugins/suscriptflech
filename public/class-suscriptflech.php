<?php

class Suscriptflech {

    /**
     * Plugin version, used for cache-busting of style and script file references.
     *
     * @since   1.0.0
     *
     * @var     string
     */
    const VERSION = '2.0.0';

    /**
     * SUSCRIPTFLECH - Rename "plugin-name" to the name of your plugin
     *
     * Unique identifier for your plugin.
     *
     *
     * The variable name is used as the text domain when internationalizing strings
     * of text. Its value should match the Text Domain file header in the main
     * plugin file.
     *
     * @since    1.0.0
     *
     * @var      string
     */
    protected $plugin_slug = 'plugin-suscriptflech';

    /**
     * Instance of this class.
     *
     * @since    1.0.0
     *
     * @var      object
     */
    protected static $instance = null;

    /**
     * Initialize the plugin by setting localization and loading public scripts
     * and styles.
     *
     * @since     1.0.0
     */
    private function __construct() {

        // Load plugin text domain
        add_action('init', array($this, 'load_plugin_textdomain'));

        // Activate plugin when new blog is added
        add_action('wpmu_new_blog', array($this, 'activate_new_site'));

        // Load public-facing style sheet and JavaScript.
        add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));

        /* Define custom functionality.
         * Refer To http://codex.wordpress.org/Plugin_API#Hooks.2C_Actions_and_Filters
         */
        add_action('Suscriptflech', array($this, 'action_method_name'));
        add_filter('Suscriptflech', array($this, 'filter_method_name'));
        add_action('wp_head', array($this, 'mostrar_url_ajax'));
        add_action('wp_ajax_suscribete', array($this, 'insert_suscriflech_ajax'));
        add_action('wp_ajax_nopriv_suscribete', array($this, 'insert_suscriflech_ajax'));
        add_filter('wp_mail_from', array($this, 'email_nuevo_para_envio_correo'));
        add_filter('wp_mail_from_name', array($this, 'nombre_nuevo_para_envio_correo'));
        

        $this->register_front();
    }
    public function email_nuevo_para_envio_correo($old)
    {
        return get_bloginfo('admin_email');
    }
    public function nombre_nuevo_para_envio_correo($old)
    {
        return ucfirst(get_bloginfo('name'));
    }
    public function insert_suscriflech_ajax()
    {   
        
        if(wp_verify_nonce( $_POST['nonce'], 'ajax_suscriptflech_options_nonce' ))
        {
            $email = $_POST['email'];
            
            if(is_email($email))
            {
                //Comprobamos si existe el email en la base de datos

                $comprobar_email_bd = new WP_Query(array(
                        'post_type' => 'emails',
                        'meta_query' => array(
                            array(
                               'key' => '_email',
                               'value' => $email,
                               'compare' => '='
                            )
                         )
                    ));


               //Insertamos los datos
                if(empty($comprobar_email_bd->posts))
                {
                     $nuevo_email = array(
                        'post_status'   =>  'publish',
                        'post_type' =>  'emails'
                    );

                    $id_email = wp_insert_post($nuevo_email);

                    $desactivado = "0";
                    $cadena = substr(md5(rand()*time()),0,30);

                    add_post_meta($id_email, '_email', $email);
                    add_post_meta($id_email, '_activo', $desactivado);
                    add_post_meta($id_email, '_cadena', $cadena);

                    echo 'res ';

                    //mandamos email para la activacion
                    $mensaje_options = get_options_page('mensaje_suscript');
                    if(empty($mensaje_options))
                    {
                        $mensaje   = '<p>Se ha suscrito al Boletín de Noticias de nuestro sitio web, para activar su suscripción haga clic en el enlace de abajo:</p> 
                             <p><a href="'.site_url().'/estado-de-la-suscripcion/?cadena='.$cadena.'&email='.$id_email.'">Click aquí</a></p>';
                    }
                    else
                    {
                        $mensaje   = '<p>'.$mensaje_options.'</p> 
                             <p><a href="'.site_url().'/estado-de-la-suscripcion/?cadena='.$cadena.'&email='.$id_email.'">Click aquí</a></p>';
                    }

                     $data = array(
                        'mensaje' => $mensaje,
                        'email' => $email
                    );

                    self::send_email($data);

                }
                else
                {
                   die('1');    
                }
            }
            else{
                die('2');
            }
        }      
    }
     public static function send_email($data) {


        $template_email = self::get_template_shortcode('plantillas/email', $data);

        add_filter('wp_mail_content_type', function() {

            return 'text/html';
        });

        wp_mail($data['email'], 'Aceptar suscripcion del sitio ' . get_bloginfo('name'), $template_email);

        remove_filter('wp_mail_content_type', function() {

            return 'text/html';
        });
    }
    public function mostrar_url_ajax()
    {
        ?>
                <script>
                    var url_ajax = '<?php echo admin_url('admin-ajax.php');?>';
                </script>
        <?php
    }
    private function register_front() {
        if (!is_admin()) {
            add_action('init', array($this, 'front_listener'));
            $this->register_shortcodes();
        }
    }

    public static function front_listener() {
        // Escuchamos todas las acciones post y get
        
        if(isset($_GET['cadena']) && isset($_GET['email']))
        {
            $cadena = $_GET['cadena'] ;
            $id     = $_GET['email'];
            
            // Miramos si existe este codio 
            
            
            $existe_codigo = new WP_Query(array(
                    'post_type' => 'emails',
                    'meta_query' => array(
                        array(
                           'key' => '_cadena',
                           'value' => $cadena,
                           'compare' => '='
                        )
                     )
                ));
            
            if($existe_codigo->posts)
            {
                update_post_meta( $id, '_activo', '1', '' );
                update_post_meta( $id, '_cadena', '0', '' );
            }  
            else
            {
                wp_redirect( home_url() ); exit;
            }
        }
        
    }


    private function register_shortcodes() {
       
    }

    public static function get_template_shortcode($view, $data = null, $video = null) {

        ob_start();

        require(plugin_dir_path(__FILE__) . 'views/' . $view . '.php');

        $var = ob_get_contents();

        ob_end_clean();

        return $var;
    }

    /**
     * Return the plugin slug.
     *
     * @since    1.0.0
     *
     * @return    Plugin slug variable.
     */
    public function get_plugin_slug() {
        return $this->plugin_slug;
    }

    /**
     * Return an instance of this class.
     *
     * @since     1.0.0
     *
     * @return    object    A single instance of this class.
     */
    public static function get_instance() {

        // If the single instance hasn't been set, set it now.
        if (null == self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * Fired when the plugin is activated.
     *
     * @since    1.0.0
     *
     * @param    boolean    $network_wide    True if WPMU superadmin uses
     *                                       "Network Activate" action, false if
     *                                       WPMU is disabled or plugin is
     *                                       activated on an individual blog.
     */
    public static function activate($network_wide) {
        

        if (function_exists('is_multisite') && is_multisite()) {

            if ($network_wide) {

                // Get all blog ids
                $blog_ids = self::get_blog_ids();

                foreach ($blog_ids as $blog_id) {

                    switch_to_blog($blog_id);
                    self::single_activate();
                }

                restore_current_blog();
            } else {
                self::single_activate();
            }
        } else {
            self::single_activate();
        }
    }

    /**
     * Fired when the plugin is deactivated.
     *
     * @since    1.0.0
     *
     * @param    boolean    $network_wide    True if WPMU superadmin uses
     *                                       "Network Deactivate" action, false if
     *                                       WPMU is disabled or plugin is
     *                                       deactivated on an individual blog.
     */
    public static function deactivate($network_wide) {
        
         //Sacamos el id de la página
            
            

        if (function_exists('is_multisite') && is_multisite()) {

            if ($network_wide) {

                // Get all blog ids
                $blog_ids = self::get_blog_ids();

                foreach ($blog_ids as $blog_id) {

                    switch_to_blog($blog_id);
                    self::single_deactivate();
                }

                restore_current_blog();
            } else {
                self::single_deactivate();
            }
        } else {
            self::single_deactivate();
        }
    }

    /**
     * Fired when a new site is activated with a WPMU environment.
     *
     * @since    1.0.0
     *
     * @param    int    $blog_id    ID of the new blog.
     */
    public function activate_new_site($blog_id) {

        if (1 !== did_action('wpmu_new_blog')) {
            return;
        }

        switch_to_blog($blog_id);
        self::single_activate();
        restore_current_blog();
    }

    /**
     * Get all blog ids of blogs in the current network that are:
     * - not archived
     * - not spam
     * - not deleted
     *
     * @since    1.0.0
     *
     * @return   array|false    The blog ids, false if no matches.
     */
    private static function get_blog_ids() {

        global $wpdb;

        // get an array of blog ids
        $sql = "SELECT blog_id FROM $wpdb->blogs
			WHERE archived = '0' AND spam = '0'
			AND deleted = '0'";

        return $wpdb->get_col($sql);
    }

    /**
     * Fired for each blog when the plugin is activated.
     *
     * @since    1.0.0
     */
    private static function single_activate() {
        // SUSCRIPTFLECH: Define activation functionality here
        
        if (is_admin()){
 
            $titulo = 'Estado de la suscripción';
            $descripcion = '<span class="exito">Suscripción activada correctamente.</span>';
            $plantilla = ''; // Ej. plantilla-contacto.php. Dejar en blanco si quieres dejar la plantilla de por defecto.

            //don't change the code bellow, unless you know what you're doing

            $page_check = get_page_by_title($titulo);
            $new_page = array(
                'post_type' => 'page',
                'post_title' => $titulo,
                'post_content' => $descripcion,
                'comment_status' => 'closed',
                'post_status' => 'publish',
                'post_author' => 1,
            );

            if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                if(!empty($plantilla)){
                    update_post_meta($new_page_id, '_wp_page_template', $plantilla);
                }
            }

        }
    }

    /**
     * Fired for each blog when the plugin is deactivated.
     *
     * @since    1.0.0
     */
    private static function single_deactivate() {
        // SUSCRIPTFLECH: Define deactivation functionality here
     
            $titulo = "Estado de la suscripción";
            $page_check = get_page_by_title($titulo);
            
               wp_delete_post($page_check->ID, true);
           
    }

    /**
     * Load the plugin text domain for translation.
     *
     * @since    1.0.0
     */
    public function load_plugin_textdomain() {

        $domain = $this->plugin_slug;
        $locale = apply_filters('plugin_locale', get_locale(), $domain);

        load_textdomain($domain, trailingslashit(WP_LANG_DIR) . $domain . '/' . $domain . '-' . $locale . '.mo');
        load_plugin_textdomain($domain, FALSE, basename(plugin_dir_path(dirname(__FILE__))) . '/languages/');
    }

    /**
     * Register and enqueue public-facing style sheet.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {
        wp_enqueue_style($this->plugin_slug . '-plugin-styles', plugins_url('assets/css/public.css', __FILE__), array(), self::VERSION);
    }

    /**
     * Register and enqueues public-facing JavaScript files.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {
        wp_enqueue_script($this->plugin_slug . '-plugin-script', plugins_url('assets/js/public.js', __FILE__), array('jquery'), self::VERSION);
    }

    /**
     * NOTE:  Actions are points in the execution of a page or process
     *        lifecycle that WordPress fires.
     *
     *        Actions:    http://codex.wordpress.org/Plugin_API#Actions
     *        Reference:  http://codex.wordpress.org/Plugin_API/Action_Reference
     *
     * @since    1.0.0
     */
    public function action_method_name() {
        // SUSCRIPTFLECH: Define your action hook callback here
    }

    /**
     * NOTE:  Filters are points of execution in which WordPress modifies data
     *        before saving it or sending it to the browser.
     *
     *        Filters: http://codex.wordpress.org/Plugin_API#Filters
     *        Reference:  http://codex.wordpress.org/Plugin_API/Filter_Reference
     *
     * @since    1.0.0
     */
    public function filter_method_name() {
        // SUSCRIPTFLECH: Define your filter hook callback here
    }

}
