<?php 
   include "req/database.php";
   require "req/funcoesLogin.php";
   include "inc/head.php";

    if (isset($_REQUEST['email']) && $_REQUEST['email']){
        // pegando os valores dos inputs
        $email = $_REQUEST["email"];
        $senha = $_REQUEST["senha"];
        // verificando se o usuário esta logado da função
        $infoLogado = logarUsuario ($email,$senha);

        if ($infoLogado == true){
            // cria a sessão
            session_start();
            // criando o campo nome na sessão
            $_SESSION["nome"] = $infoLogado['nomeUsuario'];
            // criando o campo e-mail na sessão
            $_SESSION["email"] = $email;
            // Criando o campo nivelAcesso
            $_SESSION["nivelAcesso"] = $infoLogado['tipoUsuario'];
            // cria o campo logado na sessão
            $_SESSION["logado"] = true;
            // redirecionando o usuário para a pagina index
            header("Location: index.php");
        } else {
            $erro = "Seu usuário não foi encontrado!";
        }
    }
?>

<div class="page-center">
    <h2>Login</h2>
     <!-- Mostra a mensagem de erro caso a variável $erro esteja definida -->
    <?php if (isset($erro)) : ?>
        <div class="alert alert-danger">
            <span><?php echo $erro;?></span>
        </div>
<?php endif; ?>
    <form action="login.php" method="post" class="col-md-7">
        <div class="col-md-12">
           
        <div class="col-md-12">
            <label for="inputEmail">E-mail</label>
            <input type="email" name="email" class="form-control" id="inputEmail">

        </div>
        <div class="col-md-12">
            <label for="inputSenha">Senha</label>
            <input type="password" name="senha" class="form-control" id="inputSenha">

        </div>
        
        <div class="col-md-12 ">
            <button type="submit" class="btn btn-primary">Logar</button>
            <a href="cadastro.php" class="col-md-offset-9">Cadastre-se</a>
        </div>
    </form>
</div>


<?php 
    include "inc/footer.php";
?>