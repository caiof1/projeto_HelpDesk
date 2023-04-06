<?php

    session_start();

    $registro_user = fopen('users.txt', 'r');    
    $user_confirmado = true;
    $array_user = [];

    $user = $_POST['email'];
    $senha = $_POST['senha'];
    $confirme_senha = $_POST['confirme-senha'];

    while(!feof($registro_user)) {
        $array_user[] = fgets($registro_user);
    }

    fclose($registro_user);

    foreach($array_user as $users) {
        $registro_email = explode('#', $users);
        if($registro_email[0] == $user) {
            $user_confirmado = false;
            header('Location: cadastro.php?cadastro=erro_cadastro');
        }
        if($senha != $confirme_senha) {
            $user_confirmado = false;
            header('Location: cadastro.php?cadastro=erro_cadastro2');    
        }
    }

    $cadastrar_user = fopen('users.txt', 'a');
    if($user_confirmado) {
        // sENHA DE SEGURANÇARA PARA CRIAR UM USER ADMIN
        if($senha == 'empresa@123') {
            $perfil_id = '1';
        } else {
            $perfil_id = '2';
        }
        $unir_user = $user . '#' . $senha . '#' . count($array_user) . '#' . $perfil_id . '' . PHP_EOL;
        fwrite($cadastrar_user, $unir_user);
        header('Location: index.php?cadastro=sucess');
        fclose($cadastrar_user);
    }
?>