$(function()
{

	var title = ' - %s'.sprintf( document.title );

	loadPage = function( page, data, fn )
	{

		if( !page ) return;

		if( !data ) data = {};

		if( page.indexOf(':') > 0 )
		{

			var a = page.split(':');

			page = a[0];

			a[1] = a[1].split(',');

			for( i in a[1] )
			{
				data[i] = a[1][i];
			}
		}

		data.pageToLoadTemplate = page;

		if( !data.action )
		{
			$('.container-center').toggle();
		}

		$.post( page, data, function( response, code )
		{

			if( code != 'success' )
			{
				console.log( response );
			}
			else if( fn )
			{
				fn(response);
			}
			else
			{

				try
				{

					response = $.parseJSON( response );

					if( response.title ) document.title = response.title + title;

					$('#container-center').html(response.view);

				}catch(e)
				{
					console.log( response );
				}

				$('.container-center').toggle();

				$('#header .container a').removeClass('active');

				$('#header .container a[href="' + location.hash.split('/')[0] + '"]').addClass('active');

			}

		});

	}

	if( location.hash )
	{
		loadPage( location.hash.replace('#','') );
	}
	else
	{
		location.hash = 'home';
	}

	$(window).on('hashchange', function()
	{
		loadPage( location.hash.replace('#','') );
	});

});