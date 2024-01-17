<?php 
require_once("../../conexao.php"); 
@session_start();
$valor = $_POST['valor'];
$id = $_POST['txtid2'];
$id_oficina = $_SESSION['id_oficina'];

$pdo->query("UPDATE contas_receber SET adiantamento = '$valor' WHERE id = '$id' and id_oficina = '$id_oficina'");


$pdo->query("INSERT INTO movimentacoes SET tipo = 'Entrada', descricao = 'Adiantamento', valor = '$valor', funcionario = '$_SESSION[cpf_usuario]', id_oficina = '$id_oficina', data = curDate()");

echo 'Salvo com Sucesso!';

?>