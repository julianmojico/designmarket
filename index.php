<?php
require 'config.php'; 
require 'utils.php' ;

if(isset($_GET["disconnect"])){
    session_destroy();
    header("Refresh:0");
}

if(isset($_SESSION["id"])){
    header("Location: home.php");
  }
  if(isset($_POST["submit"])){

    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    $login = mysqli_query($sqlConnect, "SELECT * FROM usuarios WHERE nombre_usuario = '$usuario' OR correo = '$usuario'");
    $row = mysqli_fetch_assoc($login);
    if(mysqli_num_rows($login) > 0){
      $passwordOk = password_verify($password, $row['contraseña']);
      if($passwordOk == 1){
        updateSessionData($row);
        header("Location: index.php");
      }
      else{
        echo
        "<script> alert('La contraseña es incorrecta'); </script>";
      }
    }
    else{
      echo
      "<script> alert('El usuario no está registrado'); </script>";
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
    <title>Tienda Design</title>
</head>

<body>
    <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                    alt="Tienda Design">
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Tienda Design</h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    <a href="profile.php" class="font-medium text-indigo-600 hover:text-indigo-500">Registrarse</a>
                </p>
            </div>
            <form class="mt-8 space-y-6" action="#" method="POST">
                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <label for="usuario" class="sr-only">Usuario o correo</label>
                        <input id="email-address" name="usuario" required
                            class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                            placeholder="Correo">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Contraseña</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                            placeholder="Contraseña">
                    </div>
                </div>

                <button type="submit" name="submit"
                    class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    Ingresar
                </button>
            </form>
        </div>
    </div>
</body>

</html>