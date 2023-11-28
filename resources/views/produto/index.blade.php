<?php
    session_start();

    $qtd_carrinho = 0;

    if (isset($_SESSION['carrinho'])) {
        $qtd_carrinho = count($_SESSION['carrinho']);
    }
?>


@extends('templateAdmin.index')

@section('content')
    {{-- <h2 class="text-dark">Categorias</h2>

    <div class="container-categorias">
        <?php
             foreach($categorias as $categoria) {
                echo '<div class="card borda-card mt-4 py-2 px-3" style="width: 11rem;">
                        <img class="card-img-top" src="' . $categoria['img_url'] . '" height="140">
                        <div class="card-body py-0">
                            <p class="card-produto">' . $categoria['nome'] . '</p>
                        </div>
                    </div>';
            };

            foreach($categorias as $categoria) {
                echo '<div class="card borda-card mt-4 py-2 px-3" style="width: 11rem;">
                        <img class="card-img-top" src="' . $categoria['img_url'] . '" height="130">
                        <div class="card-body py-0">
                            <p class="card-produto">' . $categoria['nome'] . '</p>
                        </div>
                    </div>';
            }
        ?>
    </div> --}}

    {{-- <div class="categorias-recentes">
        <?php
            for ($i=0; $i < 2; $i++) {
                echo '
                <div class="card borda-card mt-4" style="width: 32rem;">
                    <img class="card-img-top" src="
                    https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRaxiVAL1Mz1YOgt8Q-1L3pVLPlfZqQ9ys30Q&usqp
                    =CAU" alt="Card image cap"
                    height="150">
                    <div class="card-body">
                    <p class="card-text">Categoria 1</p>
                    </div>
                </div>
                ';
            };
        ?>
    </div> --}}

    <h2 class="text-dark mt-5">Produtos mais vendidos</h2>
    <div class="d-flex justify-content-center">
        <div class="d-flex flex-column">
            <select class="form-control" name="marca" aria-label="Default select example">
                <option selected value="0">Selecione a marca</option>
                @foreach ($marcas as $marca)
                    <option value="{{ $marca['id'] }}">
                        {{ $marca['nome'] }}
                    </option>
                @endforeach
            </select>

            <form action="{{ url('/produto/filtrar/id_categoria/'  . $id_categoria) }}" method="post">
                <a class="btn btn-success d-flex align-items-center justify-content-center mt-1" href="{{ url('/produto/filtrar/id_categoria'  . $id_categoria) }}">Filtrar</a>
            </form>
        </div>

        <div class="d-flex flex-column ml-5">
            <select class="form-control" name="categoria" aria-label="Default select example">
                <option selected value="0">Selecione a categoria</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria['id'] }}">
                        {{ $categoria['nome'] }}
                    </option>
                @endforeach
            </select>

            <a class="btn btn-success d-flex align-items-center justify-content-center mt-1" href="/produto/filtrar/teste/id_categoria">Filtrar</a>
        </div>
    </div>

    <div class="produtos-container">
        <?php
            foreach($produtos as $produto) {
                echo '<div class="card borda-card mt-4 py-2 px-3" style="width: 14rem;">
                            <img class="card-img-top" src="' . $produto['img_url'] . '" height="170">
                            <div class="card-body py-0">
                                <p class="card-categoria mt-4">' . $produto['categoriaNome'] . '</p>
                                <p class="card-produto">' . $produto['nome'] . '</p>
                                <div class="d-flex flex-column justify-content-between">
                                    <p>R$ ' . $produto['preco'] . '</p>
                                    <div>
                                        <a class="card-btn py-3" href="/produto/salvar_produto?produtoId=' . $produto['id'] . '">+</a>
                                    </div>
                                </div>
                            </div>
                        </div>';
            }

        ?>
    </div>



    </div>

@endsection
