<?php

    session_start();  

    $user_autenticado = false;
    $usuario_id = null;
    $perfil_id = null;

    $usuarios__app = [];
    
    // Abrindo arquivo users
    $users_arquivo = fopen('users.txt', 'r');

    while(!feof($users_arquivo)) {
        $usuarios__app[] = fgets($users_arquivo);
    }
    // Fechando arquivo users
    fclose($users_arquivo);
    foreach($usuarios__app as $user) {
        $user_atual = explode('#', $user);
        if($_POST['email'] == $user_atual[0] && $_POST['senha'] == $user_atual['1']) {
            $user_autenticado = true;
            $usuario_id = $user_atual[3];
            $perfil_id = $user_atual[4];
        }
    }

    if($user_autenticado) {
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $perfil_id;
        header('Location: home.php');
    } else {
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro'); 
    }

?>