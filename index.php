<?php

  session_start();

  if(isset($_SESSION['autenticado'])&& $_SESSION['autenticado'] == 'SIM') {
    header('Location: home.php');
  }

?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <?php include 'header.php';?>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <form action="valida_login.php" method="post">
                <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input type="password" name="senha" class="form-control" placeholder="Senha">
                </div>

                <!-- Mensagem informando o erro no user ou senha-->
                <?php

                  if(isset($_GET['login']) && $_GET['login'] == 'erro') {
                    
                ?>
                  <div class="text-danger text-center mb-3">
                    Usuário ou senha inválido(s)
                  </div>
                <?php } ?>
                <!-- Fim das mensagem informando o erro no user ou senha -->

                <!-- Mensagem informando que o user deve logar antes de acessar determinadas paginas-->
                <?php

                  if(isset($_GET['login']) && $_GET['login'] == 'erro2') {
                    
                ?>
                  <div class="text-danger text-center mb-3">
                    Faça login antes de acessar as páginas protegidas
                  </div>
                <?php } ?>
                <!-- Fim das mensagem informando que o user deve logar antes de acessar determinadas paginas -->

                <!-- Mensagem informando que o cadastro foi realizado com sucesso-->
                <?php

                  if(isset($_GET['cadastro']) && $_GET['cadastro'] == 'sucess') {
                    
                ?>
                  <div id="cadastro-realizado" class="text-success text-center mb-3">
                    Cadastro realizado com sucesso
                  </div>
                  <script>
                    setTimeout(() => {
                      document.getElementById('cadastro-realizado').style.display = 'none';
                    }, 2000);
                  </script>
                <?php } ?>
                <!-- Fim das Mensagem informando que o cadastro foi realizado com sucesso -->

                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
                <div class="text-center mt-4">
                  <a href="cadastro.php">Não possue cadastro? Faça agora mesmo</a>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>