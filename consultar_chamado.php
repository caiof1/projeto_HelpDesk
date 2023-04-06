<?php

  include 'autenticado.php';
  $arquivo = fopen('arquivo.hd', 'r');

  $chamados = [];

  while(!feof($arquivo)) {
    $registro = fgets($arquivo);
    $chamados[] = $registro;
  }

  // Fechando o arquivo aberto
  fclose($arquivo);


?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <?php include 'header.php';?>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            <div class="card-body">
              <?php 

                if(strlen($chamados[0]) > 0) {
                  foreach($chamados as $chamado) { 
                    $registro_chamado = explode('#', $chamado);              

                    if($_SESSION['perfil_id'] == 2) {
                      if($_SESSION['id'] != $registro_chamado[3]) {
                        continue;
                      }
                    }

                    if(count($registro_chamado) < 4) {
                      continue; 
                    }
                
              ?>
                    <div class="card mb-3 bg-light">
                      <div class="card-body">
                        <h5 class="card-title"><?= $registro_chamado[0] ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $registro_chamado[1] ?></h6>
                        <p class="card-text"><?= $registro_chamado[2] ?></p>
                      </div>
                    </div>
              <?php 
                  }
                } else {
              ?>  
                <div class="ml-5">
                  <span>Nenhum chamado foi aberto!</span>
                </div>
              <?php } ?>
              
              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>