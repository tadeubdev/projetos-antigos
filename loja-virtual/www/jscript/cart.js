
	function id(id)
	{
		return document.getElementById(id);
	}

	function json(data)
	{
		return typeof data=='string'? JSON.parse(data): JSON.stringify(data);
	}

	/////

	var Cart = {

		button: {},

		removeItemFromCart: function(int)
		{

			items = Cart.items;

			items = items.split( 1, 1 );

			console.log( int );

		},

		printUniqItemInCart: function( name, amount )
		{

			item = document.createElement('li');

			strong = document.createElement('strong');

			strong.innerHTML = name +': R$'+ amount +'   ';

			item.appendChild( strong );

			button = document.createElement('button');

			button.innerHTML = 'delete';

			button.onclick = function()
			{

				Cart.removeItemFromCart( 0 );

			};

			item.appendChild( button );

			id('cart_list').appendChild( item );

		},

		printItemsInCart: function()
		{

			list = id('card_list');

			items = Cart.items;

			if( !items ) return;

			for( a in items )
			{
				Cart.printUniqItemInCart( a, items[a] );
			}

		}

	};

	Cart.items = json(localStorage.getItem('cart_items')) || {};

	if(Cart.items) Cart.printItemsInCart();

	///

	Cart.button.add = id('button_add');

	Cart.button.add.onclick = function()
	{

		name = prompt('Nome');

		amount = prompt('Quant');

		storage = json(localStorage.getItem('cart_items')) || {};

		storage[name] = amount;

		localStorage.setItem('cart_items', json(storage));

		Cart.printUniqItemInCart( name, amount );

	}