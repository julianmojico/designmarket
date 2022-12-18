<?php
require 'config.php';
require 'navbar.php';
require 'footer.php';
require 'utils.php';

if (isset($_SESSION["id"])) {

    $register = false;
    $disabled = 'disabled';
   
    $userName = $_SESSION["nombre"];
    $userPrimary =  $_SESSION["nombre_usuario"];
    $userLastname = $_SESSION["apellido"];
    $userEmail =  $_SESSION["correo"];
    $userAvatar = $_SESSION["avatar"];
    $userBio = $_SESSION["bio"];
    $id_rol = $_SESSION["id_rol"];
    $time = time();

    $is_admin_update = isset($_GET["id_usuario"]) && ($id_rol == 1);
    $userId = $is_admin_update ? $_GET["id_usuario"] : $_SESSION["id"];

    if (isset($_GET["update"])) {

        $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : $userName;
        $apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : $userLastname;
        $nombre_usuario = isset($_POST["nombre_usuario"]) ? $_POST["nombre_usuario"] : $userPrimary;
        $contraseña = empty($_POST["contraseña"]) ? false : password_hash($_POST["contraseña"], PASSWORD_DEFAULT);
        $avatar = isset($_POST["avatar"]) ? $_POST["avatar"] : $userAvatar;
        $correo = isset($_POST["correo"]) ? $_POST["correo"] : $userEmail;
        $bio = isset($_POST["bio"]) ? $_POST["bio"] : $userBio;
        $id_rol = isset($_POST["id_rol"]) ? $_POST["id_rol"] : '2';

        $updateUsuario = mysqli_query($sqlConnect, "UPDATE `usuarios` SET nombre='$nombre', apellido='$apellido', nombre_usuario = '$nombre_usuario', correo='$correo', avatar='$avatar', bio='$bio', id_rol='$id_rol' WHERE id_usuario='$userId' ");
        
        if ($contraseña){
            $updateContraseña = mysqli_query($sqlConnect, "UPDATE `usuarios` SET contraseña='$contraseña' WHERE id_usuario='$userId' ");
        }

        $newData["id_usuario"] = $_SESSION["id"];
        $newData["nombre"] = $nombre;
        $newData["apellido"] = $apellido;
        $newData["nombre_usuario"] = $nombre_usuario;
        $newData["avatar"] = $avatar;
        $newData["correo"] = $correo;
        $newData["bio"] = $bio;
        $newData["id_rol"] = $id_rol;

        $is_admin_update ? null : updateSessionData($newData);
        header("Location: profile.php");

    }

    if ($is_admin_update){

        $disabled = '';
        $register = false;
        $selectUser = mysqli_query($sqlConnect, "SELECT id_usuario,avatar,nombre,apellido,nombre_usuario,id_rol,correo,bio FROM `usuarios` WHERE id_usuario=$userId");
        $row = mysqli_fetch_assoc($selectUser);

        $userName = $row["nombre"];
        $userPrimary =  $row["nombre_usuario"];
        $userLastname = $row["apellido"];
        $userEmail =  $row["correo"];
        $userAvatar = $row["avatar"];
        $userBio = $row["bio"];
        $id_rol = $row["id_rol"];

    }

  } else {


    $register = true;
    $disabled = '';

    if (isset($_GET["registrate"])) {

        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $nombre_usuario = $_POST["nombre_usuario"];
        $contraseña = password_hash($_POST["contraseña"], PASSWORD_DEFAULT);
        $avatar = $_POST["avatar"];
        $correo = $_POST["correo"];
        $bio = $_POST["bio"];
        $id_rol = isset($_POST["id_rol"]) ? $_POST["id_rol"] : 2;

        $insertUsuario = mysqli_query($sqlConnect, "INSERT INTO `usuarios` values (null,'$nombre','$apellido','$nombre_usuario','$contraseña','$id_rol,'$correo', '$avatar', '$bio')");
        header("Location: home.php");
      }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Tienda Design - Perfil</title>
</head>

<body class="bg-slate-200">
    <?php echo $navbar; ?>

    <div class="container">
        <div class="p-5 ">
            <div class="md:grid md:grid-cols-3 md:gap-6 my-[10vh]">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                            <?php echo $register? 'Registro' : 'Perfil' ?></h3>
                        <p class="mt-1 text-sm text-gray-600">Esta es la información pública de tu perfil</p>
                    </div>
                </div>
                <div class="mt-5 md:col-span-2 md:mt-0">
                        <!-- <form action="<?php echo $register ? '?registrate' : '?update' ?>" method="POST"> -->
                        <form action="<?php echo $register ? '?registrate' : '?update'?><?php echo $is_admin_update ? '&id_usuario='.$userId.'' : null ?>" method="POST">
                            <div class="shadow sm:overflow-hidden sm:rounded-md">
                            <?php echo $is_admin_update ? 
                            ' <input hidden name="id_usuario" value="'.$userId.'" type="text"></input>'
                            : null ?>

                                <div class="space-y-6 bg-white px-4 py-5 sm:p-6">

                                <label for="nombre" class="block text-lg font-light text-black-700">Nombre</label>
                                <div class="mt-1">
                                    <input <?php echo $register ? 'required' : '' ?> type="text" name="nombre" rows="1"
                                        <?php echo $register? '' : "value=$userName" ?>
                                        class="bg-white-200 focus:bg-white-300 border border-gray-300 text-gray-800 font-extralight text-sm rounded-lg focus:border-indigo-500 focus:ring-indigo-500  block w-full p-2.5"
                                        placeholder="Juan"></input>
                                </div>

                                <label for="apellido" class="block text-lg font-light text-black-700">Apellido</label>
                                <div class="mt-1">
                                    <input <?php echo $register ? 'required' : '' ?> type="text" name="apellido"
                                        rows="1" <?php echo $register? '' : "value=$userLastname" ?>
                                        class="bg-white-200 focus:bg-white-300 border border-gray-300 text-gray-800 font-extralight text-sm rounded-lg focus:border-indigo-500 focus:ring-indigo-500  block w-full p-2.5"
                                        placeholder="Perez"></input>
                                </div>

                                <label for="correo" class="block text-lg font-light text-black-700">Correo</label>
                                <div class="mt-1">
                                    <input <?php echo $register ? 'required' : '' ?> <?php echo $disabled ?>
                                        name="correo" rows="1" type="email"
                                        <?php echo $register? '' : "value=$userEmail" ?>
                                        class="bg-white-200 focus:bg-white-300 border border-gray-300 text-gray-800 font-extralight text-sm rounded-lg focus:border-indigo-500 focus:ring-indigo-500  block w-full p-2.5"
                                        placeholder="usuario@correo.com"></input>
                                </div>

                                <label for="nombre_usuario" class="block text-lg font-light text-black-700">Nombre de
                                    usuario</label>
                                <div class="mt-1">
                                    <input <?php echo $register ? 'required' : '' ?> name="nombre_usuario" rows="1"
                                        type="text" <?php echo $register? '' : "value=$userPrimary" ?>
                                        class="bg-white-200 focus:bg-white-300 border border-gray-300 text-gray-800 font-extralight text-sm rounded-lg focus:border-indigo-500 focus:ring-indigo-500  block w-full p-2.5"
                                        placeholder="minombre.deusuario">
                                    </input>
                                </div>

                                <label for="bio" class="block text-lg font-light text-black-700">Sobre mi</label>
                                <div class="mt-1">
                                    <textarea <?php echo $register ? 'required' : '' ?> name="bio" rows="3"
                                        class="bg-white-200 focus:bg-white-300 border border-gray-300 text-gray-800 font-extralight text-sm rounded-lg focus:border-indigo-500 focus:ring-indigo-500  block w-full p-2.5"
                                        placeholder="Una breve descripción de tu perfil"><?php echo $register? '' : $userBio ?></textarea>
                                </div>

                                <label for="id_rol" class="block text-lg font-light text-black-700">Rol</label>
                                <div class="mt-1">
                                    <select <?php echo $register ? 'required' : '' ?> name="id_rol" rows="1"
                                        class="bg-white-200 focus:bg-white-300 border border-gray-300 text-gray-800 font-extralight text-sm rounded-lg focus:border-indigo-500 focus:ring-indigo-500  block w-full p-2.5">
                                        <option value="1" <?php echo $id_rol == 1? 'selected' : '' ?>>Administrador
                                        </option>
                                        <option value="2" <?php echo $id_rol == 2? 'selected' : '' ?>>Usuario</option>
                                    </select>

                                </div>

                                <label for="contraseña"
                                    class="block text-lg font-light text-black-700">Contraseña</label>
                                <div class="mt-1">
                                    <input <?php echo $register ? 'required' : '' ?> type="password" name="contraseña"
                                        rows="1"
                                        class="bg-white-200 focus:bg-white-300 border border-gray-300 text-gray-800 font-extralight text-sm rounded-lg focus:border-indigo-500 focus:ring-indigo-500  block w-full p-2.5">
                                </div>

                                <label for="avatar" class="block text-lg font-light text-black-700">Avatar</label>
                                <div class="mt-1 flex items-center">
                                    <input hidden type="text" name="avatar" value="https://picsum.photos/50.webp" />
                                    <span class="inline-block h-12 w-12 overflow-hidden rounded-full bg-gray-100">
                                        <img src="https://picsum.photos/50.webp" alt="">
                                    </span>
                                    <button type="button"
                                        class="ml-5 rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-black-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Change</button>
                                </div>

                                <div>
                                    <label class="block text-lg font-light text-black-700">Foto de tapa</label>
                                    <div
                                        class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                        <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path
                                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <div class="flex text-sm text-gray-600">
                                                <label for="file-upload"
                                                    class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                                    <span>Subir un archivo</span>
                                                    <input id="file-upload" name="file-upload" type="file"
                                                        class="sr-only">
                                                </label>
                                                <p class="pl-1">o arrastrar y soltar</p>
                                            </div>
                                            <p class="text-xs text-gray-500">PNG, JPG, GIF hasta 10MB</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                <button type="submit"
                                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"><?php echo $register ? 'Registrar' : 'Guardar' ?></button>
                            </div>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
    <?php 
echo $footer;
?>
</body>

</html>