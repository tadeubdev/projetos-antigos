<?php 
    if(!isset($_COOKIE['i'])){header('Location: home.php');}
    include 'config/load.php';
    include'partes/header.php';
?>

<script>
$(function(){
    
    $('#template-conteudo-centro-new-lat div').bind('click',function(){
        var $this = $(this),
        pai = $this.parent(),
        lis = pai.children('ul').children('li'),
        classe = 'template-conteudo-centro-new-sel',
        index = $('.'+classe).index(),
        conta = lis.size()-1;
        
        switch($this.index()){
            case 0:
                index = (index>0 ? index-1 : conta);
                break;
            ///////////
            case 2:
                index = (index<conta ? index+1 : 0);
                break;
            ///////////
        }
        
        lis.removeClass(classe).hide().eq(index).addClass(classe).fadeIn(400);
    });
    
    $('#template-conteudo-centro-new-centro-menu a').bind('click',function(){
        var $this = $(this),
        classe = 'template-conteudo-centro-new-centro-menu-sel',
        irmaos = $this.parent().children('a'),
        index = $this.index();
        
        irmaos.removeClass(classe);
        $this.addClass(classe);
        if($('#template-conteudo-centro-new-centro-cont li').eq(index).is(':hidden')){
            $('#template-conteudo-centro-new-centro-cont li').hide().eq(index).fadeIn(400);
        }
    });
    
    
    $('#template-conteudo-centro-new-lat-postar').bind('click',function(){
        var valor = $('#template-conteudo-centro-new-centro-cont textarea').val();
        
        $('<div/>',{
            'class' : 'clear template-conteudo-centro-postagens'
        })
        .append( $('<div/>',{'class':'template-conteudo-centro-postagens-img'}) )
        .append(
            $('<div/>',{'class':'template-conteudo-centro-postagens-cont'})
            .append( $('<a/>', {'html':'Tadeu Barbosa', 'href':'#'}) )
            .append( $('<div/>', {'html':valor}) )
        )
        .append(
            $('<div/>',{'class':'template-conteudo-centro-postagens-footer'})
        )
        .prependTo('#template-conteudo-centro-postagens');
        
        $('#template-conteudo-centro-new-centro-cont textarea').height(98).val('');
    });
    
    $('#template-conteudo-centro-new-centro-cont textarea').bind('keyup click blur keydown focusOut',function(){
        var valor = $(this).val().split(''),
        x = 0;
        
        for(var i=0; i<valor.length; i++){
            valor[i]=='\n' ? x++ : '';
        }
        
        if(x<5){
            x = 98;
        } else if(x>=5 && x<17){
            x = (x*10)+98;
        } else {
            x = 270;
        }
        
        $(this).height(x);
        
    });
    
//    <div class="clear template-conteudo-centro-postagens">
//        <div class="template-conteudo-centro-postagens-img"></div>
//        <div class="template-conteudo-centro-postagens-cont">
//            <a href="#">Tadeu Barbosa</a>
//            <div>123456 olá </div>
//        </div>
//        <div class="template-conteudo-centro-postagens-footer">
//
//        </div>
//    </div>
    
});
</script>

<div class="box" style="width:100%;">
    
    <div class="clear" id="template-menu">
        <a href="index.php">Home</a>
    </div>
    
    <div id="template-conteudo" class="clear">
        
        <div id="template-conteudo-centro">
            
            <div class="clear" id="template-conteudo-centro-new">
                
                <div class="clear" id="template-conteudo-centro-new-centro">
                    <div class="clear" id="template-conteudo-centro-new-centro-menu">
                        <a class="template-conteudo-centro-new-centro-menu-sel" href="javascript:void(0)">Texto</a>
                        <a href="javascript:void(0)">Imagem</a>
                    </div>
                    <ul class="clear" id="template-conteudo-centro-new-centro-cont">
                        <li> <textarea placeholder="~le postagem"></textarea> </li>
                        <li> img </li>
                    </ul>
                </div>
                
                <div class="clear" id="template-conteudo-centro-new-lat">
                    
                    <div class="clear" id="template-conteudo-centro-new-lat-topo">
                        <div class="template-conteudo-centro-new-lat-setas">&ltrif;</div>
                        <ul>
                            <?php
                                for($x=1; $x<=26; $x++){
                                    echo "<li ".($x==1 ? "class=\"template-conteudo-centro-new-sel\"" : '')."><img src=\"reacao/$x.jpg\"></li>";
                                }
                            ?>
                            
                        </ul>
                        <div class="template-conteudo-centro-new-lat-setas">&rtrif;</div>
                    </div>
                    
                    <div id="template-conteudo-centro-new-lat-memes">
                        <input type="checkbox" checked> Inserir um meme
                    </div>
                    
                    <button id="template-conteudo-centro-new-lat-postar">Postar</button>
                </div>
            </div>
             
            <div class="clear" id="template-conteudo-centro-postagens">
                
                <div class="clear template-conteudo-centro-postagens">
                    <div class="template-conteudo-centro-postagens-img"></div>
                    <div class="template-conteudo-centro-postagens-cont">
                        <a href="#">Tadeu Barbosa</a>
                        <div>123456 olá </div>
                    </div>
                    <div class="template-conteudo-centro-postagens-footer">
                        
                    </div>
                </div>
                
            </div>
            
        </div>
        
        <div id="template-conteudo-lateral">
            
        </div>
        
    </div>
    
</div>