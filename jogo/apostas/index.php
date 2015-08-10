<script type="text/javascript" src="../jquery-1.8.3.min.js"></script>

<script>
$(function(){


});
</script>

<style>
* {
	padding: 0;
	margin: 0;
	font-family: tahoma;
}

html,body {
	height: 100%;
}

.clear:after {
	height: 0;
	clear: both;
	display: block;
	visibility: hidden;
	overflow: hidden;
	content: ".";
}

.box-sizing {
	-webkit-box-sizing: clear-box;
	-moz-box-sizing: clear-box;
	-ms-box-sizing: clear-box;
	box-sizing: clear-box;
}

body {
	background: #C0C9D1;
}

#conteudo {
	width: 940px;
	height: 100%;
	margin: auto;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	position: absolute;
}

#login_cadastro {
	width: 100%;
	height: 100%;
	position: relative;
	background: #214A23;
}

.login_cadastro:first-child {
}

.login_cadastro:last-child {
	display: none;
}

#login_cadastro-login {
	width: 500px;
	height: 300px;
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	margin: auto;
	box-shadow: 0 20px 30px -15px #000,inset 0 0 120px rgba(0,0,0, .4);
	background: #FFF;
}
#login_cadastro-login-menu{
	width:100%;
	height:50px;
	background:#3d3d3d;
	border-bottom:4px solid #333;
}
#login_cadastro-login-menu span{
	display:block;
	float:left;
	min-width:100px;
	line-height:50px;
	padding:0 10px;
	text-align: center;
	color:#555;
	font-size: 20px;
	cursor:pointer;
	border-right: 1px dotted #333;
}
</style>

<div class="clear box-sizing" id="conteudo">
	
	<div class="clear box-sizing" id="login_cadastro">
		<div id="login_cadastro-login" class="clear box-sizing login_cadastro">
			
			<div class="box-sizing clear" id="login_cadastro-login-menu">
				<span>Login</span><span>Cadastro</span>
			</div>

		</div>

		<div class="clear box-sizing login_cadastro">
			ddd
		</div>
	</div>

</div>