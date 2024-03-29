<?php
session_start();
// extrai as informações do arquivo json
$jsonPlans = file_get_contents("plans.json");
// faz o decode do json e converte em array
$arrayPlans = json_decode($jsonPlans, true);
// extrai as informações do arquivo json
$jsonBeneficiaries = file_get_contents("beneficiarios.json");
// faz o decode do json e converte em array
$arrayData = json_decode($jsonBeneficiaries, true);
// recebe os dados do post e cria dois arrays
if ($_POST) { 
    $dados1 = array(
        "Dados" =>
        array(
            "QtVidas" => $_POST['qt-vidas'],
            "Plano" => $_POST['select']
        ),
        "Beneficiarios" => array()
    );
  
for ($i=1; $i <= $_POST['qt-vidas']; $i++) {     
    $dados2 = array(                
            "Nome" => $_POST['nome'.$i],
            "Idade" => $_POST['idade'.$i]                
            );
            // adiciona o array dados2 ao array dados1
            array_push($dados1['Beneficiarios'], $dados2);        
}

//var_dump($dados1);
//var_dump($dados2);

// mescla os arrays em um só
$arrayData = array_merge($arrayData, array($dados1));
// grava na sessão msg a frase abaixo de sucesso
$_SESSION['msg'] = "Beneficiário(s) incluído(s) com sucesso!";
// redireciona para a página principal
header("location: ./");
// define o nome do arquivo json
$arquivo = 'beneficiarios.json';
// converte o array em json
$arrayData = json_encode($arrayData);
// especifica o caminho que o arquivo será gravado
$file = fopen(__DIR__ . '/' . $arquivo,'w');
// grava o arquivo
fwrite($file, $arrayData);
// fecha o arquivo
fclose($file);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>API de Entrada de Dados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6 mt-3">
            <a href="./">Relatório de Novo(s) Beneficiário(s)</a><hr>
            <h3>Incluir novo(s) Beneficiário(s):</h3>
            <form method="post">
            Quantidade de Beneficiário(s):<br><input class="form-control" name="qt-vidas" id="qt-vidas" onchange="qtVidas()" min="1" max="150" type="number" placeholder="Informe um número" required><br>
            <div class="palco" id="palco"></div>
            Selecione um Plano:<br>
            <select name="select"  class="form-control" name="reg_plano" id="reg_plano" required>
            <option value="">Selecione</option>
            <?php
                foreach ($arrayPlans as $key => $result) {
                    echo "<option value='".$result['registro']."'>".$result['nome']."</option>";
                }
            ?>  
            </select>
            <br>
            <input type="submit" value="Enviar Dados"><br><br>
            </form>
        </div>
    </div>
</div>
<script>
    // limpa o campo quantidade de Beneficiários
    document.getElementById('qt-vidas').value='';
    // função para criar elementos dinamicamente na tela
    function qtVidas(params) {
        var element = document.getElementById('qt-vidas');
        document.getElementById('palco').innerHTML = '<div class="benef" id="benef"><h4>Informe o(s) Dado(s) do(s) Beneficiário(s):</h4></div><hr>';
        var benef = document.querySelector('.benef');        
        for (let index = 1; index <= element.value; index++) {            
            benef.innerHTML += "<div class='row'><div class='col-sm-6'>Nome:<br><input class='form-control' type='text' id='nome"+index+"' name='nome"+index+"' required></div><div class='col-sm-6'>Idade:<br><input type='text' class='form-control' id='idade"+index+"' name='idade"+index+"' required></div></div>";           
        }    
    }
</script>
</body>
</html>