<?php
session_start();
// extrai as informações do arquivo json
$jsonBeneficiaries = file_get_contents("beneficiarios.json");
$jsonPlans = file_get_contents("plans.json");
$jsonPrices = file_get_contents("prices.json");
// faz o decode do json e converte em array
$arrayBeneficiaries = json_decode($jsonBeneficiaries, true);
$arrayPlans = json_decode($jsonPlans, true);
$arrayPrices = json_decode($jsonPrices, true);

// echo "Array de Beneficiários<br>";
// var_dump($arrayBeneficiaries);
// echo "<hr>";
// var_dump($arrayPlans);
// var_dump($arrayPrices);

foreach ($arrayPrices as $key => $value) {
    $arraySingle[] = array_merge($arrayPlans[$value['codigo'] -1], $arrayPrices[$key]);
}    

// echo "Array de Planos<br>";
// var_dump($arraySingle);

// REGRAS DOS PLANOS
// echo "<hr>Menor que quatro - Reg1<br>";
for ($i=0; $i < count($arraySingle); $i++) { 
    if ($arraySingle[$i]['registro'] == 'reg1' && $arraySingle[$i]['minimo_vidas'] < 4) {       
        $reg1PlanoMenorQuatro = $arraySingle[$i];        
    }
}
// var_dump($reg1PlanoMenorQuatro);
// echo "<hr>Maior que três - Reg1<br>";
for ($i=0; $i < count($arraySingle); $i++) { 
    if ($arraySingle[$i]['registro'] == 'reg1' && $arraySingle[$i]['minimo_vidas'] > 3) {       
        $reg1PlanoMaiorTres = $arraySingle[$i];        
    }
}
// var_dump($reg1PlanoMaiorTres);
// echo "<hr>Maior que Um - Reg2<br>";
for ($i=0; $i < count($arraySingle); $i++) { 
    if ($arraySingle[$i]['registro'] == 'reg2' && $arraySingle[$i]['minimo_vidas'] > 0) {       
        $reg2PlanoMaiorUm = $arraySingle[$i];        
    }
}
// var_dump($reg2PlanoMaiorUm);
// echo "<hr>Maior que Um - Reg3<br>";
for ($i=0; $i < count($arraySingle); $i++) { 
    if ($arraySingle[$i]['registro'] == 'reg3' && $arraySingle[$i]['minimo_vidas'] > 0) {       
        $reg3PlanoMaiorUm = $arraySingle[$i];        
    }
}
// var_dump($reg3PlanoMaiorUm);
// echo "<hr>Maior que Um - Reg4<br>";
for ($i=0; $i < count($arraySingle); $i++) { 
    if ($arraySingle[$i]['registro'] == 'reg4' && $arraySingle[$i]['minimo_vidas'] > 0) {       
        $reg4PlanoMaiorUm = $arraySingle[$i];        
    }
}
// var_dump($reg4PlanoMaiorUm);
// echo "<hr>Maior que Um - Reg5<br>";
for ($i=0; $i < count($arraySingle); $i++) { 
    if ($arraySingle[$i]['registro'] == 'reg5' && $arraySingle[$i]['minimo_vidas'] > 0) {       
        $reg5PlanoMaiorUm = $arraySingle[$i];        
    }
}
// var_dump($reg5PlanoMaiorUm);
// echo "<hr>Igual a Um - Reg6<br>";
for ($i=0; $i < count($arraySingle); $i++) { 
    if ($arraySingle[$i]['registro'] == 'reg6' && $arraySingle[$i]['minimo_vidas'] == 1) {       
        $reg6PlanoIgualUm = $arraySingle[$i];        
    }
}
// var_dump($reg6PlanoIgualUm);
// echo "<hr>Maior que Dois - Reg6<br>";
for ($i=0; $i < count($arraySingle); $i++) { 
    if ($arraySingle[$i]['registro'] == 'reg6' && $arraySingle[$i]['minimo_vidas'] > 1) {       
        $reg6PlanoMaiorDois = $arraySingle[$i];        
    }
}
// var_dump($reg6PlanoMaiorDois);
// echo "<hr>";

