
	String.prototype.ucfirst = function()
	{
		return this.substr(0,1).toLocaleUpperCase() + this.substr(1,this.length);
	}

	String.prototype.ucwords = function()
	{

		var value = this.split(' ');

		for(a in value)
		{
			value[a] = value[a].substr(0,1).toLocaleUpperCase() + value[a].substr(1,value[a].length);
		}

		return value.join(' ');

	}

	String.prototype.sprintf = function()
	{

		var value = this;

		for(i in arguments)
		{
			value = value.replace('%s', arguments[i])
		}

		return value;

	}