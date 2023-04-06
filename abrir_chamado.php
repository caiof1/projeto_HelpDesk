<?php

  include 'autenticado.php';


?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      @keyframes move__chamado {
          from {
            transform: translateY(-10px);
          }
          to {
            transform: translateY(20px);
            opacity: 1;
          }
      }
      .card-abrir-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
      .text__chamado__abriu {
        transform: translateY(-10px);
        transition: margin 0.5s linear;
        animation: move__chamado 200ms linear forwards 0.2s;
        opacity: 0;
      }
      .text__chamado__abriu span {
        font-size: 20px;
        color: green;
      }
    </style>
  </head>

  <body>

    <?php include 'header.php';?>

    <div class="container">    
      <div class="row">

        <div class="card-abrir-chamado">
          <div class="card">
            <div class="card-header">
              Abertura de chamado
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  
                  <form method="post" action="registra_chamado.php">
                    <div class="form-group">
                      <label>Título</label>
                      <input type="text" name="titulo" class="form-control" placeholder="Título">
                    </div>
                    
                    <div class="form-group">
                      <label>Categoria</label>
                      <select name="categoria" class="form-control">
                        <option>Criação Usuário</option>
                        <option>Impressora</option>
                        <option>Hardware</option>
                        <option>Software</option>
                        <option>Rede</option>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Descrição</label>
                      <textarea class="form-control" name="descricao" rows="3"></textarea>
                    </div>
                    
                    <?php 
                      if(isset($_SESSION['abriu']) && $_SESSION['abriu'] == 'SIM') { 
                        unset($_SESSION['abriu']);
                    ?>
                    
                      <div class="text-center text__chamado__abriu">
                        <span id="text__chamado">Chamado Aberto</span>
                      </div>

                      <script>
                        const textChamado = document.getElementById('text__chamado');
                        setTimeout(() => {
                          textChamado.innerHTML = '';
                        }, 2000);
                      </script>

                    <?php } ?>

                    <div class="row mt-5">
                      <div class="col-6">
                        <a href="home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
                      </div>

                      <div class="col-6">
                        <button class="btn btn-lg btn-info btn-block" type="submit">Abrir</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>