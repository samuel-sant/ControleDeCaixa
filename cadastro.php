<?php

$conexao=  mysqli_connect('localhost', 'root', '', 'controle') or die ("Nao pude conectar");

$base=mysqli_select_db($conexao, "controle") or die ("não pude selecionar o banco");

$idProd=$_POST['idProd'];
$prod=$_POST['prod'];
$quant=$_POST['quant'];

$query = "INSERT INTO estoque(idProd, produto, quantidade, ) VALUE('0 ','0','0')";
if($prod != "")
{  
     
    $query="INSERT INTO estoque(idProd, produto, quantidade) VALUE('$idProd','$prod','$quant')";
}


if(mysqli_query($conexao,$query))
{
    $sucesso = "<h3 align='left' style = 'color: green ;' class='container'; >Dados inseridos com sucesso!!</h3>";
    echo "$sucesso";
}
else
{
    $erro = "<h3 align='left' style = 'color: red';' class='container'; >Não foi possivel inserir os dados, tente apenas dados validos</h3>";
    echo "$erro";
}



?>
