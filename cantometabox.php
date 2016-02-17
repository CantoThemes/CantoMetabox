<?php

/**
 * Plugin Name: CantoMetabox
 */
 
 
if(!class_exists('CTF_Addon')){
    return;
}
 
class CantoMetabox extends CTF_Addon{
    function __construct(){
        parent::__construct();
        
        $this->add_js_tmlp_to_admin_footer();
    }
}

$ctf_metabox = new CantoMetabox();