<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Almacen e inventario</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Styles -->


@livewireStyles
</head>


<body>
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Bienvenido Al Modulo de Almacen e Inventario</h1>

      @if (Route::has('login'))
      <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
          @auth
              <a href="{{ url('/home') }}" class="btn-get-started"">Ir al inventario</a>
          @else
          <a  href="{{ route('login') }}" class="btn-get-started">Ingresar</a>

              @if (Route::has('register'))
              <a  href="{{ route('register') }}" class="btn-get-started">Registrarse</a>
              @endif
          @endauth
      </div>
  @endif
    </div>
  </section><!-- End Hero Section -->
  @livewireScripts
</body>

</html>
