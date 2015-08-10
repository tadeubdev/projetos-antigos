<?php 

include 'config/load.php';

$post = new stdClass;

$post->conta = 15;

$post->limite = 12;

$post->divisoria = ceil($post->conta/$post->limite);

$post->page = isset($_GET['Page_id']) ? $_GET['Page_id'] : 1;

if($post->page>$post->divisoria || !is_numeric($post->page)){header("Location: ../index.php");}

if($post->page <= $post->divisoria){
    
    $li = "";
    
    for($x=1; $x<=$post->divisoria; $x++){
        
        if($post->page==$x){
            
            $li .= "<li> <a id='disabled' href='page/$x'>$x</a> </li>";
             
            $post->max = $x*$post->limite - 1;
            $post->min = $x*$post->limite - $post->limite;
            
        } else {
            
            if($x>=($post->page-5) && $x<=($post->page+5)){
                
                $li .= "<li> <a href='page/$x'>$x</a> </li>";
                
            } else if($x==1){
                
                $li .= "<li> <a href='page/$x'>$x</a> </li>";
                
                $li .= $post->page>($post->limite-1) ? "<li> <a href='page/".($post->page-$post->limite)."'>...</a> </li>" : '';
                
            } else if($x==$post->divisoria){
                
                $li .= $post->page<($post->divisoria-6) ? "<li> <a href='page/".($post->page+6)."'>...</a> </li>" : '';
                
                $li .= "<li> <a href='page/$x'>$x</a> </li>";
                
            }
            
        }
        
    }

}

