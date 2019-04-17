<?php
    require "req/funcoesLogin.php";
    include "inc/head.php";

    // aqui estou requisitando todos os campos do formulário
    if($_REQUEST){
        $nome = $_REQUEST["nome"];
        $email = $_REQUEST["email"];
        $senha = $_REQUEST["senha"];
        $confirmarSenha = $_REQUEST ["confirmarSenha"];
        // Testes
        $hash = password_hash($senha,PASSWORD_DEFAULT);
        echo $hash;
      
    
    
    
    
    // aqui estou criando uma criptografia na minha senha usando md5
     //     $cadastro = md5($senha);
    //     $login = md5($senha);
    //     echo $cadastro . "<br>";
    //     echo $login;
    //    exit;
        
        // verifica se a senha é igual ao confirmar senha
        if ($senha == $confirmarSenha){

            $senhaCrip = password_hash($senha, PASSWORD_DEFAULT);
            // criando um novo usuário
            $novoUsuario = [
                "nome" => $nome,
                "email" => $email,
                "senha" =>  $senhaCrip,
            ];
            // cadastro um novo Usuário no Json
            $cadastrou = cadastrarUsuario($novoUsuario);
        } else {
            $erro = "Senhas incompativeis";
        }

    
    }
?>

<div class="page-center">
    <h2>Cadastre-se</h2>
    <?php 
    //  verifica se a variavel cadastrou foi definida
        if(isset ($cadastrou) && $cadastrou): ?>
            <div class"alert alert-success" role="alert">
                <span>Usuário cadastrado com sucesso!</span>
            </div>
            <!-- Verifica se a variavel erro foi definida -->
            <?php elseif (isset($erro)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $erro; ?>
            </div>
        <?php endif; ?>
    <form action="cadastro.php" method="post" class="col-md-7">
        <div class="col-md-12">
            <label for="inputNome">Nome</label>
            <input type="text" name="nome" class="form-control" id="inputNome">

        </div>
        <div class="col-md-12">
            <label for="inputEmail">E-mail</label>
            <input type="email" name="email" class="form-control" id="inputEmail">

        </div>
        <div class="col-md-12">
            <label for="inputSenha">Senha</label>
            <input type="password" name="senha" class="form-control" id="inputSenha">

        </div>
        <div class="col-md-12">
            <label for="inputConfirmarSenha">Confirme sua senha</label>
            <input type="password" name="confirmarSenha" class="form-control" id="inputConfirmarSenha">

        </div>
        <div class="col-md-12 ">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="login.php" class="col-md-offset-9">Fazer login!</a>
        </div>
    </form>
</div>

<?php
    include  "inc/footer.php";
?>