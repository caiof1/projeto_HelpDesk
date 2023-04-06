<?php

    session_start();

    $_SESSION['abriu'] = 'SIM';

    // Montagem do Texto
    $titulo = str_replace('#', '-',$_POST['titulo']);
    $categoria = str_replace('#', '-',$_POST['categoria']);
    $descricao = str_replace('#', '-',$_POST['descricao']);
    $id = $_SESSION['id'];
    // Juntando a array em uma string com separadores #
    $texto = $titulo . '#' . $categoria . '#' . $descricao . '#' . $id . PHP_EOL;
    
    echo $texto;
    // Abrindo um arquivo 
    $arquivo = fopen('arquivo.hd', 'a');
    // Escrevendo no arquivo aberto
    fwrite($arquivo, $texto);
    // Fechando o arquivo
    fclose($arquivo);

    // header('Location: abrir_chamado.php');
?>