(function( exports, $, CTF ){
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
                            field.value = ctfmb_values[mb_id][field.id];
                        } else {
                            field.value = field.default;
                        }
                        field.link  = 'name="'+mb_id+'['+field.id+']"';
                        // field.toltip  = '';
                        // field.subtitle  = '';
                        field.defaultValue  = field.default;

                        var render = $(field_tmpl( field ));

                        if (field.type == 'color') {
                            CTF.colorPicker(render);
                        };

                        
                        
                        fields_container.append(render);
                    });
                });
            }
        };

        
        
        //this.run();
        
        return this;
        
        
    };
    
    ctfmb = ctfmb_class();
    
    ctfmb.run();
    
})( wp, jQuery, CTF_Core );