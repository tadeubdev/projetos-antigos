angular.module('app.service',[]).

service('Server', function()
{

	_this = this;

	server = null;

	host = null;

	this.startServer = function( message, scope )
	{

		if(!scope.host) return;

		host = 'ws://%s:9300'.sprintf(scope.host);

		server = new FancyWebSocket( host );

		server.message = message || {};

		server.bind('message', function( response )
		{

			if(response=='undefined') return;

			response = JSON.parse(response);

			if(typeof response=='string') response = JSON.parse(response);

			//

			console.log(response);

			if( response.connected != null )
			{
				server.message['connected']( response.connected );
			}
			else
			{

				message = response.msg;

				obj = response.obj;

				if( server.message[ message ] ) scope.$apply(function(){ server.message[ message ]( obj ) });
			}

		});

		server.connect();

	}

	this.send = function( msg, obj )
	{

		if(!host) return;

		obj = JSON.stringify({msg:msg, obj:obj});

		server.send('message', obj );

	}

}).

service('All', function( $http )
{

	this.getData = function( data, fn, url )
	{

		url =  location.origin + location.pathname + (url || location.pathname);

		$http.post( url , {data:data}).success(fn).error(function(e){console.log(e);});
	}

})