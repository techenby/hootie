<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <x-favicon />

        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-100 dark:bg-gray-900">
        {{ $slot }}
    </body>
</html>
