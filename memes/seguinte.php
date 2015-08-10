<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>

<script>
    $(function(){
        
        var ind = 0;
        
        $('.voltar').live('click',function(){
            ind>0 ? ind-- : $('.botao').size()-1;
            
            $('.botao').removeClass('sel').eq(ind).addClass('sel');
            $('.linha').removeClass('sel').eq(ind).addClass('sel');
        });
        
        $('.passar').live('click',function(){
            ind<$('.botao').size()-1 ? ind++ : 0;
            
            $('.botao').removeClass('sel').eq(ind).addClass('sel');
            $('.linha').removeClass('sel').eq(ind).addClass('sel');
        });
        
    });
</script>

<style>
    .clear:after {
        content:".";
        display:block;
        clear:both;
        visibility:hidden;
        height:0;
        overflow:hidden;
    }

    .botao{
        float: left;
        display: block;
        width: 20px;
        text-align: center;
        padding: 10px;
        border: 3px solid #CCC;
        font-family: fantasy;
        background: #EEE;
        color: #999;
        box-shadow: 0 10px 20px -10px #000;
    }
    
    .botao.sel{
        color: #ff3300;
        border-color: #ff3300;
    }
    
    .linha{
        display: block;
        float: left;
        width: 125px;
        height: 20px;
        border-bottom: 10px solid #CCC;
    }
    
    .linha.sel{
        border-color: #ff3300;
    }
    
    .acao{
        display: block;
        float: left;
        background: #777;
        color: #DDD;
        font-family: fantasy;
        text-decoration: none;
        padding: 10px;
        margin: 30px 10px;
    }
</style>

<div class="clear">
    
    <span class="linha sel"></span>
    
    <div class="botao sel">1</div>
    
    <span class="linha"></span>
    
    <div class="botao">2</div>
    
    <span class="linha"></span>
    
    <div class="botao">3</div>
    
</div>

<div class="clear">

    <a class="acao voltar" href="javascript:void(0)"><span><</span> Voltar</a> 

    <a class="acao passar" href="javascript:void(0)">Passar <span>></span></a>

</div>