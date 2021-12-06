<?php
/*define('HOST', '127.0.0.1');
define('USUARIO','root');
define('SENHA','');
define('DB','projeto_lanchespf');*/

define('HOST', 'www.progtisolucoes.com.br');
define('USUARIO','thiagolu_lanch3s');
define('SENHA','pflanches#1303');
define('DB','thiagolu_projeto_lanches');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possivel conectar');