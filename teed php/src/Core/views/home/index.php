
	<style>
	#ideia { padding:30px 0; }
	#ideia .collum-3 { height:170px; }
	#ideia .collum-3 img { width:90%; height:90%; margin:10px auto; }
	</style>

	<div class="clearfix">

		<div class="collum-9">

			<h2> Projetos atuais </h2>

			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

			<div id="ideia" class="clearifx">

				<div class="collum-3">

					<a href="#home/image:1">

						<img src="http://lorempixel.com/170/170/people/1/">

					</a>

					<button id="1">remover</button>

				</div>

				<div class="collum-3">

					<a href="#home/image:2">

						<img src="http://lorempixel.com/170/170/people/2/">

					</a>

					<button id="2">remover</button>

				</div>

				<div class="collum-3">

					<a href="#home/image:3">

						<img src="http://lorempixel.com/170/170/people/3/">

					</a>

					<button id="3">remover</button>

				</div>

				<div class="collum-3">

					<a href="#home/image:4">

						<img src="http://lorempixel.com/170/170/people/4/">

					</a>

					<button id="4">remover</button>

				</div>

			</div>

		</div>

		<div class="collum-3">

			<h2> Projetos atuais </h2>

			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

		</div>

	</div>

	<script>
	$(function()
	{

		$('#ideia').delegate('button','click',function()
		{

			if( !confirm( 'Deseja mesmo remover ?' ) ) return;

			id = $(this).attr('id');

			item = $(this).parent();

			loadPage('home/image', {action:'post', image:id}, function(response)
			{

				item.fadeOut('slow',function(){ item.remove(); });

			});

		});

	});
	</script>