?>

        <script>
            $(function(){
               
               $("#template-conteudo-centro-paginacao a").button();
               
               $("#template-conteudo-centro-paginacao #disabled").button({ disabled: true });
               
               $("#template-conteudo-centro-destaque").tabs();
               
               $("#preco_do_carro-slider").slider({
                    range: true,
                    min: 1000,
                    max: 50000,
                    step: 1000,
                    values: [ 7000, 20000 ],
                    slide: function( event, ui ) {
                        $("#preco_do_carro").html("De R$" + ui.values[ 0 ] + " a R$" + ui.values[ 1 ] );
                    }
                });
                $("#preco_do_carro").html("De R$" + $("#preco_do_carro-slider").slider("values", 0) + " a R$" + $("#preco_do_carro-slider").slider("values", 1));
                
                
               $("#ano_do_carro-slider").slider({
                    range: true,
                    min: 1980,
                    max: <?php echo date('Y');?>,
                    values: [ 1995, 2010 ],
                    slide: function( event, ui ) {
                        $("#ano_do_carro").html("De " + ui.values[ 0 ] + " a " + ui.values[ 1 ] );
                    }
                });
                $("#ano_do_carro").html("De " + $("#ano_do_carro-slider").slider("values", 0) + " a " + $("#ano_do_carro-slider").slider("values", 1));
                
                
                var itens = {
                    'Carro' : {
                        'Fiat' : [
                            'car 1'
                        ],
                        'Volkswagem' : [
                            'Corsa',
                            'Gol',
                            'Tempra'
                        ],
                        'Fiat' : [
                            'car 1'
                        ]
                    },
                    'Moto' : {
                        'kawasaki' : [
                            'Kawasaki Ninja'
                        ]
                    }
                };
                
                var itens_i = 1;
                
                $.each(itens, function(i){
                    $('#template-conteudo-menu-busca-tipo').append(
                        $('<option/>', {'html':i, 'id':i})
                    );
                });
                
                $.each(itens.Carro, function(i,v){
                    $('#template-conteudo-menu-busca-marca').append(
                        $('<option/>', {'html':i, 'id':i})
                    );
                    
                    if(itens_i){
                        $.each(v, function(ind,val){
                            $('#template-conteudo-menu-busca-veiculos').append(
                                $('<option/>', {'html':val})
                            );
                        });
                        itens_i=0;
                    }
                });
                
                $('#template-conteudo-menu-busca-tipo').click(function(){
                    var tipo = $(this).val();
                    itens_i = 1;
                    $('#template-conteudo-menu-busca-marca, #template-conteudo-menu-busca-veiculos').html('');
                    $.each(itens[tipo], function(i,v){
                        $('#template-conteudo-menu-busca-marca').append(
                            $('<option/>', {'html':i})
                        );
                        if(itens_i){
                            $.each(v, function(ind,val){
                                $('#template-conteudo-menu-busca-veiculos').append(
                                    $('<option/>', {'html':val})
                                );
                            });
                            itens_i=0;
                        }
                    });
                });
                
                $('#template-conteudo-menu-busca-marca').click(function(){
                    var tipo = $('#template-conteudo-menu-busca-tipo').val(), marca = $(this).val();
                    $('#template-conteudo-menu-busca-veiculos').html('');
                    $.each(itens[tipo][marca], function(i,v){
                        $('#template-conteudo-menu-busca-veiculos').append(
                            $('<option/>', {'html':v})
                        );
                    });
                });
                
            });
        </script>
    
            <div class="clear" id="template-conteudo">
                
                <div class="box-sizing" id="template-conteudo-centro">
                    
                    <div id="template-conteudo-centro-destaque">
                        
                        <ul class="clear" id="template-conteudo-centro-destaque-menu">
                            <li class="template-conteudo-centro-destaque-menu template-conteudo-centro-destaque-menu-selecionado"> <a href="#template-conteudo-centro-destaque-conteudo-mais_visitado">Mais Visitados</a> </li>
                            <li class="template-conteudo-centro-destaque-menu"> <a href="#template-conteudo-centro-destaque-conteudo-mais_votado">Mais Votados</a> </li>
                        </ul>
                        
                        <div class="clear" id="template-conteudo-centro-destaque-conteudo">
                            
                            <ul class="clear" id="template-conteudo-centro-destaque-conteudo-mais_visitado">
                                <?php
                                    $car = array('img-anuncios/1.jpg','img-anuncios/2.jpg','img-anuncios/3.jpg','img-anuncios/4.jpg');
                                    
                                    for($x=0; $x<6; $x++){
                                        echo "<li> <a href=\"#\"><div class=\"bg-cover-ie\" style=\"background-image:url('".$car[rand(1,count($car))-1]."');\"></div></a> </li>";
                                    }
                                ?>
                            </ul>
                            
                            <ul class="clear" id="template-conteudo-centro-destaque-conteudo-mais_votado">
                                <?php
                                    for($x=0; $x<6; $x++){
                                        echo "<li> <a href=\"#\"><div class=\"bg-cover-ie\" style=\"background-image:url('".$car[rand(1,count($car))-1]."');\"></div></a> </li>";
                                    }
                                ?>
                            </ul>
                            
                        </div>
                        
                    </div>
                    
                    <ul class="clear" id="template-conteudo-centro-anuncios">
                        <?php
                            for($x=$post->min; $x<=$post->max; $x++){
                                if($x<=$post->conta){
                                    echo "<li class=\"clear box-sizing template-conteudo-centro-anuncios\">
                                            <div class=\"box-sizing bg-cover-ie template-conteudo-centro-anuncios-img\" style=\"background-image:url('".$car[rand(1,count($car))-1]."');\"></div>
                                            <div class=\"box-sizing template-conteudo-centro-anuncios-texto\">
                                                <a class=\"template-conteudo-centro-anuncios-titulo\" href='item/id-nome-d-carro.html'>Nome do Carro - 2000</a>

                                                <div class=\"template-conteudo-centro-anuncios-descricao\">
                                                    R$ 20.000,00

                                                    <div class=\"template-conteudo-centro-anuncios-descricao-rodape\">
                                                        postado por
                                                        <a class=\"template-conteudo-centro-anuncios-descricao-rodape-autor\" href='user/tadeubarbosa'>Tadeu Barbosa</a> .
                                                        <a class=\"template-conteudo-centro-anuncios-descricao-rodape-denunciar\" href='denunciar/id'>Denunciar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>";
                                }
                            }
                        ?>
                    </ul>
                    
                    <?php echo "<ul class='box-sizing clear' id='template-conteudo-centro-paginacao'> {$li} </ul>"; ?>
                    
                </div>
                
                <div class="box-sizing" id="template-conteudo-menu">
                    
                    <div class="box-sizing template-conteudo-menu" id="template-conteudo-menu-busca">
                        <span class="template-conteudo-menu-titulo">Buscar Veículos</span>
                        
                        <input type="text" placeholder="Nome, ex.: Gol" id="template-conteudo-menu-busca-nome"/>
                        
                        <span style="display:block; padding:10px 5px;">ou ...</span>
                        
                        <select id="template-conteudo-menu-busca-tipo"></select>
                        
                        <select id="template-conteudo-menu-busca-marca"></select>
                        
                        <select id="template-conteudo-menu-busca-veiculos"></select>
                        
                        <br/>
                        
                        <input checked name="novo-seminovo" type="radio"> Novo
                        <input name="novo-seminovo" type="radio"> Seminovo
                        
                        <div style="padding:5px 0; margin-top:5px; border-top:1px dotted #DDD;">
                            Preço
                            <div id="preco_do_carro" style="border:0; color: #f6931f; font-weight:bold;" /></div>
                            <div style="margin:5px 0;" id="preco_do_carro-slider"></div>
                        </div>
                        
                        <div style="padding:5px 0; margin-bottom:5px; border-top:1px dotted #DDD;">
                            Ano
                            <div id="ano_do_carro" style="border:0; color:#f6931f; font-weight:bold;" /></div>
                            <div style="margin:5px 0;" id="ano_do_carro-slider"></div>
                        </div>
                        
                        <button id="template-conteudo-menu-busca-botao">Procurar</button>
                        
                    </div>
                    
                    <div class="box-sizing template-conteudo-menu" id="template-conteudo-menu-busca">
                        <span class="template-conteudo-menu-titulo">title</span>
                        
                    </div>
                    
                </div>
                
            </div>
            
            <div id="template-rodape">
                
            </div>
            
        </div>
        
    </body>
</html>
