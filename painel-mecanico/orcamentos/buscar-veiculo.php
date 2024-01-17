<?php 
require_once("../../conexao.php"); 
//echo"<pre>";print_r($_POST);echo "</pre>";

@$cliente = $_POST['cliente'];
@$cliente2 = $_POST['cliente2'];
@$cpf = $_POST['cpf'];
@$veiculo = $_POST['veiculo'];
@$id_oficina = $_POST['id_oficina'];

//echo"<pre>";print_r($GLOBALS);echo"</pre>";
/*
if(is_numeric($cliente)){
	$cpf = $cliente;
	$valor = limpaCPF_CNPJ($_POST['cpf']);
}elseif(is_string($cliente)){
	$nome = $cliente;
	echo"<br>é string: ".$nome;
}else{
	$placa = $cliente;
}
*/

function limpaCPF_CNPJ($valor){
$valor = preg_replace('/[^0-9]/', '', $valor);
	return $valor;
}

//$query = $pdo->query("SELECT * FROM clientes where cpf = '$cpf' and id_oficina = $id_oficina");
if($cpf == ''){
	$query = $pdo->query("SELECT * FROM clientes  WHERE id_oficina = '$id_oficina' and id = '$cliente'");
}else{
	$query = $pdo->query("SELECT * FROM clientes  WHERE id_oficina = '$id_oficina' and cpf = '$cpf'");
}

//$sql = "SELECT * FROM clientes  WHERE id_oficina = '$id_oficina' and cpf = '$cliente'";
//echo"<br>sql: ".$sql;
//$res = $query->fetchAll(PDO::FETCH_ASSOC);
if ($query !== FALSE) {
	$res=$query->fetchAll(PDO::FETCH_ASSOC);
	//echo"<pre>";print_r($res);echo"</pre>";exit;
	for ($i=0; $i < @count($res); $i++) { 
		foreach ($res[$i] as $key => $value) {
		}
		$cpf = $res[$i]['cpf'];
	}
	if(@count($res) == 0){
		echo 'O cliente não existe, Dado Incorreto';
		exit();
	}
} else {
	$res = null;
}

echo '<select name="veiculo" class="form-control" id="veiculo">';

$query = $pdo->query("SELECT * FROM veiculos where cliente = '$cpf' and id_oficina = $id_oficina order by id desc ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

for ($i=0; $i < @count($res); $i++) { 
	foreach ($res[$i] as $key => $value) {
	}
	$nome_reg = $res[$i]['marca'] . ' - ' . $res[$i]['modelo'];
	$id_reg = $res[$i]['id'];
	
	if(@$veiculo == $id_reg){
		$selected = 'selected';
	}else{
		$selected = '';
	}

	echo '<option value=" '.$id_reg. '" '.$selected.'>'.$nome_reg.'</option>';
 } 

echo '</select>';

?>