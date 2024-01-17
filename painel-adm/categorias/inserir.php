<?php 
require_once("../../conexao.php"); 

$nome = $_POST['nome_mec'];

$antigo = $_POST['antigo'];
$id = $_POST['txtid2'];
$id_oficina = $_POST['id_oficina'];

if($nome == ""){
	echo 'O nome é Obrigatório!';
	exit();
}


//VERIFICAR SE O REGISTRO JÁ EXISTE NO BANCO
if($antigo != $nome){
	$query = $pdo->query("SELECT * FROM categorias where nome = '$nome' and id_oficina = '$id_oficina'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){
		echo 'A categoria já está Cadastrada!';
		exit();
	}
}


if($id == ""){
	$res = $pdo->prepare("INSERT INTO categorias SET nome = :nome, id_oficina = :id_oficina");	

}else{
	$res = $pdo->prepare("UPDATE categorias SET nome = :nome, id_oficina = :id_oficina WHERE id = '$id' and id_oficina = '$id_oficina'");
		
}

$res->bindValue(":nome", $nome);
$res->bindValue(":id_oficina", $id_oficina);
$res->execute();


echo 'Salvo com Sucesso!';

?>