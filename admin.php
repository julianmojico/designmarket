<?php
require 'config.php';
require 'navbar.php';
require 'footer.php';
require 'utils.php';

if (isset($_SESSION["id"]) && ($_SESSION["id_rol"] == 1)) {

    $userId = $_SESSION["id"];
    $userName = $_SESSION["nombre"];
    $userPrimary =  $_SESSION["nombre_usuario"];
    $userLastname = $_SESSION["apellido"];
    $userEmail =  $_SESSION["correo"];
    $userAvatar = $_SESSION["avatar"];
    $userBio = $_SESSION["bio"];
    $time = time();

    $selectUsers = mysqli_query($sqlConnect, "SELECT id_usuario,avatar,nombre,apellido,nombre_usuario,id_rol,correo,bio FROM usuarios WHERE id_usuario != $userId;");
  } else {
    header("Location: index.php");
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Tienda Design - Administrador</title>
</head>

<body class="bg-slate-200">
    <?php echo $navbar; ?>

    <div class="container">
        <div class="p-5 ">
            <div class="m-3 px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Usuarios</h3>
                <p class="mt-1 text-sm text-gray-600">Administración de usuarios del sitio</p>
            </div>
            <div class="lg:m-14 md:m-8 sm:m-0">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-x-visible ">
                                <table class="w-full">
                                    <thead class="bg-white border-b">
                                        <tr>
                                             <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                id_usuario
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Avatar
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Nombre
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Apellido
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                nombre_usuario
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Rol
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Correo
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left max-w-250">
                                                Bio
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                                                while ($usuarios = mysqli_fetch_assoc($selectUsers)) {

                                                                    $nombre_rol = $usuarios['id_rol'] == 1 ? 'Administrador' : 'Usuario';

                                                                    echo '
                                                                 
                                                                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                                                <a href="profile.php?id_usuario='.$usuarios['id_usuario'].'"><button href="admin.php" class="mx-3 rounded-md border border-transparent bg-indigo-600 py-1 px-5 text-base font-small text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Modificar</button></a>
                                                                            </td>
                                                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                                                ' .$usuarios['id_usuario']. '
                                                                            </td>
                                                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                                                <img class="h-8 w-8 rounded-full" src="' .$usuarios['avatar']. '" alt="">
                                                                            </td>
                                                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                                                ' .$usuarios['nombre']. '
                                                                            </td>
                                                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                                                ' .$usuarios['apellido']. '
                                                                            </td>
                                                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                                                ' .$usuarios['nombre_usuario']. '
                                                                            </td>
                                                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                                                 ' .$nombre_rol. '
                                                                            </td>
                                                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                                                 ' .$usuarios['correo']. '
                                                                            </td>
                                                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap overflow-x-scroll">
                                                                                 ' .$usuarios['bio']. '
                                                                             </td>                     
                                                                        </tr>
                                                                  
                                                                    ';
                                                                }
                                                
                                                ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
echo $footer;
?>
</body>

</html>