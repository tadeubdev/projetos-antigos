
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

	function random(min,max)
	{
		return Math.floor(Math.random() * (max - min)) + min;
	}

	function rand(min,max)
	{
		arr = [];
		for(x=min; x<max; x++)
		{
			arr.push(x);
		}
		return arr;
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

	function xml2json(xml) {
		try {
			var obj = {};
			if (xml.children.length > 0) {
				for (var i = 0; i < xml.children.length; i++) {
					var item = xml.children.item(i);
					var nodeName = item.nodeName;

					if (typeof (obj[nodeName]) == "undefined") {
						obj[nodeName] = xml2json(item);
					} else {
						if (typeof (obj[nodeName].push) == "undefined") {
						var old = obj[nodeName];

						obj[nodeName] = [];
						obj[nodeName].push(old);
						}
						obj[nodeName].push(xml2json(item));
					}
				}
			} else {
				obj = xml.textContent;
			}
			return obj;
		} catch (e) {
			console.log(e.message);
		}
	}