<?php 
@session_start();
if(@$_SESSION['nivel_usuario'] == null || @$_SESSION['nivel_usuario'] != 'recep'){
    echo "<script language='javascript'> window.location='../index.php' </script>";
}

$pag = "compras";
require_once("../conexao.php"); 

$id_oficina = $_SESSION['id_oficina'];

?>

<!-- DataTales Example -->
<div class="card shadow mb-4">

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Produto</th>
						<th>Valor</th>
						<th>Funcionário</th>
						<th>Data</th>
						
					</tr>
				</thead>

				<tbody>

					<?php 

					$query = $pdo->query("SELECT * FROM compras WHERE id_oficina = $id_oficina order by id desc ");
					$res = $query->fetchAll(PDO::FETCH_ASSOC);
					
					for ($i=0; $i < @count($res); $i++) { 
						foreach ($res[$i] as $key => $value) {
						}
						$produto = $res[$i]['produto'];
						$valor = $res[$i]['valor'];
						$funcionario = $res[$i]['funcionario'];
						$data = $res[$i]['data'];
						
						$id = $res[$i]['id'];


						$query_prod = $pdo->query("SELECT * FROM produtos where id = '$produto' and id_oficina = $id_oficina");
						$res_prod = $query_prod->fetchAll(PDO::FETCH_ASSOC);
						$nome_produto = $res_prod[0]['nome'];

						$query_usu = $pdo->query("SELECT * FROM usuarios where cpf = '$funcionario' and id_oficina = $id_oficina");
						$res_usu = $query_usu->fetchAll(PDO::FETCH_ASSOC);
						$nome_funcionario = $res_usu[0]['nome'];

						$valor = number_format($valor, 2, ',', '.');
						$data = implode('/', array_reverse(explode('-', $data)));

						?>

						<tr>
							<td><?php echo $nome_produto ?></td>
							<td>R$ <?php echo $valor ?></td>
							<td><?php echo $nome_funcionario ?></td>
							<td><?php echo $data ?></td>
							

							
						</tr>
					<?php } ?>





				</tbody>
			</table>
		</div>
	</div>
</div>



<script type="text/javascript">
	$(document).ready(function () {
		$('#dataTable').dataTable({
			"ordering": false
		})

	});
</script>



