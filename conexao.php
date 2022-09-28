<?php

$conexao=  mysqli_connect('localhost', 'root', '', 'controle') or die ("Nao pude conectar");

$base=mysqli_select_db($conexao, "controle") or die ("não pude selecionar o banco");

?>