<?php 
require_once("../../conexao.php"); 

$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$cor = $_POST['cor'];
$placa = $_POST['placa'];
$ano = $_POST['ano'];
$km = $_POST['km'];
$cliente = $_POST['cliente'];

$antigo = $_POST['antigo'];
$id = $_POST['txtid2'];
$id_oficina = $_POST['id_oficina'];


//VERIFICAR SE O CLIENTE EXISTE
$query = $pdo->query("SELECT * FROM clientes where cpf = '$cliente' and id_oficina = $id_oficina");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg == 0){
		echo 'O Cliente não está cadastrado ou o CPF está incorreto!';
		exit();
}

if($modelo == ""){
	echo 'O Modelo é Obrigatório!';
	exit();
}

if($marca == ""){
	echo 'A Marca é Obrigatória!';
	exit();
}

if($placa == ""){
	echo 'O Placa é Obrigatória!';
	exit();
}

//VERIFICAR SE O REGISTRO JÁ EXISTE NO BANCO
if($antigo != $placa){
	$query = $pdo->query("SELECT * FROM veiculos where placa = '$placa' and id_oficina = '$id_oficina'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){
		echo 'O Veículo já está Cadastrado com esta placa!';
		exit();
	}
}



if($id == ""){
	$res = $pdo->prepare("INSERT INTO veiculos SET marca = :marca, modelo = :modelo, cor = :cor, placa = :placa, ano = :ano, km = :km, cliente = :cliente, id_oficina = :id_oficina, data = curDate()");	

}else{
	$res = $pdo->prepare("UPDATE veiculos SET marca = :marca, modelo = :modelo, cor = :cor, placa = :placa, ano = :ano, km = :km, cliente = :cliente, id_oficina = :id_oficina WHERE id = '$id' and id_oficina = '$id_oficina' ");
	
}

$res->bindValue(":marca", $marca);
$res->bindValue(":modelo", $modelo);
$res->bindValue(":cor", $cor);
$res->bindValue(":placa", $placa);
$res->bindValue(":ano", $ano);
$res->bindValue(":km", $km);
$res->bindValue(":cliente", $cliente);
$res->bindValue(":id_oficina", $id_oficina);

$res->execute();
//$arr = $res->errorInfo();
//echo"<pre>";print_r($arr);echo"</pre>";


echo 'Salvo com Sucesso!';

?>