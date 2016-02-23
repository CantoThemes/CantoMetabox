(function( exports, $, CTF ){
    var ctfmb, ctfmb_class;
    

    ctfmb_class = function () {
        
        var mb = this;
        
        
        
        mb.run = function () {
            
            mb.render_fileds();
        };
        
        mb.render_fileds = function () {

            if ( typeof ctfmb_opts == 'undefined' ) {
                return;
            }

            if( ! _.isEmpty(ctfmb_opts) ){
                _.each(ctfmb_opts, function ( metabox, mb_id, mb_full ) {
                    var fields_container = $('#ctf-metabox-'+mb_id);
                    
                    _.each(metabox, function ( field, key, mbox_full ) {
                        var field_tmpl = wp.template( 'ctf-field-'+field.type );


                        field.value = '';

                        if ( fields_container.data('saved') ) {
                            if ( ! _.isUndefined(ctfmb_values[mb_id][field.id]) ) {
                                field.value = ctfmb_values[mb_id][field.id];
                            }
                        } else {
                            field.value = field.default;
                        }
                        
                        

                        if ( typeof field.choices == 'undefined' ) {
                            field.choices = '';
                        } else {
                            field.choices = field.choices;
                        }

                        // console.log(field.value);
                        
                        if ( 
                            (field.type == 'checkbox') ||
                            (field.type == 'checkbox_image') ||
                            (field.type == 'checkbox_button') ||
                            (field.type == 'dimension')
                            ) {
                            field.link  = 'name="'+mb_id+'['+field.id+'][]"';
                        } else if ( field.type == 'text_multi' ) {
                            field.link  = 'name="'+mb_id+'['+field.id+'][]"';
                            field.btnext  = 'data-name="'+mb_id+'['+field.id+'][]"';
                        } else {
                            field.link  = 'name="'+mb_id+'['+field.id+']"';
                        }
                        // field.toltip  = '';
                        // field.subtitle  = '';
                        field.defaultValue  = field.default;

                        console.log(field.link);

                        var render = $(field_tmpl( field ));

                        if (field.type == 'color') {
                            CTF.colorPicker(render);
                        } else if (field.type == 'color_rgba') {
                            CTF.rgbaColorPicker(render);
                        } else if (field.type == 'number') {
                            CTF.numberInput(render);
                        } else if (field.type == 'icon') {
                            CTF.iconInput(render);
                        } else if (field.type == 'select') {
                            CTF.selectInput(render);
                        } else if (field.type == 'text_multi') {
                            CTF.textMultiInput(render);
                        } else if (field.type == 'dimension') {
                            CTF.dimensionInput(render);
                        } else if (field.type == 'range') {
                            CTF.rangeInput(render);
                        } else if (field.type == 'image') {
                            CTF.imageInput(render);
                        } else if (field.type == 'google_font') {
                            CTF.googleFontInput(render);
                        }

                        
                        
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