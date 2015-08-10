<?php

    class Cart
    {

        public $cookieName = 'carrinho';

        public function __construct()
        {

            if ( $this->getCookie())
            {

                $produtos = array();

                foreach ( $this->getCookie() as $key => $value )
                {
                    if ( 0 == $value['product_amount']) return;

                    $produtos[$key] = $value;
                }

                $this->setCookie($produtos);

            }

        }

        /**
        *
        * string $value: Valor do cookie
        * int $dias: Dias em que o cookie estará válido
        *
        **/
        public function setCookie( $value, $dias=7 )
        {
            setcookie( $this->cookieName, serialize( $value ), ($dias*24*60*60), '/', "", "", true);
        }

        /////
        //

        public function getCookie()
        {
            return isset($_COOKIE[$this->cookieName]) ? unserialize($_COOKIE[$this->cookieName]) : null;
        }

        public function getProdutoById($id)
        {

            $produto = $this->getCookie();

            if ( !$produto) return;

            return isset($produto[$id]) ? $produto[$id] : null;
        }

        public function removerProdutoById($id)
        {

            $produtos = $this->getCookie();

            unset($produtos["produtos_{$id}"]);

            $this->setCookie($produtos);
        }

        ///
        //

        /**
        *
        * Remove um item de um produto
        * int $id: Id do produto
        *
        **/
        public function removerItem($id)
        {
            $produto = $this->getProdutoById($id);

            if ( !$produto) return;

            if ( 1 == $produto['product_amount'])
            {

                $this->removerProdutoById($id);

            }
            else
            {

                $produtos = $this->getCookie();

                $produtos["produtos_{$id}"]["product_amount"]--;

                $this->setCookie($produtos);

            }
        }

        /**
        *
        *
        **/
        public function adicionarItem($id, $quantidade=1)
        {

            if ( !$id) return;

            $produtos = $this->getCookie();

            if ( !isset($produtos["produtos_{$id}"])) return;

            $produtos["produtos_{$id}"]['product_amount'] += (int) ($quantidade? $quantidade: 0);

            $this->setCookie($produtos);

        }

        /**
        *
        *
        **/
        public function toHTML()
        {

            $produtos = $this->getCookie();

            if ( !count($produtos))
            {

                return 'Carrinho vazio.';

            }
            else
            {

                $table = array();

                $total = 0;

                foreach ( $produtos as $key => $value) {

                    $total += $subtotal = number_format($value['product_price'] * $value['product_amount'] , 2, ',', '.');

                    $table[] = array(

                        sprintf("Código %s - %s R$ %s - (Qtd %s) <br/>", $value['product_code'], $value['product_name'], number_format($value['product_price'], $value['product_amount']),

                        sprintf("%s - %s <br/>", $value['product_options']['tamanho'], $value['product_options']['cor']),

                        sprintf("R$ %s", $subtotal)

                    );
                }

                $table[] = sprintf("Itens: %s, Total: R$ %s", count($produtos), number_format($total, 2, ',', '.'));

                return $table;
            }

        }

    }

?>