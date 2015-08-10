$(function(){
   
    function carrinho(rec){
        
        var nome=rec.nome, id=rec.id, new_id=rec.new_id, preco=rec.preco, image=rec.image;
        
        switch(rec.acao){
            
            case 'adc':
                $('<li/>').css('background-image', image).attr({'id':id, 'class':'recebe_itens_i'}).fadeIn(500).appendTo('#recebe_itens');
                id = '#' + id;
                $('<li/>').html(nome).appendTo(id);
                $('<li/>').html("R$ "+preco).appendTo(id);
                $('<li/>').addClass('item_delete').html("Remover Item").appendTo(id);
                
                $.post('faz.php', {action:rec.acao,item:id,nome:nome,id:id,valor:preco,image:image});
                
                id = id.replace('carrinho_','');
                $(id).children('.itens_desc').removeClass('itens_desc_ver').show();
                $(id).children('.itens_desc').children('.item_adc').css({'background' : '#e94444'}).html('Remover do Carrinho');
                
            break;
            
            case 'remover':
                $(id).fadeOut(400, function(){$(this).remove(); conta();})
                
                $.post('faz.php', {action : 'clear', item : id});
                
                id = id.replace('carrinho_','');
                var $id = $(id).children('.itens_desc');
                $id.addClass('itens_desc_ver').hide();
                $id.children('.item_adc').css({'background' : '#bbe616'}).html('Adicionar ao Carrinho');
                
            break;
            
            case 'clear':
                $.post('faz.php', {action:'clear-all'}, function(a){alert(a);});
            break;
            
        }
        
        conta();
    }
    
    
    function conta(){
        var $itens = $('.recebe_itens_i'),
        conta = $itens.size(),
        container = $('#recebe_itens');
        
        $('#car_itens').html( conta );
        
        if(conta==0){container.hide();}
    }
    
    
    $('.item_adc').live('click', function(){
        var $this = $(this).parent().parent(),
        id = "carrinho_" + $this.attr('id'),
        nome = $.trim($this.children().children('.item_nome').html()),
        preco = (parseInt($.trim( $this.children().children('.item_preco').children('span').html() ))).toFixed(2),
        image = $this.css('background-image'),
        existe = $('#recebe_itens li[id='+id+']').size();
        
        if(existe==0){
            carrinho({"acao":"adc","nome":nome,"id":id,"preco":preco,"image":image});
        } else {
            carrinho({'acao':'remover', 'id':'#'+id});
        }
    });
    
    
    $('#car').live('mouseover click', function(){
        if( $('#recebe_itens li').size()==0){
            $('#recebe_itens').hide();
        } else {
            $('#recebe_itens').show(); 
        }
    });
    
    $('#car').live('mouseout blur', function(){
        $('#recebe_itens').hide();
    });


    $('.itens_i').live('mouseover', function(){
        $(this).children('.itens_desc_ver').show();
    });

    $('.itens_i').live('mouseout', function(){
        $(this).children('.itens_desc_ver').hide();
    });
    
    $.post('faz.php', {action:'echo'},
        function(retorno){
            
            retorno = $.parseJSON(retorno);
            
            $.each(retorno, function(i,v){
                var nome = v.nome,
                id = i.replace('#', ''),
                new_id = id.replace('carrinho_',''),
                image = v.image,
                preco = v.valor;
                
                carrinho({"acao":"adc","nome":nome,"id":id,"new_id":new_id,"preco":preco,"image":image});
            });

    });

    $('.item_delete').live('click', function(){
        var $this = $(this),
        parent = $this.parent();
        var id = '#' + parent.attr('id');
        carrinho({'acao':'remover', 'id':id});
    });

});