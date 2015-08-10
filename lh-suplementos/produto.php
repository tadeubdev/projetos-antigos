        <?php
            require_once 'config/load.php';
            if(!isset($_GET['produto'])){ header("Location: ../../"); }

            $get = escape($_GET['produto']);
            $arr = explode('-', $get);
            $id = ceil($arr[0]);


            // @$arr = json_decode($_COOKIE['car']);
            // var_dump($arr);
            // foreach($arr as $int=>$obj){}


            $produto = Banco::query("SELECT * FROM produto WHERE id='{$id}'");
            if(!$produto->num_rows){header("Location: ../../");}
            $row = $produto->fetch_object();
            $row->nome = utf8_encode($row->nome);
            $row->img = unserialize($row->img);
            $row->dados = unserialize($row->dados);
            $row->valor = $row->valor;

            $row->key = $row->id;

            for($x=$row->key; $x<=10; $x++){$row->key = "0$row->key";}

            $prod = json_encode(
                array( 'imgs'=>$row->img, 'dados'=>$row->dados, 'valor'=>$row->valor)
            );

            echo sprintf("\n <script>var prod = %s;</script> \n", $prod);
        ?>

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=530146637026914";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <div class="clear box-sizing" id="template-conteudo">

            <div class="clear box-sizing" id="template-conteudo-menu">
                <a href=""></a>
                <?php echo "<a href=\"../categoria/".tratar($row->categoria)."\">$row->categoria</a>";?>
                <span><?php echo $row->nome;?></span>
            </div>

            <div id="template-conteudo-prod">

                <div class="clear box-sizing" id="tabela-car">

                    <div id="tabela-car-imagem" class="clear box-sizing">
                        <div style="background-image: url('<?php echo URL; ?>img/prod/<?php echo $row->img[0];?>');" id="tabela-car-imagem-principal"></div>

                        <div class="clear box-sizing" id="tabela-car-imagem-outras">
                        <?php
                            foreach($row->img as $img){
                                echo "<div style=\"background-image: url('".URL."img/prod/$img');\"></div>";
                            }
                        ?>
                        </div>
                    </div>

                    <div class="clear box-sizing" id="tabela-car-painel">

                        <div id="tabela-car-nome"><?php echo $row->nome;?></div>

                        <div id="tabela-car-valor"> R$ <span><?php echo $row->valor[0];?></span> </div>

                        <iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo URL;?>&;layout=standard&show_faces=false&width=1000&action=like&colorscheme=light&height=&locale=pt_BR" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:400px; margin: 20px 20px 0 20px; height:25px;" allowTransparency="true"></iframe>

                        <div id="tabela-car-descricao">
                            Em até <span>12</span>x de R$<span><?php echo number_format((float)($row->valor/12), 2, '.', '');?></span>
                            ou à vista por R$<span><?php echo $row->valor;?></span>
                        </div>

                        <div id="tabela-car-tamanhos">
                            Tamanhos
                            <div class="clear">
                            <?php
                            if($row->dados){
                                foreach($row->dados as $tam=>$dad){
                                    $sabores = "";
                                    foreach($dad as $sab=>$quant){ $sabores .= "$sab|$quant||"; }

                                    echo sprintf("<span sabs=\"$sabores\" class=\"tabela-car-dados\">%s</span>", $tam);
                                }
                            }
                            ?>
                            </div>
                        </div>

                        <div style="display:none" id="tabela-car-sabores">
                            Sabores
                            <div class="clear"></div>
                        </div>

                        <button key="<?php echo $row->key;?>" id="tabela-car-finalizar"></button>

                    </div>

                </div>

                <div class="clear box-sizing" id="template-car-menu">

                    <div class="clear box-sizing" id="template-car-menu-links">
                        <a name="comentarios" href="javascript:void(0)"> Comentários </a>
                        <a name="descricao" href="javascript:void(0)"> Descrição </a>
                        <a name="ingredientes" href="javascript:void(0)"> Ingredientes </a>
                        <a name="beneficios" href="javascript:void(0)"> Benefícios </a>
                        <a name="tabela" href="javascript:void(0)"> Tabela Nutricional </a>
                    </div>

                    <div class="clear box-sizing" id="template-car-menu-painel">

                        <div class="clear box-sizing template-car-menu-painel">
                            <center><div class="fb-comments" data-href="<?php echo URL;?>" data-width="700" data-num-posts="10"></div></center>
                        </div>

                        <div class="clear box-sizing template-car-menu-painel">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere animi impedit voluptate voluptatum error porro eos obcaecati nihil ea minima. Quas nemo soluta ratione unde. Similique libero hic quaerat a.
                        </div>

                        <div class="clear box-sizing template-car-menu-painel">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, quas placeat iusto voluptates adipisci repellat officiis accusamus velit quod sint architecto rem quasi similique ad aspernatur quisquam ea necessitatibus quos.
                        </div>

                        <div class="clear box-sizing template-car-menu-painel">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores officiis error dolorum dolore delectus non quo quaerat eligendi voluptas molestiae quos eum temporibus odit earum voluptatum maxime illum quibusdam.
                        </div>

                        <div class="clear box-sizing template-car-menu-painel">
                            <table width="394" cellspacing="1" cellpadding="3" bordercolor="#000000" border="1" align="left">
                                <tbody>
                                    <tr>
                                        <td width="398" bgcolor="#ffffff">
                                            <table width="381" cellspacing="0" cellpadding="0" border="0">
                                                <tbody><tr>
                                                    <td valign="middle" align="left" colspan="5">
                                                        <font size="2">
                                                            <strong>Informações Nutricionais</strong>
                                                            <br>
                                                            Porção: 3,8g (4 cápsulas)
                                                            <br>Conteúdo: 120 ou 240 cápsulas
                                                        </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="3" bgcolor="#000000" colspan="5"> </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="1" bgcolor="#dcdcdc" colspan="5"> </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="4" height="9"> </td>
                                                        <td width="202" height="9">
                                                            <p align="center"> </p>
                                                            <br>
                                                        </td>
                                                        <td valign="middle" height="9" align="center" colspan="2">
                                                            <p align="center">
                                                                <font size="2">
                                                                    Quantidade<br>por porção
                                                                </font>
                                                            </p>
                                                        </td>
                                                        <td width="63" valign="middle" height="9" align="center">
                                                            <div align="center">
                                                                <font size="2">% IDR *</font>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="2" bgcolor="#000000" colspan="5"> </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="middle" height="16" align="left" colspan="2">
                                                            <font size="2">Vitaminas B6</font>
                                                        </td>
                                                        <td width="65" valign="middle" height="16" align="right">
                                                            <font size="2">1,3</font>
                                                        </td>
                                                        <td width="47" valign="middle" height="16" align="left">
                                                            <font size="2">mg</font>
                                                        </td>
                                                        <td width="63" height="16" align="right">
                                                            <div align="center">
                                                                <font size="2">100</font>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="1" bgcolor="#dcdcdc" colspan="5"> </td>
                                                    </tr><tr>
                                                    <td valign="middle" height="16" align="left" colspan="2">
                                                        <font size="2">Leucina </font>
                                                    </td>
                                                    <td width="65" valign="middle" height="16" align="right">
                                                        <font size="2">1360</font>
                                                    </td>
                                                    <td width="47" valign="middle" height="16" align="left">
                                                        <font size="2">mg</font>
                                                    </td>
                                                    <td width="63" height="16" align="right">
                                                        <div align="center">
                                                            <font size="2">100</font>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="1" bgcolor="#dcdcdc" colspan="5"> </td>
                                                </tr><tr>
                                                <td valign="middle" height="16" align="left" colspan="2">
                                                    <font size="2">Isoleucina</font>
                                                </td>
                                                <td width="65" valign="middle" height="16" align="right">
                                                    <font size="2">973</font>
                                                </td>
                                                <td width="47" valign="middle" height="16" align="left">
                                                    <font size="2">mg</font>
                                                </td>
                                                <td width="63" height="16" align="right">
                                                    <div align="center">
                                                        <font size="2">100</font>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="1" bgcolor="#dcdcdc" colspan="5"> </td>
                                            </tr>

                                            <tr>
                                                <td valign="middle" height="16" align="left" colspan="2">
                                                    <font size="2">Valina</font>
                                                </td>
                                                <td width="65" valign="middle" height="16" align="right">
                                                    <font size="2">973</font>
                                                </td>
                                                <td width="47" valign="middle" height="16" align="left">
                                                    <font size="2">mg</font>
                                                </td>
                                                <td width="63" height="16" align="right">
                                                    <div align="center">
                                                        <font size="2">100</font>
                                                    </div>
                                                </td>
                                            </tr>
                                                    <tr>
                                                        <td height="1" bgcolor="#dcdcdc" colspan="5"> </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="2" bgcolor="#000000" colspan="5"> </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="1" bgcolor="#dcdcdc" colspan="5"> </td>
                                                    </tr>
                                                    <tr>
                                                    <td colspan="5">
                                                        <font size="2">* Não contém quantidades de valor energético, carboidratos proteínas, gorduras totais, gorduras trans, fibras alimentar e sódio.% Ingestçao diária recomendada para adultos.
                                                        </font>
                                                    </td>
                                                </tr>
                                                    <tr>
                                                        <td height="1" bgcolor="#dcdcdc" colspan="5"> </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5">
                                                            <font size="2">
                                                                <strong>Ingredientes: </strong>Leucina, Isoleucina, Valina, Vitamina B6 e diôxido de silício (antiumectante).Não Contém Glúten
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr><td height="1" bgcolor="#dcdcdc" colspan="5"> </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5">
                                                            <font size="2">
                                                                <strong>Sugestão de Uso: </strong>Consumir 4 cápsulas ao dia, sendo 2 antes e 2 logo após o treino ou conforme orientação profissional.
                                                            </font>
                                                        </td>
                                                </tr>
                                                <tr>
                                                    <td height="1" bgcolor="#dcdcdc" colspan="5"> </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <font size="2">
                                                            <strong>Recomendação:</strong> Crianças, gestantes, idosos e portadores de qualquer enfermidade, consultem médico e/ou nutricionista. Consumir este produto conforme a Recomendação de Ingestão Diária constante da embalagem.
                                                            </font>
                                                        </font>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    <?php require_once 'partes/rodape.php'; ?>