$(function(){
    
    ///// VARIAVEIS
        // CARRINHO
        var carrinho = $('#template-topo-centro-menu-car'),
        carrinho_valor = 0,
        carrinho_quantidade = 0,
        carrinho_centro = carrinho.children('div'),
        
        carrinho_centro_itens = carrinho_centro.children('#template-topo-centro-menu-car-centro-itens'),
        carrinho_centro_itens_li = carrinho_centro_itens.children('li'),
        carrinho_centro_itens_li_preco = carrinho_centro_itens_li.children('b'),
        
        carrinho_vazio = carrinho_centro.children('#template-topo-centro-menu-car-centro-vazio'),
        
        carrinho_total = carrinho_centro.children('#template-topo-centro-menu-car-centro-total'),
        carrinho_total_preco = carrinho_total.children('span');
        //
        
        // SLIDE
        var slide = $('#template-centro-slide'),
        slide_li = slide.children('a'),
        slide_li_img = slide_li.children('img'),
        slide_num = 0,
        slide_quantidade = slide_li.size() - 1,
        slide_time = null,
        slide_img_carregadas = 0;
        
        slide_li_img.load(function(){
            slide_img_carregadas++;
            
            if(slide_img_carregadas==slide_quantidade){
                $_slide('play');
                remove_bg(slide);
            }
        });
        //
    /////
    
    ///// FUNCTIONS
    //////// CARRINHO
    /**
     * CARRINHO | FUNCTIONS<br/><br/>
     * 
     * VERIFICA : Verifica se existe itens no carrinho, se nao houver 
     * esconde se houver exibe <br/>
     * $_carrinho('verifica'); <br/> <br/>
     * 
     * REAIS : Soma os valores dos itens no carrinho <br/>
     * $_carrinho('reais'); <br/> <br/>
     * 
     * ESVAZIA : Limpa o carrinho <br/>
     * $_carrinho('esvazia'); <br/> <br/>
     * 
     * ADICIONA : Adiciona um item ao carrinho <br/>
     * $_carrinho('adiciona',['site_id','nome','img','valor']); <br/> <br/>
     * 
     * REMOVE : Remove um item no carrinho com um $id  <br/>
     * $_carrinho('remove','','site_id'); <br/> <br/>
     */
    function $_carrinho(acao, detalhes, id){
        /// CONTA OS ITENS NO CARRINHO
        carrinho_quantidade = carrinho_centro_itens.children('li').size();
        
        switch(acao){
            ///////////////
            case 'verifica':
                if(carrinho_quantidade){
                    // CASO TENHA ITENS NO CARRINHO, EXIBE
                    carrinho_centro_itens.show();
                    carrinho_total.show();
                    carrinho_vazio.hide();
                    //
                } else {
                    // CASO NAO TENHA ITENS NO CARRINHO, OCULTA
                    carrinho_centro_itens.hide();
                    carrinho_total.hide();
                    carrinho_vazio.show();
                    //
                }
                
                $_carrinho('reais');
                break;
            ///////////////
            case 'reais':
                carrinho_valor = 0;
                carrinho_centro_itens.children('li').children('b').each(function(i){
                    var valor = parseFloat( $.trim( $(this).html() ).replace('R$','').replace(',','.') );
                    carrinho_valor = (parseFloat(carrinho_valor) + parseFloat(valor) ).toFixed(2);
                });
                carrinho_total_preco.html(carrinho_valor);
                break;
            ///////////////
            case 'esvazia':
                $.post('carrinho.php', {action:'carrinho-clear'});
                
                carrinho_centro_itens.children('li').remove();
                $_carrinho('verifica');
                break;
            ///////////////
            case 'adiciona':
                $.post('carrinho.php', {action:'carrinho-adc', detalhes:detalhes}, function(ret){
                    if(!$('#'+detalhes[0]).size()){
                        detalhes.id = detalhes[0];
                        detalhes.nome = detalhes[1];
                        detalhes.img = detalhes[2];
                        detalhes.preco = detalhes[3];
                        
                        $('<li/>')
                            .attr('id',detalhes.id)
                            .css('background-image', 'url("'+detalhes.img+'")' )
                            .append(detalhes.nome)
                            .append( $('<span/>').html('[x]') )
                            .append( $('<br/>') )
                            .append( $('<b/>').html('R$ '+detalhes.preco) )
                            .appendTo('#template-topo-centro-menu-car-centro-itens');

                            $_carrinho('verifica');
                    }
                })
                break;
            ///////////////
            case 'remove':
                $.post('carrinho.php', {action:'carrinho-remover', id:id}, function(ret){
                    if(!ret){
                        $('#'+id).remove();
                        $_carrinho('verifica');
                    }
                })
                break;
            ///////////////
        }
    }
    
    // $_carrinho('adiciona', ['exemplo','Logo (Exemplo)','img/logo.png','280.00']);
    
    ////
    //////// COOKIE
    /**
     * COOKIE | FUNCTIONS <br/><br/>
     * 
     * Faz uma varredura no cookie e exibe os itens<br/>
     * $_cookie();
     */
    function $_cookie(){
        var cookie = $.parseJSON($.cookie('carrinho'));
        
        if(cookie){
            $.each(cookie, function(id,site){
                $_carrinho('adiciona', [id,site.nome,site.img,site.preco]);
            });
        } else {
            alert('vazio');
        }
    }
    ////
    //////// SLIDE
    /**
     * SLIDE | FUNCTIONS <br/><br/>
     * 
     * PLAY : Inicia o slide <br/>
     * $_slide('play'); <br/><br/>
     * 
     * PASSA : Passa o Slide <br/>
     * $_slide('passa'); <br/><br/>
     */
    function $_slide(acao){
        switch(acao){
            ///////////////
            case 'play':
                $_slide('passa');
                setInterval(function(){$_slide('passa');}, 4000);
                break;
            ///////////////
            case 'passa':
                slide_li_img.css('z-index',1);
                
                slide_li_img.eq(slide_num).hide().css('z-index',3).fadeIn(900);
                
                if(slide_num<slide_quantidade){slide_num++;} else {slide_num=0;}
                break;
            ///////////////
        }
    }
    ////
    //////// REMOVER BG
    function remove_bg(item){
        item.css({'background':'', 'background-image':'url()'});
    }
    /////
    
    //////// CARRINHO
    $_carrinho('verifica');
    $_cookie();
    
    $('.esvaziar-carrinho').live('click dblClick', function(){
        $_carrinho('esvazia');
    });
    
    $('#template-topo-centro-menu-car-centro-itens span').live('click dblClick', function(){
        $_carrinho('remove', '', $(this).parent().attr('id') );
    });
    
    carrinho.live('mouseover mouseout', function(e){
        switch(e.type){
            ////////////
            case 'mouseover':
                carrinho_centro.show();
                break;
            ////////////
            case 'mouseout':
                carrinho_centro.hide();
                break;
        }
    });
    ////
    
});