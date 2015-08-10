<?php

	Route::setRule( 'id', '([0-9]+)' );

	Route::setRule( 'user', '([a-z])' );

	Route::setRule( 'name', '([a-z\-])' );

	Route::setRule( 'post', '([0-9]+)-([a-z\-])' );

	Route::setRule( 'year', '([0-9]{2})' );

	//

	Route::group( '/', 'Home',
	[

		['/', 'getHome', 'home'],

	]);