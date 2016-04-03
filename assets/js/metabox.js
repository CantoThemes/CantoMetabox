(function( exports, $, CTF ){

    CTF_Core.CTF_Metabox = CTF_Core.Opts.extend({
        initialize: function ( container, args ){
	    	this.inputArgs = args;
	    	this.container = container;
	    	this.containerObj = $('#ctf-metabox-'+container);;

	    	this.renderContent();
	    },
        getNameAttr: function ( type, id ){
            var nameAttrValue = this.container+'['+id+']';

            if ( 
                (type == 'checkbox') ||
                (type == 'checkbox_image') ||
                (type == 'checkbox_button') ||
                (type == 'font_style') ||
                (type == 'dimension')
                ) {
                nameAttrValue  = this.container+'['+id+'][]';
            } else if ( type == 'text_multi' ) {
                nameAttrValue  = this.container+'['+id+'][]';
                // this.inputArgs.btnext  = 'data-name="'+this.container+'['+id+'][]"';
            }

            return nameAttrValue;
        },
        getInputValue: function ( type, id, defValue ){
            var value = defValue;
            if ( this.containerObj.data('saved') ) {
                if ( ! _.isUndefined(ctfmb_values[this.container][id]) ) {
                    if ( _.isNull(ctfmb_values[this.container][id]) ) {
                        value = {};
                    } else {
                        value = ctfmb_values[this.container][id];
                    }
                }
            }

            return value;
        }
    });

    function ctf_init() {
        if ( typeof ctfmb_opts == 'undefined' ) {
            return;
        }


        if( ! _.isEmpty(ctfmb_opts) ){
            _.each(ctfmb_opts, function ( metabox, mb_id, mb_full ) {
                if ( typeof CTF_Core != 'undefined' && typeof CTF_Core.CTF_Metabox != 'undefined' ) {
                    var field_obj = new CTF_Core.CTF_Metabox( mb_id, metabox );
                }
            });
        }
    }

    ctf_init();
    
    /*

    var ctfmb, ctfmb_class;
    

    ctfmb_class = function () {
        
        var mb = this;
        
        mb.inputs = {};
        
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

                    mb.inputs[mb_id] = {};
                    
                    _.each(metabox, function ( field, key, mbox_full ) {
                        var field_tmpl = wp.template( 'ctf-field-'+field.type );


                        field.value = '';

                        if ( fields_container.data('saved') ) {
                            if ( ! _.isUndefined(ctfmb_values[mb_id][field.id]) ) {
                                if ( _.isNull(ctfmb_values[mb_id][field.id]) ) {
                                    field.value = {};
                                } else {
                                    field.value = ctfmb_values[mb_id][field.id];
                                }
                            }
                        } else {
                            field.value = field.default;
                        }
                        
                        

                        if ( typeof field.choices == 'undefined' ) {
                            field.choices = '';
                        } else {
                            field.choices = field.choices;
                        }

                        
                        if ( 
                            (field.type == 'checkbox') ||
                            (field.type == 'checkbox_image') ||
                            (field.type == 'checkbox_button') ||
                            (field.type == 'font_style') ||
                            (field.type == 'dimension')
                            ) {
                            field.link  = 'name="'+mb_id+'['+field.id+'][]"';
                        } else if ( field.type == 'text_multi' ) {
                            field.link  = 'name="'+mb_id+'['+field.id+'][]"';
                            field.btnext  = 'data-name="'+mb_id+'['+field.id+'][]"';
                        } else {
                            field.link  = 'name="'+mb_id+'['+field.id+']"';
                        }

                        field.defaultValue  = field.default;


                        var fldHTML = field_tmpl( field ),
                            render = $(fldHTML);

                        
                        mb.inputs[mb_id][field.id] = {};

                        mb.inputs[mb_id][field.id]['html'] = fldHTML;
                        mb.inputs[mb_id][field.id]['object'] = render;
                        mb.inputs[mb_id][field.id]['settings'] = field;

                        

                        fields_container.append(render);

                        
                        
                        
                    });
                });
            }

            mb.ready();
        };

        mb.ready = function () {
            if( ! _.isEmpty(mb.inputs) ){
                _.each(mb.inputs, function ( metabox, mb_id, mb_full ) {
                    if( ! _.isEmpty(metabox) ){
                        _.each(metabox, function ( inputs, input_id, mb_full ) {
                            mb.initInputs(inputs.object, inputs.settings);
                        });
                    }
                    
                });
            }
        };


        mb.initInputs = function  ( render, field ) {
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
            } else if (field.type == 'image_multi') {
                CTF.imageMultiInput(render);
            } else if (field.type == 'google_font') {
                CTF.googleFontInput(render);
            } else if (field.type == 'editor') {
                    CTF.editorInput( render, field );

                
                
            }
        };

        
        
        //this.run();
        
        return this;
        
        
    };
    


    "use strict";

    $(window).load(function () {
        setTimeout(function () {
            ctfmb = ctfmb_class();
            ctfmb.run();
        }, 300);
    });
    */
    
})( wp, jQuery, CTF_Core );