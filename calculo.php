<?php

$mensagem = "";

if($_POST)
{

    $distancia = $_POST['distancia'];
    $autonomia = $_POST['autonomia'];

    if(is_numeric($distancia) && is_numeric($autonomia)) {
        
        if($distancia > 0 && $autonomia > 0) {

            $valor_gasolina = 4.80;
            $valor_alcool = 3.80;
            $valor_diesel = 3.90;
            
            $calculoGasolina = ($distancia/$autonomia) * $valor_gasolina;
            $calculoGasolina = number_format($calculoGasolina, 2, ",", ".");

            $calculoAlcool = ($distancia/$autonomia) * $valor_alcool;
            $calculoAlcool = number_format($calculoAlcool, 2, ",", ".");

            $calculoDiesel = ($distancia/$autonomia) * $valor_diesel;
            $calculoDiesel = number_format($calculoDiesel, 2, ",", ".");

            $mensagem.= "<div class='sucesso'>";
            $mensagem.= "O valor total gasto será de:";
            $mensagem.= "<ul>";
            $mensagem.= "<li><b>Gasolina: R$ </b>".$calculoGasolina. "</li>";
            $mensagem.= "<li><b>Álcool: R$ </b>".$calculoAlcool. "</li>";
            $mensagem.= "<li><b>Díesel: R$ </b>".$calculoDiesel. "</li>";
            $mensagem.="</ul>";
            $mensagem.="</div>";
        
        }else {
            $mensagem.="<div class='erro'>";
            $mensagem.= "<p>O valor da distância e da autonomia devem ser maior que zero!</p>";
            $mensagem.="</div>";
        }

   
    } else {
        $mensagem.="<div class='erro'>";
        $mensagem.= "<p>O valor recebido não é numérico</p>";
        $mensagem.="</div>";
    }

}
else {
    $mensagem.="<div class='erro'>";
    $mensagem.= "<p>Nenhum dado foi recebido pelo formulário</p>";
    $mensagem.="</div>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cálculo de consumo de combustível</title>
</head>
<body>
    <main>
        <div class="painel">
            <h2>Resultado do cálculo de consumo</h2>
            <div class="conteudo-painel">
                <?php
                echo $mensagem;
                ?>
            <a class="botao" href="index.php">Voltar</a>
            </div>
        </div>
    </main>
</body>
</html>