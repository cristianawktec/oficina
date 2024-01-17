<?php 
require_once("../../conexao.php"); 
@session_start();
$id = $_POST['id'];
$id_oficina = $_POST['id_oficina'];

$pdo->query("UPDATE contas_pagar SET pago = 'Sim' WHERE id = '$id' and id_oficina = '$id_oficina'");

//LANÇA NAS MOVIMENTAÇÕES
$query = $pdo->query("SELECT * FROM contas_pagar where id = '$id' and id_oficina = '$id_oficina'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$descricao = $res[0]['descricao'];
$valor = $res[0]['valor'];

$pdo->query("INSERT INTO movimentacoes SET tipo = 'Saída', descricao = '$descricao', valor = '$valor', funcionario = '$_SESSION[cpf_usuario]', id_oficina = '$id_oficina', data = curDate()");

echo 'Aprovado com Sucesso!';

?>