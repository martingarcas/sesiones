<?php

    include 'util.php';

    iniciaSesion();

    if (isset($_SESSION['carrito'])) {
        
        foreach ($_SESSION['carrito'] as $coche) {
            
            echo "<h3>$coche</h3>";
        }

    } else {
        
        echo 'No hay ningún coche en el carrito.<br>';
    }

    buttonGoBack('coches.php');
    echo '<br>';
    buttonLogOut();

?>