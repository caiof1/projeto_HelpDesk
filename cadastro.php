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
              Cadastro
            </div>
            <div class="card-body">
              <form action="valida_cadastro.php" method="post">
                <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input type="password" name="senha" class="form-control" placeholder="Senha">
                </div>
                <div class="form-group">
                  <input type="password" name="confirme-senha" class="form-control" placeholder="Confirme a Senha">
                </div>
                <?php if(isset($_GET['cadastro']) && $_GET['cadastro'] == 'erro_cadastro') { ?>
                    <div class="text-center mb-3">
                        <span class="text-danger">E-mail já cadastrado</span>
                    </div>
                <?php } ?>

                <?php if(isset($_GET['cadastro']) && $_GET['cadastro'] == 'erro_cadastro2') { ?>
                    <div class="text-center mb-3">
                        <span class="text-danger">A senha informada não coincide.</span>
                    </div>
                <?php } ?>
                <button class="btn btn-lg btn-info btn-block" type="submit">Cadastrar</button>
                <div class="text-center mt-4">
                  <a href="index.php">Já possue cadastro? Faça login aqui!</a>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>