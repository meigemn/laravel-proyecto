<!-- component -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<style type="text/css">
      .text-9xl{
      font-size: 14rem;
      }
      @media(max-width: 645px){
      .text-9xl{
      font-size: 5.75rem;
      }
      .text-6xl{
      font-size: 1.75rem;
      }
      .text-2xl {
      font-size: 1rem;
      line-height: 1.2rem;
      }
      .py-8 {
      padding-top: 1rem;
      padding-bottom: 1rem;
      }
      .px-6 {
      padding-left: 1.2rem;
      padding-right: 1.2rem;
      }
      .mr-6{
      margin-right: 0.5rem;
      }
      .px-12 {
      padding-left: 1rem;
      padding-right: 1rem;
      }
      }
    </style>
</head>
<body>
<div class="bg-gradient-to-r from-purple-300 to-blue-200">
<div class="w-9/12 m-auto py-16 min-h-screen flex items-center justify-center">
<div class="bg-white shadow overflow-hidden sm:rounded-lg pb-8">
<div class="border-t border-gray-200 text-center pt-8">
<h1 class="text-9xl font-bold text-purple-400">404</h1>
<h1 class="text-6xl font-medium py-8">oops! Parece que te has sido baneado</h1>
<p class="text-2xl pb-8 px-12 font-medium">El admin ominpotente ha decidido que no pasas los minimos deseables</p>
<p class="text-2xl pb-8 px-12 font-medium">:(</p>
<div class="group relative px-4 cursor-pointer transition-all duration-200 hover:text-red-500">
    {{-- formulario para logout --}}
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <!-- Contenedor del ícono con confirmación -->
    <div onclick="if(confirm('¿Seguro que quieres cerrar sesión?')) { document.getElementById('logout-form').submit() }"
        class="flex h-10 w-10 items-center justify-center rounded-full hover:bg-red-50 transition-colors"
        role="button" tabindex="0"    
    >
       <p>Salir </p>
    </div>
</div>

</div>
</div>
</div>
</div>
</body>
</html>