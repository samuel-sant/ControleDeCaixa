
<?php

$conexao=  mysqli_connect('localhost', 'root', '', 'controle') or die ("Nao pude conectar");

$base=mysqli_select_db($conexao, "controle") or die ("não pude selecionar o banco");

?>

<html>
    

    <table align="center" border="1" bordercolor="#4169e1" >
    <tr >
        <th align="center" bgcolor="#778899" style="width: 80; height: 30;"><center><b><font color="#FFFFFF" size="-1">ID</font></b></center></th>
        <th align="center" bgcolor="#778899" style="width: 800; height: 30;"><center><b><font color="#FFFFFF" size="-1">Produto</font></b></center></th>
        <th align="center" bgcolor="#778899" style="width: 200; height: 30;"><center><b><font color="#FFFFFF" size="-1">Qantidade</font></b></center></th>
    </tr>
    </table>

</html>

<?php
 
 $query="SELECT * FROM estoque";
 $resultado = mysqli_query($conexao, $query);
 
 while($linha=mysqli_fetch_row($resultado)){

    $table = "<table align='center' border='1' bordercolor='#4169e1'>
    <tr bgcolor='#3d3d3d'>
        <th align='center' bgcolor='#778899' style='width: 80; height: 30;'> 
            <center>
            <h3>$linha[0]</h3>
            </center>
         </th>

         <th align='center' bgcolor='#778899' style='width: 800; height: 30;'> 
            <center>
            <h3>$linha[1]</h3>
            </center>
         </th>

         <th align='center' bgcolor='#778899' style='width: 200; height: 30;'> 
            <center>
            <h3>$linha[2]</h3>
            </center>
         </th>

         
    </tr>
            </table>";
   echo "$table";
 
    
 }
?>


