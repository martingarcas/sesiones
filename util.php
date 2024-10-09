<?php

    function iniciaSesion() {

        session_start();
    }

    function cierraSesion() {

        session_destroy();
    }

    function logIn($user) {

        iniciaSesion();
        $_SESSION['user'] = $user;
    }

    function logOut() {

        iniciaSesion();
        unset($_SESSION);
        cierraSesion();
    }

    function buttonGoBack($ruta) {

        echo "<a href=$ruta>Volver atrás</a>";
    }

    function buttonLogOut() {

        echo '<a href="logout.php">Cerrar sesión</a>';
    }

    function buttonCarrito() {

        echo '<a href="carrito.php">VER CARRITO</a>';
    }

    function estaLogueado($user) {

        if ($_SESSION['user'] == $user) {
            
            echo 'El usuario ' . $user . ' está logueado.';

        } else {
            
            echo 'El usuario ' . $user . ' ha cerrado sesión.';
        }

        //return isset($_SESSION['user']);
    
    }

?>