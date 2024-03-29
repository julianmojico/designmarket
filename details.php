<?php
require 'config.php';
require 'navbar.php';
require 'footer.php';
require 'comments.php';
?>
<!-- if (isset($_POST["like"])) { -->
<?php


$queryPublis =
    'SELECT * FROM publicaciones where id_publicacion=' .
    $_GET['id_publicacion'] .
    '';
$respPubli = mysqli_query($sqlConnect, $queryPublis);
$publi = mysqli_fetch_assoc($respPubli);


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
    <div class="relative z-10" role="dialog" aria-modal="true">

        <div class="fixed inset-0 hidden bg-gray-500 bg-opacity-75 transition-opacity md:block"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-stretch justify-center text-center md:items-center md:px-2 lg:px-4">

                <div
                    class="flex w-full transform text-left text-base transition md:my-8 md:max-w-2xl md:px-4 lg:max-w-4xl">
                    <div
                        class="relative flex w-full items-center overflow-hidden bg-white px-4 pt-14 pb-8 shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">
                        <form action="home.php">
                            <button type="submit" type="button"
                                class="absolute top-4 right-4 text-gray-400 hover:text-gray-500 sm:top-8 sm:right-6 md:top-6 md:right-6 lg:top-8 lg:right-8">
                                <span class="sr-only">Close</span>
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </form>

                        <div class="grid w-full grid-cols-1 items-start gap-y-8 gap-x-6 sm:grid-cols-12 lg:gap-x-8">
                            <div
                                class="aspect-w-2 aspect-h-3 overflow-hidden rounded-lg bg-gray-100 sm:col-span-4 lg:col-span-5">
                                <img src='<?php echo $publi['url_imagen']; ?>'
                                    alt="Two each of gray, white, and black shirts arranged on table."
                                    class="object-cover object-center">
                            </div>
                            <div class="sm:col-span-8 lg:col-span-7">
                                <h2 class="text-2xl font-bold text-gray-900 sm:pr-12"><?php echo $publi['producto']; ?>
                                </h2>

                                <section aria-labelledby="information-heading" class="mt-2">
                                    <h3 id="information-heading" class="sr-only">Informacion de producto</h3>
                                    <p class="text-2xl text-gray-900">ARS <?php echo $publi['precio']; ?></p>
                                    <div class="mt-6">
                                        <h4 class="sr-only">Valoración</h4>
                                        <div class="flex items-center">
                                            <div class="flex items-center">

                                                <svg class="text-gray-900 h-5 w-5 flex-shrink-0"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                        clip-rule="evenodd" />
                                                </svg>

                                                <svg class="text-gray-900 h-5 w-5 flex-shrink-0"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                        clip-rule="evenodd" />
                                                </svg>

                                                <svg class="text-gray-900 h-5 w-5 flex-shrink-0"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                        clip-rule="evenodd" />
                                                </svg>

                                                <svg class="text-gray-900 h-5 w-5 flex-shrink-0"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                        clip-rule="evenodd" />
                                                </svg>

                                                <svg class="text-gray-200 h-5 w-5 flex-shrink-0"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <p class="sr-only">3.9 de 5 estrellas</p>
                                            <a href="#"
                                                class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">117
                                                reviews</a>
                                        </div>
                                    </div>
                                </section>

                                <section aria-labelledby="options-heading" class="mt-10">
                                    <h3 id="options-heading" class="sr-only">Product options</h3>

                                    <form action="home.php">
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900">Descripción</h4>

                                            <fieldset class="mt-4">
                                                <legend class="sr-only">Descripción</legend>
                                                <span class="flex items-center space-x-3">
                                                    <?php echo $publi['texto']; ?>
                                                </span>
                                            </fieldset>
                                        </div>

                                        <div class="mt-10">
                                            <div class="flex items-center justify-between">
                                                <h4 class="text-sm font-medium text-gray-900">Tags</h4>
                                            </div>

                                            <fieldset class="mt-4">
                                                <legend class="sr-only">Choose a size</legend>
                                                <div class="grid grid-cols-4 gap-4">
                                                    <label
                                                        class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 bg-white shadow-sm text-gray-900 cursor-pointer">
                                                        <input type="radio" name="size-choice" value="XXS"
                                                            class="sr-only" aria-labelledby="size-choice-0-label">
                                                        <span id="size-choice-0-label">Design</span>

                                                        <span class="pointer-events-none absolute -inset-px rounded-md"
                                                            aria-hidden="true"></span>
                                                    </label>

                                                    <label
                                                        class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 bg-white shadow-sm text-gray-900 cursor-pointer">
                                                        <input type="radio" name="size-choice" value="XS"
                                                            class="sr-only" aria-labelledby="size-choice-1-label">
                                                        <span id="size-choice-1-label">PinturaDigital</span>

                                                    </label>

                                                    <label
                                                        class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 bg-white shadow-sm text-gray-900 cursor-pointer">
                                                        <input type="radio" name="size-choice" value="S" class="sr-only"
                                                            aria-labelledby="size-choice-2-label">
                                                        <span id="size-choice-2-label">Fantasia</span>

                                                        <span class="pointer-events-none absolute -inset-px rounded-md"
                                                            aria-hidden="true"></span>
                                                    </label>

                                                    <label
                                                        class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 bg-white shadow-sm text-gray-900 cursor-pointer">
                                                        <input type="radio" name="size-choice" value="M" class="sr-only"
                                                            aria-labelledby="size-choice-3-label">
                                                        <span id="size-choice-3-label">Magia</span>
                                                        <span class="pointer-events-none absolute -inset-px rounded-md"
                                                            aria-hidden="true"></span>
                                                    </label>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <button type="submit"
                                            class="mt-6 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 py-3 px-8 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Comprar</button>
                                    </form>
                                </section>
                            </div>
                            <div id="comments" class="col-span-full rounded-md border-2 border-gray-100 bg-gray-100">
                                <?php echo $comments ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php echo $footer; ?>
</body>