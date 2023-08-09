<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class SiteController extends Controller {
    public function index() {
        $produtos = Produto::paginate(4);
        return view('layout.home', compact('produtos'));
    }

    public function details($slug) {
        $produto = Produto::where('slug', $slug)->first();
        return view('layout.details', compact('produto'));
    }

    public function categoria($id) {
        $categoria = Categoria::find($id);
        $produtos = Produto:: where('id', $id)->paginate(4);
        return view('layout.categoria', compact('produtos', 'categoria'));
    }
}