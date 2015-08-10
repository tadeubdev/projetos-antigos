        <?php
            require_once 'config/load.php';

            $cat = str_ireplace('-',' ', escape($_GET['categoria']));
            $selecione = Banco::query("SELECT * FROM produto WHERE categoria='{$cat}'");
        ?>

        <div class="clear box-sizing" id="template-conteudo">

            <div class="clear box-sizing" id="template-conteudo-menu">
                <a href="../"></a>
                <span style="text-transform:capitalize;">Categoria: <?php echo $cat;?></span>
            </div>

            <?php
                if($selecione->num_rows){

                    while($row=$selecione->fetch_object()){

                        $row->img = unserialize($row->img);
                        $row->dados = unserialize($row->dados);
                        $row->valor = explode('|', $row->valor);
                        $row->valor = $row->valor[0];

                        for($x=$row->id; $x<=10; $x++){$row->id = "0$row->id";}

                        $link = sprintf("$row->id-%s.html",tratar($row->nome) );

                        echo "
                            <div class=\"box-sizing template-conteudo-centro\" id=\"{$row->id}\">
                                <div class=\"template-conteudo-centro-adicionado\"></div>
                                <div class=\"template-conteudo-centro-img\" style=\"background-image:url('".URL."img/prod/{$row->img[0]}');\"></div>
                                <a class=\"template-conteudo-centro-nome\" href=\"".URL."produto/{$link}\">".utf8_encode($row->nome)."</a>
                                <span class=\"template-conteudo-centro-precoAntigo\">De R$ ". number_format((float)($row->valor+15), 2, '.', '') ."</span>
                                <span class=\"template-conteudo-centro-preco\">Por R$ <span>{$row->valor}</span></span>
                                <a class=\"template-conteudo-centro-adicionar\" href=\"javascript:void(0)\">Adicionar ao Carrinho</a>
                            </div>
                        ";
                    }

                } else {

                    echo "
                        <div class=\"box-sizing\" id=\"busca-sem-produtos\">
                            Desculpe, não temos nenhum<br/> item na categoria <span>{$cat},</span>por enquanto... =\
                        </div>
                    ";

                }
            ?>

        </div>

    <?php require_once 'partes/rodape.php'; ?>