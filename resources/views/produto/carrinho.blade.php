<?php
session_start();

use App\Models\Produto;

?>

<!DOCTYPE html>
<html lang="en">

<body>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/carrinho.css">
  <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/css/sb-admin-2.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
  <title>Carrinho</title>
</head>

<div class="container mt-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-white d-flex justify-content-between">
            <a class="navbar-brand" href="/produto">LOJA</a>
        </nav>
    </div>

<div class="container">
  <table>
        <tr>
          <td>Produto</td>
          <td>Preço</td>
        </tr>
        <?php
        
        if (isset($_SESSION['carrinho'])) {
          foreach ($_SESSION['carrinho'] as $produtoId) {
            $produto = Produto::find($produtoId);

            echo "
                  <tr>  
                      <td >
                        <div class='td-produto'>
                          <img src='{$produto->img_url}' width='130'>
                          <span>
                            {$produto->nome}
                          </span>
                        </div>
                      </td>
                     
                      </td>
                        <td class='valor'>
                          R$ {$produto->preco}
                        </td>
                      </tr>
                    ";
                  }
                  }
                ?>
  </table>
  <?php
    $total = 0;


if (isset($_SESSION['carrinho']) && count(($_SESSION['carrinho']))) {

  ?>
  <div class='totais-container'>
    <div class='totais'>
      <p>Total: R$ <?php

        $total = array_reduce($_SESSION['carrinho'], function($carry, $item) {
          $item = Produto::find($item);

          return $carry + $item->preco;
        });
        echo number_format($total, 2, ',', '');
        ?> 
      </p>
      <p class='center'>ou</p>
      <p>em 12x de R$ <?php echo number_format($total / 12, 2, ',', '')?></p>

      <form action="/produto/finaliza-compra" method="post">
        @csrf
        <input type="text" value={{$total}} name='total' hidden>

        <button class='btn-finaliza-compra '>
          Finalizar compra
        </button>
  
        <input type="email" name="email" class='py-2 px-4 mt-2' placeholder='Digite seu e-mail para finalizar a compra'>
      </form>
    </div>
  </div>
  <?php
}
?>
  </div>
</div>

</body>

</html>