<?php
include_once("conexao.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elemento select separado do formulário</title>
</head>
<body>

    <select >
       <?php
       $listaestoque = "SELECT * FROM estoque";
       $result_lista = mysqli_query($conexao, $listaestoque);
       while($row_resultList = mysqli_fetch_assoc($result_lista)){
        ?> <option value="<?php echo $row_resultList['idProd'];?>"> <?php echo $row_resultList['produto'];?></option><?php
    }
        ?>
       
    </select>
    
 