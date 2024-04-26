<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinhoLista() {
        //getContent Vai retornar o conteudo do carrinho
        $itens = \Cart::getContent();
        return view('site.carrinho', compact('itens'));
    }

    public function adicionaCarrinho(Request $request) {
        // \Cart::add adiciona itens ao nosso carrinho
        // request ele vai ter todas as informações da requisição http
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantidade,
            'attributes' => array(
                'image' => $request->img
            )
        ]);

        return redirect()->route('site.carrinho')->with('sucesso', 'Produto Adicionado no Carrinho');
    }
    

    public function removeCarrinho(Request $request) {
        \Cart::remove($request->id);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto Removido do Carrinho');
    }

    public function atualizaCarrinho(Request $request) {
        \Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity
            ],
        ]);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto Atualizado do Carrinho');
    }

    public function limparCarrinho() {
        \Cart::clear();
        return redirect()->route('site.carrinho')->with('aviso', 'Você esvaziou seu Carrinho');
    }
}
