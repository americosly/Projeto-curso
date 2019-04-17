<?php
// definindo o nome do arquivo
    $nomeArquivo = "usuarios.json";

    function cadastrarUsuario($usuario) {
        // pegando a variável para dentro da função
        global $nomeArquivo;
        // pegando o conteúdo do arquivo usuários.json
        $usuariosJson = file_get_contents($nomeArquivo);
        // transformando o json em array associativo
        $arrayUsuarios = json_decode($usuariosJson, true);
        // adicionando um novo usuário para o array associativo
        array_push($arrayUsuarios["usuarios"], $usuario);
        // transformando o array associativo em json
        $usuariosJson = json_encode($arrayUsuarios);
        // colocando json de volta para o arquivo usuarios.json
        $cadastrou = file_put_contents($nomeArquivo, $usuariosJson);
        // retornando true ou false
        return $cadastrou;
    }

    function logarUsuario($email, $senha){
        global $nomeArquivo;
        $logado=false;
        // pegando o contepudo do arquivo usuarios.Json
        $usuariosJson = file_get_contents($nomeArquivo);
        // transformando oJson em array associativo
        $arrayUsuarios = json_decode($usuariosJson, True);
        // verificando se o usuario existe no arquivo usuarios.Json
        foreach($arrayUsuarios["usuarios"] as $chave => $valor){
            // verificando se a senha digitada é igual a senha do Json
            // verificando se o e-mail digitado é igual ao e-mail do json
            if ($valor ["email"] == $email && password_verify($senha,$valor["senha"]) ){
             $logado = true;
             break;
            }
        }
        return $logado;
    }
?>