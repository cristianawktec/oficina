<?php 
require_once("../../conexao.php"); 

$id = $_POST['id'];
$id_oficina = $_POST['id_oficina'];


$query = $pdo->query("SELECT * FROM compras where id_conta = '$id' and id_oficina = '$id_oficina'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_compra = @$res[0]['id'];


$pdo->query("DELETE FROM compras WHERE id = '$id_compra' and id_oficina = '$id_oficina'");
$pdo->query("DELETE FROM contas_pagar WHERE id = '$id' and id_oficina = '$id_oficina'");

echo 'Excluído com Sucesso!';

?>