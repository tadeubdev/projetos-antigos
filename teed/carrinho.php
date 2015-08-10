<?php
ob_start(); session_start();

if(isset($_SESSION['itsmemario'])){
    
    extract($_POST);
    
    include 'class/Carrinho.class.php';
    
    switch ($action) {
        
        case 'carrinho-adc':
            $item = null;
            $item->id = $detalhes[0];
            $item->nome = $detalhes[1];
            $item->img = $detalhes[2];
            $item->preco = $detalhes[3];
            
            Carrinho::add($item->id, $item->nome, $item->img, $item->preco);
            break;
        
        case 'carrinho-remover':
            Carrinho::remover($id);
            break;
        
        case 'carrinho-clear':
            Carrinho::clear();
            break;
        
    }
    
} else {
    echo "<style>html,body{height:100%;}#alerta{position:fixed;width:100%;height:100%;background:#000;box-shadow:inset 0 0 900px rgba(255,0,0,.1);z-index:50000;margin:0;}#alerta div{background:#FFF;color:#222;text-align:center;font-family:fantasy !important;font-size: 500%;margin-top:20%;}</style><div id='alerta'><div>O que faz por aqui ?</div></div>";
}