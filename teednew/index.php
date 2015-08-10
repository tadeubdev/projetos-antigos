<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/estrutura.css" />
        <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
        <script>
        $(function(){
            
            $('#template-novo-centro-menu-adc').submit(function(e){
                var nome = $.trim( $(this).children('input').val() ),
                conta = $('#template-novo-centro-menu a').size();
                
                if(nome){
                    if(conta<=5){
                        $('#template-novo-centro-menu a:last').after( $('<a/>',{'html':nome}) );
                    } else {
                        
                        if($('#template-novo-centro-menu-outros-link').size()==0){
                            $('#template-novo-centro-menu a:last')
                            .after(
                                $('<ul/>',{'id':'template-novo-centro-menu-outros-ul-link'}).append( $('<li/>').append( $('<a/>',{'html':'Outros', 'id':'template-novo-centro-menu-outros-link'}) ).append( $('<ul/>',{'id':'template-novo-centro-menu-outros'}) ))
                            );
                        }
                        
                        $('#template-novo-centro-menu-outros').append( $('<a/>',{'html':nome}) );
                    }
                        
                    $(this).children('input').val('');
                }
                
                e.preventDefault();
            });
            
            $('#template-novo-centro-menu-outros-ul-link').live('mouseover',function(){
                $('#template-novo-centro-menu-outros').show();
            })
            
            $('#template-novo-centro-menu-outros-ul-link').live('mouseleave',function(){
                $('#template-novo-centro-menu-outros').hide();
            })
            
        });
        </script>
    </head>
    <body>
        
        <div class="box-sizing" id="template-novo">
            
            <div class="box-sizing" id="template-novo-centro">
                
                <div class="box-sizing clear" id="template-novo-centro-menu">
                    <a href="index.php">Home</a>
                    
                    <form id="template-novo-centro-menu-adc">
                        <input placeholder="Nome">
                        <button>Adicionar</button>
                    </form>
                </div>
                
            </div>
            
        </div>
        
    </body>
</html>
