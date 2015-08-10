$(function(){

	var caminho='', cam=location.href.split('/');
	for(var x=0; x<=3; x++){caminho += cam[x] + '/';}

	String.prototype.sprintf=function(){var $this=this;for(var x=0;x<=arguments.length-1;x++){$this=$this.replace('%s',arguments[x])}return $this}
	
	var Musculacao = {
		start : function(){
			if($.cookie('car')){
	            $.each( $.parseJSON($.cookie('car')) , function(i,v){
	                Musculacao.carrinho.adc({ id:i, nome:v.nome, link:v.link, image:v.image, valor:v.valor, dados:v.dados });
	            });
			}
		},
		
		carrinho : {
			itens : new Array(),

			adc : function(novo){
				var id = 'car-' +novo.id;

	            if($('#'+id).size()==0){
	                $('#template-menu-principal-topo-itens-ul')
	                .append(
	                    $('<li/>',{'class':'menu-principal-topo-itens-ul-li', 'id':id, 'valor':novo.valor})
	                    .css({'background-image' : 'url("' +caminho+novo.image+ '")'})
	                    .append(
	                        $('<span/>').append( $('<a/>', {'html':novo.nome, 'href':caminho +novo.link}) )
	                    )
	                )
	                
	                $('#'+novo.id).css('border-color','#96ca63')
	                .children('.template-conteudo-centro-adicionar')
	                .css({'cursor':'default', 'color':'#999'});
	                
	                $('#'+novo.id).css('border-color','#96ca63').children('.template-conteudo-centro-adicionado').fadeIn(600);
	                
	                this.conta();
	            }
			},
			
			conta : function(){
				var lis= $('.menu-principal-topo-itens-ul-li'), conta= lis.size(), valor= 0;
	            
	            $('#template-menu-principal-topo-carrinho span').html( (conta==1?'Um item': conta + ' itens') );
	            lis.each(function(){valor += parseFloat($(this).attr('valor')); });
	            $('#template-menu-principal-topo-itens-total span').html( valor.toFixed(2) );
			},

			novo : function(novo){
				$.post(caminho+ 'cookie.php',{
	                action:'adc', nome:novo.nome, id:novo.id, valor:novo.valor, image:novo.image, dados:novo.dados
	            }, function(ret){
	                Musculacao.carrinho.adc(ret);
	            }, 'jSON');
			}
		}

	};

	Musculacao.start();

	$('#template-menu-principal-topo-carrinho, #template-menu-principal-topo-itens').bind('mouseover',function(){
	    var conta = $('.menu-principal-topo-itens-ul-li').size();
	    $('#template-menu-principal-topo-itens').show();
	    
        $('#template-menu-principal-topo-itens-vazio').css('display', (conta? 'none': 'show') );
        $('#template-menu-principal-topo-itens-cheio').css('display', (conta? 'show': 'none') );
	});

	$('#template-menu-principal-topo-carrinho,#template-menu-principal-topo-itens').bind('mouseout',function(){
	    $('#template-menu-principal-topo-itens').hide();
	});

	$('#template-menu-principal-topo-itens-esvaziar').click(function(){
	    $.post(caminho+ 'cookie.php',{action:'clear-all'},function(){
	        location.reload();
	    });
	});

	function $_conta(){
		var tot_final = 0;
        $('.tabela-produto').each(function(){
            var $this = $(this),
                quant = $this.children('td:eq(2)').children('div').children('.tabela-botao-quantidade-conteudo').html(),
                valor = parseFloat( ( $this.children('.tabela-unitario').children('div').html() ).replace('R$ ','') ).toFixed(2),
                total = (quant*valor).toFixed(2);
                $this.children('.tabela-total').children('div').html('R$ '+ total);

                tot_final = (parseFloat(tot_final)+parseFloat(total)).toFixed(2);
        });
        $('#tabela-subtotal').html('R$ '+ tot_final);
	}

	$('.tabela-remover').click(function(){
		if(confirm("Deseja mesmo remover este produto?")){
			var $pai = $(this).parent().parent(),
				id = $pai.attr('id').replace('lista-',''),
				new_id = '#car-' +id;
				
				$.post(caminho+ 'cookie.php',{action:'clear', item:id},function(){
					$(new_id).remove();
			        $pai.remove();
		        	Musculacao.carrinho.conta();

		        	if(!$('.tabela-produto').size()){
		        		$('form[target="pagseguro"]').hide();
		        		$('#lista-carrinho-vazio').fadeIn(900);
		        	} else {
						$_conta();
				    }
			    });
		}
	});

    $('#template-car-menu-links a:eq(0)').addClass('template-car-menu-links');

    $('#tabela-car-imagem-outras div').click(function(){
        var $this = $(this), src = $this.css('background-image');
        $('#tabela-car-imagem-principal').css({'background-image':src});
        $('#tabela-car-imagem-outras div').css('border-color','#999');
        $this.css('border-color','red');
    });
    
    $('#tabela-car-sabores .tabela-car-dados').click(function(){
        $(this).parent().children('.tabela-car-dados').removeClass('tabela-car-sel');
        $(this).addClass('tabela-car-sel');
    });
    
    $('#tabela-car-tamanhos .tabela-car-dados').click(function(){
        $(this).parent().children('.tabela-car-dados').removeClass('tabela-car-sel');
        $(this).addClass('tabela-car-sel');

        var pai = $(this).parent(),
            descr = $('#tabela-car-descricao'),
            sabor = $('#tabela-car-sabores .tabela-car-sel').html(),
            tamanho = $('#tabela-car-tamanhos .tabela-car-sel').text(),
            dados;

        if(prod.dados[tamanho]){
            console.log(prod.dados[tamanho]);
        }

        // dados.preco = dados[0];
        
        // $('#tabela-car-valor span, #tabela-car-descricao span:eq(2)').html( dados.preco );
    });

    $('#template-car-menu-links a').click(function(){
        var irmaos = $(this).parent().children('a'),
        index = $(this).index();

        irmaos.removeClass('template-car-menu-links');
        $(this).addClass('template-car-menu-links');

        $('.template-car-menu-painel').hide();
        $('.template-car-menu-painel').eq(index).show();
    });

    // tabela-car-sel

    $('#tabela-car-finalizar').click(function(){
    	var id = $(this).attr('key'),
		    image = 'img/prod/'+ prod.imgs[0],
    		nome = $('#tabela-car-nome').text(),
    		valor = $.trim($('#tabela-car-valor').text()).replace('R$',''),
    		sabor = $('.tabela-car-sel:eq(0)').text(),
    		tamanho = $('.tabela-car-sel:eq(1)').text();

        alert($('#tabela-car-tamanhos .tabela-car-sel').size());

        if( $('#tabela-car-tamanhos .tabela-car-dados').size() ){
    	   // Musculacao.carrinho.novo({'id':id,'nome':nome,'image':image,'valor':valor, dados:'#########'});
        } else {
            alert('Selecione um tamanho!');
        }
    });



    function $box(){
        var $this = $('#box-model');
        $this.center = $this.children('#box-model-center');

        this.open = function(t){ $this.fadeIn('300'); $this.center.children('#box-model-center-titulo').children('span').html(t); }
        this.close = function(){ $this.fadeOut('800'); }
    }

    var box = new $box();
    box.produto = 0;

    $('.template-conteudo-centro-adicionar').click(function(){
        var pai = $(this).parent(),
        id = Number(pai.attr('id')),
        image = pai.children('.template-conteudo-centro-img').css('background-image').replace(caminho,'').replace('url(','').replace(')',''),
        nome = pai.children('.template-conteudo-centro-nome').html(),
        valor = pai.children('.template-conteudo-centro-preco').children('span').html().replace(',','.');

        if($(this).css('cursor')!='default'){
            box.open(nome);
            box.produto = id;

            $('.box-model-center-conteudo-sabores_tamanhos-conteudo a').remove();
            for(var a in prod[id].sabor){
                $('.box-model-center-conteudo-sabores_tamanhos-conteudo:eq(0)').append( $('<a/>',{html:prod[id].sabor[a], href:'javascript:void(0)'}) );
            }
            for(var a in prod[id].dados){
                var b = a;
                b = a.split('|');
                b = b[0];
                $('.box-model-center-conteudo-sabores_tamanhos-conteudo:eq(1)').append( $('<a/>',{html:b+'gr', href:'javascript:void(0)'}) );
            }

            $('#box-model-center-conteudo-preco span').html(valor);

            $('.box-model-center-conteudo-sabores_tamanhos-conteudo:eq(0) a:eq(0),.box-model-center-conteudo-sabores_tamanhos-conteudo:eq(1) a:eq(0)').addClass('sel');
        }

    });

    $('#box-model-center-conteudo-comprar').click(function(){
        var item = prod[box.produto];
        item.sabor = $('.box-model-center-conteudo-sabores_tamanhos-conteudo:eq(0) a.sel').text();
        item.tamanho = $('.box-model-center-conteudo-sabores_tamanhos-conteudo:eq(1) a.sel').text();
        item.valor = $('#box-model-center-conteudo-preco span').text();

		Musculacao.carrinho.novo({'id':item.id,'nome':item.nome,'image':item.img,'valor':item.valor, dados:("Tamanho: %s - Sabor: %s".sprintf(item.tamanho, item.sabor))});
		box.close();
    });

    $('.box-model-center-conteudo-sabores_tamanhos-conteudo:eq(0) a:eq(0),.box-model-center-conteudo-sabores_tamanhos-conteudo:eq(1) a:eq(0)').addClass('sel');
    
    $('.box-model-center-conteudo-sabores_tamanhos-conteudo:eq(0) a').live('click',function(){
        var $pai = $(this).parent();
        $pai.children('a').removeClass('sel');
        $(this).addClass('sel');
    });

    $('.box-model-center-conteudo-sabores_tamanhos-conteudo:eq(1) a').live('click',function(){
        var $pai = $(this).parent(),
            id = box.produto,
            valor = prod[id].dados[$(this).text().replace('gr','')].split('|');

        $('#box-model-center-conteudo-preco span').html( valor[0] );

        $pai.children('a').removeClass('sel');
        $(this).addClass('sel');
    });

});