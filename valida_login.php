<?php

    session_start();  

    $user_autenticado = false;
    $usuario_id = null;
    $perfil_id = null;

    $usuarios__app = [
        [
            'email' => 'adm@teste.com.br',
            'senha' => '1',
            'id' => '1',
            'perfil_id' => 1
        ],
        [
            'email' => 'user@teste.com.br',
            'senha' => '1',
            'id' => '2',
            'perfil_id' => 1
        ],
        [
            'email' => 'jose@teste.com.br',
            'senha' => '1',
            'id' => '3',
            'perfil_id' => 2
        ],
        [
            'email' => 'maria@teste.com.br',
            'senha' => '1',
            'id' => '4',
            'perfil_id' => 2
        ]
    ];

    foreach ($usuarios__app as $user) {
        if($_POST['email'] == $user['email'] && $_POST['senha'] == $user['senha']) {
            $user_autenticado = true;
            $usuario_id = $user['id'];
            $perfil_id = $user['perfil_id'];
        }
    }

    if($user_autenticado) {
        header('Location: home.php');
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $perfil_id;
    } else {
        header('Location: index.php?login=erro');
        $_SESSION['autenticado'] = 'NAO';
    }

?>