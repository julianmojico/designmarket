<?php
require 'config.php';
require 'navbar.php';
require 'footer.php';

//TODO: probar con $_SESSION["LOGIN"] SIN ISSET. Tambien hiddear el comment box si no esta logueado
if (isset($_SESSION["id"])) {

    $userId = $_SESSION["id"];
    $fecha = time();

    if (isset($_POST['texto'])) {
      $producto = $_POST["producto"];
      $precio = $_POST["precio"];
      $texto = $_POST["texto"];
      $url_imagen = $_POST["url_imagen"];
      $insertProduct = mysqli_query($sqlConnect, "INSERT INTO `publicaciones` VALUES (null, '$producto','$precio','$userId',1,'$texto', '$url_imagen', '$fecha')");
      header("Location: home.php");
    } 

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
    <title>Tienda Design - Agregar publicación</title>
</head>

<body class="bg-slate-200">
    <?php echo $navbar; ?>

    <div class="container">
        <div class="p-5 ">
            <div class="md:grid md:grid-cols-3 md:gap-6 my-[10vh]">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Agregar publicación</h3>
                        <p class="mt-1 text-sm text-gray-600">Ingresa la información de tu publicación</p>
                    </div>
                </div>
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <form action="add_product.php" method="POST">
                        <input hidden type="number" name="id_autor" value="<?php echo $_SESSION["id"]?>"/>
                        <div class="shadow sm:overflow-hidden sm:rounded-md">
                            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="producto" class="mt-2 text-sm text-gray-500">Tipo de producto</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input required type="text" name="producto"
                                                class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                placeholder="Diseño de Marca"/>
                                        </div>
                                    </div>
                                    <div class="col-span-3 sm:col-span-2">
                                    <label for="precio" class="mt-2 text-sm text-gray-500">Precio</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <span
                                                class="inline-flex items-center rounded-l-md border border-r-0 border-gray-200 bg-gray-50 px-3 text-sm text-gray-500">ARS $</span>
                                            <input required type="number" name="precio"
                                                class="block w-full flex-1 rounded-none rounded-r-md bg-gray-200 border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                placeholder="7500"/>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label for="texto" class="mt-2 text-sm text-gray-500">Descripción</label>
                                    <div class="mt-1">
                                        <textarea required name="texto" rows="3"
                                            class="mt-1 block w-full rounded-md bg-gray-100 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="El mejor diseño que has visto!"></textarea>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Foto</label>
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
                                                    <span>Subir archivo</span>
                                                    <input name="file-upload" type="file" class="sr-only">
                                                    <input name="url_imagen" type="text" hidden value="https://wepik.com/images/content-landing/flyers/og-flyers.png"/>
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
                                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Publicar</button>
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