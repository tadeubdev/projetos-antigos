
	<link rel="stylesheet" href="reset.css">

	<script src="snap.svg-min.js"></script>

	<script>
	window.onload = function() {

		var paper = new Snap( 200, 200 );

		lines = Array;

		lines.tri = [

			"M 50 50, L 50 50, Z",

			"M 0 0, L 50 50, L 0 50, Z",

			"M 0 0, L 50 50, L 0 100, Z",

			"M 0 0, L 50 50, L 100 100, L 0 100, Z",

			"M 0 0, L 100 0, L 100 100, L 0 100, Z",

		];

		lines.shadown = [

			"M 50 50, L 50 50, Z",

			"M 0 0, L 100 0, L 250 200, L 100 200, L 0 100, Z"

		];

		var gradient = paper.gradient('L(0,0,140,140) rgba(0,0,0,.3):30 -transparent');

		var shadown = paper.path( lines.shadown[0] )
		.attr({
			id:"shadown",
			fill:gradient,
		});

		var tri = paper.path( lines.tri[0] )
		.attr({
			id:"tri",
			fill:"#fff"
		});

		cont = 0;

		function next() {

			clearTimeout(timer);

			if(cont==lines.tri.length) return tri.hover(hover);

			console.log(cont);

			tri.animate({ d: lines.tri[cont] }, 400, mina.backin, next);

			shadown.animate({ d: lines.shadown[cont]||lines.shadown[lines.shadown.length-1] }, 400, mina.backin);

			cont++;

		}

		int = 0;

		tri.animate({ d: lines.tri[int] },500,mina.inline);

		shadown.animate({ d: lines.shadown[int]||lines.shadown[lines.shadown.length-1] },500,mina.inline);

		// timer = setTimeout(next, 300);

		hover = function() {

			self = this;

			if(self.repeating) return;

			self.repeating = true;

			tri.animate({opacity:1,transform:"t25,25s0.5,0.5,0,0"}, 500, mina.elastic);

			shadown.animate({opacity:1,transform:"t25,25s0.5,0.5,0,0"}, 500, mina.elastic);

			self.time = setTimeout(function() {

				tri.animate({opacity:1,transform:"t0,0s1,1,0,0"}, 500, mina.elastic);

				shadown.animate({opacity:1,transform:"t0,0s1,1,0,0"}, 500, mina.elastic);

			}, 50);

			setTimeout(function(){ self.repeating = false; }, 700);

		}

	};
	</script>