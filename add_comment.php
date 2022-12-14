<?php 
require 'config.php';

if (isset($_GET["id_publicacion"])){
    $id_publicacion = $_GET["id_publicacion"];
} else {
$id_publicacion = $_POST["id_publicacion"];
}

//TODO: probar con $_SESSION["LOGIN"] SIN ISSET. Tambien hiddear el comment box si no esta logueado
if (isset($_SESSION["id"])) {
    $userId = $_SESSION["id"];
    $userName = $_SESSION["nombre"];
    $userLastname = $_SESSION["apellido"];
    $userAvatar = $_SESSION["avatar"];
    $time = time();
    if (isset($_POST["comment"])) {
      $newComment = $_POST["comment"];
      $insertComment = mysqli_query($sqlConnect, "INSERT INTO `comentarios` values (null,'$userId','$id_publicacion','$newComment',$time)");
      $url = 'details.php?id_publicacion=' . $id_publicacion;
      header("Location: ".urldecode($url)."");
    }
  }

$add_comment = '

<div class="my-10 bg-gray-100 flex items-center justify-center">
  <div class="px-3 min-w-[80%] max-w-[80%]">
    <div class="bg-white rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
      <h1 class="text-lg text-gray-700 font-semibold">Agregar valoración</h1>
      <div class="flex justify-between items-center">
          <div class="mt-4 flex items-center space-x-4 py-6">
            <img class="w-12 h-12 rounded-full" src="https://picsum.photos/50.webp?random=8" alt="" />
            <div class="text-sm font-semibold">Julian Mojico<span class="font-normal"> • Ahora</span></div>
          </div>
          <div id="stars" class="flex">
           <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
               <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
           </svg>
           <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
               <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
           </svg>
           <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
               <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
           </svg>
           <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
               <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
           </svg>
       </div>
        </div>
        
        <form method="post" action="details.php">
            <div class="mt-3 p-3 w-full">
            <textarea name="comment" rows="3" class="border p-2 rounded w-full" placeholder="Añade tu comentario..."></textarea>
            </div>
            <div class="flex justify-between mx-3">
            <button type="submit" class="mt-6 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 py-3 px-8 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Envíar</button>
            <input type="number" hidden name="id_publicacion" value="' . $id_publicacion . '" />
            </div>
        </form>

      </div>
    </div>
  </div>

'

?>