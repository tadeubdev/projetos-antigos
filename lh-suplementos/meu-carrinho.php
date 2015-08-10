        <?php
            require_once 'config/load.php';
        ?>

        <script>
        $(function(){

            $('.tabela-botao-quantidade-menos').click(function(){
                var $pai = $(this).parent().children('span'),
                    $msg = $pai.parent().parent().children('.tabela-mensagem-estoque'),
                    $quant = $pai.parent().parent().parent().children('td:eq(0)').children('.quant'),
                    valor = parseInt($pai.html())||1;
                
                if(valor>1){
                    $msg.hide();
                    $pai.html(valor-1);
                    $quant.val(valor-1);
                    $_calcula();
                }
            });

            $('.tabela-botao-quantidade-mais').click(function(){
                var $pai = $(this).parent().children('span'),
                    $msg = $pai.parent().parent().children('.tabela-mensagem-estoque'),
                    $quant = $pai.parent().parent().parent().children('td:eq(0)').children('.quant'),
                    valor = parseInt($pai.html())||0,
                    key = $pai.parent().parent().parent().attr('key'),
                    max;

                $.post('functions.php',{type:'estoque',key:key},function(ret){
                    clearInterval(this.setT);
                    
                    if(valor<ret){
                        $msg.hide();
                        $pai.html(valor+1);
                        $quant.val(valor+1);
                        $_calcula();
                    } else {
                        $msg.show();
                        this.setT = setTimeout(function(){
                            $msg.fadeOut(1000);
                            clearInterval(this.setT);
                        },3000);
                    }
                });
            });

            function $_calcula(){
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
            };

            $_calcula();
        });
        </script>

        <style>
        #tabela{font-size:13px;text-align:center}
        #tabela,#tabela td,#tabela th,#tabela tr{border:1px solid #CCC}
        #tabela th{background:#444;border:0;color:#777;box-shadow:inset 0 0 40px #333;padding:10px 20px}
        #tabela td{position:relative}
        .tabela-nome{width:100%;min-height:20px;background:#DDD;color:#777;border-bottom:1px dotted #999;text-shadow:0 0 5px #888;padding:5px}
        .tabela-imagem{width:100%;height:240px;background-size:cover;background-position:center;background-repeat:no-repeat}
        .tabela-remover{width:20px;height:20px;display:block;cursor:pointer;background-image:url(http://localhost/lh-suplementos/img/icons.gif);background-position:50px -200px;margin:0 auto}
        .tabela-remover:hover{background-position:50px -231px}
        .tabela-mensagem-estoque{display:none;position:absolute;top:82px;left:-50px;z-index:4;box-shadow:0 7px 15px -5px #000;width:200px;background-color:#FFFFE8;color:#808054;border:1px solid rgba(0,0,0,.2);border-radius:5px;padding:3px}
        .tabela-mensagem-estoque-perninha{width:13px;height:13px;position:absolute;top:21px;left:100px;background-repeat:no-repeat;background-image:url(http://localhost/lh-suplementos/img/balloon.png)}
        .tabela-botao-quantidade{display:block;float:left;width:10px;font-size:20px;color:#444}
        .tabela-botao-quantidade-menos{font-size:30px;margin-top:-8px;margin-left:18px;}
        .tabela-botao-quantidade-mais{float:right; margin-right:18px;}
        .tabela-botao-quantidade-conteudo{display:block;float:left;width:50px;text-align:center;font-size:22px;color:#777}
        #tabela tbody tr:hover,#tabela tbody tr:hover input{background-color:#DDD}
        #tabela tfoot{line-height:30px;background:#DDD;color:#555;font-weight:bold;}
        #lista-carrinho-vazio{text-align:center;font-size:80px;color:#CCC;text-shadow:0 -1px 1px #999, -1px 0 1px #999;padding:120px 0}
        </style>

        <div id="template-conteudo">
            
            <div class="clear box-sizing" id="template-conteudo-menu">
                <a href="http://localhost/lh-suplementos/"></a>
                <span>Meu Carrinho</span>
            </div>
            
            <div id="template-conteudo-central" style="padding:10px">
                <?php
                    @$arr = json_decode($_COOKIE['car']);
                    
                    if($arr){
                ?>

                <form target="pagseguro" method="post" action="https://pagseguro.uol.com.br/v2/checkout/payment.html">  
                    <input type="hidden" name="receiverEmail" value="tadeubarbosa@live.com">  
                    <input type="hidden" name="currency" value="BRL">  
      
                    <table id="tabela" cellspacing="0">
                        <thead>
                            <tr height="40" class="tabela-titulo" >
                                <th width="300">Produtos</th>
                                <th width="40">Remover</th>
                                <th width="50">Quantidade</th>
                                <th width="100">Dados</th>
                                <th width="100">Preço Unitário</th>
                                <th width="100">Total</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                            $valor_final = 0;
                            $cont = 1;
                            
                            foreach($arr as $int=>$obj){
                                $key = ceil($int);
                                $nome = $obj->nome;
                                $valor = $obj->valor;
                                $image = $obj->image;
                                
                                $cons = Banco::query("SELECT * FROM produto WHERE `id`='{$key}'");

                                if($cons->num_rows){

                                    $row = $cons->fetch_object();
                                    $id = $row->id;
                                    $key = $row->key;

                                    $valor_final += $valor;
                                    
                                    echo"<tr class=\"tabela-produto\" id=\"item_$id\" key=\"$key\">
                                            <td>
                                                <input type=\"hidden\" name=\"itemId{$cont}\" value=\"{$id}\">  
                                                <input type=\"hidden\" name=\"itemDescription{$cont}\" value=\"{$nome}\">  
                                                <input type=\"hidden\" name=\"itemAmount{$cont}\" value=\"{$valor}\">  
                                                <input class=\"quant\" type=\"hidden\" name=\"itemQuantity{$cont}\" value=\"1\">  
                                                <input type=\"hidden\" name=\"itemWeight{$cont}\" value=\"1000\">

                                                <div>
                                                    <a href=\"{$obj->link}\">
                                                <div class=\"box-sizing tabela-nome\">$nome</div>
                                                        <div style=\"background-image:url($image)\" class=\"tabela-imagem\">
                                                    </a>
                                                </div>
                                            </td>
                                            
                                            <td> <span class=\"tabela-remover\"></span> </td>
                                            
                                            <td>
                                                <div class=\"clear box-sizing\">
                                                    <a class=\"tabela-botao-quantidade-menos tabela-botao-quantidade\" href=\"javascript:void(0)\">-</a>
                                                    <span class=\"tabela-botao-quantidade-conteudo\">1</span>
                                                    <a class=\"tabela-botao-quantidade-mais tabela-botao-quantidade\" href=\"javascript:void(0)\">+</a>
                                                </div>
                                                <div class=\"tabela-mensagem-estoque\">
                                                    <div class=\"tabela-mensagem-estoque-perninha\"></div> Limite de itens no estoque.
                                                </div>
                                            </td>

                                            <td> {$obj->dados} </td>
                                            
                                            <td class=\"tabela-unitario\"><div>R$ $valor</div></td>
                                            <td class=\"tabela-total\"><div>R$ $valor</div></td>
                                        </tr>";

                                    $cont++;
                                }
                            }
                        ?>
                        </tbody>

                        <tfoot>
                            <tr>
                                <td style="padding-right:10px;text-align:right;" colspan="5">Subtotal</td>
                                <td><span id="tabela-subtotal"></span></td>
                            </tr>
                        </tfoot>
                    </table>

                    <input type="hidden" name="encoding" value="UTF-8">
                    <input type="hidden" name="shippingType" value="1">
                    <input type="hidden" name="shippingAddressPostalCode" value="75701-360">  
                    <input type="hidden" name="shippingAddressStreet" value="Rua Doutor Prates">  
                    <input type="hidden" name="shippingAddressNumber" value="772">  
                    <input type="hidden" name="shippingAddressComplement" value="Casa 2">  
                    <input type="hidden" name="shippingAddressDistrict" value="Cetor Central">  
                    <input type="hidden" name="shippingAddressCity" value="Goiás">  
                    <input type="hidden" name="shippingAddressState" value="GO">  
                    <input type="hidden" name="shippingAddressCountry" value="BRA"> 
                      
                    <input type="image" name="submit"   
                    src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/120x53-pagar.gif"   
                    alt="Pague com PagSeguro"> 
                </form>
                        
                <?php
                    }

                    echo sprintf("<div %s id=\"lista-carrinho-vazio\">Carrinho vazio...</div>", ($arr ? 'style="display:none"': ''));
                ?>    
            </div>
        </div>

    <?php require_once 'partes/rodape.php'; ?>