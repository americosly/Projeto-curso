<?php
    $pessoa = "joao";

    echo $pessoa;
    echo "<br>";

    //dump debuga o code
    var_dump($pessoa);  
    echo "<br>";
    

    //array simples
    $arraySimples = ["thomaz", "Hendy", "victor"];
    var_dump($arraySimples);
    echo "<br>";
    echo $arraySimples[0];
    
    echo "<br>";

    //Array Associativo
    $arrayAssociativo = [
        "Nome" => "Thomaz",
        "Fruta" => "tomate",
        "Idade" => 17
    ];

    // echo $arrayAssociativo["Fruta"];
    $arrayAssociativo["Time"] = "Corinthians";
    $arrayAssociativo["Jogo"] = "Xadrez";

    if ($arrayAssociativo["Idade"] >= 18){
        echo "Pode entrar";
    } elseif ($arrayAssociativo["Fruta"] == "tomate") {
        echo "Você pode entrar pelo bom gosto";
    } elseif ($arrayAssociativo["Time"] == "Corinthians") {
        //quando tenho duas condições iguais somente a primeira será exibida e o código para pq é true.
        echo "Não pode entrar pelo mau(l) gosto";
    }

    echo "<br>";

    echo $arrayAssociativo["Jogo"] == "Xadrez" ? "Você é paciente" : "Medite Mais";
?>