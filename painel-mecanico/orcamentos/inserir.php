<?php 
require_once("../../conexao.php"); 
@session_start();

//echo"<pre>";print_r($_POST);echo "</pre>";

$cliente = $_POST['cliente'];
$veiculo = @$_POST['veiculo'];
$servico = $_POST['servico'];
$descricao = $_POST['descricao'];
$data_entrega = $_POST['data_entrega'];
$garantia = $_POST['garantia'];
$valor = $_POST['valor'];
$obs = $_POST['obs'];
@$cliente_select = $_POST['cliente_select'];

if($cliente_select == ""){
	$cliente_select = $cliente;
}

$valor = str_replace(',', '.', $valor);

$id = $_POST['txtid2'];

$id_oficina = $_POST['id_oficina'];


//echo"<br>oficina: ".$id_oficina;

//VERIFICAR SE O CLIENTE EXISTE
//$query = $pdo->query("SELECT * FROM clientes where cpf = '$cpf' and id_oficina = $id_oficina");
$query = $pdo->query("SELECT * FROM clientes where id = '$cliente_select' and id_oficina = $id_oficina");

//echo"<br>sql: ".$sql;
	//$res = $query->fetchAll(PDO::FETCH_ASSOC);

	if ($query !== FALSE) {
		$res=$query->fetchAll(PDO::FETCH_ASSOC);
		//echo"<pre>";print_r($res);echo"</pre>";exit;
		for ($i=0; $i < @count($res); $i++) { 
			foreach ($res[$i] as $key => $value) {
			}
			$total_reg = @count($res);
			$cpf = $res[$i]['cpf'];
		}
		if(@count($res) == 0){
			echo 'O cliente não existe, Dado Incorreto';
			exit();
		}
	} else {
		$res = null;
	}

if($cpf != "")	{
	$cliente = $cpf;
}

	
if($total_reg == 0){
	echo 'O Cliente não está cadastrado ou o CPF está incorreto!';
	exit();
}

if($cliente == ""){
	echo 'O CPF do Cliente é Obrigatório!';
	exit();
}

if($veiculo == ""){
	echo 'Você precisa selecionar um Veiculo';
	exit();
}

if($valor == ""){
	echo 'O Valor é Obrigatório!';
	exit();
}

$data = date("Y-m-d");

if($id == ""){
	$res = $pdo->prepare("INSERT INTO orcamentos SET cliente = :cliente, veiculo = :veiculo, descricao = :descricao, valor = :valor, servico = :servico, data_entrega = :data_entrega, garantia = :garantia, id_oficina = :id_oficina, mecanico = '$_SESSION[cpf_usuario]', data = '$data', obs = :obs, status = 'Aberto'");	

}else{
	$res = $pdo->prepare("UPDATE orcamentos SET cliente = :cliente, veiculo = :veiculo, descricao = :descricao, valor = :valor, servico = :servico, data_entrega = :data_entrega, garantia = :garantia, id_oficina = :id_oficina, mecanico = '$_SESSION[cpf_usuario]', obs = :obs WHERE id = '$id' and id_oficina = '$id_oficina'");
	
}

$res->bindValue(":cliente", $cpf);
$res->bindValue(":veiculo", $veiculo);
$res->bindValue(":descricao", $descricao);
$res->bindValue(":valor", $valor);
$res->bindValue(":servico", $servico);
$res->bindValue(":data_entrega", $data_entrega);
$res->bindValue(":garantia", $garantia);
$res->bindValue(":obs", $obs);
$res->bindValue(":id_oficina", $id_oficina);

$res->execute();
//$arr = $res->errorInfo();
//echo"<pre>";print_r($arr);echo"</pre>";

echo 'Salvo com Sucesso!';

?>