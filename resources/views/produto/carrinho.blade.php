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
  <title>Carrinho</title>
</head>

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

      <a href='/produto/finaliza-compra' class='btn-finaliza-compra '>
        Finalizar compra
      </a>
    </div>
  </div>
  <?php
}
?>
  </div>
</div>

</body>

</html>