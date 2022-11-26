<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tienda Design</title>
</head>
<body>
    <h2>Titulo: <?php echo "titulo" ?></h2>
    <?php 
        $queryUsuario = "SELECT usuarios.apellido FROM usuarios where apellido='Perez'";
        $respUsuario = mysqli_query($sqlConnect,$queryUsuario);

        while ($usuario = mysqli_fetch_assoc($respUsuario)) {
            echo '<li>' . $usuario["apellido"] . '</li>';
        }

    ?>
</body>
</html>