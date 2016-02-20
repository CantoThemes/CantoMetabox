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

        add_action('admin_head', array($this,'print_window_js_var'));
        // add_action( 'admin_enqueue_scripts', array($this,'load_admin_js') );
        
    }
    
    public function print_window_js_var (){
        ?>
        <script type="text/javascript">
            window.ctfmb_opts = {};
            window.ctfmb_values = {};
    		window.ctf_fa_icons = <?php echo CTF_Help::get_icons_json(); ?>;
    	</script>
        <?php
    }
    
    function load_admin_js(){
        parent::load_admin_js();
        wp_enqueue_script( 'ctf-metabox', CTFMB_URL . 'assets/js/metabox.js', array('jquery', 'underscore', 'ctf-core-script'), '1.0', true );
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
		),
        array(
            'id' => 'test_text_input3',
            'label'    => __( 'Text Input 3', 'mytheme' ),
            'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
            'type'     => 'text',
            'default' => 'Test Text',
        ),
        array(
            'id' => 'test_text_input4',
            'label'    => __( 'Text Input 4', 'mytheme' ),
            'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
            'type'     => 'text',
            'default' => 'Test Text',
        )
	)
);

CantoMetabox::add_metabox($test_metabox);

$test_metabox2 = array(
	'id' => 'test_meta_box2',
	'title' => __('Test Metabox2', 'textdomain'),
	'post_type' => array('post', 'page'),
	'options' => array(
		array(
			'id' => 'ctfif_tst_text',
			'label'    => __( 'Text Input', 'mytheme' ),
			'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
			'type'     => 'text',
			'default' => 'Test Text',
		),
		array(
			'id' => 'ctfif_tst_textarea',
			'label'    => __( 'Textarea Input', 'mytheme' ),
			'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
			'type'     => 'textarea',
			'default' => 'Test Text',
		),
		array(
			'id' => 'ctfif_tst_select',
			'label'    => __( 'Select Input', 'mytheme' ),
			'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
			'type'     => 'select',
			'default' => 'test2',
			'choices' => array(
				'test1' => 'Test 1',
				'test2' => 'Test 2',
				'test3' => 'Test 3'
			)
		),
        array(
            'id' => 'ctfif_tst_number',
            'label'    => __( 'Number Input', 'mytheme' ),
            'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
            'type'     => 'number',
            'default' => '50',
        ),
        array(
            'id' => 'ctfif_tst_Icon',
            'label'    => __( 'Icon Input', 'mytheme' ),
            'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
            'type'     => 'icon',
            'default' => 'fa fa-cogs',
        ),
        array(
            'id' => 'ctfif_tst_color',
            'label'    => __( 'Color Input', 'mytheme' ),
            'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
            'type'     => 'color',
            'default' => '#ff00ff',
        ),
        array(
            'id' => 'ctfif_tst_rgba',
            'label'    => __( 'RGBA Color Input', 'mytheme' ),
            'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
            'type'     => 'color_rgba',
            'default' => 'rgba(25,56,58,0.65)',
        )
	)
);

CantoMetabox::add_metabox($test_metabox2);