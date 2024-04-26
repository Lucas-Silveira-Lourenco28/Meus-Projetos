@extends('site\layout')
@section('Layout', 'Detalhes' )
@section('conteudo')

<div class="row container">
    <div class="col s12 m6" >
        <img src="{{$produto->imagem}}" class="responsive-img">
    </div>

    <div class="col s12 m6" >
        <h3>{{$produto->Nome}}</h3>
        <h4>R$ {{number_format($produto->Preço, 2, ',', '.')}}</h4>
        <p>{{$produto->Descrição}}</p>
        <p>Postado por: {{$produto->user->firstName}}</p>
        <p>A categoria é: {{$produto->categoria->Nome}}</p>

        <form action="{{ Route('site.addcarrinho')}}" method="POST" enctype="multipart/form-data">
            <!--csrf ele vai gerar um input invisivel e vai gerar um tokken para proteger nossa aplicação-->
            @csrf
            <input type="hidden" name="id" value="{{$produto->id}}">
            <input type="hidden" name="name" value="{{$produto->Nome}}">
            <input type="hidden" name="price" value="{{$produto->Preço}}">
            <input type="number" name="quantidade" value="1">
            <input type="hidden" name="img" value="{{$produto->imagem}}">
        <button class="btn orange btn-large"> Comprar </button>
        </form>
    </div>
</div>

@endsection