<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
        <link rel="stylesheet" href="css/estrutura.css"/>
        <style>
            .clear:after{
                content: ".";
                display: block;
                clear: both;
                height: 0;
                overflow: hidden;
                visibility: hidden;
            }

            *{
                padding: 0;
                margin: 0;
                list-style: none;
                font-family: tahoma;
            }
            
            #ferramentas{
                width: 100%;
                height: 30px;
                background: #3d3d3d;
            }
            
            #ferramentas a{
                min-width: 100px;
                line-height: 30px;
                display: block;
                float: left;
                padding: 0 5px;
                text-decoration: none;
                text-align: center;
                font-size: 12px;
                color: #888;
            }
            
            #ferramentas a:hover{
                background: #222;
                color: #555;
            }

            #recebe-cores{
                width: 931px;
                margin: 0 auto;
                border: 3px solid #CCC;
                background: #FFF;
            }
            
            .cores{
                float:left;
                width: 17px;
                height: 17px;
                margin: 1px;
                cursor: pointer;
            }
            
            #recebe-pixel{
                width: 850px;
                margin: 30px auto;
                border: 3px solid #CCC;
                background: #FFF;
            }
            
            .pixel{
                float: left;
                width: 17px;
                height: 17px;
                box-sizing: border-box;
                background: #FFF;
            }
        </style>
        <script>
            $(function(){
                var pixel = {
                    cor : '#000',

                    arrays : {
                        cores : new Array(),
                        desfazer : new Array(),
                        refazer : new Array()
                    },

                    desfazer : function(){
                        var last = pixel.arrays.desfazer.length-1;

                        if(last){
                            var item = pixel.arrays.desfazer[last],
                            posi = item['posi'],
                            antes = item['antes'],
                            depois = item['depois'];
                            // $('#pixel-' +posi).css('background', antes);
                            pixel.arrays.refazer.push({'posi':posi, 'antes':depois,'depois':antes});
                            pixel.arrays.desfazer.pop();
                        }
                    },

                    refazer : function(){
                        var last = pixel.arrays.refazer.length-1;

                        if(last){
                            var item = pixel.arrays.refazer[last],
                            posi = item['posi'],
                            antes = item['antes'],
                            depois = item['depois'];
                            // $('#pixel-' +posi).css('background', depois);
                            pixel.arrays.desfazer.push({'posi':posi, 'antes':antes,'depois':depois});
                            pixel.arrays.refazer.pop();
                        }
                    },

                    ferramenta : {
                        pincel : function(){
                            this.cursor = 'url("pincel.png")';

                            $('.pixel').bind('mousemove mouseleave click', function(e){
                                if(e.which==1){
                                    var posi = $(this).attr('position'),
                                    antes = $(this).css('background-color');
                                    $(this).css('background-color', pixel.cor);

                                    pixel.arrays.cores[posi] = pixel.cor;
                                    pixel.arrays.desfazer.push({'posi':posi, 'antes':antes,'depois':pixel.cor});
                                }
                            });
                        },

                        borracha : function(){
                            this.cursor = 'ulr("borracha.png")';

                            $('.pixel').bind('mousemove mouseleave click', function(e){
                                if(e.which==1){
                                    var posi = $(this).attr('position'),
                                    antes = $(this).css('background-color');
                                    $(this).css('background-color', '#FFF');

                                    pixel.arrays.cores[posi] = '#FFF';
                                    pixel.arrays.desfazer.push({'posi':posi, 'antes':antes,'depois':'#FFF'});
                                }
                            });
                        }
                        
                    }
                };
                
                var y = 0;
                for(var x=0; x<1200; x++){
                    var posi = x+'_'+y;
                    pixel.arrays.cores[posi] = '#FFF';
                    y = (y=50) ? 0 : y+1;
                }

                pixel.ferramenta.pincel();
                
                $('#borracha').bind('click',function(){
                    pixel.cor = "#FFF";
                });
                
                $('#pincel').bind('click',function(){
                    pixel.cor = "#000";
                });

                
                $('.cores').bind('click',function(){
                    pixel.cor = $(this).css('background-color');
                });
                
                $('#salvar').bind('click',function(){
                    var arr = pixel.arrays.cores,
                    novo = new Array(),
                    limpa = new Array();

                    y = 0;
                    for(var x=0; x<1200; x++){
                        novo.push( arr[x+'_'+y] );
                        limpa[posi] = '#FFF';
                        y = (y=50) ? 0 : y+1;
                    }

                    console.log(novo);

                    $.post('functions.php', {function_Action:'insert', function_array:novo});

                    pixel.cor = "#000";
                    pixel.arrays.cores = limpa;
                    $('.pixel').css('background-color','#FFF');
                });
                
            });
        </script>
    </head>
    <body>
        
        <div class="clear" id="ferramentas">
            <a href="javascript:void(0)" id="pincel"> Pincel </a>
            <a href="javascript:void(0)" id="borracha"> Borracha</a>
            <a href="javascript:void(0)" id="salvar"> Salvar </a>
        </div>
        
        <div id="recebe-cores" class="clear">
        <?php
            $cor = array();
            
            $cor['um'] = 0;
            $cor['dois'] = 0;
            $cor['tres'] = 0;
            
            for($x=1; $x<295; $x++){
                $cor['um']+= 1;
                $cor['dois']+= 2;
                $cor['tres']+= 1;
                
                if($x<=98){
                    $cor['tres'] = 0;
                } else if($x<=196){
                    $cor['dois'] = 0;
                } else {
                    $cor['um'] = 0;
                }
                
                $cor['final'][] = array($cor['um'], $cor['dois'], $cor['tres']);
            }
            
            foreach($cor['final'] as $in){
                echo "<div class=\"cores\" style=\"background:rgb($in[0],$in[1],$in[2]);\"></div>";
            }
            
        ?>
        </div>
        
        
        <div class="clear" id="recebe-pixel">
            <?php
                $y = 0;
                
                for($x=0; $x<1200; $x++){
                    
                    echo "<div position=\"{$x}_{$y}\" class=\"pixel\"></div>";
                    
                    $y++;
                    
                    if($y==50){
                        echo "<div style='clear:both;'></div>";
                        $y=0;
                    }
                }
            ?>
        </div>
            
    </body>
</html>
