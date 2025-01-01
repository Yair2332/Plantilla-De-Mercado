<?php 

require './php/conexion.php';
$db= new Database();
$con= $db->conexion();

$sql= $con->prepare("SELECT * FROM producto");
$sql->execute();
$resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mercado</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
</head>

<body>

  <!--Header/navegacion-->
  <header class="container-fluid">
    <div class="container">
      <nav class="navbar navbar-expand-lg rounded" aria-label="Eleventh navbar example">
        <div class="container-fluid">
          <!--Nombre de tienda-->
          <a class="navbar-brand" href="#">Tienda Online</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09"
            aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarsExample09">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
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
            <!--Formulario para busqueda de productos-->
            <form role="search">
              <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            </form>

          </div>

          <div id="btn_carro" class="d-inline-flex gap-1 mx-1">
            <!--Boton de carrito-->
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
              aria-expanded="false" aria-controls="collapseExample">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-dash"
                viewBox="0 0 16 16">
                <path d="M6.5 7a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1z" />
                <path
                  d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
              </svg>
            </button>
            <div class="collapse" id="collapseExample">
              <div class="card card-body">
                <!--Items de carro-->
                <div class="card d-flex justify-content-center align-items-center position-relative"
                  style="max-width: 100%;" onclick="rellenarModal(1)">
                  <button type="button" class="btn-close position-absolute" aria-label="Close"></button>
                  <div class="row g-0 d-flex justify-content-center align-items-center">
                    <div class="cont_img_carro item_info">
                      <img src="./assets/collection/pro_1/img1.png" class="img-fluid rounded-start img_carro" alt="...">
                    </div>
                    <div class="item_info">
                      <div class="card-body">
                        <h5 class="card-title fs-6">Wooden chair</h5>
                        <p class="card-text">$65.00</p>
                      </div>
                    </div>
                  </div>
                </div>


                <!--Boton de compra-->
                <button type="button" class="btn btn-primary btn-sm mt-2">Comprar</button>
              </div>
            </div>
          </div>

        </div>
      </nav>
  </header>


  <!--Banner-->
  <section id="banner" class="container-fluid">
    <!--Carrusel-->
    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
          aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">

        <!--Primer item-->
        <div class="carousel-item active">
          <div class="container-fluid">
            <div class="carousel-caption text-start d-flex">
              <div class="baner_info">
                <h1>Example headline.</h1>
                <p class="opacity-75">Some representative placeholder content for the first slide of the carousel.</p>
                <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
              </div>
              <img src="./assets/img/slider1.png" alt="" class="img_banner">
            </div>
          </div>
        </div>

        <!--Segundo item-->
        <div class="carousel-item ">
          <div class="container-fluid">
            <div class="carousel-caption text-start d-flex">
              <div class="baner_info">
                <h1>Example headline.</h1>
                <p class="opacity-75">Some representative placeholder content for the first slide of the carousel.</p>
                <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
              </div>
              <img src="./assets/img/slider3.png" alt="" class="img_banner">
            </div>
          </div>
        </div>

        <!--Tercer item-->
        <div class="carousel-item">
          <div class="container-fluid">
            <div class="carousel-caption text-start d-flex">
              <div class="baner_info">
                <h1>Example headline.</h1>
                <p class="opacity-75">Some representative placeholder content for the first slide of the carousel.</p>
                <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
              </div>
              <img src="./assets/img/slider3.png" alt="" class="img_banner">
            </div>
          </div>
        </div>
      </div>

      <!--Botones de siguiente-->
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>


  <!--Productos-->
  <main>

    <div class="album py-5 bg-body-tertiary">
      <!--Introduccion a productos-->
      <figure class="text-center">
        <p class="h1">Productos</p>
        <blockquote class="blockquote">
          <p>A well-known quote, contained in a blockquote element.</p>
        </blockquote>
        <figcaption class="blockquote-footer">
          Someone famous in <cite title="Source Title">Source Title</cite>
        </figcaption>
      </figure>

      <div class="container">

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-2">

          <!--Producto-->
          <?php foreach($resultado as $row){ ?>
            <div class="col">
              <div class="card producto" onclick="rellenarModal(<?php echo $row['id'] ?>)">
                <div class="cont_img">
                  <img class="img_producto" id="img_product_<?php echo $row['id'] ?>" src="./assets/collection/pro_<?php echo $row['id'] ?>/img1.png" alt="">
                </div>
                <div class="card-body">
                  <p class="card-text text-center" id="nom_product_<?php echo $row['id'] ?>"><?php echo $row['nombre'] ?></p>
                  <p class="card-text text-center" id="valor_product_<?php echo $row['id'] ?>">$<?php echo $row['valor'] ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group w-100">
                      <button type="button" class="btn btn-sm btn-outline-primary">Ver</button>
                      <button type="button" class="btn btn-sm btn-outline-primary">Comprar</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php }; ?>


          <div class="col">
            <div class="card producto" onclick="rellenarModal(2)">
              <div class="cont_img">
                <img class="img_producto" id="img_product_2" src="./assets/collection/pro_2/img1.png" alt="">
              </div>
              <div class="card-body">
                <p class="card-text text-center" id="nom_product_2">Wooden chair</p>
                <p class="card-text text-center" id="valor_product_2">$65.00</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group w-100">
                    <button type="button" class="btn btn-sm btn-outline-primary">Ver</button>
                    <button type="button" class="btn btn-sm btn-outline-primary">Comprar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>



    </div>




    <!-- Button trigger modal -->
    <button id="btn_modal" type="button" class="btn btn-primary" data-bs-toggle="modal"
      data-bs-target="#staticBackdrop"></button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <!--Nombre modal-->
            <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="cont_img">
              <img class="img_producto" id="img_modal" src="" alt="">
            </div>

            <!--Botones modal-->
            <div id="contenedor_btn">
              <button class="cont_img"><img id="img_modal_1" class="img_producto" src="" alt=""></button>
              <button class="cont_img"><img id="img_modal_2" class="img_producto" src="" alt=""></button>
              <button class="cont_img"><img id="img_modal_3" class="img_producto" src="" alt=""></button>
              <button class="cont_img"><img id="img_modal_4" class="img_producto" src="" alt=""></button>
              <button class="cont_img"><img id="img_modal_5" class="img_producto" src="" alt=""></button>
            </div>


            <!--Introduccion a producto-->
            <figure class="text-center">
              <blockquote class="blockquote">
                <p id="descripcion_modal">A well-known quote, contained in a blockquote element.</p>
              </blockquote>
            </figure>
          </div>

          <div class="modal-footer d-flex justify-content-between align-items-center">
            <p class="fw-bold fs-5" id="valor_modal"></p>
            <div>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Understood</button>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>

  <!-- Informacion -->
  <section class="container mt-5">

    <!-- introduccion informacion -->
    <figure class="text-center">
      <p class="h1 text-light">Sobre nosotros</p>
      <blockquote class="blockquote">
        <p class="text-light">A well-known quote, contained in a blockquote element.</p>
      </blockquote>
      <figcaption class="blockquote-footer text-light">
        Someone famous in <cite title="Source Title">Source Title</cite>
      </figcaption>
    </figure>

    <hr class="featurette-divider">

    <!-- primer informe -->
    <div class="row featurette text-light">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">First featurette heading. It’ll blow your mind.</h2>
        <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.
        </p>
      </div>
      <div class="col-md-5">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
          height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
          preserveAspectRatio="xMidYMid slice" focusable="false">
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="var(--bs-secondary-bg)" /><text x="50%" y="50%"
            fill="var(--bs-secondary-color)" dy=".3em">500x500</text>
        </svg>
      </div>
    </div>

    <hr class="featurette-divider">

    <!-- segundo informe -->
    <div class="row featurette text-light">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading fw-normal lh-1">Oh yeah, it’s that good. See for yourself.</h2>
        <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this
          layout would work with some actual real-world content in place.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
          height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
          preserveAspectRatio="xMidYMid slice" focusable="false">
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="var(--bs-secondary-bg)" /><text x="50%" y="50%"
            fill="var(--bs-secondary-color)" dy=".3em">500x500</text>
        </svg>
      </div>
    </div>

    <hr class="featurette-divider">

    <!-- tercer informe -->
    <div class="row featurette text-light">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">And lastly, this one. Checkmate.</h2>
        <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really
          intended to be actually read, simply here to give you a better view of what this would look like with some
          actual content. Your content.</p>
      </div>
      <div class="col-md-5">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
          height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
          preserveAspectRatio="xMidYMid slice" focusable="false">
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="var(--bs-secondary-bg)" /><text x="50%" y="50%"
            fill="var(--bs-secondary-color)" dy=".3em">500x500</text>
        </svg>
      </div>
    </div>


  </section>

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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

  <script src="./script.js"></script>
</body>

</html>