		
	function _GET(name)
	{
	  var url   = window.location.search.replace("?", "");
	  var itens = url.split("&");
	
	  for(n in itens)
	  {
		if( itens[n].match(name) )
		{
		  return decodeURIComponent(itens[n].replace(name+"=", ""));
		}
	  }
	  return null;
	}
	
	alert( _GET("id") );