angular.module('app.directive',[]).

directive('keybind', function()
{

	return {

		restrict: 'A',

		link: function( scope, elm, attrs )
		{

			$(document)
			.on('keydown',function(e)
			{

				scope.$watch("keybind", function (newValue, oldValue) {
					scope.keybind = newValue;
				});

				if(!scope.keybind) return;

				if( scope.keybind[ e.which ] )
				{
					scope.$apply(function(){ scope.keybind[ e.which ](); });
				}
			});

		}

	}

}).

directive('fileUpload', function()
{
	return {

		scope: true,

		link: function(scope,el,attrs)
		{

			el.bind('change', function(event)
			{

				var files = event.target.files;

				for (var i = 0;i<files.length;i++)
				{
					var reader = new FileReader();

					reader.onload = (function(aImg)
					{
						return function(e)
						{

							aImg.src = e.target.result.split(',')[1];

							if(attrs['fileCategory']=='slide_upload_file_categ')
							{

								categ = aImg.name;

								categ = categ.replace( '.'+categ.split('.')[categ.split('.').length-1], '' );

								aImg.categ = categ;

							}
							else
							{

								aImg.categ = scope[attrs['fileCategory']];

								if(!aImg.categ) aImg.categ = prompt('Categoria:');

							}

							file = {
								src: aImg.src,
								categ: aImg.categ
							};

							if(attrs['fileFunction'])
							{
								return scope[attrs['fileFunction']]( file );
							}

							scope[attrs['fileUpload']].push( file );

						};
					})(files[i]);

					reader.readAsDataURL(files[i]);
				}
			});
		}
	}
})