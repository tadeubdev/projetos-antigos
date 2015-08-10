<?php require_once 'config/config.php'; ?>

<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>

<link rel="stylesheet" href="css/estrutura.css" />

<style>
    .quebra {
        display:block;
        clear:both;
    }

    .clear:after {
        content:".";
        display:block;
        clear:both;
        visibility:hidden;
        height:0;
        overflow:hidden;
    }
    
    #recebe_lista ul{
        margin: 5px;
        border: 1px solid #888;
    }
    
    #recebe_lista li{
        width: 10px;
        height: 10px;
        float: left;
    }
</style>

<div id="recebe_lista"></div>

<script>
$(function(){
    
    $.post('functions.php', {function_Action:'get'}, function( data ){
        if(data){

            $.each(data, function(i, val){
                var conta = 0;

                $('<ul/>')
                    .attr({ 'id':'ul_'+i, 'class':'clear' })
                    .appendTo('#recebe_lista');

                for(var x in val){

                    $('<li/>')
                        .addClass( (conta<49?'':"quebra") )
                        .attr('id', conta)
                        .css('background-color', val[x])
                        .appendTo('#ul_'+i);

                    conta = (conta<49 ? conta+1 : 0);
                }
            });
        }
    }, 'jSON');
    
});
</script>