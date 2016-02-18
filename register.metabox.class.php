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
		add_action( 'save_post', array($this, 'ctf_save_metabox_data') );
	}

	public function ctf_register_metabox()
    {
    	add_meta_box( $this->metabox['id'], $this->metabox['title'], array($this,'ctf_cantometabox_callback'), $this->metabox['post_type'] );
    }

    public function ctf_cantometabox_callback( $post )
    {
    	if (isset($this->metabox['options']) && !empty($this->metabox['options'])){
    		?>
    		<div class="ctf-mb_container" id="ctf-metabox-<?php echo $this->metabox['id']; ?>" data-saved="<?php echo ($this->is_saved() ? 1 : 0); ?>"></div>
    		<script type="text/javascript">
    			window.ctfmb_opts['<?php echo $this->metabox['id']; ?>'] = <?php echo json_encode($this->metabox['options']); ?>;
    		</script>
    		<?php
    	}
    }
    
    function ctf_save_metabox_data( $post_id ) {
    	
    }
    
    public function is_saved()
    {
    	$post = get_post();
    	
    	$value = get_post_meta( $post->ID, $this->metabox['id'] );
    	
    	
    	if ( ( array() !== $value ) ){
			return true;
		}
		
		return false;
    }
}