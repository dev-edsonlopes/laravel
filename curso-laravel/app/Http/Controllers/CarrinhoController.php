<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinhoLista()
    {
        $items = \Cart::getContent();
        // dd($items);
        return view('layout.carrinho', compact('items'));
    }

    public function adicionarCarrinho(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => abs($request->qnt),
            'attributes' => array(
                'image' => $request->img
            )
        ]);

        return redirect()->route('layout.carrinho')->with('add', 'Produto adicionado com sucesso!');
    }

    public function removerCarrinho(Request $request)
    {   
        // dd($request);
        \Cart::remove($request->id);

        return redirect()->route('layout.carrinho')->with('delete', 'Produto removido com sucesso!');
    }

    public function atualizarCarrinho(Request $request)
    {
        \Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => abs($request->quantity)
            ]
            ]);

            return redirect()->route('layout.carrinho')->with('update', 'Produto atualizado com sucesso!');
    }

    public function limparCarrinho() {
        \Cart::clear();

        return redirect()->route('layout.carrinho')->with('aviso', 'Seu carrinho foi limpado com sucesso!');
    }
}
