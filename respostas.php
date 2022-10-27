<?php
if (!isset($_SESSION))
    session_start();

print_r($_SESSION['perguntas']);
print_r($_SESSION['respostas']);


if (!isset($_SESSION['perguntas']))
    die('Você não criou o array de perguntas. <a href="index.php">Clique aqui para acrescentar ou eliminar perguntas</a>');

if (!isset($_SESSION['respostas']))
    die('Você não criou o array de respostas. <a href="index.php">Clique aqui para acrescentar ou eliminar respostas</a>');
?>


<html>

<head>
    <meta charset="UTF-8">

    <style>
        h3,
        h4{
            text-align: center;
        }

        img {
            display: block;
            margin: auto;
            height: 150px;
            width: 150px;
        }

        .new {
            display: flex;
        }

        .input {
            margin: 6px;
            padding: 10px;
            display: flex;
            margin: auto;
            color: palevioletred;
            font-size: 40px;
        }

        input {
            width: 90%;
            display: flex;
            margin-left: 20px;
            background: none;
            background-color: lightyellow;
        }

        select {
            width: 90%;
            display: block;
            margin-left: 18px;
            background: none;
            background-color: lightyellow;
        }

        #heading {
            font-family: cursive;
            text-align: center;
            color: green;
            /* padding-top: 18px; */

        }

        #form_page {
            height: 280px;
            width: 50%;
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            margin: auto;

        }

        #form_body {
            border-radius: 20px;
            height: 300px;
            width: 550px;
            background-color: beige;
            border: 1px solid pink;
            margin: auto;
            margin-top: 8px;
        }

        #text {
            color: red;
            width: 100px;
        }

        #head {
            border-bottom: 4px solid red;
            height: 50px;
            background-color: aliceblue;
        }

        #submit {
            background-color: white;
            width: 200px;
            height: 20px;
        }
    </style>

</head>

<body>

    <form method="post" action="#">

        <div id="form_page">

            <div id="form_body">
                <div id="head">
                    <h1 id="heading">Reclamações SAC</h1>
                </div>
                <h4>Consumidor</h4>
                <div id="input_reclamacao" class="input">
                    <input type="text" placeholder="Perguntas dos consumidores" name="caixa1">
                </div>
                <div class="new">
                    <div class="input">
                        <input id="submit" type="submit" name="submitPerguntas" value="Enviar reclamação" onclick="on_submit()">
                    </div>
                    <div class="input">
                        <input id="submit" type="submit" name="eliminarPerguntas" value="Excluir reclamação" onclick="on_submit()">
                    </div>
                </div>
                <div class="new">
                    <div class="input">
                        <input id="submit" type="submit" name="gerarJson" value="Criar Json Perguntas" onclick="on_submit()">
                    </div>
                    <div class="input">
                        <input id="submit" type="submit" name="resgatarJsonPerguntas" value="Resgatar Json Perguntas" onclick="on_submit()">
                    </div>
                </div>
                <div class="link">
                    <a href="logout.php">Logout</a>
                </div>               
            </div>
        </div>
    </form>

    <form method="post" action="#">

        <div id="form_page">

            <div id="form_body">
                <div id="head">
                    <h1 id="heading">Respostas às reclamações SAC</h1>
                </div>
                <h4>Atendente</h4>
                <div id="input_name" class="input">
                    <input id="name" type="text" Placeholder="Respostas às reclamações" name="caixa2">
                </div>
                <div class="new">
                    <div class="input">
                        <input id="submit" type="submit" name="enviarRespostas" value="Enviar resposta" onclick="on_submit()">
                    </div>
                    <div class="input">
                        <input id="submit" type="submit" name="eliminarRespostas" value="Excluir resposta" onclick="on_submit()">
                    </div>
                </div>
                <div class="new">
                    <div class="input">
                        <input id="submit" type="submit" name="gerarJsonRespostas" value="Json Respostas" onclick="on_submit()">
                    </div>
                    <div class="input">
                        <input id="submit" type="submit" name="resgatarJsonRespostas" value="Json Respostas" onclick="on_submit()">
                    </div>
                </div>
                <div class="link">
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
<?php
echo "<h2 style='text-align: center'>Array de Perguntas</h2>";

if (isset($_POST['submitPerguntas'])) {
    $per = $_POST['caixa1'];
    array_push($_SESSION['perguntas'], $per);
    print_r($_SESSION['perguntas']);
}
if (isset($_POST['gerarJson'])) {
    $vetordemuitos = array($_SESSION['perguntas']);
    $j = json_encode($vetordemuitos);
    $file = fopen("perguntas.json", "w");
    fwrite($file, $j);
    echo "<br>Arquivo perguntas criado com sucesso...<br>";
}

if (isset($_POST['resgatarJsonPerguntas'])) {
    $arquivo = file_get_contents("perguntas.json");

    $convertido = json_decode($arquivo);
    print_r($convertido);
    echo "<br>Arquivo respostas criado com sucesso...<br>";
}

if (isset($_POST['eliminarPerguntas'])) {
    $eliminar = array_pop($_SESSION['perguntas']);
    print_r($_SESSION['perguntas']);
}

echo "<h2 style='text-align: center'>Array de Respostas</h2>";

if (isset($_POST['enviarRespostas'])) {
    $per = $_POST['caixa2'];
    array_push($_SESSION['respostas'], $per);
    print_r($_SESSION['respostas']);
}
if (isset($_POST['gerarJsonRespostas'])) {
    $vetordemuitos = array($_SESSION['respostas']);
    $j = json_encode($vetordemuitos);
    $file = fopen("respostas.json", "w");
    fwrite($file, $j);
    echo "<br>Arquivo respostas criado com sucesso...<br>";
}
if (isset($_POST['resgatarJsonRespostas'])) {
    $arquivo = file_get_contents("respostas.json");

    $convertido = json_decode($arquivo);
    print_r($convertido);
    echo "<br>Arquivo respostas criado com sucesso...<br>";
}

if (isset($_POST['eliminarRespostas'])) {
    $eliminar = array_pop($_SESSION['respostas']);
    print_r($_SESSION['respostas']);
}
?>