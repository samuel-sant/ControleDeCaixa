<?php
include_once("conexao.php");
?>

<!DOCTYPE html>
<html>

<head>
	<link href="./estilo.css" rel="stylesheet">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
	<script src="jquery.2.1.3.min.js"></script>
	<link rel="stylesheet" href="css/style.css">

	<title>Controle de Caixa</title>

</head>
<body>
	
	<div style="margin-right: 1500px;">

		<section id="content" style="padding:  unset;"  >
			<input  type="submit" value="Menu" onclick="window.location.href = 'menu.html'" >
		</section>
	</div>
<body >
	
	<div  style="padding: 20px; width: 1250px; margin: 80px 0 35px 150px; " class="content" id="content"  >
		
		
		<div style="width: 350px; display: inline-table;"  >
			
			<h1>Lançar a venda</h1>
			<input type="text" id="doc" placeholder="Doc Nº" style="margin: 10px; border-color: black; border-radius: 15px; height: 30px; width: 300px; text-align: center;text-transform: uppercase;">
			<input type="text" id="end" placeholder="Endereço" style="margin: 10px; border-color: black; border-radius: 15px; height: 30px;width: 300px; text-align: center;text-transform: uppercase;">
			<input type="number" id="ent" placeholder="Entrada" style="margin: 10px; border-color: black; border-radius: 15px; height: 30px; width: 300px; text-align: center;text-transform: uppercase;">
			<input type="number" id="sai" placeholder="Saida" style="margin: 10px; border-color: black; border-radius: 15px; height: 30px; width: 300px; text-align: center;text-transform: uppercase;">
			<div  >
	
				<h1 style="margin: 10px;">Produto  |  Quantidade</h1>
				<select id="prodE" style="padding: 2px;margin: 10px; border-color: black; border-radius: 15px; height: 30px; width: 200px; text-align: center;text-transform: uppercase;" >
				<option value="" id="nulo">-Escolha um produto-</option>
					<?php
					$listaestoque = "SELECT * FROM estoque";
					$result_lista = mysqli_query($conexao, $listaestoque);
					while($row_resultList = mysqli_fetch_assoc($result_lista)){
					 ?> 
					 <option  value="<?php echo $row_resultList['idProd'];?>">  <?php echo $row_resultList['produto'];?> </option><?php
				 }
					 ?>
					
				</select>
				<input type="number" id="quantE" style="margin: 1px; border-color: black; border-radius: 15px; height: 30px; width: 100px; text-align: center;text-transform: uppercase;">
			</div>
				 <input class="btn btn-default" id="inserir" type="submit" style="margin: 5px; border-color: black; border-radius: 15px; height: 30px; width: 300px; text-align: center;text-transform: uppercase; margin-left: 25px; "> 
				</div>
				
				<div style="width: 350px; display: inline-table; ">
					<h1>Editar venda </h1>
					<input type="text" id="edit" placeholder="Doc Nº" style="margin: 10px; border-color: black; border-radius: 15px; height: 30px; width: 300px; text-align: center;text-transform: uppercase;">
					<input type="text" id="endE" placeholder="Endereço" style="margin: 10px; border-color: black; border-radius: 15px; height: 30px; width: 300px; text-align: center;text-transform: uppercase;">
					<input type="number" id="entE" placeholder="Entrada" style="margin: 10px; border-color: black; border-radius: 15px; height: 30px; width: 300px; text-align: center;text-transform: uppercase;">
					<input type="number" id="saiE" placeholder="Saida" style="margin: 10px; border-color: black; border-radius: 15px; height: 30px; width: 300px; text-align: center;text-transform: uppercase;">
					
					<input class="btn btn-default" id="editar" type="submit" value="Editar" style="margin: 5px; border-color: black; border-radius: 15px; height: 30px; width: 300px; text-align: center;text-transform: uppercase; margin-left: 25px;" >
				</div>
				
				<div style="width: 350px; display: inline-table;">
					<h1>Excluir venda </h1>
					<div style="padding: 34px;" >

						Excluir: <input type="text" id="ex" placeholder="Digite o ID para excluir" style="margin: 10px; border-color: black; border-radius: 15px; height: 30px; width: 300px; text-align: center;text-transform: uppercase;">
					</div>
					<input class="btn btn-default" id="excluir" type="submit" value="Excluir" style="margin: 5px; border-color: black; border-radius: 15px; height: 30px; width: 300px; text-align: center;text-transform: uppercase; margin-left: 45px; margin-top: 70px;">
				</div>
			
		</div>
	
	<script>


function excluir(ex) {
			$.ajax
				({
					type: 'POST',
					dataType: 'html',
					url: 'excluir.php',
					beforeSend: function () {
						$("#dados").html("Carregando...");
					},

					data: {
						ex: ex


					},

					success: function (msg) {

						$("#dados").html(msg);
					}
				})

		}


		$('#excluir').click(function () {
			excluir(
				$("#ex").val(),
			
			)
		});
		
function editar(edit, endE, entE, saiE) {
			$.ajax
				({
					type: 'POST',
					dataType: 'html',
					url: 'editar.php',
					beforeSend: function () {
						$("#dados").html("Carregando...");
					},

					data: {
						edit: edit,
						endE: endE,
						entE: entE,
						saiE: saiE


					},

					success: function (msg) {

						$("#dados").html(msg);
					}
				})

		}


		$('#editar').click(function () {
			editar(
				$("#edit").val(),
				$("#endE").val(),
				$("#entE").val(),
				$("#saiE").val()
			)
		});
		

		function inserir(doc, end, ent, sai, prodE,quantE	) {
			$.ajax
				({
					type: 'POST',
					dataType: 'html',
					url: 'inserir.php',
					beforeSend: function () {
						$("#dados").html("Carregando...");
					},

					data: {
						doc: doc,
						end: end,
						ent: ent,
						sai: sai,
						prodE: prodE,
						quantE : quantE


					},

					success: function (msg) {

						$("#dados").html(msg);
					}
				})

		}


		$('#inserir').click(function () {
			inserir(
				$("#doc").val(),
				$("#end").val(),
				$("#ent").val(),
				$("#sai").val(),
				$("#prodE").val(),
				$("#quantE").val()
			)
		});

	</script>


	
	<div id="dados" align="center" class="container" >
		<th>
			<h3 align="left" style="border: 0px;">

				
				<iframe style="border: 0px;" src="lista.php"  width="1500" height="400"></iframe>
			</h3>
		</th>
	</div>
	
	</div>




</body>
</body>
</html>