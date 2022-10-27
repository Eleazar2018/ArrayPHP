<?php
    if(!isset($_SESSION))
        session_start();

    $arrayPerguntas = [];
    $arrayRespostas = []; 

    $_SESSION['perguntas'] = $arrayPerguntas; 
    $_SESSION['respostas'] = $arrayRespostas;

    echo "Perguntas e respostas estão armazenadas na sessão";   
           
?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Projeto</title>
	<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="CSS/estilo.css">
</head>

<body>
    <div id="corpo-form">
        <h1>Entrar</h1>
        <form method="POST" action="respostas.php">         
            
        <input type="submit" value="ACESSAR">
        </form>
    </div>

    

</body>

</html>