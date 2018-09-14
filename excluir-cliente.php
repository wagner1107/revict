<?php
require 'config.php';

	if(empty($_SESSION['cLogin'])){
		header("Location: login.php");
		exit;
	}

require 'classes/clientes.class.php';
$c = new Clientes();
	
if(isset($_GET['id']) && !empty($_GET['id'])){
	$c->excluirCliente($_GET['id']);
}

header("Location: meus-clientes.php");