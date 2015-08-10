$(function(){
    
    // CRIANDO A DIV BOX ALERT
    $('body').before('<div id="box-alert"></div>');

    $('#box-alert')
        .css({
            'width' : '100%',
            'height' : '100%',
            'position' : 'fixed',
            'display' : 'none'
        })
        .append('<div id="box-alert-central"><span></span></div>');

    $('#box-alert-central')
        .css({
            'width' : '70%',
            'height' : '250px',
            'margin' : '0 auto',
            'margin-top' : '15%',
            'background' : 'rgba(255,255,255, .8)',
            'border' : '1px solid #CCC',
            'border-radius' : '10px',
            'box-shadow' : '0 0 100px rgba(0, 0, 0, .3)'
        })
        .append('<div id="box-alert-titulo"> <span></span>  </div>');


    $('#box-alert-central')
        .append('<div id="box-alert-central-recebe"> content of your application </div>');
        
    $('#box-alert-titulo')
        .append('<img src="icons/bullet_go.png" style="float:left; padding-right:15px;" />')
        .append('<img src="icons/delete.png" title="Precione ESC para Sair" id="box-close" />');
        
    $('#box-alert-titulo')
        .css({
            'border-radius' : '5px',
            'border' : '1px solid #CCC',
            'margin' : '5px',
            'height' : '20px',
            'line-height' : '20px',
            'font-size' : '13px',
            'background' : '#EEE',
            'color' : 'rgba(0, 0, 0, .5)',
            'padding' : '8px',
            'text-transform' : 'uppercase',
            'box-shadow' : 'inset 10px 0 20px rgba(0, 0, 0, .03)'
        });
     
    $('#box-alert-central-recebe')
    .css({
        'max-height' : '250px',
        'overflow' : 'auto',
        'padding' : '10px'
        });
        
    $('#box-close')
    .css({
        'float' : 'right',
        'margin-right' : '10px',
        'cursor' : 'pointer'
        });


    $('#box-close').click( function(){
        $('#box-alert').fadeOut('fast');
    });

    // AO PRECIONAR A TECLA ESC, FECHA A APLICACAO
    $(document).keydown(function (e) {
        if(e.which == 27)
        {
            $('#box-alert').closebox();
        }
    });
})

jQuery.boxmodel = function( settings ){
    
    // CONFIGURACOES PADROES DO APP
    var config = {
        titulo : 'title of your application',
        conteudo : 'content of your application'
    };
    
    if(settings){
        $.extend(config, settings);
    }
    
    $('#box-alert-titulo span').html( config.titulo );
    
    $('#box-alert-central-recebe').html( config.conteudo );
    
    $('#box-alert').fadeIn('slow');
    
};

(function( $ ){
    $.fn.closebox = function() {
        $('#box-alert').fadeOut('slow');
    }; 
})( jQuery );