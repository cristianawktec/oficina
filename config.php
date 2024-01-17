<?php 

$nome_oficina = "Oficina WK";
$url = "http://localhost/oficina/";
$endereco_oficina = "Rua Açucena, 408, Palhoça";
$telefone_oficina = "(48)99603-5171";
$email_adm = 'cristianms.awk@gmail.com';


//VARIAVEIS DO BANCO DE DADOS LOCAL
$servidor = 'br540.hostgator.com.br';
$usuario = 'cons0645_oficina';
$senha = 'wk2021';
$banco = 'cons0645_oficina';


//ALGUMAS VARIAVEIS GLOBAIS

//A PARTIR DE X PRODUTOS O NIVEL DO ESTOQUE ESTARÁ BAIXO
$nivel_estoque = 5;
$desconto_orc = 'Sim';
$valor_desconto = 5; //VALOR EM PORCENTAGEM, POR EXEMPLO 5 VAI SER 5 % SOBRE O VALOR FINAL
$validade_orcamento_dias = 5; //5 DIAS PARA VALIDADE DO ORÇAMENTO
$excluir_orcamento_dias = 15; //APÓS 15 DIAS O ORÇAMENTO QUE NÃO FOR APROVADO PELO CLIENTE SERÁ EXCLUÍDO

$comissao_mecanico = 'Sim';  // Se não for ter comissão no sisteema mude para não
$valor_comissao = 0.30; // COLOCAR O VALOR DA COMSISÃO COM A PORCENTAGEM MANTENDO O 0 NA FRENTEM, 0.30 COORESPONDE A 30% 
 ?>