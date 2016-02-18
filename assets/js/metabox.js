(function( exports, $ ){
    var ctfmb, ctfmb_class;
    

    ctfmb_class = function () {
        
        var mb = this;
        
        
        
        mb.run = function () {
            
            mb.render_fileds();
        };
        
        mb.render_fileds = function () {
            
            if( ! _.isEmpty(ctfmb_opts) ){
                _.each(ctfmb_opts, function ( metabox, mb_id, mb_full ) {
                    var fields_container = $('#ctf-metabox-'+mb_id);
                    
                    _.each(metabox, function ( field, key, mbox_full ) {
                        var field_tmpl = wp.template( 'ctf-field-'+field.type );
                        
                        if (fields_container.data('saved')) {
                            field.value = '';
                        } else {
                            field.value = field.default;
                        }
                        field.link  = 'name="'+mb_id+'['+field.id+']"';
                        field.toltip  = '';
                        field.subtitle  = '';
                        field.description  = '';
                        
                        fields_container.append(field_tmpl( field ));
                    });
                });
            }
        };
        
        
        //this.run();
        
        return this;
        
        
    };
    
    ctfmb = ctfmb_class();
    
    ctfmb.run();
    
})( wp, jQuery );