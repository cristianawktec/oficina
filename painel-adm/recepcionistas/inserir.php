<?php 
require_once("../../conexao.php"); 

$nome = $_POST['nome_mec'];
$telefone = $_POST['telefone_mec'];
$cpf = $_POST['cpf_mec'];
$email = $_POST['email_mec'];
$endereco = $_POST['endereco_mec'];

$antigo = $_POST['antigo'];
$antigo2 = $_POST['antigo2'];
$id = $_POST['txtid2'];
$id_oficina = $_POST['id_oficina'];

if($nome == ""){
	echo 'O nome é Obrigatório!';
	exit();
}

if($email == ""){
	echo 'O email é Obrigatório!';
	exit();
}

if($cpf == ""){
	echo 'O CPF é Obrigatório!';
	exit();
}

//VERIFICAR SE O REGISTRO JÁ EXISTE NO BANCO
if($antigo != $cpf){
	$query = $pdo->query("SELECT * FROM recepcionistas where cpf = '$cpf' and id_oficina = '$id_oficina'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){
		echo 'O CPF já está Cadastrado!';
		exit();
	}
}


//VERIFICAR SE O REGISTRO COM MESMO EMAIL JÁ EXISTE NO BANCO
if($antigo2 != $email){
	$query = $pdo->query("SELECT * FROM recepcionistas where email = '$email' and id_oficina = '$id_oficina'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){
		echo 'O Email já está Cadastrado!';
		exit();
	}
}


if($id == ""){
	$res = $pdo->prepare("INSERT INTO recepcionistas SET nome = :nome, cpf = :cpf, email = :email, endereco = :endereco, telefone = :telefone, id_oficina = :id_oficina");	

	$res2 = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, cpf = :cpf, email = :email, senha = :senha, nivel = :nivel, id_oficina = :id_oficina");	
	$res2->bindValue(":senha", '123');
	$res2->bindValue(":nivel", 'recep');

}else{
	$res = $pdo->prepare("UPDATE recepcionistas SET nome = :nome, cpf = :cpf, email = :email, endereco = :endereco, telefone = :telefone, id_oficina = :id_oficina WHERE id = '$id' and id_oficina = '$id_oficina'");

	$res2 = $pdo->prepare("UPDATE usuarios SET nome = :nome, cpf = :cpf, email = :email, id_oficina = :id_oficina WHERE cpf = '$antigo' and id_oficina = '$id_oficina'");	
	
}

$res->bindValue(":nome", $nome);
$res->bindValue(":cpf", $cpf);
$res->bindValue(":telefone", $telefone);
$res->bindValue(":email", $email);
$res->bindValue(":endereco", $endereco);
$res->bindValue(":id_oficina", $id_oficina);

$res2->bindValue(":nome", $nome);
$res2->bindValue(":cpf", $cpf);
$res2->bindValue(":email", $email);
$res2->bindValue(":id_oficina", $id_oficina);


$res->execute();
$res2->execute();

echo 'Salvo com Sucesso!';

?>