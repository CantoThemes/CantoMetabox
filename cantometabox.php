<?php
/**
 * Plugin Name: CantoMetabox
 * Plugin URI: https://www.cantothemes.com
 * Description: A metabox addon for CantoFramework
 * Version: 1.0-alpha
 * Author: CantoThemes
 * Author URI: https://www.cantothemes.com
 */
 

define('CTFMB_PATH', plugin_dir_path( __FILE__ ));
define('CTFMB_URL', plugin_dir_url( __FILE__ ));
 
if(!class_exists('CTF_Addon')){
    return;
}
 
class CantoMetabox extends CTF_Addon{


    function __construct(){
        parent::__construct();

        $this->include_files();
        
        $this->add_js_tmlp_to_admin_footer();


        
    }

    private function include_files()
    {
    	require_once CTFMB_PATH .'register.metabox.class.php';
    }


    public static function add_metabox( $metabox = array() )
    {
    	if (!count($metabox) && empty($metabox)) {
    		return;
    	}
    	$metabox_obj = new CTF_RMB($metabox);

    	return $metabox_obj;
    }


    
}

$ctf_metabox = new CantoMetabox();



//////////////////////////////////////////////////////////////////////
/////////////////////////// MetaBox Test /////////////////////////////
//////////////////////////////////////////////////////////////////////

$test_metabox = array(
	'id' => 'test_meta_box',
	'title' => __('Test Metabox', 'textdomain'),
	'post_type' => array('post', 'page'),
	'options' => array(
		array(
			'id' => 'test_text_input',
			'label'    => __( 'Text Input', 'mytheme' ),
			'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
			'type'     => 'text',
			'default' => 'Test Text',
		)
	)
);

CantoMetabox::add_metabox($test_metabox);