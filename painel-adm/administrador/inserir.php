<?php 
require_once("../../conexao.php"); 
//echo"<pre>";print_r($_POST);echo "</pre>";exit();
$nome = $_POST['nome'];
$telefone_oficina = $_POST['telefone_oficina'];
$cnpj = $_POST['cnpj'];
$email = $_POST['email'];
$endereco_oficina = $_POST['endereco_oficina'];

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

if($cnpj == ""){
	echo 'O CNPJ é Obrigatório!';
	exit();
}

/*VERIFICAR SE O REGISTRO JÁ EXISTE NO BANCO
if($antigo != $cpf){
	$query = $pdo->query("SELECT * FROM oficina where cpf = '$cpf' and id_oficina = '$id_oficina'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){
		echo 'O CPF já está Cadastrado!';
		exit();
	}
}*/

$query = $pdo->query("SELECT email FROM oficina where email = '$email' and id = '$id_oficina'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

for ($i=0; $i < @count($res); $i++) { 
	foreach ($res[$i] as $key => $value) {
	}
	$antigo = $res[$i]['email'];
	//VERIFICAR SE O REGISTRO COM MESMO EMAIL JÁ EXISTE NO BANCO
	if($antigo != $email){
		$query = $pdo->query("SELECT * FROM oficina where email = '$email' and id_oficina = '$id_oficina'");
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_reg = @count($res);
		if($total_reg > 0){
			echo 'O Email já está Cadastrado!';
			exit();
		}
	}
}




if($id == ""){//echo"<br>vai inserir";
	//$res = $pdo->prepare("INSERT INTO oficina SET nome = :nome, email = :email, cnpj = :cnpj, endereco_oficina = :endereco, telefone_oficina = :telefone");	
	//$res = $pdo->query("INSERT INTO oficina SET nome = '$nome', cnpj = '$cnpj', email = '$email_adm', endereco_oficina = '$endereco_oficina', telefone_oficina = '$telefone_oficina'");
	//$sql = "INSERT INTO oficina SET nome = '$nome', cnpj = '$cnpj', email = '$email_adm', endereco_oficina = '$endereco_oficina', telefone_oficina = '$telefone_oficina'";
	//echo"<br>sql:".$sql;

	$res2 = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha, nivel = :nivel, id_oficina = :id_oficina");	
	$res2->bindValue(":senha", '123');
	$res2->bindValue(":nivel", 'admin');

	$res2->bindValue(":nome", $nome);
	$res2->bindValue(":email", $email);
	$res2->bindValue(":id_oficina", $id_oficina);

	$res2->execute();

	echo 'Salvo com Sucesso!';
	//echo"<br>email: ".$email;
	$query3 = $pdo->query("SELECT id FROM usuarios where email = '$email' and id_oficina = '$id_oficina'");
	$res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
	//$sql = "SELECT id FROM usuarios where email = '$email' and id_oficina = '$id_oficina'";
	//echo"<br>sql:".$sql;exit();
	$tot = count($res3);
	//echo"<br>total: ".$tot; 
	
	for ($i=0; $i < $tot; $i++) { 
		foreach ($res3[$i] as $key => $value) {
	}
	$usuario = $res3[$i]['id'];
	//echo"<br>id::".$usuario;exit;
	}
	if($tot > 0){
		$res = $pdo->query("INSERT INTO oficina SET nome = '$nome', id_usuario = '$usuario', cnpj = '$cnpj', email = '$email', senha = '123', endereco_oficina = '$endereco_oficina', telefone_oficina = '$telefone_oficina'");
		$query4 = $pdo->query("SELECT id FROM oficina where email = '$email' and id_usuario = '$usuario'");
		$res4 = $query4->fetchAll(PDO::FETCH_ASSOC);
		//$sql = "SELECT id FROM oficina where email = '$email' and id_usuario = '$usuario'";
		//echo"<br>sql:".$sql;
		$tot = count($res4);
		//echo"<br>total: ".$tot; 
		for ($i=0; $i < $tot; $i++) { 
			foreach ($res4[$i] as $key => $value) {
		}
			$id = $res4[$i]['id'];
			$res = $pdo->query("UPDATE usuarios SET id_oficina = '$id' where id = '$usuario'");
		}
		//$sql = "INSERT INTO oficina SET nome = '$nome', id_usuario = '$usuario', cnpj = '$cnpj', email = '$email_adm', endereco_oficina = '$endereco_oficina', telefone_oficina = '$telefone_oficina'";
		//echo"<br>sql:".$sql;exit;
	}


}else{//echo"<br>atualizando...";
	//$res = $pdo->prepare("UPDATE oficina SET nome = :nome, cnpj = :cnpj, email = :email, endereco_oficina = :endereco, telefone_oficina = :telefone WHERE id = '$id' and id_oficina = '$id_oficina'");

	//$res2 = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, id_oficina = :id_oficina WHERE cpf = '$antigo' and id_oficina = '$id_oficina'");	
	
}
/*
$res->bindValue(":nome", $nome);
$res->bindValue(":email", $email);
$res->bindValue(":cnpj", $cnpj);
$res->bindValue(":endereco_oficina", $endereco_oficina);
$res->bindValue(":telefone_oficina", $telefone_oficina);

$res->execute();
$arr = $res->errorInfo();
echo"<pre>";print_r($arr);echo"</pre>";
*/



?>