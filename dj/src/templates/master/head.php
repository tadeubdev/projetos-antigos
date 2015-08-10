
	<meta charset="utf-8">

	<title> {{ $title }} - {{ Site::getTitle() }} </title>

	<meta http-equiv="content-language" content="pt-br">

	<meta name="viewport" content="width=device-width, user-scalable=no">

	{{ Html::link()->rel('stylesheet')->href( App::getCssPagesDir("default.css") ) }}

	{{ Html::link()->rel('stylesheet')->href( App::getCssDir("libs/font-awesome.min.css") ) }}

	{{ Html::link()->rel('shortcut icon')->href( App::getWWWDir("images/favicon.png") ) }}

	{{ Html::script()->src( App::getWWWDir("node_modules/jquery/jquery.min.js") ) }}
	{{ Html::script()->src( App::getWWWDir("node_modules/angular/angular.min.js") ) }}
	{{ Html::script()->src( App::getWWWDir("jscript/functions.js") ) }}
	{{ Html::script()->src( App::getWWWDir("jscript/angular/app.js") ) }}
	{{ Html::script()->src( App::getWWWDir("jscript/angular/controller.js") ) }}
	{{ Html::script()->src( App::getWWWDir("jscript/angular/service.js") ) }}
	{{ Html::script()->src( App::getWWWDir("jscript/angular/filter.js") ) }}
	{{ Html::script()->src( App::getWWWDir("jscript/angular/directive.js") ) }}

	@if( isset($css) )

		@if( !is_array($css) )

			{{{ $css = [$css] }}}

		@endif

		@foreach( $css as $filecss )

			@if( is_string($filecss) )

				{{{ $filecss = App::getCssPagesDir("{$filecss}.css") }}}

			@endif

			{{ Html::link()->rel('stylesheet')->href( $filecss ) }}

		@endforeach

	@endif

	@if( isset($js) )

		@if( !is_array($js) )

			{{{ $js = [$js] }}}

		@endif

		@foreach( $js as $filejs )

			@if( is_string($filejs) )

				{{{ $filejs = App::getWWWDir("jscript/{$filejs}.js") }}}

			@endif

			{{ Html::script()->src( $filejs ) }}

		@endforeach

	@endif