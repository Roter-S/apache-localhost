<!DOCTYPE html>
<html lang="es-GT">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>localhost</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-900">

  <nav class="shadow-2xl bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="http://localhost" class="flex items-center">
        <img src="https://httpd.apache.org/images/httpd_logo_wide_new.png" class="h-8 mr-3" alt="Flowbite Logo" />
      </a>
      <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
        </svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 bg-gray-900 border-gray-700">
          <li>
            <a href="http://localhost" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500 flex items-center justify-center" aria-current="page">
              <svg xmlns="http://www.w3.org/2000/svg" height="0.875em" viewBox="0 0 576 512" style="fill:white;">
                <path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
              </svg>
              <span class="ml-2">Home</span>
            </a>
          </li>
          <li>
            <a href="http://localhost/phpmyadmin" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent flex">
              <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4f/PhpMyAdmin_logo.svg/1200px-PhpMyAdmin_logo.svg.png" class="h-6" alt="">
              <span class="ml-2">phpMyAdmin</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div style="height: 80vh; display: flex; align-items: center; justify-content: center;">
    <div class="grid grid-cols-1 md:grid-cols-2">
      <div class="flex justify-end">
        <img class="w-96 mr-3" src="./apache-arch.png" alt="...">
      </div>
      <div class="text-white">
        <h1 class="font-bold">Host</h1>
        <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
          <?php
          $hostsFile = '/etc/hosts';
          $hosts = file($hostsFile);
          $foundVirtualHosts = false;

          foreach ($hosts as $line) {
            if (trim($line) == '#virtual hosts') {
              $foundVirtualHosts = true;
              continue;
            }

            if ($foundVirtualHosts) {
              $trimmedLine = trim($line);
              if (empty($trimmedLine)) {
                break; // Salir del bucle cuando se haya terminado de listar los hosts
              }

              // Verificar si la línea está comentada
              $isDisabled = (strpos($trimmedLine, '#') === 0);

              if ($isDisabled) {
                $host = substr($trimmedLine, 1); // Eliminar el carácter de comentario (#)
                echo '<li class="flex items-center">
                        <svg class="w-4 h-4 mr-1.5 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        <span style="color: gray;">' . $host . '</span>
                      </li>';
              } else {
                $hostParts = explode(' ', $trimmedLine);
                $ip = $hostParts[0];
                $hostname = $hostParts[1];
                echo '<li class="flex items-center font-medium text-blue-600 hover:text-blue-900">
                        <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="http://' . $hostname . '">' . $ip . ' ' . $hostname . '</a>
                      </li>';
              }
            }
          }
          ?>
        </ul>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>
