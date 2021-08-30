<?php
// Sessão
session_start();
if (isset($_SESSION['mensagem'])):?>

	<script>
		//exibe messagem em forma de alerta
	window.onload=function() {
		M.toast({html: '<?php echo $_SESSION['mensagem'];?>'})
	}
</script>
	<?php
endif;

session_unset();

//conexão
include_once 'php_action/db_connect.php';
//header 
include_once 'includes/header.php';
?>

<div class="row">
     <div class="col s12 m6 push-m3">
     	<h3 class="light">Clientes</h3>
		<table class="striped">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Sobrenome</th>
					<th>Email</th>
					<th>Idadde</th>

				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT * FROM clientes";
				$resultado = mysqli_query($connect, $sql);
				while($dados = mysqli_fetch_array($resultado)):

				?>
				<tr>
					<td><?php echo $dados['nome']?></td>
					<td><?php echo $dados['sobrenome']?></td>
					<td><?php echo $dados['email']?></td>
					<td><?php echo $dados['idade']?></td>
					<td> <a href="editar.php?id=<?php echo $dados['id']?>" class="btn-floating orange"><i class="material-icons">edit</i></a> </td>
					<td> <a href="#modal<?php echo $dados['id']?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>


                      <!-- Modal Structure -->
                      <div id="modal<?php echo $dados['id']?>" class="modal">
                      <div class="modal-content">
                      <h4>Opá !</h4>
                      <p>Tem certeza que deseja excluir esse cliente ?</p>
                      </div>
                      <div class="modal-footer">
                      

                      <form action="php_action/delete.php" method="POST">
                      	<input type="hidden" name="id" value="<?php echo $dados['id']?>">
                      	<button type="submit" name="btn-deletar" class="btn red">Sim, Quero deletar</button>
                      	<a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                      </form>
                      </div>
                     </div>
				</tr>
				<?php  endwhile; ?>
				
				
			</tbody>
		</table>
		<br>
		<a href="adicionar.php" class="btn">ADICIONAR CLIENTES</a>
	</div>
</div>
<?php
//footer
include_once 'includes/footer.php';
?>

    