<?php 
@session_start();
if(@$_SESSION['nivel_usuario'] == null || @$_SESSION['nivel_usuario'] != 'admin'){
	echo "<script language='javascript'> window.location='../index.php' </script>";
}

$pag = "configuracoes";
require_once("../conexao.php"); 

$id_oficina = $_SESSION['id_oficina'];
if ($id_oficina == '1') {
?>

<div class="row mt-4 mb-4">
	<a type="button" class="btn-secondary btn-sm ml-3 d-none d-md-block" href="index.php?pag=<?php echo $pag ?>&funcao=novo">Nova Oficina</a>
	<a type="button" class="btn-primary btn-sm ml-3 d-block d-sm-none" href="index.php?pag=<?php echo $pag ?>&funcao=novo">+</a>

</div>
<?php } ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Nome da Empresa</th>
						<th>Endereço</th>
						<th>Telefone</th>
						<th>E-mail</th>
						<th>CNPJ</th>
						<th>Logo</th>
						<th>Ações</th>
					</tr>
				</thead>

				<tbody>

					<?php 

					$query = $pdo->query("SELECT * FROM oficina WHERE id = $id_oficina order by id desc ");
					$res = $query->fetchAll(PDO::FETCH_ASSOC);
					
					if ($id_oficina == '1') {
						$query2 = $pdo->query("SELECT * FROM oficina order by id desc ");
						$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
						for ($i=0; $i < @count($res2); $i++) { 
							foreach ($res2[$i] as $key => $value) {
							}
							$nome = $res2[$i]['nome'];
							$endereco_oficina = $res2[$i]['endereco_oficina'];
							$telefone_oficina = $res2[$i]['telefone_oficina'];
							$email = $res2[$i]['email'];
							$cnpj = $res2[$i]['cnpj'];
							$logo = $res2[$i]['imagem'];
							$id = $res2[$i]['id'];
							?>

							<tr>
								<td><?php echo $nome ?></td>
								<td><?php echo $endereco_oficina ?></td>
								<td><?php echo $telefone_oficina ?></td>
								<td><?php echo $email ?></td>
								<td><?php echo $cnpj ?></td>
								<td><img src="../img/<?php echo $id ?>/<?php echo $logo ?>" width="50" ></td>

								<td>
									<a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class='text-primary mr-1' title='Editar Dados'><i class='far fa-edit'></i></a>
									<a href="index.php?pag=<?php echo $pag ?>&funcao=excluir&id=<?php echo $id ?>" class='text-danger mr-1' title='Excluir Registro'><i class='far fa-trash-alt'></i></a>
								</td>
							</tr>
						<?php } 
					} else {echo"<br>aqui não";

						$nome = $res[0]['nome'];
						$endereco_oficina = $res[0]['endereco_oficina'];
						$telefone_oficina = $res[0]['telefone_oficina'];
						$email = $res[0]['email'];
						$cnpj = $res[0]['cnpj'];
						$logo = $res[0]['imagem'];
						$id = $res[0]['id'];

						?>

						<tr>
							<td><?php echo $nome ?></td>
							<td><?php echo $endereco_oficina ?></td>
							<td><?php echo $telefone_oficina ?></td>
							<td><?php echo $email ?></td>
							<td><?php echo $cnpj ?></td>
							<td><img src="../img/<?php echo $id ?>/<?php echo $logo ?>" width="50" ></td>

							<td>
								<a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class='text-primary mr-1' title='Editar Dados'><i class='far fa-edit'></i></a>
							</td>
						</tr>

						<?php } ?>

				</tbody>
			</table>
		</div>
	</div>
</div>





