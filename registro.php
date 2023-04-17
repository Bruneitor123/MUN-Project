<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Programa de las Naciones Unidas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <?php
    $modalidade = $_GET["modalidad"];
    $mesas_y_del = array(
        "Mesa (Presidente)",
        "Mesa (Moderador/a)",
        "Mesa (Oficial de Conferencias)",
        "Mesa (Paje)",
        "Equipo Diplomático"
    );
    ?>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>C. Baptista, Sucre y Bolívar (Oruro)</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+591 (2) 5250901</small>
                    <small class="me-3 text-light"><i class="fa fa-envelope-open me-2"></i>admin@pnu-aas.com</small>
                    <small class="text-light"><i class="fa fa-info me-2"></i>Hecho por Bruno Vincentty Viaña (Senior 2023)</small>
                    
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.facebook.com/profile.php?id=100090761087466"><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.instagram.com/bassmun_2023/"><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-whatsapp fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="index.php" class="navbar-brand p-0">
                <h1 class="m-0"><i class="fa fa-user-tie me-2"></i>Programa de NN.UU. - A.A.S.</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Inicio</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Foros</a>
                        <div class="dropdown-menu m-0">
                            <a href="organos/disec.php" class="dropdown-item">Comisión de Desarme y Seguridad Internacional (DISEC)</a>
                            <a href="organos/unicef.php" class="dropdown-item">Fondo de las Naciones Unidas para la Infancia (UNICEF)</a>
                            <a href="organos/conpaz.php" class="dropdown-item">Comisión de Consolidación de la Paz</a>
                            <a href="organos/pnuma.php" class="dropdown-item">Programa de las Naciones Unidas para el Medio Ambiente (PNUMA)</a>
                            <a href="organos/cpd.php" class="dropdown-item">Comisión de Población y Desarrollo</a>
                            <a href="organos/oms.php" class="dropdown-item">Organización Mundial de la Salud (OMS)</a>
                            <a href="organos/acnudh.php" class="dropdown-item">Alto Comisionado de las NN.UU. para los Derechos Humanos (ACNUDH)</a>
                            <a href="organos/unodc.php" class="dropdown-item">Comisión de Estupefacientes y Delito (UNODC)</a>
                            <a href="organos/onu_mujeres.php" class="dropdown-item">Comisión de la Condición Jurídica y Social de la Mujer (ONU Mujeres)</a>
                            <a href="organos/csi.php" class="dropdown-item">Consejo de Seguridad (CS)</a>
                            <a href="organos/nacional.php" class="dropdown-item">Comisión de Asuntos Nacionales</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Eventos</a>
                    <div class="dropdown-menu m-0">
                            <a href="/eventos/bassmun_2k23_info.php" class="dropdown-item">BassMUN 2023</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="/blogs.php" class="nav-item nav-link">Blogs</a>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Páginas</a>
                        <div class="dropdown-menu m-0">
                            <a href="https://aasoruro.com/" class="dropdown-item">Sitio Web Anglo Americano</a>
                            <a href="#" class="dropdown-item">Miembros MUN (Próximamente)</a>
                            <a href="#" class="dropdown-item">Nuestra Historia (Próximamente)</a>
                            <hr class="dropdown-divider">
                            <button class="dropdown-item" onclick="swallogin()">Login Admin</button>
                            <a href="quote.php" class="dropdown-item">Registrar Inscripción</a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contacto</a>
                </div>
                <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
                <a href="quote.php" class="btn btn-primary py-2 px-4 ms-3">Inscríbete a Eventos!</a>
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 bg-bassmun" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 id="evento" class="display-4 text-white animated zoomIn">Formulario de Inscripción 2023</h1>
                    <h5 class="h5 text-white animated zoomIn">Este formulario es válido solo para eventos creados por el PNU</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- Pag Registro Start UWUWUWU -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-12">
                <?php if(in_array($modalidade, $mesas_y_del)) { echo '<h3 class="mb-5"><i class="fa fa-exclamation-circle text-warning me-2"></i>Para habilitar las demás entradas, primero elige el foro en el que quieres participar</h3>'; }?>
                    <div class="bg-primary rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                        <form id="formulario" action="process_form.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                            <div class="row g-3">
                                <div class="col-4">
                                    <label for="FormControl2" class="form-label text-white">Proveniencia</label>
                                    <input type="text" style="color:green" class="form-control bg-light" value="" id="provenienciaform" name="provenienciaform" disabled>
                                </div>
                                <div class="col-4">
                                    <label for="FormControl1" class="form-label text-white">Evento</label>
                                    <input type="text" style="color:green" class="form-control bg-light" value="" id="eventoform" name="eventoform" disabled>
                                </div>
                                <div class="col-4">
                                    <label for="FormControl1" class="form-label text-white">Modalidad</label>
                                    <input type="text" style="color:green" class="form-control bg-light" value="" id="modalidadform" name="modalidadform" disabled>
                                </div>
                                <div class="col-4">
                                    <label for="FormControl1" class="form-label text-white">Nombres y Apellidos</label>
                                    <input type="text" class="form-control bg-light" id="nomyapell" name="nomyapell" placeholder="Escribe tu nombre completo acá" required>
                                </div>
                                <div class="col-2">
                                    <label for="FormControl2" class="form-label text-white">Carnet de Identidad</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light" id="carnet" name="carnet" required>
                                        <select class="form-select-sm border-light" id="ubicacion" name="ubicacion" required>
                                            <option selected disabled value>CI</option>
                                            <option value="OR">OR</option>
                                            <option value="LP">LP</option>
                                            <option value="CB">CB</option>
                                            <option value="PT">PT</option>
                                            <option value="TJ">TJ</option>
                                            <option value="SC">SC</option>
                                            <option value="BE">BE</option>
                                            <option value="PD">PD</option>
                                            <option value="CH">CH</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <label for="FormControl3" class="form-label text-white">Número de Celular</label>
                                    <input type="text" class="form-control bg-light" id="numcel" name="numcel" maxlength="8" required>
                                </div>
                                <div class="col-4">
                                    <label for="FormControl51" class="form-label text-white">Correo Electrónico</label>
                                    <input type="email" class="form-control bg-light" id="correo" name="correo" placeholder="nombre@correo.com" required>
                                </div>
                                <div class="col-4">
                                    <label id="forotextoarriba" for="FormControl52" class="form-label text-white">Foro Deseado</label>
                                    <!-- Estos valores deben cambiar por evento y disponibilidad (ejecutar PHP AAA) -->
                                    <?php
                                    // database connection details
                                    require_once('envvars.php');

                                    // create connection
                                    $conn = new mysqli($servername, $username, $password, $dbname);

                                    // check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    // prepare and execute query to get count of each option value
                                    $stmt = $conn->prepare("SELECT foro, COUNT(1) FROM bassmun_registro GROUP BY foro");
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    ?>
                                    <select id="forodes" class="form-select bg-light border-0" name="forodes" onchange="redirect_quote();" required>
                                    <option selected disabled value>Lista de Foros</option>
                                    <?php
                                        $options = array(
                                            'Consejo de Seguridad Internacional (CSI)' => 0,
                                            'Comisión de Desarme y Seguridad Internacional (DISEC)' => 0,
                                            'Fondo de las Naciones Unidas para la Infancia (UNICEF)' => 0,
                                            'Comisión de Consolidación de la Paz' => 0,
                                            'Programa de las Naciones Unidas para el Medio Ambiente (PNUMA)' => 0,
                                            'Comisión de Población y Desarrollo' => 0,
                                            'Organización Mundial de la Salud (OMS)' => 0,
                                            'Comisión de Ciencia y Tecnología para el Desarrollo (UNCTAD)' => 0,
                                            'Fondo de las Naciones Unidas para la Infancia (UNICEF)' => 0,
                                            'Programa de las NN.UU. para el Medio Ambiente (PNUMA)' => 0,
                                            'Oficina del Alto Comisionado de las NN.UU. para los DD.HH. (ACNUDH)' => 0,
                                            'Entidad de la ONU para la Igualdad de Género y el Empoderamiento de la Mujer (ONU Mujeres)' => 0,
                                            'Oficina de NN.UU. contra la Droga y el Delito (UNODC)' => 0,
                                            'Comité de Tierra y Territorio, Recursos Naturales y Hoja de la Coca (Foro Nacional)' => 0
                                        );
                                        while ($row = $result->fetch_assoc()) {
                                            $option_value = $row['foro'];
                                            $count = $row['COUNT(1)'];
                                            if (array_key_exists($option_value, $options)) {
                                                $options[$option_value] = $count;
                                            }
                                        }
                                        foreach ($options as $option => $count) {
                                            $disabled = '';
                                            $selected_alr = '';
                                            $selected_style = '';
                                            if ($count >= 15) {
                                                $disabled = 'disabled';
                                                
                                                $mesas = array(
                                                    "Mesa (Presidente)",
                                                    "Mesa (Moderador/a)",
                                                    "Mesa (Oficial de Conferencias)",
                                                    "Mesa (Paje)"
                                                );
                                                if ($modalidade == 'Equipo Diplomático') {
                                                    $selected_alr = '[Foro Lleno]';
                                                    $selected_style = 'class="text-warning"';
                                                } else if (in_array($modalidade, $mesas)) {
                                                    $disabled = '';
                                                }
                                                
                                            }
                                            echo "<option $selected_style value=\"$option\" $disabled>$option $selected_alr</option>";
                                        }

                                        $stmt->close();
                                        $conn->close();
                                    ?>
                                    </select>

                                </div>
                                <div id="comprobantetexto" class="col-5">
                                    <label for="formFile" class="form-label text-white">Comprobante Electrónico</label>
                                    <input class="form-control bg-light" type="file" id="formFile" accept="application/pdf" name="comprobante" required>
                                    <small class="form-text text-dark me-2">*Formato Aceptado: .PDF</small>
                                    
                                </div>
                                <div class="col-12">
                                    <h6 class="mb-2"><i class="fa fa-envelope text-light me-2"></i>Tu inscripción será confirmada en 24 horas o menos, un miembro administrativo revisará tus datos y tu comprobante para aceptar tus datos. El comprobante electrónico tiene que ser legible para ser verificado exitosamente. (Cualquier dificultad que tengamos en nuestro lado, te contactaremos por cel/email)</h6>
                                </div>
                                <div class="col-12">
                                    <h6 class="mb-2"><i class="fa fa-info-circle text-light me-2"></i>Te enviaremos un correo electrónico que te dará información preliminar sobre el evento (incluirá Convocatoria, Protocolo Oficial y Ejemplo de Posición Oficial). Este correo no es una confirmación de tu plaza, más no es un mensaje automático enviado por nuestro sistema.</h6>
                                </div>
                                <div class="col-12">
                                    <h6 class="mb-2"><i class="fa fa-exclamation-circle text-light me-2"></i>No sabes cuál es el Comprobante Electrónico? <a class="text-dark text-decoration-underline" href="/faq#comprobante" target="_blank">Haz click aquí</a></h6>
                                </div>
                                <div class="col-12">
                                    <h6 class="mb-2"><i class="fa fa-exclamation-circle text-warning me-2"></i>Inscribirte con otra Modalidad a la designada/disponible resultará en la anulación total de la participación del evento, y el dinero depositado será de contribución al evento.</h6>
                                </div>
                                <div class="col-12">
                                    <button id="validationButton" class="btn btn-dark w-100 py-3 animated-button" type="submit">
                                        Finalizar Inscripción
                                        <span class="icon">
                                          <i class="fas fa-chevron-right"></i>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5 mb-5">
            <div class="bg-white">
                <div class="owl-carousel vendor-carousel">
                    <img src="img/vendor-1.png" alt="">
                    <img src="img/vendor-2.png" alt="">
                    <img src="img/vendor-3.png" alt="">
                    <img src="img/vendor-4.png" alt="">
                    <img src="img/vendor-5.png" alt="">
                    <img src="img/vendor-6.png" alt="">
                    <img src="img/vendor-7.jpg" alt="">
                    <img src="img/vendor-8.jpg" alt="">
                    <img src="img/vendor-9.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
    

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                        <a href="index.php" class="navbar-brand">
                            <h1 class="m-0 text-white"><i class="fa fa-user-tie me-2"></i>NN.UU. - A.A.S</h1>
                        </a>
                        <p class="mt-3 mb-4">Las Naciones Unidas del Colegio Anglo Americano es un Programa para Simulaciones (MUN), con la intención de forjar líderes en el Departamento de Oruro, Bolivia.</p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Ponte en Contacto</h3>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0">C. Baptista, Sucre y Bolívar (Oruro)</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-primary me-2"></i>
                                <p class="mb-0">admin@pnu-aas.com</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <p class="mb-0">+591 (2) 52509010</p>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-whatsapp fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="https://www.facebook.com/profile.php?id=100090761087466"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square" href="https://www.instagram.com/bassmun_2023/"><i class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Links Rápidos</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Inicio</a>
                                <a class="text-light mb-2" href="sobrenosotros.php"><i class="bi bi-arrow-right text-primary me-2"></i>Sobre Nosotros</a>
                                <a class="text-light mb-2" href="eventos.php"><i class="bi bi-arrow-right text-primary me-2"></i>Eventos</a>
                                <a class="text-light mb-2" href="equipo.php"><i class="bi bi-arrow-right text-primary me-2"></i>Miembros del Equipo</a>
                                <a class="text-light mb-2" href="blog.php"><i class="bi bi-arrow-right text-primary me-2"></i>Últimos Blogs</a>
                                <a class="text-light" href="contact.php"><i class="bi bi-arrow-right text-primary me-2"></i>Contáctanos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white" style="background: #061429;">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">&copy; <a class="text-white border-bottom" href="#">Programa de las Naciones Unidas OR</a>. Todos los derechos reservados. 
						
						Diseñado por <a class="text-white border-bottom" href="https://htmlcodex.com">HTML Codex</a> y Bruno Vincentty Viaña</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    
    <!-- Script For Form -->
    <script>


        var opciones = [
            "Staff (Comité)",
            "Staff (Otros)",
            "Asesor (Profesor/Encargado)"
            ];

        const params = new URLSearchParams(window.location.search);
        const proveniencia = params.get("proveniencia");
        const evento = params.get("evento");
        const modalidad = params.get("modalidad");
        document.getElementById('evento').textContent = evento + " 2023";
        document.getElementById('provenienciaform').value = proveniencia;
        document.getElementById('eventoform').value = evento;
        document.getElementById('modalidadform').value = modalidad;

        function esconderforo() {

            if (opciones.includes(modalidad)) {
                var formula = document.getElementById("formula2");
                var forodes = document.getElementById("forodes");
                var forodeso = document.getElementById("forotextoarriba");
                var comprobantetexto = document.getElementById("comprobantetexto");
                formula.hidden = true;
                forodes.hidden = true;
                forodeso.hidden = true;
                comprobantetexto.classList.remove("col-5")
                comprobantetexto.classList.add("col-12")
                forodes.required = false;
                
            }
        }

        esconderforo()

        var foro = 'foro';
        var url = window.location.href;
        var urlParams = new URLSearchParams(window.location.search);
        if(url.indexOf('&foro=none') === -1 && url.indexOf('&' + foro + '=') != -1) {

            var forodes = document.getElementById("forodes");
            var formula = document.getElementById("formula2");
            forodes.value = '<?php echo $_GET['foro']?>';
            var foro = urlParams.get("foro");
            formula.hidden = false;
        } else if(url.indexOf('&foro=none') !== -1 && url.indexOf('&' + foro + '=') != -1) {
            var options = [
                "Mesa (Presidente)",
                "Mesa (Moderador/a)",
                "Mesa (Oficial de Conferencias)",
                "Mesa (Paje)",
                "Equipo Diplomático"
                ];
            var modalidadi = urlParams.get("modalidad");

            if (options.includes(modalidadi)) {
                document.getElementById('nomyapell').setAttribute('disabled', 'true');
                document.getElementById('carnet').setAttribute('disabled', 'true');
                document.getElementById('ubicacion').setAttribute('disabled', 'true');
                document.getElementById('numcel').setAttribute('disabled', 'true');
                document.getElementById('correo').setAttribute('disabled', 'true');
                document.getElementById('formFile').setAttribute('disabled', 'true');
                document.getElementById('validationButton').setAttribute('disabled', 'true');
            }
        }

        function redirect_quote() {
            var options = [
                "Mesa (Presidente)",
                "Mesa (Moderador/a)",
                "Mesa (Oficial de Conferencias)",
                "Mesa (Paje)",
                "Staff (Comité)",
                "Staff (Otros)",
                "Asesor (Profesor/Encargado)"
                ];
            var urlParams = new URLSearchParams(window.location.search);
            var modalidad = urlParams.get("modalidad");

            if (options.includes(modalidad)) {
                document.getElementById('nomyapell').disabled = false;
                document.getElementById('carnet').disabled = false;
                document.getElementById('ubicacion').disabled = false;
                document.getElementById('numcel').disabled = false;
                document.getElementById('correo').disabled = false;
                document.getElementById('formFile').disabled = false;
                document.getElementById('validationButton').disabled = false;
                return;
            }
            

            event.preventDefault();
            var ref = window.location.href;
            var newForo = encodeURIComponent(document.getElementById('forodes').value);

            // Check if a foro parameter already exists in the URL
            var foroRegex = /[?&]foro(=([^&#]*)|&|#|$)/i;
            var foroMatch = foroRegex.exec(ref);

            if (foroMatch) {
                // Replace the existing foro parameter with the new value
                var newRef = ref.replace(foroMatch[0], '&foro=' + newForo);
            } else {
                // Add the new foro parameter to the URL
                var separator = ref.indexOf('?') !== -1 ? '&' : '?';
                var newRef = ref + separator + 'foro=' + newForo;
            }

            window.location.href = newRef;
            showpaises();
        }


        function showpaises() {

            var options = [
                "Mesa (Presidente)",
                "Mesa (Moderador/a)",
                "Mesa (Oficial de Conferencias)",
                "Mesa (Paje)",
                "Staff (Comité)",
                "Staff (Otros)",
                "Asesor (Profesor/Encargado)"
                ];
            var urlParams = new URLSearchParams(window.location.search);
            var modalidad = urlParams.get("modalidad");

            if (options.includes(modalidad)) {
                return;
            } else {
                var formula = document.getElementById("formula2");
                var forodes = document.getElementById("forodes");
                
                var foro = urlParams.get("foro");

                formula.hidden = false;
            }
            
        }

        function validateForm() {
            // Get the file input element
            var fileInput = document.getElementById("formFile");
            // Check if a file has been uploaded
            if (!fileInput.value) {
                alert("Debes subir un archivo.");
                return false;
            }
            // Check if the uploaded file meets your validation requirements
            var allowedExtensions = ["pdf"];
            var fileName = fileInput.value.toLowerCase();
            var fileExtension = fileName.substring(fileName.lastIndexOf(".") + 1);
            if (allowedExtensions.indexOf(fileExtension) == -1) {
                alert("Formato de archivo no válido. Debe ser un archivo PDF.");
                return false;
            }
            // If the form is valid, submit the form
            document.getElementById('provenienciaform').disabled = false;
            document.getElementById('eventoform').disabled = false;
            document.getElementById('modalidadform').disabled = false;

            Swal.fire({
                title: 'Seguro de subir esta inscripción?',
                text: "Los datos serán subidos y no podrás cambiarlos!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Volver atrás',
                confirmButtonText: 'Si, inscribirse ahora!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Add success parameter to URL and submit the form
                    document.getElementById('formulario').action = 'process_form.php?success=true';
                    document.getElementById('formulario').submit();
                    Swal.fire({
                        title: 'Subiendo inscripción...',
                        text: '¡Estamos haciendo trabajar a nuestros monos espaciales!',
                        icon: 'info',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading()
                        }
                    });

                }
            });

            return false; // Return false to prevent form submission

        }

    </script>
  
    
</body>

</html>