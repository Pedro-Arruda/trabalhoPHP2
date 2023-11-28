<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Marca;

class ProdutoController extends Controller {

    public function index() {
        $produtos = Produto::select(
            'produto.id',
            'produto.nome',
            'produto.preco',
            'produto.quantidade',
            'produto.descricao',
            'produto.img_url',
            'categorias.nome as categoriaNome',
        )
        ->join('categorias', 'categorias.id', '=', 'produto.id_categoria')
        ->get();

        $categorias = Categoria::all()->toArray();
        $marcas = Marca::all()->toArray();

         return view("produto.index", [
            'produtos' => $produtos,
            'categorias' => $categorias,
            'marcas' => $marcas,
        ]);
    }

    public function adiciona_carrinho() {
        session_start();
        $produtoId = $_GET['produtoId'];

        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }

        array_push($_SESSION['carrinho'], $produtoId);

        return redirect("/produto");

    }

    public function filtra_produtos($filtro, $tipoFiltro) {
        var_dump($filtro, $tipoFiltro);
        // $produtos = Produto::select(
        //     'produto.id',
        //     'produto.nome',
        //     'produto.preco',
        //     'produto.quantidade',
        //     'produto.descricao',
        //     'produto.img_url',
        //     'categorias.nome as categoriaNome',
        // )
        // ->join('categorias', 'categorias.id', '=', 'produto.id_categoria')
        // ->where($tipoFiltro, '=', $filtro)
        // ->get();

        // $categorias = Categoria::all()->toArray();
        // $marcas = Marca::all()->toArray();

        // return view("produto.index", [
        //     'produtos' => $produtos,
        //     'categorias' => $categorias,
        //     'marcas' => $marcas,
        // ]);
    }


    public function salvar_alterar(Request $request) {
        $input_id = $request->input("id");

        $cor = Cor::find($input_id);

        $cor->nome = $request->input("nome");
        $cor->situacao = $request->input("situacao");

        $cor->save();

        return redirect("/cor");
        exit;
    }
}
