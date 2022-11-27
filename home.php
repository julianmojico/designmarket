<?php
require 'config.php'; ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tienda Design</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            plugins: [
                require('@tailwindcss/aspect-ratio'),
            ],
        }
    </script>
</head>

<body>
    <div class="bg-white">
        <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Nuestros productos</h2>
              <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            <?php
            $queryPublis = 'SELECT * FROM publicaciones ORDER BY fecha desc';
            $respUsuario = mysqli_query($sqlConnect, $queryPublis);

            while ($publis = mysqli_fetch_assoc($respUsuario)) {
                echo '
                <div class="group relative">
                    <div
                        class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-80">
                        <img src="'.$publis['url_imagen'].'"
                            alt="'.$publis['producto'].'"
                            class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="#">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    '.$publis['producto'].'
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">'.$publis['texto'].'</p>
                        </div>
                        <p class="text-sm font-medium text-gray-900">ARS '.$publis['precio'].'</p>
                    </div>
                </div>
            ';
            }
            ?>
            </div>
        </div>
    </div>
</body>

</html>