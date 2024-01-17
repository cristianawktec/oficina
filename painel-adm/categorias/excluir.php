<?php 
require_once("../../conexao.php"); 

$id = $_POST['id'];
$id_oficina = $_POST['id_oficina'];

//EXCLUIR SOMENTE SE NÃO TIVER REGISTROS RELACIONADOS
$query_tot = $pdo->query("SELECT * FROM produtos where categoria = '$id' and id_oficina = '$id_oficina'");
$res_tot = $query_tot->fetchAll(PDO::FETCH_ASSOC);
$total_produtos = @count($res_tot);

if($total_produtos == 0){
	$pdo->query("DELETE FROM categorias WHERE id = '$id' and id_oficina = '$id_oficina'");
	echo 'Excluído com Sucesso!';
}else{
	echo 'Você possui produtos relacionados a esta categoria, primeiro exclua os produtos para depois excluir a categoria!';
}




?>