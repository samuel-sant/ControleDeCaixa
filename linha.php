<?php

 


$conexao=  mysqli_connect('localhost', 'root', '', 'controle') or die ("Nao pude conectar");

$base=mysqli_select_db($conexao, "controle") or die ("não pude selecionar o banco");

$doc=$_POST['doc'];
$end=$_POST['end'];
$ent=$_POST['ent'];
$sai=$_POST['sai'];

echo "$doc, $end, $ent, $sai";


?>