<?php 
require_once("../../conexao.php"); 

$id = $_POST['id'];
$id_oficina = $_SESSION['id_oficina'];

$pdo->query("DELETE FROM contas_receber WHERE id = '$id' and id_oficina = '$id_oficina'");

echo 'Excluído com Sucesso!';

?>