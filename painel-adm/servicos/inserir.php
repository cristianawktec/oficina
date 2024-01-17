<?php 
require_once("../../conexao.php"); 

$nome = $_POST['nome_reg'];
$valor = $_POST['valor_reg'];

$antigo = $_POST['antigo'];
$id = $_POST['txtid2'];
$id_oficina = $_POST['id_oficina'];

if($nome == ""){
	echo 'O nome é Obrigatório!';
	exit();
}


//VERIFICAR SE O REGISTRO JÁ EXISTE NO BANCO
if($antigo != $nome){
	$query = $pdo->query("SELECT * FROM servicos where nome = '$nome' and id_oficina = $id_oficina");
	//$res = $query->fetchAll(PDO::FETCH_ASSOC);
	if ($query !== FALSE) {
		$res=$query->fetchAll(PDO::FETCH_ASSOC);
		//echo"<pre>";print_r($res);echo"</pre>";exit;
	} else {
		$res = null;
	}
	$total_reg = @count($res);
	if($total_reg > 0){
		echo 'Serviço já está Cadastrado!';
		exit();
	}
}


if($id == ""){
	$res = $pdo->prepare("INSERT INTO servicos SET nome = :nome, valor = :valor, id_oficina = :id_oficina ");	

}else{
	$res = $pdo->prepare("UPDATE servicos SET nome = :nome, valor = :valor, id_oficina = :id_oficina WHERE id = '$id' and id_oficina = '$id_oficina'");
		
}

$res->bindValue(":nome", $nome);
$res->bindValue(":valor", $valor);
$res->bindValue(":id_oficina", $id_oficina);
$res->execute();


echo 'Salvo com Sucesso!';

?>