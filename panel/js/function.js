$(function(){
    
    var color = '#9C0';
    
    if( $.cookie('cor') ){
        color = $.cookie('cor');
    }
    
    $('body').css({'background-color': color});
    
    
})