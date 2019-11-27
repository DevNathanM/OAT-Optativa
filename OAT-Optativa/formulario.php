<?php

require_once("conexao/conexaobd.php");
?>


<!DOCTYPE html>
<html>
<head>
	<title>Projeto WebService 2019</title>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="css/estilo.css">

	<link rel="stylesheet" type="text/css" href="css/estilo-grid.css">

	<link rel="stylesheet" type="text/css" href="css/estilo-grid-600.css" media="screen and (max-width:600px)">
</head>
<body>

	<div id="container">

		<div id="header">
			<h1>Universidade Mérieux NutriSciences</h1>
		</div>

		<div id="menu">
			<ul>
				<li><a href="index.html"><button>Home</button></a></li>
				<li><a href="formulario.html"><button>cadastro</button></a></li>
				<li><a href="listagem.html"><button>listagem</button></a></li>
			</ul>
		</div>		

		<div class ="main">

				<div></div>


						<?php

							$actionEditar = "";
							$id = 0;
							$nome = NULL;
							$email = NULL;
						
							if (isset($_GET["editar"])) {
								$id = $_GET["editar"];
								$sql = "SELECT * FROM alunos WHERE id = $id";
								$query = mysqli_query($link, $sql);
								if($row = mysqli_fetch_assoc($query)){
									$nome = $row["nome"];
									$email = $row["email"];									
								}
								else{
									echo "Falha ao carregar registro!";
								}

								$actionEditar = "&editar=$id";
							}

						?>
				<div class="formulario" action="?pg=processar<?= $actionEditar ?>" method="POST">>
					<h1>Formulário</h1>	
					<ul>
						<li>Nome:<input type="text" name="Nome" value="<?= $nome ?>"></li>	
						<li>Email:<input type="text" name="Email" value="<?= $email ?>"></li>	
						<li><button type="submit">Enviar</button></li>
					</ul>	

				</div>

				<div></div>		

			</div>	
			
		</div>

				
	</div>

</body>
</html>