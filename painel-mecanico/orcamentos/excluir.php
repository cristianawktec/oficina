<?php 
require_once("../../conexao.php"); 

$id = $_POST['id'];
$id_oficina = $_POST['id_oficina'];


//EXCLUIR TAMBÉM OS PRODUTOS RELACIONADOS AO ORÇAMENTO
$query = $pdo->query("SELECT * FROM orc_prod where orcamento = '$id' and id_oficina = $id_oficina");
//$res = $query->fetchAll(PDO::FETCH_ASSOC);
if ($query !== FALSE) {
	$res=$query->fetchAll(PDO::FETCH_ASSOC);	
} else {
	$res = null;
}

for ($i=0; $i < @count($res); $i++) { 
	foreach ($res[$i] as $key => $value) {
	}
	$id_orc_prod = $res[$i]['id'];

	$pdo->query("DELETE FROM orc_prod WHERE id = '$id_orc_prod' and id_oficina = $id_oficina");
}

$pdo->query("DELETE FROM orcamentos WHERE id = '$id' and id_oficina = $id_oficina");

echo 'Excluído com Sucesso!';

?>