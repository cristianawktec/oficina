<?php 
require_once("../../conexao.php"); 

$id = $_POST['id'];
$id_oficina = $_POST['id_oficina'];

$query = $pdo->query("SELECT * FROM usuarios where id = '$id'");
if ($query !== FALSE) {
    $res=$query->fetchAll(PDO::FETCH_ASSOC);
    $cpf = $res[0]['cpf'];
} else {
    $res = null;
}

$query_id = $pdo->query("SELECT * FROM usuarios where cpf = '$cpf'");
if ($query !== FALSE) {
    $res_id=$query_id->fetchAll(PDO::FETCH_ASSOC);
    $id_usu = $res_id[0]['id'];
} else {
    $res_id = null;
};

//$pdo->query("UPDATE oficina SET status = 'inativo' WHERE id = '$id' and id_oficina = '$id_oficina'");
$pdo->query("UPDATE usuarios SET status = 'inativo' WHERE id = '$id_usu'");
echo 'Excluído com Sucesso!';

?>