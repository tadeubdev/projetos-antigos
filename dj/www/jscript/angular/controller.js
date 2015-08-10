angular.module('app.controller',[]).

controller('Home', function( $scope, Server, All )
{

	audio = [];

	$scope.buttons = {};

	get = function(i,loop)
	{

		Server.send('button', i);

		if(!audio[i]) audio[i] = audio[i] = new Audio('www/audio/'+i+'.mp3');
		if(loop) audio[i].loop = true;
		if(audio[i].currentTime>0)
		{
			$scope.buttons[i] = false;
			if(loop) audio[i].pause();
			audio[i].currentTime = 0;
		}
		else
		{
			$scope.buttons[i] = true;
			audio[i].pause();
			audio[i].play();
		}
	}

	$scope.keybind = {

		85: function(other)
		{
			// u
			if(!other) get(1);
		},

		73: function(other)
		{
			// i
			if(!other) get(2);
		},

		79: function(other)
		{
			// o
			if(!other) get(3,true);
		},

		80: function(other)
		{
			// p
			if(!other) get(4,true);
		},

		74: function(other)
		{
			// j
			if(!other) get(5,true);
		},

		75: function(other)
		{
			// k
			if(!other) get(6,true);
		},

	};

	$scope.button = function(int)
	{
		$scope.keybind[int]();
	}

	$scope.startServer = function()
	{

		Server.startServer({

			connected: function( obj )
			{
			},

			button: function( obj )
			{

				console.log(obj);

				// $scope.keybind[obj]( true );

			},


		}, $scope);

	}

	setTimeout(function(){ $scope.startServer(); }, 1000);

	setInterval(function(){ Server.send('ping',{}); }, 20000);

})