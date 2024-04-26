<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Produto; 
use \App\Models\Categorias; 

class SiteController extends Controller
{
    public function index()
    {
        //return 'index';
        $produtos = Produto::paginate(3);
        //return dd($produtos);

        return view('site/home', compact('produtos'));
    }

    public function details($slug) {
        // where: onde slug la do model produto vai ser igual ao slug que está sendo passado por parametro
        // first = Vai retorna apenas um registro
        $produto = Produto::where('slug', $slug)->first();
        return view('site.details', compact('produto'));
    }

    public function categoria($id) {
        //find() o laravel consegue buscar a categoria pelo seu id de forma automatica
        $categoria = Categorias::find($id);
        $produtos = Produto::where('id_categoria', $id)->paginate(6);
        return view('site.categoria', compact('produtos', 'categoria'));
    }

}