// var_dump($reg1PlanoMenorQuatro); 
// var_dump($arrayBeneficiaries[0]); 
//var_dump($arrayBeneficiaries[1]['Dados']); 
// echo $arrayBeneficiaries[0]['Dados']['Plano'];
// echo $arrayBeneficiaries[0]['Dados']['QtVidas'];
// echo count($arrayBeneficiaries);
for ($i=0; $i < count($arrayBeneficiaries); $i++) {     
     
    if ($arrayBeneficiaries[$i]['Dados']['Plano'] == 'reg1' && $arrayBeneficiaries[$i]['Dados']['QtVidas'] < 4) {
        array_push($arrayBeneficiaries[$i]['Dados'], $reg1PlanoMenorQuatro);        
    }
    if ($arrayBeneficiaries[$i]['Dados']['Plano'] == 'reg1' && $arrayBeneficiaries[$i]['Dados']['QtVidas'] > 3) {
        array_push($arrayBeneficiaries[$i]['Dados'], $reg1PlanoMaiorTres);
        
    }
    if ($arrayBeneficiaries[$i]['Dados']['Plano'] == 'reg2' && $arrayBeneficiaries[$i]['Dados']['QtVidas'] > 0) {
        array_push($arrayBeneficiaries[$i]['Dados'], $reg2PlanoMaiorUm);
        
    }
    if ($arrayBeneficiaries[$i]['Dados']['Plano'] == 'reg3' && $arrayBeneficiaries[$i]['Dados']['QtVidas'] > 0) {
        array_push($arrayBeneficiaries[$i]['Dados'], $reg3PlanoMaiorUm);
        
    }
    if ($arrayBeneficiaries[$i]['Dados']['Plano'] == 'reg4' && $arrayBeneficiaries[$i]['Dados']['QtVidas'] > 0) {
        array_push($arrayBeneficiaries[$i]['Dados'], $reg4PlanoMaiorUm);
        
    }
    if ($arrayBeneficiaries[$i]['Dados']['Plano'] == 'reg5' && $arrayBeneficiaries[$i]['Dados']['QtVidas'] > 0) {
        array_push($arrayBeneficiaries[$i]['Dados'], $reg5PlanoMaiorUm);
        
    }
    if ($arrayBeneficiaries[$i]['Dados']['Plano'] == 'reg6' && $arrayBeneficiaries[$i]['Dados']['QtVidas'] == 1) {
        array_push($arrayBeneficiaries[$i]['Dados'], $reg6PlanoIgualUm);
        
    }
    if ($arrayBeneficiaries[$i]['Dados']['Plano'] == 'reg6' && $arrayBeneficiaries[$i]['Dados']['QtVidas'] > 1) {
        array_push($arrayBeneficiaries[$i]['Dados'], $reg6PlanoMaiorDois);
        
    }

}

// echo "Array dos Planos Fechados<br>";
// if (isset($arrayBeneficiaries)) {
//     var_dump($arrayBeneficiaries);
//     echo "<hr>";
// } else {
//     echo "* Nenhum plano até o momento foi fechado.<hr>";
// }

