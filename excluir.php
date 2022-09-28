<?php
$conexao=  mysqli_connect('localhost', 'root', '', 'controle') or die ("Nao pude conectar");

$base=mysqli_select_db($conexao, "controle") or die ("não pude selecionar o banco");

$doc=$_POST['ex'];




if($doc != ""){
    $query = "DELETE FROM info WHERE id_doc = '$doc'";
    mysqli_query($conexao, $query);
    echo "<h3 align='left' style = 'color: green ;' class='container';>Dados excluidos com sucesso!</h3> ";
}
else
{
    echo "<h3 align='left' style = 'color: red ;' class='container';>Os dados não foram excluidos, conferir o ID</h3> ";
}


$sql = "SELECT * FROM info ";
$query = mysqli_query($conexao, $sql);
$qtd = mysqli_num_rows($query);
mysqli_query($conexao, $sql);

?>
<br>
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