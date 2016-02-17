<?php
/**
* 
*/
class CTF_RMB
{

	private $metabox = array();
	
	function __construct( $metabox )
	{
		$this->metabox = $metabox;
		add_action( 'add_meta_boxes', array($this, 'ctf_register_metabox') );
	}

	public function ctf_register_metabox()
    {
    	add_meta_box( $this->metabox['id'], $this->metabox['title'], array($this,'ctf_cantometabox_callback'), $this->metabox['post_type'] );
    }

    public function ctf_cantometabox_callback( $post )
    {
    	var_dump($this->metabox);
    }
}