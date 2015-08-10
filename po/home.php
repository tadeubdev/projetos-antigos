	<?php
		include'config/load.php';

		$result = $dados = new stdClass;

		$result->img = Banco::query("SELECT * FROM user ORDER BY id DESC LIMIT 0,5");

		while($row=$result->img->fetch_object()) {
			$dados->user[] = (file_exists($row->img)? $row->img: 'img/user.png');
		}

		$result->comentario = Banco::query("SELECT * FROM palavra_comen ORDER BY id DESC LIMIT 0,1");
		$row = $result->comentario->fetch_object();

		if($row){

			$result->palavra = Banco::query("SELECT * FROM palavra WHERE id='{$row->id_palavra}'");
			$row = $result->palavra->fetch_object();
		}
	?>

	<script type="text/javascript" src="js/functions.js"></script>

	<div class="box-sizing" id="template-conteudo-pag-inicial-esquerda">
	    <h2> Seja Bem Vindo(a) ao Site <strong>Palavra e Oração !</strong> </h2>

		<h2>Efetue Login:</h2>

		<div id="loga" style="margin:10px 0;"></div>

		<div class="clear box-sizing" id="template-conteudo-pag-inicial-esquerda-inputs">

			<input class="box-sizing" placeholder="Email" type="text" id="login">
			<input class="box-sizing" placeholder="Senha" type="password" id="password">

			<div class="clear box-sizing" id="template-conteudo-pag-inicial-esquerda-inputs-buttons">
				<button id="entrar">Entrar</button>
				<button>Cancelar</button>
			</div>
		</div>

		<?php if(isset($dados->user)){ ?>

			<div class="clear box-sizing">
				<span> Cinco Últimos Cadastrados </span>
				<?php foreach($dados->user as $img){ echo "<div class=\"box-sizing\" style=\"background-image:url('$img')\"></div>"; } ?>
		   	</div>

		<?php } ?>

	   	<?php if($row){ ?>

			<div class="clear box-sizing">
				<span>Postagem mais comentada</span>
				<h4><?php echo $row->palavra; ?><h4>
		   	</div>

	   	<?php } ?>

    </div>

	<div class="box-sizing" id="template-conteudo-pag-inicial-direita">

		<h2>Cadastre-se:</h2>

		<div id="resultado" style="margin:10px 0;"></div>

		<div class="clear- box-sizing" id="template-conteudo-pag-inicial-direita-inputs">

			<input class="box-sizing" type="text" name="nome" placeholder="Nome" maxlength="10">
		    <input class="box-sizing" type="text" name="sobrenome" placeholder="Sobrenome" maxlength="10">
		    <input class="box-sizing" type="text" name="email" placeholder="Email">
		    <input class="box-sizing" type="password" name="senha" placeholder="Senha" maxlength="16">

			<div class="clear- box-sizing" id="template-conteudo-pag-inicial-direita-inputs-buttons">
				<button id="cadastra">Cadastrar</button>
				<button>Limpar</button>
			</div>
		</div>
	</div>

	<?php include 'partes/rodape.php'; ?>