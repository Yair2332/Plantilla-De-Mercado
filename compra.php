<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">

    <style>
        body {
            padding: 0px;
        }

        header {
            position: relative;
        }
    </style>
</head>

<body>
    <div class="sombra"></div>
    <!--Header/navegacion-->
    <header class="container-fluid">
        <div class="container">
            <nav class="navbar navbar-expand-lg rounded" aria-label="Eleventh navbar example">
                <div class="container-fluid">
                    <!--Nombre de tienda-->
                    <img src="https://i0.wp.com/www.sitemarca.com/wp-content/uploads/2019/05/primary-blue.png" alt=""
                        id="img_logo">
                    <a class="navbar-brand" href="#">Tienda Online</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarsExample09">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                    aria-expanded="false">Dropdown</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>

                    </div>



                </div>
            </nav>
    </header>


    <div class="container mt-2 detalles">
        <h1 class="text-center mb-3 text-light  detalles_titulo">Detalles de Compra</h1>

        <!-- Lista de productos -->
        <div class="row">
            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lista de Productos</h5>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="productos_detalles">


                            </tbody>
                        </table>
                        <div class="text-end">
                            <p class="total-price" id="precio_final"></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulario de pago -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Métodos de Pago</h5>

                        <div class="payment-method">
                            <select class="form-select" id="paymentMethod" onchange="toggleCardForm()">
                                <option value="">Seleccione un método</option>
                                <option value="card">Tarjeta de Crédito/Débito</option>
                                <option value="paypal">PayPal</option>
                                <option value="transfer">Transferencia Bancaria</option>
                            </select>
                        </div>

                        <div id="cardForm" class="mt-3" style="display: none;">
                            <h6>Formulario de Tarjeta</h6>
                            <div class="mb-3">
                                <label for="cardNumber" class="form-label">Número de Tarjeta</label>
                                <input type="text" class="form-control" id="cardNumber"
                                    placeholder="1234 5678 9012 3456">
                            </div>
                            <div class="mb-3">
                                <label for="cardHolder" class="form-label">Nombre del Titular</label>
                                <input type="text" class="form-control" id="cardHolder" placeholder="Nombre completo">
                            </div>
                            <div class="mb-3 row">
                                <div class="col">
                                    <label for="expiryDate" class="form-label">Fecha de Expiración</label>
                                    <input type="month" class="form-control" id="expiryDate">
                                </div>
                                <div class="col">
                                    <label for="cvv" class="form-label">CVV</label>
                                    <input type="password" class="form-control" id="cvv" placeholder="123">
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary mt-3 w-100">Pagar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Footer-->
    <footer class="bg-white">
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-4 border-top">
                <p class="col-md-4 mb-0 text-body-secondary">&copy; 2024 Company, Inc</p>

                <a href="/"
                    class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <svg class="bi me-2" width="40" height="32">
                        <use xlink:href="#bootstrap" />
                    </svg>
                </a>

                <!-- secciones de informacion -->
                <ul class="nav col-md-4 justify-content-end">
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
                </ul>
            </footer>
        </div>

    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./script.js"></script>
    <script>
        toggleCardForm()
        cargarDetallesDeVenta()
        calcular_precio_final()
    </script>

</body>

</html>



