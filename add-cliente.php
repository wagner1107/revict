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

		$c->addCliente($nome, $telefone, $banco, $valor_divida);
		?>

		<div class="alert alert-success">
			Produto adicionado com sucesso!
		</div>
		<?php

	}
?>
<div class="container">
	<h1>Clientes <small>Adicionar novo</small></h1>

	<form method="POST">


		<div class="form-group">
			<label for="nome" id="nome">Nome:</label>
			<input type="text" name="nome" id="nome" class="form-control" />
		</div>

		<div class="form-group">
			<label for="telefone" id="telefone">Telefone:</label>
			<input type="text" name="telefone" id="telefone" class="form-control" />
		</div>

		<div class="form-group">
			<label for="banco" id="banco">Banco:</label>
			<input type="text" name="banco" id="banco" class="form-control" />
		</div>


		<div class="form-group">
			<label for="valor_divida" id="valor_divida">Valor da Divida:</label>
			<input type="text" name="valor_divida" id="valor_divida" class="form-control" />
		</div>


		<input type="submit" value="Adicionar" class="btn btn-default">


	</form>

</div>


<?php require 'pages/footer.php'; ?>