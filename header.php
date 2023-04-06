<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
    </a>

    <?php
        if(isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == 'SIM') {

    ?>
        <ul class="navbar-nav mr-3">
            <li class="nav-item">
                <a href="logoff.php" class="nav-link">SAIR</a>
            </li>
        </ul>
    <?php } ?>

</nav>