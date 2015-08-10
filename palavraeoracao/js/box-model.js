$(function(){
    
    // CRIANDO A DIV BOX ALERT
    
    $('<div/>',{'id' : 'box-alert'})
    .append(
        $('<div/>',{'id':'box-alert-central'})
        .append( $('<span/>') )
        .append(
            $('<div/>', {'id':'box-alert-titulo', 'class':'clear'})
            .append( $('<span/>') )
            .append( $('<img/>').attr('src','img/bullet_go.png') )
            .append( $('<img/>').attr({'src':'img/delete.png','title':'Precione ESC para Sair','id':'box-close'}))
        )
        .append( $('<div/>',{'id':'box-alert-central-recebe'}) )
    )
    .appendTo('body');
    
    $('#box-close').live('click', function(){$('#box-alert').closebox();});
    
    // AO PRECIONAR A TECLA ESC, FECHA A APLICACAO
    $(document).keydown(function (e) {
        if(e.which==27){$('#box-alert').closebox();}
    });
})

jQuery.boxmodel = function( settings ){
    
    // CONFIGURACOES PADROES DO APP
    var config = {
        titulo : 'title of your application',
        conteudo : 'content of your application',
        buttons : null
    };
    
    if(settings){$.extend(config, settings);}
    
    var titulo = config.titulo,
        conteudo = config.conteudo,
        buttons = config.buttons;
    
    if(buttons){
        console.log(buttons);
    }
    
    $('#box-alert-titulo span').html(titulo);
    
    $('#box-alert-central-recebe').html(conteudo);
    
    $('#box-alert').fadeIn('slow');
};

(function( $ ){
    $.fn.closebox = function() {
        $('#box-alert').fadeOut(400);
    }; 
})( jQuery );