for ($i=0; $i < count($arrayBeneficiaries); $i++) { 

    // echo $arrayBeneficiaries[$i]['Dados']['Plano']."<br>";
    // echo "Faixa 1: ".$arrayBeneficiaries[$i]['Dados'][0]['faixa1']."<br>";
    // echo "Faixa 2: ".$arrayBeneficiaries[$i]['Dados'][0]['faixa2']."<br>";
    // echo "Faixa 3: ".$arrayBeneficiaries[$i]['Dados'][0]['faixa3']."<br><br>";
    // echo "Contagem de Beneficiários: ".count($arrayBeneficiaries[$i]['Beneficiarios'])."<br><br>";
    $soma = 0;
    
    for ($e=0; $e < count($arrayBeneficiaries[$i]['Beneficiarios']); $e++) { 
        // echo "Idade: ".$arrayBeneficiaries[$i]['Beneficiarios'][$e]['Idade']."<br>";

        if ($arrayBeneficiaries[$i]['Beneficiarios'][$e]['Idade'] < 18) {
            // echo "Pessoas de 0 a 17 anos vão para a faixa1."."<br>";
            // echo "Faixa 1: ".$arrayBeneficiaries[$i]['Dados'][0]['faixa1']."<br>";
            $precofaixa1 = array(                
                "Valor" => $arrayBeneficiaries[$i]['Dados'][0]['faixa1']          
                );
            array_push($arrayBeneficiaries[$i]['Beneficiarios'][$e], $precofaixa1);


        } elseif ($arrayBeneficiaries[$i]['Beneficiarios'][$e]['Idade'] > 17 && $arrayBeneficiaries[$i]['Beneficiarios'][$e]['Idade'] < 41) {
            // echo "Pessoas de 18 a 40 anos vão para a faixa2."."<br>";
            // echo "Faixa 2: ".$arrayBeneficiaries[$i]['Dados'][0]['faixa2']."<br>";
            $precofaixa2 = array(                
                "Valor" => $arrayBeneficiaries[$i]['Dados'][0]['faixa2']          
                );
                array_push($arrayBeneficiaries[$i]['Beneficiarios'][$e], $precofaixa2);
        } else {
            // echo "Pessoas com mais de 40 anos vão para a faixa3."."<br>";
            // echo "Faixa 3: ".$arrayBeneficiaries[$i]['Dados'][0]['faixa3']."<br>";
            $precofaixa3 = array(                
                "Valor" => $arrayBeneficiaries[$i]['Dados'][0]['faixa3']          
                );
                array_push($arrayBeneficiaries[$i]['Beneficiarios'][$e], $precofaixa3);
        }

        //echo $arrayBeneficiaries[$i]['Beneficiarios'][$e][0]['Valor']."<br>";
        
        $soma += $arrayBeneficiaries[$i]['Beneficiarios'][$e][0]['Valor'];
        
        $total = array(                
            "Total" => $soma         
            );
    }    
    
    array_push($arrayBeneficiaries[$i]['Dados'], $total);

	// - Pessoas de 0 a 17 anos vão para a faixa1.
	// - Pessoas de 18 a 40 anos vão para a faixa2.
	// - Pessoas com mais de 40 anos vão para a faixa3.            

    //var_dump($arrayBeneficiaries[$i]);
    //var_dump($arrayBeneficiaries[$i]['Beneficiarios']);

}

// echo "PROPOSTA<br>";
// var_dump($arrayBeneficiaries);
// echo "<hr>";

// Nome do arquivo json
$arquivo = 'proposta.json';
// Conversão do json
$arrayData = json_encode($arrayBeneficiaries);
// Caminho que o arquivo json será gravado
$file = fopen(__DIR__ . '/' . $arquivo,'w');
// Gravando os dados no arquivo json
fwrite($file, $arrayData);
// Fechando o arquivo json
fclose($file);
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
        <div class="col-sm-12 mt-3">
           <a href="incluir.php">Incluir Novo(s) Beneficiário(s)</a><hr>
           <?php if (isset($_SESSION["msg"])) { ?>
                <div class="alert alert-success">
                    <strong>Mensagem: </strong><?php echo $_SESSION["msg"]; ?>
                </div>                 
            <?php unset($_SESSION['msg']); } ?>
           <h3>Relatório de novo(s) Beneficiário(s):</h3><hr>
            <?php
            //var_dump($arrayBeneficiaries);
            if (!empty($arrayBeneficiaries)) {   
                for ($i=0; $i < count($arrayBeneficiaries); $i++) { 
                    //var_dump($arrayBeneficiaries[$i]);                    
                    for ($e=0; $e < count($arrayBeneficiaries[$i]['Beneficiarios']); $e++) { 
                        //echo $arrayBeneficiaries[$i]['Beneficiarios'][0]['QtVidas']."<br>";
                        echo "<small>Nome do Plano Escolhido:</small> ".$arrayBeneficiaries[$i]['Dados'][0]['nome']."<br>";
                        echo "<small>Idade do Beneficiário:</small> ".$arrayBeneficiaries[$i]['Beneficiarios'][$e]['Idade']." Anos<br>";
                        echo "<small>Valor do Plano:</small> R$ ".number_format($arrayBeneficiaries[$i]['Beneficiarios'][$e][0]['Valor'], 2, ',', ' ')."<br><br>";
                        
                    }
                    echo "<small>Total:</small> R$ ".number_format($arrayBeneficiaries[$i]['Dados'][1]['Total'], 2, ',', ' ')."<hr>";
                }
            } else { ?>
                <div class="alert alert-success">
                    <strong>Mensagem do Sistema: </strong><?php echo "Não existem dados cadastrados até o momento."; ?>
                </div> 
            <?php }
            ?>
        </div>
    </div>
</div>
</body>
</html>