<?php 
require_once("../../conexao.php"); 
@session_start();
$id = $_POST['id'];
$id_oficina = $_SESSION['id_oficina'];

$pdo->query("UPDATE contas_receber SET pago = 'Sim' WHERE id = '$id' and id_oficina = '$id_oficina'");

//LANÇA NAS MOVIMENTAÇÕES
$query = $pdo->query("SELECT * FROM contas_receber where id = '$id' and id_oficina = '$id_oficina'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$descricao = $res[0]['descricao'];
$valor = $res[0]['valor'];
$adiantamento = $res[0]['adiantamento'];
$valor_final = $valor - $adiantamento;
$id_servico = $res[0]['id_servico'];



$pdo->query("INSERT INTO movimentacoes SET tipo = 'Entrada', descricao = '$descricao', valor = '$valor_final', funcionario = '$_SESSION[cpf_usuario]', id_oficina = '$id_oficina', data = curDate()");



echo 'Aprovado com Sucesso!';

?>