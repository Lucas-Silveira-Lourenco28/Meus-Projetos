@extends('site\layout')
@section('Layout', 'carrinho' )
@section('conteudo')
{{--Vamos usar essa pagina para listar os produtos--}}
    <div class="row container">

        @if ($mensagem = Session::get('sucesso'))
          <div class="card green">
            <div class="card-content white-text">
              <span class="card-title">Perfeito!</span>
              <p>{{ $mensagem }}</p>
            </div>
          </div>

        @endif


        @if ($mensagem = Session::get('aviso'))
        <div class="card purple">
          <div class="card-content white-text">
            <span class="card-title">Poxa</span>
            <p>{{ $mensagem }}</p>
          </div>
        </div>

      @endif

        <h4>Seu carrinho Possui: {{ $itens->count() }} Produtos.</h4>

        
        <table class="striped">
            <thead>
              <tr>
                  <th></th>
                  <th>Nome</th>
                  <th>Preço</th>
                  <th>Quantidade</th>
                  <th></th>
              </tr>
            </thead>
    
            <tbody>
              @foreach ($itens as $listagem)
              <tr>
                <td><img src="{{$listagem->attributes->image}}" alt="" width="70" class="responsive-img circle"></td>
                <td>{{$listagem->name}}</td>
                <td>R$ {{number_format($listagem->price, 2, ',', '.')}}</td>


                {{--BOTÃO ATUALIZAR--}}
                <form action="{{ route('site.atualizacarrinho') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                <td><input style="width: 40px" type="number" class="white center" name="quantity" value="{{$listagem->quantity}}"></td>
                <td>
                    <input type="hidden" name="id" value="{{ $listagem->id }}"> 
                    <button class="btn-floating waves-effect waves-light green"><i class="material-icons">refresh</i></button>
                </form>
                
                {{--BOTÃO DELETAR--}}
                <form action="{{ route('site.removecarrinho') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <input type="hidden" name="id" value="{{ $listagem->id }}"> 
                      <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                </form>
                </td>


              </tr>
              <tr>
              @endforeach        
            </tbody>
          </table>

          <h5>Valor Total: R$ {{ number_format(\Cart::getTotal(), 2, ',', '.')}} </h5>

          <div class="row container center"> 
            <a href="{{ route('site.index') }}" class="btn waves-effect waves-light blue">Continuar Comprando<i class="material-icons right">arrow_back</i></a>
            <a href="{{ route('site.limparcarrinho') }}" class="btn waves-effect waves-light orange">Limpar carrinho<i class="material-icons right">clear</i></a> 
            <button class="btn waves-effect waves-light green">Finalizar pedido<i class="material-icons right">check</i></button> 
          </div>
                
      
        
    </div>

  
@endsection

