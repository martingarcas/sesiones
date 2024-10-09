<?php

    include 'util.php';

    iniciaSesion();

    if (isset($_GET['marca'])) {
        
        $marca              = $_GET['marca'];
        $_SESSION['marca']  = $_GET['marca'];

    } else if (isset($_SESSION['marca'])){

        $marca = $_SESSION['marca'];

    } else {
        
        header('Location: marcas.php');
    }
    
    if (isset($_POST['modelo'])) {

        $modelo = $_POST['modelo'];
        
        if (isset($_SESSION['carrito'])) {

            $_SESSION['carrito'][] = $modelo;

        } else {
            
            $_SESSION['carrito'] = [$modelo];
        }
    }

    $coches = [

        'Mercedes' => [
            'Mercedes clase A', 'Mercedes clase B', 'Mercedes GTI'
        ],

        'Nissan' => [
            'Nissan Micra', 'Nissan Pulsar', 'Nissan e-POWER'
        ],

        'Mitsubishi' => [
            'Mitsubishi Lancer Evolution', 'Mitsubishi Montero', 'Mitsubishi Xpander'
        ],
    ];

    if (array_key_exists($marca, $coches)) {
        
        echo "<h1>$marca</h1>";

        echo "
            <div>";

            foreach ($coches[$marca] as $coche) {
                
                echo "
                    <h3 id='$coche'>$coche</h3>

                    <form method='POST' action='coches.php'>
                        <input type='hidden' name='modelo' value='$coche'/>
                        <input type='submit' value='Añadir al carrito'/>
                    </form>

                ";
            }
            
            echo "</div>";

    } else {

        echo "Coches fuera de disponibilidad.<br>";
    }

    buttonGoBack('marcas.php');
    echo "<br>";
    buttonLogOut();
    echo "<br>";
    buttonCarrito();

?>