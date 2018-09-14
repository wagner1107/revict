<?php require 'pages/header.php'; ?>
<?php
	if(empty($_SESSION['cLogin'])){
		?>
		<script type="text/javascript">window.location.href="login.php";</script>
		<?php 
		exit;
	}
?>
<div class="container">
	<h1>Cadastros</h1>

	<a href="add-cliente.php" class="btn btn-default">Adicionar novo Devedor</a>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Telefone</th>
				<th>Banco</th>
				<th>Valor da Divida</th>
				<th>Status</th>
				<th>Ações</th>
			</tr>
		</thead>
		<?php
		$c = new Clientes();
		$clientes = $c->getClientes();

		foreach($clientes as $cliente):
		?>
		<tr>
			<td><?php echo $cliente['nome']; ?></td>
			<td><?php echo $cliente['telefone']; ?></td>
			<td><?php echo $cliente['banco']; ?></td>
			<td>R$ <?php echo number_format($cliente['valor_divida'],2); ?></td>
			<td><?php echo $cliente['status']; ?></td>
			<td>
				<a href="excluir-cliente.php?id=<?php echo $cliente['id']; ?>" class="btn btn-danger">Excluir</a>
				<a href="editar-cliente.php?id=<?php echo $cliente['id']; ?>" class="btn btn-primary">Editar</a>
			</td>
		<?php endforeach; ?>
	</table>
</div>
<?php require 'pages/footer.php'; ?>