<?php

$conexao=  mysqli_connect('localhost', 'root', '', 'controle') or die ("Nao pude conectar");

$base=mysqli_select_db($conexao, "controle") or die ("não pude selecionar o banco");

$prod=$_POST['prodE'];
$quantE=$_POST['quantE'];
$doc=$_POST['doc'];
$end=$_POST['end'];
$ent=$_POST['ent'];
$sai=$_POST['sai'];

$list_result = "INSERT INTO info(id_doc, endereco, entrada, saida) VALUE('0 ','0','0','0')";

$query = "INSERT INTO info(id_doc, endereco, entrada, saida) VALUE('0 ','0','0','0')";
if(($doc != "")&&($end != ""))
{  
    $q = true;
    $query="INSERT INTO info(id_doc, endereco, entrada, saida) VALUE('$doc ','$end','$ent','$sai')";

    
    
}else{
    $q = false;
}
if($q == true){

    $list_result="UPDATE estoque SET quantidade = quantidade - $quantE WHERE idProd='$prod'";
}


if((mysqli_query($conexao,$query))&(mysqli_query($conexao,$list_result)))
{
    $sucesso = "<h3 align='left' style = 'color: green ;' class='container'; >Dados inseridos com sucesso!!</h3>";
    echo "$sucesso";
}
else
{
    $erro = "<h3 align='left' style = 'color: red';' class='container'; >Não foi possivel inserir os dados, tente apenas dados validos</h3>";
    echo "$erro";
}

$list = "SELECT * FROM estoque WHERE idProd='$prod' " ;
$list_result = mysqli_query($conexao, $list);


$sql = "SELECT * FROM info ";
$query = mysqli_query($conexao, $sql);
$qtd = mysqli_num_rows($query);
mysqli_query($conexao, $sql);

?>

<section class="panel col-lg-9">

    
    <?php
    if($qtd>0){
    ?>
    <table class="table table-striped table-advance table-hover" align="center" >
        <tbody >
            <tr>
                <th align="center" bgcolor="#778899" style="width: 80; height: 30;"><i class="icon_profile"></i> Id</th>
                <th align="center" bgcolor="#778899" style="width: 800; height: 30;"><i class="icon_profile"></i> Produto</th>
                <th align="center" bgcolor="#778899" style="width: 200; height: 30;"><i class="icon_mail_alt"></i> quantidade</th>
            </tr>
            <?php 
            while(($linha = mysqli_fetch_assoc($query)&($linhaE = mysqli_fetch_assoc($list_result)))){
            ?>
            <tr style="padding: 0px; font-style: initial; font-size: large;">
                <td  bgcolor="#778899" style="width: 80; height: 30;"><?=$linhaE["idProd"];?></td>
                <td  bgcolor="#778899" style="width: 800; height: 30;"><?=$linhaE["produto"];?></td>
                <td  bgcolor="#778899" style="width: 200; height: 30;"><?=$linhaE["quantidade"];?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
    <?php }?>
</section>






<section class="panel col-lg-9">

    <header class="panel-heading" align="center" style="background-color: black; font-style: oblique;"  >
      <h3 style="color: white; margin: 0%;" >Dados do Caixa</h3>
    </header>
    <?php
    if($qtd>0){
    ?>
    <table class="table table-striped table-advance table-hover" align="center" >
        <tbody >
            <tr>
                <th align="center" bgcolor="#778899" style="width: 80; height: 30;"><i class="icon_profile"></i> Id</th>
                <th align="center" bgcolor="#778899" style="width: 800; height: 30;"><i class="icon_profile"></i> Endereço</th>
                <th align="center" bgcolor="#778899" style="width: 200; height: 30;"><i class="icon_mail_alt"></i> Entrada</th>
                <th align="center" bgcolor="#778899" style="width: 200; height: 30;"><i class="icon_mail_alt"></i> Saida</th>
            </tr>
            <?php 
            while($linha = mysqli_fetch_assoc($query)){
            ?>
            <tr>
                <td  bgcolor="#778899" style="width: 80; height: 30;"><?=$linha["id_doc"];?></td>
                <td  bgcolor="#778899" style="width: 800; height: 30;"><?=$linha["endereco"];?></td>
                <td  bgcolor="#778899" style="width: 200; height: 30;"><?=$linha["entrada"];?></td>
                <td  bgcolor="#778899" style="width: 200; height: 30;"><?=$linha["saida"];?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
    <?php }?>
</section>