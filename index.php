
<?php require 'pages/header.php'; ?>

<?php

	$c = new Clientes();


	$cadastros = $c->getUltimosClientes();
	$quantidade = $c->getTotalClientes();

?>

	<div class="container-fluid">
		<div class="jumbotron">
			<h2>Nós temos hoje <?php echo $quantidade; ?> Pessoas com dividas!</h2>
		</div>

		<div class="row">
			<div class="col-sm-3">
				<h4>Pesquisa Avançada</h4>
				
			</div>
			<div class="col-sm-9">
				<h4>Últimos Cadastros realizados</h4>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Telefone</th>
							<th>Banco</th>
							<th>Valor da Divida</th>
							<th>Status</th>
						</tr>
					</thead>	
					<tbody>
						<?php foreach ($cadastros as $cadastro): ?>
							<tr>
								<td>
									<a href="editar-cliente.php?id=<?php echo $cadastro['id']; ?>"">
									<p> <?php echo $cadastro['nome'] ?></p>
									</a>
								</td>
								<td>
									<?php echo utf8_encode($cadastro['telefone']); ?>
								</td>
								<td>
									R$ <?php echo number_format($cadastro['valor_divida'],2); ?>
								</td>
								<td>
									<?php echo ($cadastro['banco']); ?>
								</td>
								<td>
									<?php echo ($cadastro['status']); ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php require 'pages/footer.php'; ?>