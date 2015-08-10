$(function(){
    
    // $.cookie('style','');
    
    $('.move-x')
    .css('cursor','e-resize')
    .addClass('box-sizing')
    .addClass('move-editavel')
    .draggable({containment:"parent", axis:"x", grid:[10,10]});
    
    $('.move-y')
    .css('cursor','n-resize')
    .addClass('box-sizing')
    .addClass('move-editavel')
    .draggable({containment:"parent", axis:"y", grid:[10,10]});
    
    $('.move-x-y')
    .css('cursor','move')
    .addClass('box-sizing')
    .addClass('move-editavel')
    .draggable({
      containment:"parent", grid:[20,20]
    });
    
    $('#desfaz').click(function(){
        var obj = $('#lista-desfaz li:first'),
        item = obj.attr('item'),
        antes = obj.attr('antes').split('-');
        
        alert(antes);
        
        $('*[item="'+item+'"]').css({
            'top' : antes[0],
            'left' : antes[1]
        });
    });
    
    var item = 0001;
    $('.move-editavel').each(function(){
        $(this).attr('item', item);
        item++;
    });
    
    setInterval(function(){
        var conteudo = '';
        
        $('.move-editavel').each(function(i,v){
            var item = $(this).attr('item');
            
            conteudo += '*[item="'+item +'"]{top:'+ $(this).css('top') +'; left: '+$(this).css('left')+';} ';
        });
        
        $.cookie('style', conteudo, {expires:7});
    }, 1000);
    
    if($.cookie('style')){
        $('style').append( $.cookie('style') );
    }
    
});