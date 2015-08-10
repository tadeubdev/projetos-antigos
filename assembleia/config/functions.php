<?php

/**
 *
 * @param type $e
 * @param type $var
 * @return type
 * FUNCTION GEEK -- CREATED 05/02/2013 TADEU BARBOSA
 */
function geek($e, $var){
    $alf = "abcdefghijklmnopqrstuvxwyz-_@";
    return md5(strpos($alf, substr($e,0,1)) . strpos($alf, substr($e,2,2)) . $var);
}
//////
/////////

/**
 *
 * @param type $tempo
 * @return string
 * FUNCTION TEMPO -- CREATED 21/02/2013 TADEU BARBOSA
 * SUBSTITUI A FUNCAO TIME() DO PHP PELO TIME() DO JQUERY
 */
function tempo($tempo=null){
    if(isset($tempo)){
        $time = (time()+1000) - $tempo;
        $retorno = '';

        $seg = 1;
        $min = 60;
        $hora = $min * 60;
        $dia = $hora * 24;
        $semana = $dia * 7;
        $mes = $semana * 4;
        $ano = $mes * 24;

        $segAgo = $time;
        $minAgo = ceil($segAgo / $min);
        $horaAgo = ceil($segAgo / $hora);
        $diaAgo = ceil($segAgo / $dia);
        $semanaAgo = ceil($segAgo / $semana);
        $mesAgo = ceil($segAgo / $mes);
        $anoAgo = ceil($segAgo / $ano);

        // SEGUNDOS
        if($segAgo==$seg){
            // SEGUNDO
            $retorno = 'um segundo';
        } else if($segAgo>$seg&&$segAgo<$min){
            // SEGUNDOS
            $retorno = 'alguns segundos';
        } else if($segAgo==$min){
            // MINUTO
            $retorno = 'um minuto';
        } else if($minAgo==1){
            // MINUTO
            $retorno = 'um minuto';
        } else if($segAgo>$min&&$segAgo<$hora){
            // MINUTOS
            $retorno = $minAgo . ' minutos';
        } else if($segAgo==$hora ){
            // HORA
            $retorno = 'uma hora';
        } else if($segAgo>$hora&&$segAgo<$dia){
            // HORA
            $retorno = $horaAgo . ' horas';
        } else if($segAgo==$dia){
            // DIA
            $retorno = 'um dia';
        } else if($segAgo>$dia&&$segAgo<$semana){
            // DIAS
            $retorno = $diaAgo . ' dias';
        } else if($segAgo==$semana){
            // SEMANA
            $retorno = 'uma semana';
        } else if($segAgo>$semana &&$segAgo<$mes){
            // SEMANAS
            $retorno = $semanaAgo . ' semanas';
        } else if($segAgo==$mes){
            // MES
            $retorno = 'um mes';
        } else if($segAgo>$mes&&$segAgo<$ano){
            // MESES
            $retorno = $mesAgo . ' meses';
        } else if($segAgo==$ano){
            // ANO
            $retorno = 'um ano';
        } else if($segAgo>$ano){
            // ANOS
            $retorno = $anoAgo . ' anos';
        }

        return $retorno;
    } else {
        return time() + 1000;
    }
}
//////
/////////