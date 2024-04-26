@extends('site\layout')
@section('Layout', 'Home' )
@section('conteudo')
{{--Vamos usar essa pagina para listar os produtos--}}
    <div class="row container">

        @foreach ($produtos as $listagem)
            <div class="col s12 m4">
              <div class="card">
                  <div class="card-image">
                    <img src="{{$listagem->imagem}}">
                    <a href="{{ Route('site.details', $listagem->slug) }}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>
                  </div>
                  <div class="card-content">
                    <span class="card-title">{{$listagem->Nome}}</span>
                    <p>{{Str::limit($listagem->Descrição, 20)}}</p>
                  </div>
                </div>
            </div>
        @endforeach
        
    </div>

    <div class="row center">
      {{$produtos->links('custom.pagination')}}
    </div>
@endsection

