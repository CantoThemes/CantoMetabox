<?php
/**
* 
*/
class CTF_RMB
{

    private $metabox = array();
	private $_metabox_nonce = '';
	
	function __construct( $metabox )
	{
		$this->metabox = $metabox;
        $this->_metabox_nonce = $metabox['id'].'_nonce';
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

            wp_nonce_field( $this->_metabox_nonce.'_box', $this->_metabox_nonce );

            $values = get_post_meta( $post->ID, $this->metabox['id'], true );
    		?>
    		<div class="ctf-mb_container ctf-fc" id="ctf-metabox-<?php echo $this->metabox['id']; ?>" data-saved="<?php echo ($this->is_saved() ? 1 : 0); ?>"></div>
    		<script type="text/javascript">
                window.ctfmb_opts['<?php echo $this->metabox['id']; ?>'] = <?php echo json_encode($this->metabox['options']); ?>;
    			window.ctfmb_values['<?php echo $this->metabox['id']; ?>'] = <?php echo json_encode($values); ?>;
    		</script>
    		<?php
    	}
    }
    
    function ctf_save_metabox_data( $post_id ) {

        // Check if our nonce is set.
        if ( ! isset( $_POST[$this->_metabox_nonce] ) ) {
            return $post_id;
        }

        $nonce = $_POST[$this->_metabox_nonce];

        // Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $nonce, $this->_metabox_nonce.'_box' ) ) {
            return $post_id;
        }

        // If this is an autosave, our form has not been submitted,
        //     so we don't want to do anything.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }

        // Check the user's permissions.
        if ( 'page' == $_POST['post_type'] ) {

            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
    
        } else {

            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }
        }

        /* OK, its safe for us to save the data now. */
        // Sanitize the user input.
    	$metabox_data = $_POST[$this->metabox['id']];

        // var_dump($metabox_data);

        update_post_meta( $post_id, $this->metabox['id'], $metabox_data );
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