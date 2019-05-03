<?php
// definindo o nome do arquivo
    // $nomeArquivo = "usuarios.json";

    function cadastrarUsuario($usuario) {

        try {

            global $conexao;
            $query = $conexao->prepare("INSERT INTO usuarios (nome,email,senha, tipo_usuario_fk) VALUES (:nome, :email, :senha, 3)"); // caso você coloque os parametros com : eles reconhecem os inputs pelo id 

            $query->execute([
                ':nome' => $usuario['nome'],
                ':email' => $usuario['email'],
                'senha' => $usuario['senha']
            ]);

            $usuario = $query->fetchAll(PDO::FETCH_ASSOC); // traz todas as linhas em array associativo
            
            $conexao = null;
            
            
        } catch(PDOException $Exception){
            echo $Exception->getMessage();
        }
        return true;
        }


        // ======================================================================
        // pegando a variável para dentro da função
        // global $nomeArquivo;
        // pegando o conteúdo do arquivo usuários.json
        // $usuariosJson = file_get_contents($nomeArquivo);
        // transformando o json em array associativo
        // $arrayUsuarios = json_decode($usuariosJson, true);
        // adicionando um novo usuário para o array associativo
        // array_push($arrayUsuarios["usuarios"], $usuario);
        // transformando o array associativo em json
        // $usuariosJson = json_encode($arrayUsuarios);
        // colocando json de volta para o arquivo usuarios.json
        // $cadastrou = file_put_contents($nomeArquivo, $usuariosJson);
        // retornando true ou false
        // return $cadastrou;
    

    function logarUsuario($email, $senha){
        
        try{
            global $conexao;

            $query = $conexao->prepare("SELECT * FROM usuarios WHERE  email = :email");
            $query->execute([
                'email' => $email
            ]);
            
            $usuario = $query->fetch(PDO::FETCH_ASSOC);

            if ($usuario['email'] == $email && password_verify($senha,$usuario["senha"])){
                $infoLogado = [
                    "nomeUsuario" => $usuario['nome'],
                    "tipoUsuario" => $usuario['tipo_usuario_fk']
                ];

                var_dump($infoLogado);
            }

        } catch(PDOException $Exception){
            echo $Exception->getMessage();
        }
        
        return $infoLogado;
    }
    //========================================================
    // global $nomeArquivo;
        // $nomeLogado="";
        // pegando o contepudo do arquivo usuarios.Json
        // $usuariosJson = file_get_contents($nomeArquivo);
        // transformando oJson em array associativo
        // $arrayUsuarios = json_decode($usuariosJson, True);
        // verificando se o usuario existe no arquivo usuarios.Json
        // foreach($arrayUsuarios["usuarios"] as $chave => $valor){
            // verificando se a senha digitada é igual a senha do Json
            // verificando se o e-mail digitado é igual ao e-mail do json
        //     if ($valor ["email"] == $email && password_verify($senha,$valor["senha"]) ){
        //      $nomeLogado = $valor["nome"];
        //      break;
        //     }
        // }
        // return $nomeLogado;
   
?>