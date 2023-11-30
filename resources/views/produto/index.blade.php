@php

@endphp
@extends('templateAdmin.index')

@section('content')

    <h2 class="text-dark my-5">Produtos</h2>
    <div class="d-flex justify-content-center">
        <div class="d-flex flex-column">

          <form action="/produto/filtrar/id_marca" method="post">
            @csrf
              <select class="form-control" name="id_marca" aria-label="Default select example">
                  <option selected value="0">Selecione a marca</option>
                  @foreach ($marcas as $marca)
                      <option value="{{ $marca['id'] }}">
                          {{ $marca['nome'] }}
                      </option>
                  @endforeach
              </select>

                <button class="btn btn-success d-flex align-items-center justify-content-center mt-2 px-5 w-100">Filtrar</button>
            </form>
        </div>

        <div class="d-flex flex-column ml-5">
          <form action="/produto/filtrar/id_categoria" method="post">
            @csrf
            <select class="form-control" name="id_categoria" aria-label="Default select example">
                <option selected value="0">Selecione a categoria</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria['id'] }}">
                        {{ $categoria['nome'] }}
                    </option>
                @endforeach
            </select>

            <button class="btn btn-success d-flex align-items-center justify-content-center mt-2 w-100" >Filtrar</button>
            </form>

        </div>
    </div>

    <div class="produtos-container">
        <?php
            foreach($produtos as $produto) {
                echo '<div class="card borda-card mt-4 py-2 px-3" style="width: 14rem;">
                <img class="card-img-top" src="' . $produto['img_url'] . '" height="170">
                <div class="card-body py-0">
                  <div class="d-flex mt-4 justify-content-between">
                      <p class="card-categoria">' . $produto['categoriaNome'] . '</p>
                      <p class="card-categoria">' . $produto['marcaNome'] . '</p>
                  </div>
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
