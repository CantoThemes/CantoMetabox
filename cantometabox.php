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

add_action( 'init', 'ctf_addon_mb_addon', 10 );

function ctf_addon_mb_addon()
{
    require_once CTFMB_PATH .'/cantometabox.addon.class.php';
}






add_action( 'init', 'init_fun_mb_tst', 99 );

function init_fun_mb_tst()
{
    if (class_exists('CantoMetabox')) {

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
                    'id' => 'ctfif_tst_email',
                    'label'    => __( 'Email Input', 'mytheme' ),
                    'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
                    'type'     => 'email',
                    'default' => 'example@gmail.com',
                ),
                array(
                    'id' => 'ctfif_tst_textarea',
                    'label'    => __( 'Textarea Input', 'mytheme' ),
                    'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
                    'type'     => 'textarea',
                    'default' => 'Test Text',
                ),
                array(
                    'id' => 'ctfif_tst_editor',
                    'label'    => __( 'Editor Input', 'mytheme' ),
                    'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
                    'type'     => 'editor',
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
                    'id' => 'ctfif_tst_radio',
                    'label'    => __( 'Radio Input', 'mytheme' ),
                    'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
                    'type'     => 'radio',
                    'default' => 'test2',
                    'choices' => array(
                        'test1' => 'Test 1',
                        'test2' => 'Test 2',
                        'test3' => 'Test 3'
                    )
                ),
                array(
                    'id' => 'ctfif_tst_checkbox',
                    'label'    => __( 'Checkbox Input', 'mytheme' ),
                    'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
                    'type'     => 'checkbox',
                    'default' => array(
                        'test2'
                    ),
                    'choices' => array(
                        'test1' => 'Test 1',
                        'test2' => 'Test 2',
                        'test3' => 'Test 3'
                    )
                ),
                array(
                    'id' => 'ctfif_tst_radio_image',
                    'label'    => __( 'Radio Image Input', 'mytheme' ),
                    'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
                    'type'     => 'radio_image',
                    'default' => 'test2',
                    'choices' => array(
                        'test1' => get_home_url().'/wp-admin//images/align-left-2x.png',
                        'test2' => get_home_url().'/wp-admin//images/align-center-2x.png',
                        'test3' => get_home_url().'/wp-admin//images/align-right-2x.png',
                    )
                ),
                array(
                    'id' => 'ctfif_tst_checkbox_image',
                    'label'    => __( 'Checkbox Image Input', 'mytheme' ),
                    'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
                    'type'     => 'checkbox_image',
                    'default' => array(
                        'test2'
                    ),
                    'choices' => array(
                        'test1' => get_home_url().'/wp-admin//images/align-left-2x.png',
                        'test2' => get_home_url().'/wp-admin//images/align-center-2x.png',
                        'test3' => get_home_url().'/wp-admin//images/align-right-2x.png',
                    )
                ),
                array(
                    'id' => 'ctfif_tst_radio_button',
                    'label'    => __( 'Radio Button Input', 'mytheme' ),
                    'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
                    'type'     => 'radio_button',
                    'default' => 'test2',
                    'choices' => array(
                        'test1' => 'Test 1',
                        'test2' => 'Test 2',
                        'test3' => 'Test 3'
                    )
                ),
                array(
                    'id' => 'ctfif_tst_checkbox_button',
                    'label'    => __( 'Checkbox Button Input', 'mytheme' ),
                    'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
                    'type'     => 'checkbox_button',
                    'default' => array(
                        'test1',
                        'test3'
                    ),
                    'choices' => array(
                        'test1' => 'Test 1',
                        'test2' => 'Test 2',
                        'test3' => 'Test 3'
                    )
                ),
                array(
                    'id' => 'ctfif_tst_text_multi',
                    'label'    => __( 'Multi-Text Input', 'mytheme' ),
                    'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
                    'type'     => 'text_multi',
                    'default' => array(
                        'test 1',
                        'test 2'
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
                    'id' => 'ctfif_tst_range',
                    'label'    => __( 'Range Input', 'mytheme' ),
                    'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
                    'type'     => 'range',
                    'default' => '50',
                ),
                array(
                    'id' => 'ctfif_tst_dimension',
                    'label'    => __( 'Dimension Input', 'mytheme' ),
                    'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
                    'type'     => 'dimension',
                    'default' => '20px',
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
                ),
                array(
                    'id' => 'ctfif_tst_font_style',
                    'label'    => __( 'Font Style Input', 'mytheme' ),
                    'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
                    'type'     => 'font_style',
                    'default' => array(
                        'bold' => 'on',
                        'italic' => 'off',
                        'underline' => 'off',
                        'strikethrough' => 'on',
                    ),
                ),
                array(
                    'id' => 'ctfif_tst_text_align',
                    'label'    => __( 'Text Align Input', 'mytheme' ),
                    'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
                    'type'     => 'text_align',
                    'default' => 'left',
                ),
                array(
                    'id' => 'ctfif_tst_image',
                    'label'    => __( 'Image Input', 'mytheme' ),
                    'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
                    'type'     => 'image',
                    'default' => array(),
                ),
                array(
                    'id' => 'ctfif_tst_font',
                    'label'    => __( 'Google Font Input', 'mytheme' ),
                    'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
                    'type'     => 'google_font',
                    'default' => array(),
                )
            )
        );

        CantoMetabox::add_metabox($test_metabox2);
    }

}




//////////////////////////////////////////////////////////////////////
/////////////////////////// MetaBox Test /////////////////////////////
//////////////////////////////////////////////////////////////////////

// $test_metabox = array(
// 	'id' => 'test_meta_box',
// 	'title' => __('Test Metabox', 'textdomain'),
// 	'post_type' => array('post', 'page'),
// 	'options' => array(
// 		array(
// 			'id' => 'test_text_input',
// 			'label'    => __( 'Text Input', 'mytheme' ),
// 			'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
// 			'type'     => 'text',
// 			'default' => 'Test Text',
// 		),
//         array(
//             'id' => 'test_text_input3',
//             'label'    => __( 'Text Input 3', 'mytheme' ),
//             'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
//             'type'     => 'text',
//             'default' => 'Test Text',
//         ),
//         array(
//             'id' => 'test_text_input4',
//             'label'    => __( 'Text Input 4', 'mytheme' ),
//             'subtitle'    => __( 'Lorem ipsum dolor sit amet', 'mytheme' ),
//             'type'     => 'text',
//             'default' => 'Test Text',
//         )
// 	)
// );

// CantoMetabox::add_metabox($test_metabox);

