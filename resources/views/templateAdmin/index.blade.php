<?php
    session_start();
    $qtd_carrinho = 0;

    if (isset($_SESSION['carrinho'])) {
        $qtd_carrinho = count($_SESSION['carrinho']);
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Loja</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/css/sb-admin-2.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

</head>

<body id="page-top">

    <div class="container mt-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-white d-flex justify-content-between">
            <a class="navbar-brand" href="/produto">LOJA</a>
             
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                <a class='btn btn-info' href='/produto/carrinho'>
                    Finalizar Compra ( {{$qtd_carrinho}} )
                </a>
            </div>
        </nav>


            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <div class="container-fluid mt-5">
                        @yield('content')
                    </div>

                </div>
            </div>

    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>


</body>

</html>
