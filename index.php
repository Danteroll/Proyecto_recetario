<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q' RIQUISIMO</title>
    <script
    defer
    src="https://app.embed.im/snow.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="estilo.css">


</head>
<body>
    <!-- SECCION INICIO -->
    <section id="inicio">
        <header>
            <div class="contenido-header">
                <div class="logo">
                    <h1>Q' RIQUISIMO</h1>
                </div>
                <nav id="nav">
                    <ul>
                        <li>
                            <a href="#inicio" onclick="seleccionar()">
                                <i class="fa-solid fa-house"></i>
                                <span>Inicio</span>
                            </a>
                        </li>
                        <li>
                        <?php
                        session_start();

                        if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == 36) {
                        ?>
                        <a href="BlogMadre_Recetario/admin/index.php?view=posts&opt=all" onclick="seleccionar()">
                            <i class="fa-regular fa-rectangle-list"></i>
                            <span>Mis Recetas</span>
                        </a>
                        <?php
                        } else {
                        }
                        ?>
                        </li>
                        <li>
                            <a href="BlogMadre_Recetario/?view=blog" onclick="seleccionar()">
                                <i class="fa-solid fa-utensils"></i>
                                <span>Ver Recetas</span>
                            </a></li>
                        <li>
                            <a href="BlogMadre_Recetario\core\app\view\blog-view.php" onclick="seleccionar()">
                                <i class="fa-solid fa-pen"></i>
                                <span>Agregar Receta</span>
                            </a>
                        </li>
                        <li>
                            <a href="#contacto" onclick="seleccionar()">
                                <i class="fa-solid fa-comments"></i>
                                <span>Contacto</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="social">
                    <a href="perfil/home.php"><i class="fa-solid fa-user"></i></a> 
                </div>
                <div class="nav-responsive" id="bar" onclick="mostrarOcultarMenu()">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </header>
        <!-- Carrusel -->
        <div class="carrusel">
            <div class="gallery js-flickity" data-flickity-options='{ "wrapAround":true, "pageDots": false, "autoPlay": true}'>
                <div class="gallery-cell" >
                    <img src="img/1.jpg" alt="">
                </div>
                <div class="gallery-cell">
                    <img src="img/2.jpg" alt="">
                </div>
                <div class="gallery-cell">
                    <img src="img/3.jpg" alt="">
                </div>
                <div class="gallery-cell">
                    <img src="img/4.jpg" alt="">
                </div>
            </div>
            <div class="info">
                <h2>Recetas de todo el mundo</h2>
                <p>¿Quieres compartir tu receta favorita de tu localidad?</p>
            </div>
        </div>

    </section>

    <!-- SECCION SABORES -->
    <section id="sabores">
        <h2>Categorias</h2>
        <div class="fila">
            <div class="item">
                <div class="icono">
                    <img src="img/sabor1.png" alt="">
                </div>
                <div class="info">
                    <h3>Ensaladas</h3>
                    <p>Recetas de ensaladas faciles y rapidas.</p>
                </div>
            </div>
            <div class="item">
                <div class="icono">
                    <img src="img/sabor2.png" alt="">
                </div>
                <div class="info">
                    <h3>Pasteles</h3>
                    <p>Pateles ricos capaces de darle un gusto a tu paladar.</p>
                </div>
            </div>
            <div class="item">
                <div class="icono">
                    <img src="img/sabor3.png" alt="">
                </div>
                <div class="info">
                    <h3>Hamburguesas</h3>
                    <p>Una dieta equilibrada es una hamburguesa en ambas manos.</p>
                </div>
            </div>
        </div>

        <div class="fila">
            <div class="item">
                <div class="icono">
                    <img src="img/sabor4.png" alt="">
                </div>
                <div class="info">
                    <h3>Guisos</h3>
                    <p>Guisos de todo tipo, variados al gusto de las personas.</p>
                </div>
            </div>
            <div class="item">
                <div class="icono">
                    <img src="img/sabor5.png" alt="">
                </div>
                <div class="info">
                    <h3>Pastas</h3>
                    <p>Los sabores que te harán sentir bien.</p>
                </div>
            </div>
            <div class="item">
                <div class="icono">
                    <img src="img/sabor6.png" alt="">
                </div>
                <div class="info">
                    <h3>Comida</h3>
                    <p>Todo tipo de comida, toda variedad y exclusividad.</p>
                </div>
            </div>
        </div>

    </section>

    <!-- SECCION PLATOS -->
    <section id="platos">
        <h2>Platos</h2>

        <div class="fila">
            <div class="item">
                <img src="img/plato1.jpg" alt="">
                <p>Chiles Y Alitas De Pollo Frito En Un Plato</p>
            </div>
            <div class="item">
                <img src="img/plato2.jpg" alt="">
                <p>Plato De Ensalada De Pescado</p>
            </div>
            <div class="item">
                <img src="img/plato3.jpg" alt="">
                <p>Plato De Carne Asada Servido En Plato Blanco</p>
            </div>
        </div>
        <div class="fila">
            <div class="item">
                <img src="img/plato4.jpg" alt="">
                <p>Plato de Bife a la Plancha con Papas Fritas</p>
            </div>
            <div class="item">
                <img src="img/plato5.jpg" alt="">
                <p>Plato de Pizza con Rúcula</p>
            </div>
            <div class="item">
                <img src="img/plato6.jpg" alt="">
                <p>Plato de Pastas con Tuco</p>
            </div>
        </div>

    </section>

    <!-- SECCION BLOG -->
    <section id="blog">
        <h2>Blog</h2>
        <div class="galeria-blog js-flickity" data-flickity-options='{ "wrapAround":true, "pageDots": true}'>
            <div class="gallery-cell" >
                <div class="item">
                    <div class="foto">
                        <img src="img/cheff1.jpg" alt="">
                    </div>
                    <div class="info">
                        <h3>El arte de cocinar</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae, repudiandae est maxime quam alias asperiores.</p>
                    </div>
                </div>
            </div>
            <div class="gallery-cell" >
                <div class="item">
                    <div class="foto">
                        <img src="img/cheff2.jpg" alt="">
                    </div>
                    <div class="info">
                        <h3>¿Donde estudiar cocina?</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae, repudiandae est maxime quam alias asperiores culpa minus corporis neque hic sunt dolore.</p>
                    </div>
                </div>
            </div>
            <div class="gallery-cell" >
                <div class="item">
                    <div class="foto">
                        <img src="img/cheff3.jpg" alt="">
                    </div>
                    <div class="info">
                        <h3>La cocina del 2023</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae, repudiandae est maxime quam alias asperiores culpa.</p>
                    </div>
                </div>
            </div>
        </div>
        <button>Leer Más</button>
    </section>

    <!-- SECCION CONTACTO Y PIE DE PAGINA -->
    <section id="contacto">
        <div class="fila">
            <div class="col">
                <h1>Q'RIQUISIMO</h1>
            </div>
            <div class="col">
                <h3>Menú</h3>
                <a href="#inicio">Inicio</a>
                <a href="#sabores">Sabores</a>
                <a href="#sabores">Platos</a>
                <a href="#sabores">Blog</a>
            </div>
            <div class="col">
                <h3>Cheffs</h3>
                <a href="#">Marcos G.</a>
                <a href="#">María L.</a>
                <a href="#">Marta J.</a>
            </div>
            <div class="col">
                <h3>Social Media</h3>
                <div class="media">
                    <i class="fa-brands fa-twitter"></i> <a href="#">Twitter</a>
                </div>
                <div class="media">
                    <i class="fa-brands fa-instagram"></i> <a href="#">Instagram</a>
                </div>
            </div>
        </div>

    </section>
    
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="script.js"></script>
</body>
</html>