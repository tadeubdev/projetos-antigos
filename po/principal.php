<?php
include 'config/load.php';

if(!isset($_COOKIE['lg'])||$user->adm!=1){ header("Location: index.php"); }

$selecione = $dados = $comentario = (object) array();

$selecione->usuario = Banco::query("SELECT * FROM user ORDER BY id DESC");
$selecione->palavra = Banco::query("SELECT * FROM palavra ORDER BY id DESC");
$selecione->oracao = Banco::query("SELECT * FROM oracao ORDER BY id DESC");
$selecione->login = Banco::query("SELECT * FROM acessos_online ORDER BY id DESC");

$comentario->palavra = Banco::query("SELECT * FROM palavra_comen ORDER BY id DESC");
$comentario->oracao = Banco::query("SELECT * FROM oracao_comen ORDER BY id DESC");

$dados->usuario = ($selecione->usuario->num_rows==1? 'Um usuário': "{$selecione->usuario->num_rows} usuários");
$dados->palavra = ($selecione->palavra->num_rows==1? 'Uma palavra': "{$selecione->palavra->num_rows} palavras");
$dados->oracao = ($selecione->oracao->num_rows==1? 'Uma oração': "{$selecione->oracao->num_rows} orações");

if(isset($_GET['p'])){

	echo "
	<a href=\"principal.php\" style=\"display:block;padding:20px;\">Principal < </a>

	<table width=\"100%\" style=\"color:#333;\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\">
		<tr style=\"color:#999;\">
	";

	extract($_GET['p']);
	
	switch(escape($p)){

		case 'user':
			echo "
				<th width=\"7%\"  bgcolor=\"#00152B\" scope=\"col\">ID</th>
				<th width=\"15%\"  bgcolor=\"#00152B\" scope=\"col\">Nome</th>
				<th width=\"17%\" bgcolor=\"#00152B\" scope=\"col\">Login</th>
				<th width=\"29%\" bgcolor=\"#00152B\" scope=\"col\">Email</th>
				<th width=\"14%\" bgcolor=\"#00152B\" scope=\"col\">Idade</th>
				<th width=\"7%\" bgcolor=\"#00152B\" scope=\"col\">Editar</th>
				<th width=\"11%\" bgcolor=\"#00152B\" scope=\"col\">Deletar</th>
			</tr>";

			foreach($selecione->usuario as $id=>$row){
				echo "<tr>
						<td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\"> {$id} </td>
						<td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\"> {$row->nome} {$row->sobrenome} </td>
						<td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\"> {$row->login} </td>
						<td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\"> {$row->email} </td>
						<td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\"> {$row->idade} </td>
						<td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\"> <a target=\"_blank\" href=\"editar.php?id={$id}\"> <img src=\"img/editar.gif\" style=\"width:20px;\"> </a> </td>
						<td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\"> <a target=\"_blank\" href=\"apagar.php?user={$id}\"> <img src=\"img/x.png\" style=\"width:20px;\"> </a> </td>
					</tr>";
			}
			break;

		case 'palavra':
			echo "
			    <th width=\"7%\"  bgcolor=\"#00152B\" scope=\"col\">ID</th>
			    <th width=\"9%\"  bgcolor=\"#00152B\" scope=\"col\">Autor</th>
			    <th width=\"26%\" bgcolor=\"#00152B\" scope=\"col\">Data</th>
			    <th width=\"32%\" bgcolor=\"#00152B\" scope=\"col\">Palavra</th>
			    <th width=\"5%\" bgcolor=\"#00152B\" scope=\"col\">Ver</th>
			 </tr>";

			foreach($selecione->palavra as $id=>$row){
				echo "<tr>
						<td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\"> {$id} </td>
						<td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\"> {$row->autor} </td>
						<td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\"> {$row->data} </td>
						<td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\"> {$row->palavra} </td>
						<td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\"><a target=\"_blank\" href=\"palavra.php?id={$id}\">ver</a></td>
					</tr>";
			}
			break;

		case 'oracao':
			echo "
				<th width=\"6%\"  bgcolor=\"#00152B\" scope=\"col\">ID</th>
				<th width=\"14%\"  bgcolor=\"#00152B\" scope=\"col\">Autor</th>
				<th width=\"19%\" bgcolor=\"#00152B\" scope=\"col\">Data</th>
				<th width=\"52%\" bgcolor=\"#00152B\" scope=\"col\">Ora&ccedil;&atilde;o</th>
				<th width=\"9%\" bgcolor=\"#00152B\" scope=\"col\">Ver</th>
			 </tr>";

			foreach($selecione->oracao as $id=>$row){
				echo "<tr>
						<td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\"> {$id} </td>
						<td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\"> {$row->autor} </td>
						<td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\"> {$row->data} </td>
						<td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\"> {$row->oracao} </td>
						<td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\"><a target=\"_blank\" href=\"oracao.php?id={$id}\">ver</a></td>
					</tr>";
			}
			break;

		case 'online':
			echo "
				<th width=\"6%\"  bgcolor=\"#00152B\" scope=\"col\">Login</th>
			 </tr>";

			foreach($selecione->login as $row){
				echo "<tr>
						<td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\"> {$row->login} </td>
					</tr>";
			}
			break;
	} 
?>
</table>

<?php
	} else {
?>

<table width="100%" height="142" style="color:#333;" border="1" cellpadding="0" cellspacing="0">
  <tr style="color:#999;">
    <th width="16%" bgcolor="#00152B" scope="col">ADM</th>
    <th width="44%" bgcolor="#00152B" scope="col">Total</th>
    <th width="40%" bgcolor="#00152B" scope="col">Comentarios</th>
  </tr>
  
  <tr>
    <th height="38" bgcolor="#435A76" scope="row"><a href="principal.php?p=user">Usuarios</a></th>
    <td align="center" valign="middle"><?php echo $dados->usuario;   ?></td>
    <td align="center" valign="middle"><i>none</i></td>
  </tr>
  
  <tr>
    <th height="36" bgcolor="#435A76" scope="row"><a href="principal.php?p=palavra">Palavras</a></th>
    <td align="center" valign="middle"><?php echo $dados->palavra;   ?></td>
    <td align="center" valign="middle"><?php echo $comentario->palavra;   ?></td>
  </tr>
  
  <tr>
    <th height="39" bgcolor="#435A76" scope="row"><a href="principal.php?p=oracao">Orações</a></th>
    <td align="center" valign="middle"><?php echo $dados->oracao;   ?></td>
    <td align="center" valign="middle"><?php echo $comentario->oracao; ?></td>
  </tr>
  
  <tr>
    <th height="39" bgcolor="#435A76" scope="row"><a href="principal.php?p=online">Onlines</a></th>
    <td align="center" valign="middle"><?php echo ONLINE;   ?></td>
    <td align="center" valign="middle"><i>none</i></td>
  </tr>
  
</table>
<?php } ?>