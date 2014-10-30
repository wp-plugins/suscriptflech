<?php 
if(!defined('WP_UNINSTALL_PLUGIN')) 
{
	exit();
}

global $wpdb;
	$tablename = $wpdb->prefix . "suscriptflech";

	if( $wpdb->get_var("SHOW TABLES LIKE '$tablename'") == $tablename)
	{
		$sql = "DROP TABLE `$tablename`;";
		$wpdb->query($sql);
	}
 ?>