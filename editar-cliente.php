<?php require 'pages/header.php'; ?>
<?php
	if(empty($_SESSION['cLogin'])){
		?>
		<script type="text/javascript">window.location.href="login.php";</script>
		<?php 
		exit;
	}
	$c = new Clientes();

	if(isset($_POST['nome']) && !empty($_POST['nome'])){
		$nome = addslashes($_POST['nome']);
		$telefone = addslashes($_POST['telefone']);
		$banco = addslashes($_POST['banco']);
		$valor_divida = addslashes($_POST['valor_divida']);
		$status = addslashes($_POST['status']);

		$c->editClientes($nome, $telefone, $banco, $valor_divida, $status, $_GET['id']);
		?>



		<div class="alert alert-success">
			Produto editado com sucesso!
		</div>
		<?php
	}

	if(isset($_GET['id']) && !empty($_GET['id'])){
		$info = $c->getCliente($_GET['id']);
	} else {
		?>
		<script type="text/javascript">window.location.href="meus-clientes.php";</script>
		<?php 
		exit;
	}

?>
<div class="container">
	<h1>Clientes <small>Editar cliente</small></h1>

	<form method="POST">

		<div class="form-group">
			<label for="nome" id="nome">Nome:</label>
			<input type="text" name="nome" id="nome" class="form-control" value="<?php echo $info['nome']; ?>" />
		</div>

		<div class="form-group">
			<label for="telefone" id="telefone">telelfone:</label>
			<input type="text" name="telefone" id="telefone" class="form-control" value="<?php echo $info['telefone'] ?>" />
		</div>

		<div class="form-group">
			<label for="banco" id="banco">Banco:</label>
			<input type="text" name="banco" id="banco" class="form-control" value="<?php echo $info['banco']; ?>" />
		</div>

		<div class="form-group">
			<label for="valor_divida" id="valor_divida">Banco:</label>
			<input type="text" name="valor_divida" id="valor_divida" class="form-control" value="<?php echo number_format($info['valor_divida'],2 ); ?>" />
		</div>

		<div class="form-group">
			<label for="status" id="status">Status:</label>
			<input type="text" name="status" id="status" class="form-control" value="<?php echo $info['status']; ?>" />
		</div>
	
		<input type="submit" value="Editar Cliente" class="btn btn-default">
	</form>

</div>


<?php require 'pages/footer.php'; ?>