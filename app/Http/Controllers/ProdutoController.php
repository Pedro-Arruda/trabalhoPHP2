<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Venda;
use App\Models\ProdutoVendido;

class ProdutoController extends Controller {

    public function index() {
        $produtos = Produto::select(
            'produtos.id',
            'produtos.nome',
            'produtos.preco',
            'produtos.img_url',
            'categorias.nome as categoriaNome',
        )
        ->join('categorias', 'categorias.id', '=', 'produtos.id_categoria')
        ->get();

        $categorias = Categoria::all()->toArray();
        $marcas = Marca::all()->toArray();

         return view("produto.index"
         , [
            'produtos' => $produtos,
            'categorias' => $categorias,
            'marcas' => $marcas,
        ]
      );
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

    public function filtra_produtos($tipoFiltro, Request $request) {
          $produtos = Produto::select(
            'produtos.id',
            'produtos.nome',
            'produtos.preco',
            'produtos.img_url',
            'categorias.nome as categoriaNome',
            'marca.nome as marcaNome',
        )
        ->join('categorias', 'categorias.id', '=', 'produtos.id_categoria')
        ->join('marca', 'marca.id', '=', 'produtos.id_marca')
        ->where($tipoFiltro, '=', $request->input($tipoFiltro))
        ->get();

        $categorias = Categoria::all()->toArray();
        $marcas = Marca::all()->toArray();

        return view("produto.index", [
            'produtos' => $produtos,
            'categorias' => $categorias,
            'marcas' => $marcas,
        ]);
      }

     

      public function carrinho() {
        // session_start();

        // if (!isset($_SESSION['carrinho']) || count($_SESSION['carrinho']) == 0) {
        //     return redirect("/produto");
        // }

        return view("produto.carrinho");

        // array_push($_SESSION['carrinho'], $produtoId);

    }

    public function finaliza_compra(Request $request) {
      session_start();
  
      $email = $request->input('email');
      $total = $request->input('total'); 
  
      $venda = new Venda;
      $venda->email = $request->input('email');
      $venda->valor_total = $total;
      $venda->save();
      
      $vendaId = $venda->id;
  
      $produtosNoCarrinho = array_count_values($_SESSION['carrinho']);
  
      foreach ($produtosNoCarrinho as $produto_id => $quantidade) {
          $produto = Produto::find($produto_id);
  
          if ($produto) {
              $produtoVendido = new ProdutoVendido;
              $produtoVendido->produto_id = $produto_id;
              $produtoVendido->venda_id = $vendaId;
              $produtoVendido->quantidade = $quantidade;
              $produtoVendido->save();
          }
      }
  
      session_destroy();
  
      return redirect("/produto");


    }
}
