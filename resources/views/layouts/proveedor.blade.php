<!DOCTYPE html>
<html>
<head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <title>@yield('titulo','Panel de Administracion') | {{auth()->user()->nombre}}</title>
          <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
          <link rel="stylesheet" href="/adminlte/plugins/bootstrap/bootstrap.min.css">

          <!-- Font Awesome Icons -->
          <link rel="stylesheet" href="/vendor/font-awesome/css/fontawesome.min.css">
          <link rel="stylesheet" href="/vendor/font-awesome/css/regular.min.css">
          <link rel="stylesheet" href="/vendor/font-awesome/css/solid.min.css">

          <!-- Theme style -->
          @stack('styles-important')
          <link rel="stylesheet" href="/adminlte/css/skins/skin-blue.min.css">
          <link rel="stylesheet" href="/adminlte/skins/skin-blue-light.min.css">
          <link rel="stylesheet" href="/adminlte/css/adminlte.min.css">
          @stack('styles')

          {{-- Favicon --}}
          <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">

          <!-- Google Font -->
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    @include('admin.proveedor.componentes.navbar')
  </header>

  <div class="content-wrapper">
    @include('componentes.alert')
    <div class="container">

      <section class="content-header">
        <h1>
          @yield('titulo')
          <small>{{auth('proveedor')->user()->nombre}}</small>
        </h1>
      </section>

      <section class="content">
          @yield('contenido')
      </section>

    </div>
  </div>

  <footer class="main-footer text-center">
          <strong>Copyright &copy; {{date('Y')}} <a href="#">Bebidas Cristina Lozano</a>.</strong> Todos los derechos
          reservados.
      </footer>
</div>

    <!-- jQuery 3 -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/adminlte/plugins/bootstrap/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/adminlte/js/adminlte.min.js"></script>
    @stack('scripts')
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
