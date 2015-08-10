        <?php
            require_once 'config/load.php';
            
            empty($_GET['key'])? header("Location: index.php"): null;

            $key = escape(strip_tags($_GET['key']));
            $clasf = isset($_GET['clasf'])? escape($_GET['clasf']): 'id';
            $ordem = isset($_GET['ordem'])? strtoupper(escape($_GET['ordem'])): 'DESC';
        
            $sql = Banco::query("SELECT * FROM produto WHERE
                nome LIKE '%{$key}%' OR
                categoria LIKE '%{$key}%' OR
                dados LIKE '%{$key}%'
                ORDER BY {$clasf} {$ordem}
            ");
        ?>

        <style>
        #busca-sem-produtos{text-align:right;font-size:50px;color:#CCC;text-shadow:0 -1px 1px #999, -1px 0 1px #999;padding:70px 70px 70px 10px}
        #busca-sem-produtos span{display:block;padding-right:10px;font-size:70px;font-weight:bolder;color:#999;text-shadow:0 -1px 1px #555, -1px 0 1px #555}
        </style>
        
        <div class="clear box-sizing" id="template-conteudo">
            
            <div class="clear box-sizing" id="template-conteudo-menu">
                <a href="http://localhost/lh-suplementos/"></a>
                <span>Busca: <?php echo strip_tags($key);?></span>
            </div>
            
            <?php
                if($sql->num_rows){
                    
                    while($row=$sql->fetch_object()){
                        
                        $row->img = unserialize($row->img);
                        $row->dados = unserialize($row->dados);
                        $row->valor = explode('|', $row->valor);
                        $row->valor = $row->valor[0];
                        
                        for($x=$row->id; $x<=10; $x++){$row->id = "0$row->id";}
                        
                        $link = sprintf("$row->id-%s.html",tratar($row->nome) );
                        
                        echo "
                            <div class=\"box-sizing template-conteudo-centro\" id=\"$row->key\">
                                <div class=\"template-conteudo-centro-adicionado\"></div>
                                <div class=\"template-conteudo-centro-img\" style=\"background-image:url('http://localhost/lh-suplementos/img/prod/{$row->img[0]}');\"></div>
                                <a class=\"template-conteudo-centro-nome\" href=\"http://localhost/lh-suplementos/produto/$link\">$row->nome</a>
                                <span class=\"template-conteudo-centro-precoAntigo\">De R$ ". number_format((float)($row->valor+15), 2, '.', '') ."</span>
                                <span class=\"template-conteudo-centro-preco\">Por R$ <span>$row->valor</span></span>
                                <a class=\"template-conteudo-centro-adicionar\" href=\"javascript:void(0)\">Adicionar ao Carrinho</a>
                            </div>
                        ";
                        
                    }
                    
                } else {
                    
                    echo "
                        <div class=\"box-sizing\" id=\"busca-sem-produtos\">
                            Desculpe, não encontramos nenhum produto com a sua busca: <span>{$key}</span>
                        </div>
                    ";

                }
            ?>

        </div>
        
    <?php require_once 'partes/rodape.php'; ?>