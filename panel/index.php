<meta charset="UTF-8">
<script type="text/javascript" src="js/latest.js"></script>
<script type="text/javascript" src="js/cookie.js"></script>
<script type="text/javascript" src="js/function.js"></script>
<link rel="stylesheet" href="css/estrutura.css" />

<div id="menuIcone1" class="menuIcone"></div>

<div id="menuIcone2" class="menuIcone">
	<div id="backgroundPainel" class="Painel">Background</div> <hr>
    
    <div id="backgroundPainelPainel" class="painelSegundo">
    	<div class="linksPainel" onClick="mudarFundo('#9C0')">Verde</div>
    	<div class="linksPainel" onClick="mudarFundo('#C30')">Vermelho</div>
    	<div class="linksPainel" onClick="mudarFundo('#FC0')">Amarelo</div>
    	<div class="linksPainel" onClick="mudarFundo('#096')">Verde Escuro</div>
    </div>
   
</div>



<div class="recebe" id="1">
    <div class="imgIcone" id="config"></div>
    <div class="nome">Configurações</div>
</div>

<div class="recebe" id="2" style="margin-top:80px;">   
    <div class="imgIcone" id="design"></div>
    <div class="nome">Design</div>
</div>


<div id="perfil">
	<div id="imgPerfil" style="float:left;"></div>   
	<div id="nomePerfil" style="float:left; padding:3px;"> Tadeu Barbosa </div> 
</div>



<div id="menu"></div>

<div id="corpo"></div>

<div id="iniciar"></div>

<div id="rodape"></div>


<div id="resultado"></div>

<div id="recebeCenter"></div>

<script>

    $('#iniciar').click( function(){		
        if($('#menu').css('display')=='block')
        {
            $('#menu').hide();
            $('#iniciar').css({
                'background' : 'url(inicar.png) no-repeat center',
                'background-size' : '80%'
            });
            $('.menuicone').hide();
        }
        else
        {
            $('#menu').css('display', 'block');
            $('#iniciar').css({
                'background' : 'url(inicarDois.png) no-repeat center',
                'background-size' : '80%'
            });
        }

        $('.menuIcone').hide();	
        $('.painelSegundo').hide();
    })

    $('#corpo').click( function(){
        $('#menu').hide();
        $('.menuIcone').hide();

        $('#iniciar').css({
            'background' : 'url(inicar.png) no-repeat center',
            'background-size' : '80%'
        });
        $('.painelSegundo').hide();	
    })

    $('#rodape').click( function(){		
        $('#menu').hide();	
        $('.menuIcone').hide();	

        $('#iniciar').css({
            'background' : 'url(inicar.png) no-repeat center',
            'background-size' : '80%'
        });
        $('.painelSegundo').hide();
    })


    $('.recebe').click( function(){
        if( $('#menuIcone' + $(this).attr('id') ).css('display') == 'none' )
        {
            $('.menuicone').hide();
            $('#menuIcone' + $(this).attr('id') ).show();

            $('#iniciar').css({
                'background' : 'url(inicar.png) no-repeat center',
                'background-size' : '80%'
            });
            $('#menu').hide();
            $('.painelSegundo').hide();
        }
        else if( $('#menuIcone' + $(this).attr('id') ).css('display') == 'block' )
        {
            $('.menuicone').hide();
            $('.painelSegundo').hide();
        }
    })


    $('.Painel').click( function(){		
        id = '#' + $(this).attr('id') + 'Painel';		
        $(id).toggle('slow');
    })


    function mudarFundo(cor)
    {
        $('body').css({'background-color' : cor});
        $.cookie('cor', cor, {expires: 31} );
    }

</script>
