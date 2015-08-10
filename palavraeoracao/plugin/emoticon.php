<?php

function emoticon($valor){
    
    $substitui = array(
		':)' => '<img src="img/emoticon/1.gif" />',		
		':O' => '<img src="img/emoticon/2.gif" />',	
		';)' => '<img src=img/emoticon/3.gif />',				
		':s' => '<img src=img/emoticon/4.gif />',				
		'(h)' => '<img src=img/emoticon/5.gif />',				
		':#' => '<img src=img/emoticon/6.gif />',				
		':^)' => '<img src=img/emoticon/7.gif />',					
		'<:o)' => '<img src=img/emoticon/8.gif />',				
		'<:o)' => '<img src=img/emoticon/9.gif />',					
		'|-)' => '<img src=img/emoticon/10.gif />',				
		':D' => '<img src=img/emoticon/11.gif />',				
		':P' => '<img src=img/emoticon/12.gif />',			
		':(' => '<img src=img/emoticon/13.gif />',			
		':|' => '<img src=img/emoticon/14.gif />',					
		':$' => '<img src=img/emoticon/15.gif />',					
		':@' => '<img src=img/emoticon/16.gif />',				
		'8o|' => '<img src=img/emoticon/17.gif />',					
		'^o)' => '<img src=img/emoticon/18.gif />',					
		'+o(' => '<img src=img/emoticon/19.gif />',					
		'*-)' => '<img src=img/emoticon/20.gif />',					
		'8-)' => '<img src=img/emoticon/21.gif />',					
		'(brb)' => '<img src=img/emoticon/22.gif />',				
		'(L)' => '<img src=img/emoticon/23.gif />',					
		'(Y)' => '<img src=img/emoticon/24.gif />',					
		'(N)' => '<img src=img/emoticon/25.gif />',					
		'(h5)' => '<img src=img/emoticon/26.gif />',		
		'(yn)' => '<img src=img/emoticon/27.gif />'
	);
	
	return strTr(strtolower($valor), $substitui);
}

?>