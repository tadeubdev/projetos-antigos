<script type="text/javascript" src="js/latest.js"></script>

<script>
$(function(){

(function( $ ) {
    
  $.fn.get = function( variavel ) {      
      $(this).val( variavel );      
      $(this).html( variavel );      
  };

})( jQuery );


var email = "tadeubarbosa@live.com";

$('#email').get(email);


})
</script>



<div id="email"></div>