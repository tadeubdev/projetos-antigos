        <?php
        require_once 'config/load.php';

        $post = (object) array();

        $post->limite = 12;

        $post->min = 1;

        $post->max = 12;

        $seleciona = Banco::query("SELECT * FROM produto");

        $post->divisoria = ceil($seleciona->num_rows/$post->limite);

        $post->page = isset($_GET['Page_id']) ? $_GET['Page_id'] : 1;

        // if($post->page>$post->divisoria || !is_numeric($post->page)){header("Location: ../404.php");}

        $li = "";

        for($x=1; $x<=$post->divisoria; $x++){
            if($post->page==$x){
                $li .= "<span>{$x}</span>";
                $post->max = $x*$post->limite - 1;
                $post->max = ($post->max>$seleciona->num_rows) ? $seleciona->num_rows: $post->max;

                $post->min = $x*$post->limite - $post->limite;
            } else {
                if($x>=($post->page-5) && $x<=($post->page+5)){
                    $li .= "<a href='".URL."page/$x'>{$x}</a>";
                } else if($x==1){
                    $li .= "<a href='".URL."page/{$x}'>{$x}</a>";
                    $li .= $post->page>($post->limite-1) ? "<a href='".URL."page/".($post->page-$post->limite)."'>...</a>" : '';
                } else if($x==$post->divisoria){
                    $li .= $post->page<($post->divisoria-6) ? "<a href='".URL."page/".($post->page+6)."'>...</a>" : '';
                    $li .= "<a href='".URL."page/{$x}'>{$x}</a>";
                }
            }
        }
        ?>

        <script>
        $(function(){
            var caminho='', cam=location.href.split('/'),
                slide=$('#slide li'), slide_i=1, slide_last=slide.size()-1;

            slide.first().show();

            for(var x=0; x<=3; x++){caminho += cam[x] + '/';}

            setInterval(function(){
                slide.hide().eq(slide_i).fadeIn(800);
                slide_i = (slide_i==slide_last ? 0 : slide_i+1);
            }, (5 * 1000));
        })
        </script>

        <style>
        #box-model{display:none;width:100%;height:100%;position:fixed;top:0;left:0;z-index:9999999999;background:rgba(0,0,0,.8)}
        #box-model-center{width:900px;height:500px;position:absolute;top:0;bottom:0;left:0;right:0;background:#FFF;box-shadow:inset 0 0 200px rgba(0,0,0,.3), 0 30px 20px -10px rgba(0,0,0,.5);margin:auto}
        #box-model-center-titulo{width:100%;height:50px;line-height:50px;font-weight:bolder;font-size:25px;color:rgba(0,0,0,.2);padding-left:20px;background:#69916B;border-bottom:3px solid rgba(0,0,0,.1)}
        #box-model-center-titulo span{color:rgba(0,0,0,.3)}
        #box-model-center-titulo a{display:block;float:right;width:24px;height:15px;background-image:url(img/icons.gif);background-position:-130px 0;background-repeat:no-repeat;margin:0 5px}
        #box-model-center-titulo a:hover{background-position:-160px 0}
        #box-model-center-imagem{width:13%;height:450px;float:left;border-right:3px solid #CCC;background:#DDD}
        #box-model-center-imagem div{width:100%;height:25%;border-bottom:2px solid #CCC;background-size:contain;background-repeat:no-repeat;background-position:center}
        #box-model-center-conteudo{width:87%;height:450px;float:left}
        #box-model-center-conteudo-preco{width:100%;padding:10px;border-bottom:2px solid rgba(0,0,0,.1);font-weight:bold;font-size:20px;line-height:30px;color:#627264;background:#b0bbb2;}
        #box-model-center-conteudo-preco span{font-weight:normal;}

        .box-model-center-conteudo-sabores_tamanhos{}
        .box-model-center-conteudo-sabores_tamanhos-titulo{width:100%;display:block;background:#DDD;padding:6px 10px;font-size:14px;color:#777;}
        .box-model-center-conteudo-sabores_tamanhos-conteudo{padding:10px;font-size:13px;color:#999;}
        .box-model-center-conteudo-sabores_tamanhos-conteudo a{display:block;float:left;color:#777;background:#b8cca7;padding:5px 10px;border-right:1px dotted #999;}
        .box-model-center-conteudo-sabores_tamanhos-conteudo a.sel{background:#6a9249 !important;color:#285800;}
        #box-model-center-conteudo-comprar{width:236px;height:68px;display:block;cursor:pointer;border:0;background-image:url(img/sprite.png);background-position:0 -262px;margin:60px auto}
        </style>

        <div class="clear box-sizing" id="box-model">
            <div class="clear box-sizing" id="box-model-center">
                <div class="clear box-sizing" id="box-model-center-titulo">Adicionar <span>{$item}</span> ao carrinho  <a href="javascript:void(0)" onclick="$('#box-model').fadeOut('800');"></a></div>

                <div class="clear box-sizing" id="box-model-center-imagem">
                    <div style="background-image:url('img/prod/7.jpg')" class="box-sizing"></div>
                    <div style="background-image:url('img/prod/7.jpg')" class="box-sizing"></div>
                    <div style="background-image:url('img/prod/7.jpg')" class="box-sizing"></div>
                    <div style="background-image:url('img/prod/7.jpg')" class="box-sizing"></div>
                </div>

                <div class="clear box-sizing" id="box-model-center-conteudo">
                    <div id="box-model-center-conteudo-preco" class="box-sizing">R$ <span>111.11</span> </div>

                    <div class="box-sizing box-model-center-conteudo-sabores_tamanhos">
                        <span class="box-sizing box-model-center-conteudo-sabores_tamanhos-titulo">Sabores</span>

                        <div class="box-sizing clear box-model-center-conteudo-sabores_tamanhos-conteudo"> </div>
                    </div>

                    <div class="box-sizing box-model-center-conteudo-sabores_tamanhos">
                        <span class="box-sizing box-model-center-conteudo-sabores_tamanhos-titulo">Tamanhos</span>

                        <div class="box-sizing clear box-model-center-conteudo-sabores_tamanhos-conteudo"> </div>
                    </div>

                    <div id="box-model-center-conteudo-comprar" class="box-sizing"></div>
                </div>
            </div>
        </div>

        <ul id="slide">
            <li style="background-image:url('img/segurança.jpg');"></li>
            <li style="background-image:url('img/suplementos.jpg');"></li>
        </ul>

        <div class="clear box-sizing" id="template-conteudo">

            <div class="clear box-sizing" id="template-conteudo-centro">

                <?php
                    $produtos = Banco::query("SELECT * FROM produto ORDER BY id DESC LIMIT {$post->min},{$post->max}");

                    if($produtos->num_rows){

                        $dados = array();

                        while($row=$produtos->fetch_object()){
                            $row->nome = utf8_encode($row->nome);
                            $row->img = unserialize($row->img);
                            $row->dados = unserialize($row->dados);
                            $row->valor = explode('|', $row->valor);
                            $row->valor = $row->valor[0];

                            if($row->dados){

                                foreach($row->dados as $sab){
                                    $dados[$row->id]['sabor'][] = $sab['sabor'];
                                    $dados[$row->id]['dados'] = $sab['dados'];
                                }

                            }

                            $row->id2 = $row->id;

                            for($x=$row->id; $x<=10; $x++){$row->id = "0$row->id";}

                            $dados[$row->id2]['nome'] = $row->nome;
                            $dados[$row->id2]['img'] = "img/prod/".$row->img[0];
                            $dados[$row->id2]['id'] = $row->id;

                            $link = sprintf("$row->id-%s.html",tratar($row->nome) );

                            echo "
                                <div class=\"box-sizing template-conteudo-centro\" id=\"{$row->id}\">
                                    <div class=\"template-conteudo-centro-adicionado\"></div>
                                    <div class=\"template-conteudo-centro-img\" style=\"background-image:url('img/prod/{$row->img[0]}');\"></div>
                                    <a class=\"template-conteudo-centro-nome\" href=\"produto/{$link}\">{$row->nome}</a>
                                    <span class=\"template-conteudo-centro-precoAntigo\">De R$ ". number_format((float)($row->valor+15), 2, '.', '') ."</span>
                                    <span class=\"template-conteudo-centro-preco\">Por R$ <span>{$row->valor}</span></span>
                                    <a class=\"template-conteudo-centro-adicionar\" href=\"javascript:void(0)\">Adicionar ao Carrinho</a>
                                </div>
                            ";

                        }

                        echo sprintf("\n <script>var prod = %s;</script> \n", json_encode($dados));

                    } else {

                        echo "<div class=\"box-sizing\" id=\"busca-sem-produtos\">
                                Desculpe, não temos nenhum<br/> produto por enquanto... =\
                            </div>";

                    }
                ?>

                <div class="clear box-sizing" id="template-conteudo-centro-paginacao">
                    <?php echo $li; ?>
                </div>

            </div>

            <div class="clear box-sizing" id="template-conteudo-lateral">
                lateral
            </div>

        </div>

    <?php require_once 'partes/rodape.php'; ?>