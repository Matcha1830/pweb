<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset ('css/style.css') }}" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Perpustakaan</title>
  </head>

  <body>
    @include('layouts.sidebar-admin')
    @yield('admin')

    <script src="js/script.js"></script>
  </body>
</html>
