<?php 
require_once("../../conexao.php"); 

$nome = $_POST['nome'];
$endereco_oficina = $_POST['endereco_oficina'];
$telefone_oficina = $_POST['telefone_oficina'];
$email = $_POST['email'];
$cnpj = $_POST['cnpj'];
$id_oficina = $_POST['id_oficina'];

//echo"<pre>";print_r($_POST);echo"</pre>";exit;

//SCRIPT PARA SUBIR FOTO NO BANCO
$nome_img = preg_replace('/[ -]+/' , '-' , @$_FILES['imagem']['name']);

$dir = '../../img/';

mkdir($dir.$id_oficina, 0777, true); 
//Cria uma pasta com o nome designado na variável

$caminho = '../../img/'.$id_oficina.'/' .$nome_img;
if (@$_FILES['imagem']['name'] == ""){
  $imagem = "sem-foto.jpg";
}else{
    $imagem = $nome_img;
}

$imagem_temp = @$_FILES['imagem']['tmp_name']; 
$ext = pathinfo($imagem, PATHINFO_EXTENSION);   
if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif'){ 
move_uploaded_file($imagem_temp, $caminho);
}else{
	echo 'Extensão de Imagem não permitida!';
	exit();
}


if($nome == ""){
	echo 'O nome é Obrigatório!';
	exit();
}

if($cnpj == ""){
	echo 'O CNPJ é Obrigatório!';
	exit();
}


if($id_oficina == ""){

	//VERIFICAR SE O REGISTRO JÁ EXISTE NO BANCO
	if($antigo != $nome){
		$query = $pdo->query("SELECT * FROM oficina where nome = '$nome' and id = '$id_oficina'");
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_reg = @count($res);
		if($total_reg > 0){
			echo 'Empresa já está Cadastrada!';
			exit();
		}
	}

	$res = $pdo->prepare("INSERT INTO oficina SET nome = :nome, endereco_oficina = :endereco_oficina, telefone_oficina = :telefone_oficina, email = :email, cnpj = :cnpj, imagem = :imagem");	
		$res->bindValue(":imagem", $imagem);
}else{
	if($imagem == "sem-foto.jpg"){
		$res = $pdo->prepare("UPDATE oficina SET nome = :nome, endereco_oficina = :endereco_oficina, telefone_oficina = :telefone_oficina, email = :email, cnpj = :cnpj WHERE id = '$id_oficina'");
	}else{
		$res = $pdo->prepare("UPDATE oficina SET nome = :nome, endereco_oficina = :endereco_oficina, telefone_oficina = :telefone_oficina, email = :email, cnpj = :cnpj, imagem = :imagem WHERE id = '$id_oficina'");
			$res->bindValue(":imagem", $imagem);
	}
	
}

$res->bindValue(":nome", $nome);
$res->bindValue(":endereco_oficina", $endereco_oficina);
$res->bindValue(":telefone_oficina", $telefone_oficina);
$res->bindValue(":email", $email);
$res->bindValue(":cnpj", $cnpj);

$res->execute();


echo 'Salvo com Sucesso!';

?>