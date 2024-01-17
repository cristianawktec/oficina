<?php 
@session_start();
if(@$_SESSION['nivel_usuario'] == null || @$_SESSION['nivel_usuario'] != 'recep'){
	echo "<script language='javascript'> window.location='../index.php' </script>";
}

$pag = "movimentacoes";
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
						<th>Tipo</th>
						<th>Descrição</th>
						<th>Valor</th>
						<th>Funcionário</th>
						<th>Data</th>
						
					</tr>
				</thead>

				<tbody>

					<?php 
					$saldo = 0;
					$entradas = 0;
					$saidas = 0;
					$query = $pdo->query("SELECT * FROM movimentacoes WHERE id_oficina = $id_oficina order by id desc ");
					$res = $query->fetchAll(PDO::FETCH_ASSOC);
					
					for ($i=0; $i < @count($res); $i++) { 
						foreach ($res[$i] as $key => $value) {
						}
						$descricao = $res[$i]['descricao'];
						$tipo = $res[$i]['tipo'];
						$funcionario = $res[$i]['funcionario'];
						$data = $res[$i]['data'];
						$valor = $res[$i]['valor'];
						
						
						$id = $res[$i]['id'];

						$query_usu = $pdo->query("SELECT * FROM usuarios where cpf = '$funcionario' and id_oficina = $id_oficina");						
						$res_usu = $query_usu->fetchAll(PDO::FETCH_ASSOC);
						$nome_func = $res_usu[0]['nome'];


						$query_saida = $pdo->query("SELECT SUM(valor)as valor FROM movimentacoes WHERE id_oficina = $id_oficina and tipo = 'Saída' order by id desc");
						$res_saida = $query_saida->fetchAll(PDO::FETCH_ASSOC);
						$saidas = $res_saida[0]['valor'];

						$query_entrada = $pdo->query("SELECT SUM(valor)as valor FROM movimentacoes WHERE id_oficina = $id_oficina and tipo = 'Entrada' order by id desc");
						$res_entrada = $query_entrada->fetchAll(PDO::FETCH_ASSOC);
						$entradas = $res_entrada[0]['valor'];

						$valor = number_format($valor, 2, ',', '.');
						$data = implode('/', array_reverse(explode('-', $data)));

						if($tipo == 'Entrada'){
							$cor_pago = 'text-success';
						}else{
							$cor_pago = 'text-danger';
							//$saidas = $saidas + $valor;
						}

						$saldo = $entradas - $saidas;
						if($saldo < 0){
							$corTotal = 'text-danger';
						}else{
							$corTotal = 'text-success';
						}

						$entradas = number_format($entradas, 2, ',', '.');
						$saidas = number_format($saidas, 2, ',', '.');
						$saldo = number_format($saldo, 2, ',', '.');

						?>

						<tr>
							<td><i class='fas fa-square mr-1 <?php echo $cor_pago ?>'></i>
								<?php echo $tipo ?>
							</td>
							<td><?php echo $descricao ?> </td>
							<td>R$ <?php echo $valor ?> </td>
							<td><?php echo $nome_func ?> </td>
							<td><?php echo $data ?> </td>

							
						</tr>
					<?php } ?>





				</tbody>
			</table>
		</div>

		<div class="row mt-4 ml-1">
			<span>Entradas Dia: <span class="text-success">R$ <?php echo $entradas ?></span></span>

			<span class="ml-4">Saídas Dia: <span class="text-danger">R$ <?php echo $saidas ?></span></span>


		</div>

		<div align="right">Saldo Dia:  <span class="<?php echo $corTotal ?>">R$ <?php echo $saldo ?></span></div>

	</div>
</div>




<script type="text/javascript">
	$(document).ready(function () {
		$('#dataTable').dataTable({
			"ordering": false
		})

	});
</script>