<!-- Modal -->
<div class="modal fade" id="modalDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<?php 
				if (@$_GET['funcao'] == 'editar') {
					$titulo = "Editar Registro";
					$id2 = $_GET['id'];

					$query = $pdo->query("SELECT * FROM oficina where id = $id_oficina");
					$res = $query->fetchAll(PDO::FETCH_ASSOC);
					$nome2 = $res[0]['nome'];
					$endereco_oficina2 = $res[0]['endereco_oficina'];
					$telefone_oficina2 = $res[0]['telefone_oficina'];
					$email2 = $res[0]['email'];
					$cnpj2 = $res[0]['cnpj'];
					$logo2 = $res[0]['imagem'];

				} else {
					$titulo = "Inserir Registro";

				}


				?>

				<h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form" method="POST">
				<div class="modal-body">

					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label >Nome</label>
								<input value="<?php echo @$nome2 ?>" type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label >Telefone</label>
								<input value="<?php echo @$telefone_oficina2 ?>" type="text" class="form-control" id="telefone_oficina" name="telefone_oficina" placeholder="Telefone">
							</div>
						</div>
					</div>					

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label >CNPJ</label>
								<input value="<?php echo @$cnpj2 ?>" type="text" class="form-control" id="cnpj" name="cnpj" placeholder="CNPJ">
							</div>
						</div>
						
						<div class="col-md-8">
							<div class="form-group">
								<label >E-mail</label>
								<input value="<?php echo @$email2 ?>" type="text" class="form-control" id="email" name="email" placeholder="E-mail">
							</div>
						</div>
					</div>

					
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label >Endereço</label>
								<textarea class="form-control" id="endereco_oficina" name="endereco_oficina"><?php echo $endereco_oficina2 ?></textarea> 
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label >Logo</label>
								<input type="file" value="<?php echo @$logo2 ?>"  class="form-control-file" id="imagem" name="imagem" onChange="carregarImg();">
							</div>

							<?php if(@$logo2 != ""){ ?>
								<img src="../img/<?php echo $id ?>/<?php echo $logo2 ?>" width="100" height="100" id="target">
							<?php  }else{ ?>
								<img src="../img/produtos/sem-foto.jpg" width="100" height="100" id="target">
							<?php } ?>
						</div>
						
					</div>

					


					<small>
						<div id="mensagem">

						</div>
					</small> 

				</div>



				<div class="modal-footer">


					<input value="<?php echo @$nome2 ?>" type="hidden" name="antigo" id="antigo">
					<input value="<?php echo $id_oficina ?>" type="hidden" name="id_oficina" id="id_oficina">

					<button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-primary">Salvar</button>
				</div>
			</form>
		</div>
	</div>
</div>






<?php 

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "novo") {
	echo "<script>$('#modalDados').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "editar") {
	echo "<script>$('#modalDados').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "forn") {
	echo "<script>$('#modal-forn').modal('show');</script>";
}


?>




<!--AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM OU SEM IMAGEM -->
<script type="text/javascript">
	$("#form").submit(function () {
		var pag = "<?=$pag?>";
		event.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url: pag + "/inserir.php",
			type: 'POST',
			data: formData,

			success: function (mensagem) {
				$('#mensagem').removeClass()
				if (mensagem.trim() == "Salvo com Sucesso!") {
                    //$('#nome').val('');
                    $('#btn-fechar').click();
                    window.location = "index.php?pag="+pag;
                } else {
                	$('#mensagem').addClass('text-danger')
                }
                $('#mensagem').text(mensagem)
            },

            cache: false,
            contentType: false,
            processData: false,
            xhr: function () {  // Custom XMLHttpRequest
            	var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                	myXhr.upload.addEventListener('progress', function () {
                		/* faz alguma coisa durante o progresso do upload */
                	}, false);
                }
                return myXhr;
            }
        });
	});
</script>





<!--SCRIPT PARA CARREGAR IMAGEM -->
<script type="text/javascript">

	function carregarImg() {

		var target = document.getElementById('target');
		var file = document.querySelector("input[type=file]").files[0];
		var reader = new FileReader();

		reader.onloadend = function () {
			target.src = reader.result;
		};

		if (file) {
			reader.readAsDataURL(file);


		} else {
			target.src = "";
		}
	}

</script>





<script type="text/javascript">
	$(document).ready(function () {
		$('#dataTable').dataTable({
			"ordering": false
		})

	});
</script>




<!--AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM OU SEM IMAGEM -->
<script type="text/javascript">
	$("#form-pedido").submit(function () {
		var pag = "<?=$pag?>";
		event.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url: pag + "/pedido.php",
			type: 'POST',
			data: formData,

			success: function (mensagem) {
				$('#mensagem').removeClass()
				if (mensagem.trim() == "Salvo com Sucesso!") {
                    //$('#nome').val('');
                    $('#btn-fechar').click();
                    window.location = "index.php?pag="+pag;
                } else {
                	$('#mensagem').addClass('text-danger')
                }
                $('#mensagem').text(mensagem)
            },

            cache: false,
            contentType: false,
            processData: false,
            xhr: function () {  // Custom XMLHttpRequest
            	var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                	myXhr.upload.addEventListener('progress', function () {
                		/* faz alguma coisa durante o progresso do upload */
                	}, false);
                }
                return myXhr;
            }
        });
	});
</script>




<script type="text/javascript">

	function mostrarDescricao(descricao, imagem) {
		event.preventDefault();
		$('#spanDescricao').text(descricao);
		$('#imagemDescricao').attr('src', "../img/produtos/" + imagem);
		$('#modal-descricao').modal('show');
	}

</script>