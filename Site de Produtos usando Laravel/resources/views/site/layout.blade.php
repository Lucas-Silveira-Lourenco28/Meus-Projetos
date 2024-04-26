<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('Layout')</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>
<body>

    <!-- Dropdown Structure -->
    <ul id='dropdown1' class='dropdown-content'>
      @foreach ($categoriasMenu as $CategoriaM)
      <li><a href="{{ Route('site.categoria', $CategoriaM->id)}}">{{$CategoriaM->Nome}}</a></li>
      @endforeach
      
     

    </ul> 

    <nav class="red">
        <div class="nav-wrapper container">
          <a href="{{ route('site.index') }}" class="brand-logo">Tech Store</a>
          <ul id="nav-mobile" class="right">
            <li><a href=" {{Route('site.index')}}">Home</a></li>
            <li><a href="" class="dropdown-trigger" data-target="dropdown1" > Categorias <i class="material-icons right">expand_more</i></a></li>
            <li><a href="{{Route('site.carrinho')}}">Carrinho <span class="black"> {{\Cart::getContent()->count()}} </span></a></li>
          </ul>
        </div>
      </nav>
            
    @yield('conteudo')
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!--Inicialização do Dropdown-->
    <script>
      var elemDrop = document.querySelectorAll('.dropdown-trigger');
      var instanceDrop = M.Dropdown.init(elemDrop, {
        coverTrigger: false,
        constrainWidth: false
      });
    </script>
</body>
</html>