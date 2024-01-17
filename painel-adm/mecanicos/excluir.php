<?php 
require_once("../../conexao.php"); 

$id = $_POST['id'];
$id_oficina = $_POST['id_oficina'];

$query = $pdo->query("SELECT * FROM mecanicos where id = '$id' and id_oficina = '$id_oficina'");
//$res = $query->fetchAll(PDO::FETCH_ASSOC);
if ($query !== FALSE) {
    $res=$query->fetchAll(PDO::FETCH_ASSOC);
    $cpf_usu = $res[0]['cpf'];
} else {
    $res = null;
}

$query_id = $pdo->query("SELECT * FROM usuarios where cpf = '$cpf_usu' and id_oficina = $id_oficina");
//$res_id = $query_id->fetchAll(PDO::FETCH_ASSOC);
if ($query !== FALSE) {
    $res_id=$query_id->fetchAll(PDO::FETCH_ASSOC);
    $id_usu = $res_id[0]['id'];
} else {
    $res_id = null;
}


$pdo->query("DELETE FROM mecanicos WHERE id = '$id' and id_oficina = '$id_oficina'");
$pdo->query("DELETE FROM usuarios WHERE id = '$id_usu' and id_oficina = '$id_oficina'");

echo 'Excluído com Sucesso!';

?>