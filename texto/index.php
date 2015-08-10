
	<meta charset="utf-8">

	<audio autoplay="false"></audio>

	<script type="text/javascript" src="jquery.min.js"></script>

	<script>
	$(function()
	{

		audio = document.getElementsByTagName('audio')[0];

		document.body.onclick = function()
		{
			audio.play();
		}

		var arr = new Array;

		function set()
		{
			for( i in arguments ) arr.push( arguments[i] );

			if( arr.length ) get( arr[0] );
		}

		function get(str)
		{

			$.post('get.php', {words:str}, function( response )
			{
				audio.src = response;
				audio.play();
			});
		}

		audio.addEventListener('ended', function()
		{

			arr = arr.slice( 1, arr.length );

			if( arr.length )
			{
				get( arr[0] );
			}
		}, false);

		// set( 'olá seja bem vindo', 'digite o seu nome','clique no botão' );

	});
	</script>