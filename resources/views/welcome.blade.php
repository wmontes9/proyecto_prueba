@extends("layouts.app_inicio")

<link href="assets/img/favicon.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->

<link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
<link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
<link href="assets/vendor/aos/aos.css" rel="stylesheet">


<!-- Template Main CSS File -->
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
@section("content")
 <!-- ======= Top Bar ======= -->
 <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-phone"></i>(+57) 098 7446038)
        <span class="d-none d-lg-inline-block"><i class="icofont-clock-time icofont-rotate-180"></i></span>
      </div>
      <div class="languages">
        <ul>
          <li>En</li>
          <li><a href="#">Es</a></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html">INNEXSA</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.html">Inicio</a></li>
          <li><a href="#about">Que hacemos</a></li>
          <li><a href="#Blog">Blog</a></li>
          <li><a href="#menu">Retos</a></li>
          <li><a href="#specials">Ambientes</a></li>
          <li><a href="#events">Eventos</a></li>
          <li><a href="#gallery">Galeria</a></li> 
          <li><a href="#chefs">Expertos</a></li>
          <li><a href="#contact">Contacto</a></li>
          <li class="book-a-table text-center"><a href="#book-a-table">Registrate</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-left" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Bien<span>venido</span></h1>
          <h2>Plantea tu Reto!</h2>

          <div class="btns">
            <a href="#menu" class="btn-menu animated fadeInUp scrollto">Retos</a>
            <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Plantea la Solución</a>
          </div>
        </div>
        <div class="col-lg-4 d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="200">
          <a href="https://youtu.be/OB8XYJOVQ10" class="venobox play-btn" data-vbtype="video" data-autoplay="true"></a>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="assets/img/about.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Retos de Innovacion, Experiencias y Saberes por Boyaca.</h3>
            <p class="font-italic">
              Esta plataforma se enfrenta a diferentes retos que actualmente se presentan en el sector productivo del departamento de Boyacá, como el desarrollo de capacidades en investigación, desarrollo experimental e innovación y la formulación de mecanismos para la transferencia y circulación de conocimiento, lo cual permita conocer, identificar, mejorar las capacidades productivas y afianzar la vocación regional en busca de la productividad y competitividad, así como la contribución al avance en la innovación y el desarrollo tecnológico empresarial.
            </p>
          
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Por que nosotros</h2>
          <p>Por que elegir nuestra plataforma</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span>01</span>
              <h4>Los mejores expertos</h4>
              <p>Innexsa cuenta con los mejores expertos en cada área de conocimiento los cuales estan dispuestos a prestar nuestros servicios.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="200">
              <span>02</span>
              <h4>Calidad en el servicio</h4>
              <p>Queremos que cada participante se sienta respaldado la mejor tecnologia e infraestructura del departamento.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span>03</span>
              <h4> Mejor conceccion entre empresarios y expertos</h4>
              <p>Encontras una gran oportunidad de conectividad con todo pais y el mundo.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Retos Section ======= -->
    <section id="menu" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Se parte...</h2>
          <p>Retos de innovación 2020</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
              <li data-filter="*" class="filter-active">Todos</li>
              <li data-filter=".filter-starters">Turismo</li>
              <li data-filter=".filter-salads">Marketing</li>
              <li data-filter=".filter-specialty">Industrias 4.0</li>
            </ul>
          </div>
        </div>

        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-6 menu-item filter-starters">
            <img src="{{url('assets/img/menu/Reto 1.jpg')}}" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Reto 1 </a><span></span>
            </div>
            <div class="menu-ingredients">
              Estrategias para la incorporación y apropiación de las nuevas tecnologías en los sectores priorizados del departamento de Boyacá - Turismo, Servicios, Metalmecánico, Agroindustria y Minero.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <img src="assets/img/menu/Reto 9.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Reto 9</a><span></span>
            </div>
            <div class="menu-ingredients">
              LDiseñar una estrategia de relacionamiento entre los actores del ecosistema de base tecnológica e
              innovación.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-starters">
            <img src="assets/img/menu/Reto 2.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Reto 2 </a><span></span>
            </div>
            <div class="menu-ingredients">
              Formulación de estrategias de mercadeo, desde las industrias 4.0 en los sectores priorizados del departamento de Boyacá - Turismo, Servicios, Metalmecánico, Agroindustria y Minero
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-salads">
            <img src="assets/img/menu/Reto 4.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Reto 4</a><span></span>
            </div>
            <div class="menu-ingredients">
              Creación de un sistema integrado de información para el sector turismo.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <img src="assets/img/menu/cacao.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Reto 8</a><span></span>
            </div>
            <div class="menu-ingredients">
              Estudio de caracterización del Sector Cacao en el departamento de Boyacá.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-starters">
            <img src="assets/img/menu/reto3.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Reto 3</a><span></span>
            </div>
            <div class="menu-ingredients">
              Diseño de estrategias para la incorporación y apropiación de las metodologías agiles en los procesos de innovación en los sectores priorizados del departamento de Boyacá - Turismo, Servicios, Metalmecánico, Agroindustria y Minero.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-salads">
            <img src="assets/img/menu/Reto 5.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Reto 5</a><span></span>
            </div>
            <div class="menu-ingredients">
              Sistema de marketing integral para las apuestas productivas identificadas en la AICCT
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-salads">
            <img src="assets/img/menu/Reto 6.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Reto 6</a><span></span>
            </div>
            <div class="menu-ingredients">
              Proyecto de acercamiento del sector empresarial al sistema de I+D+I - CDT
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <img src="assets/img/menu/Reto 7.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Reto 7</a><span></span>
            </div>
            <div class="menu-ingredients">
              Proyecto de inteligencia de mercados que permita monitorear el mercado de forma permanente.
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Specials Section ======= -->
    <section id="specials" class="specials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Un mundo para interactuar</h2>
          <p>Ambientes Innexsa</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#tab-1">Laboratorio de Audio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-2">Laboratorio MOCAB y video</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-3">Laboratorio de Render</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-4">Laboratorio de Ideación</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-5">Drone</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3></h3>
                      Este cuenta con equipos de grabación para la realizacion de videos publicitarios, comercailes y documentales que sera base para la realización de emisora de la entidad.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/audio.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3></h3>
                    <p class="font-italic"></p>
                    <p>Encontramos un estudio de grabación de video para el uso de cromac, mocap y fotogametria para el modelamiento de personajes y esenarios en 3D con tecnologia de punta.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/mocap.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3></h3>
                    <p class="font-italic"></p>
                    <p>En este podemos encontrar tecnologias de alta calidad como una impresora 3D, un plotter y equipos robustos para la impresion y diseño de material publicitario e informativo.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/render.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3></h3>
                    <p class="font-italic"></p>
                    <p>Cuenta con un esenario que permite la interación de la triple elice para aplicar tecnologias y metodologias e identifiar, prototipar y validad productos innovadores.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/ideacion.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3></h3>
                    <p class="font-italic"></p>
                    <p>Se busca la realización de mapeo en 3D para diferentes usos: recrear escenas, esenarios, etc, hacer levantamientos en 3D para la parte turistica, arquitectonica y de cableado.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/drone.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Specials Section -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Eventos</h2>
          <p>Compartenos tus eventos</p>
        </div>

        <div class="owl-carousel events-carousel" data-aos="fade-up" data-aos-delay="100">

          <div class="row event-item">
            <div class="col-lg-6">
              <img src="assets/img/robotica.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
              <h3>DIGITAL WORKFORCE
                SUMMIT 2020</h3>
              <div class="price">
                <p><span>Entrada libre</span></p>
                </div>
                <p class="font-italic">
                Es el evento más importante de Automatizacion Robótica de Procesos, Fuerza de trabajo digital inteligente y AI en Latinoamérica, con presencia en México, Brasil, Argentina, Chile y Colombia.
              </p>
              <ul>
                <li><i class="icofont-check-circled"></i> Ponente: Jaime Yory</li>
                <li><i class="icofont-check-circled"></i> Lugar: Plataforma zoom </li>
                <li><i class="icofont-check-circled"></i> Fecha: 30 de Octubre 2020</li>
              </ul>
              <p>
                En su segunda versión en Colombia, se realizará el lanzamiento oficial de la plataforma de Digital Workforce basada en la web y nativa en la nube Automation Anywhere Enterprise A2019
              </p>
            </div>
          </div>

          <div class="row event-item">
            <div class="col-lg-6">
              <img src="assets/img/ciberseguridad.jpg" class="img-fluid" alt="width="100" height="500" ">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
              <h3>Congreso Innovación Digital, Entretenimiento y Tecnología </h3>
              <div class="price">
                <p><span>Entrada Libre</span></p>
              </div>
              <p class="font-italic">
                En 2020, el Congreso Innovación Digital, Entretenimiento y Tecnología abordará la protección de los datos personales en el mundo digital, desde la teoría hasta la práctica.
              </p>
              <ul>
                <li><i class="icofont-check-circled"></i>Ponente: MIGUEL RECIO y PABLO MÁRQUEZ </li>
                <li><i class="icofont-check-circled"></i>Lugar: Pontificia Universidad Javeriana.</li>
                <li><i class="icofont-check-circled"></i>Fecha: 10 de Noviembre 2020.</li>
              </ul>
              <p>
                El objetivo es generar canales de comunicación entre gobierno y sociedad para conversar sobre los principales retos que enfrentan usuarios, expertos en privacidad, empresas, emprendedores y organizaciones de la sociedad civil.
              </p>
            </div>
          </div>

          <div class="row event-item">
            <div class="col-lg-6">
              <img src="assets/img/enicie.png" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
              <h3>Enicie Encuentro Nacional e Internacional de Competitividad e Innovación Empresarial</h3>
              <div class="price">
                <p><span>Entrada Libre</span></p>
              </div>
              <p class="font-italic">
                Contribuir a la competitividad de las regiones mediante la investigación, desarrollo tecnológico e innovación.
              </p>
              <ul>
                <li><i class="icofont-check-circled"></i> Participa como Ponente, Expositor o Asistente.</li>
                <li><i class="icofont-check-circled"></i> Evento Virtual.</li>
                <li><i class="icofont-check-circled"></i> Fecha: 27 a 29 de Octubre 2020.</li>
              </ul>
              <p>
                Los ponentes que deseen presentar su trabajo deberán contar con un resultado parcial o total de la investigación realizada
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Events Section -->

    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Se parte de la Solución de </h2>
          <p> Nuestros Retos</p>
        </div>

        <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
          <div class="form-row">
            <div class="col-lg-4 col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group">
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Telefono (opcional)" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group">
              <input type="text" name="Área" class="form-control" id="Área" placeholder="Área" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group">
              <input type="text" class="form-control" name="Elige el reto" id="Elige el reto" placeholder="Elige el reto" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group">
              <input type="number" class="form-control" name="people" id="people" placeholder="# de personas que contribuyen" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="Solución" rows="5" placeholder="Plantea aqui la Solución"></textarea>
            <div class="validate"></div>
          </div>
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-Solución"></div>
            <div class="sent-Solución">Gracias por contribuir a la solución.</div>
          </div>
          <div class="text-center"><button type="submit">Enviar</button></div>
        </form>

      </div>
    </section><!-- End Book A Table Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Experiencias de nuestros usuarios</h2>
          <p>Lo que están diciendo de nosotros.</p>
        </div>

        <div class="owl-carousel testimonials-carousel" data-aos="zoom-in" data-aos-delay="100">

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Estoy encantada con la plataforma, la temática y la ayuda recibida y personalizada. La plataformas en la nube, me he atrevido a crear un historia aplicando los conocimientos.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
            <h3>Julian Mateus</h3>
            <h4>Ceo &amp; epson</h4>
          </div>  

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              La atención ha sido de sobresaliente. Muchas gracias. Ha sido difícil en algunas situaciones pero debido a a la complejidad de la empresa y de los retos que enfrentamos.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
            <h3>Sara Acuña</h3>
            <h4>Diseñadora</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              La experiencia es fantastica logre junto con el experto innovar en la idea de negocio que tengo. 
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
            <h3>Fernanda Martinez</h3>
            <h4>Docente Universitario</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Excelente curso, tanto la estructura como la calidad de los contenidos, así como la experiencia y comunicación con el experto.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
            <h3>Martin Fernandez</h3>
            <h4>Independiente</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Lo aprendido con la plataforma ha sido de gran ayuda y la atención del tutor es inmejorable.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
            <h3>John Fredy Laso</h3>
            <h4>Ingeniero Industrial</h4>
          </div>

        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Galaria de Fotos</h2>
          <p>Algunas Fotos de Nosotros</p>
        </div>
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/imagen para fotos 2.JPG" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/imagen para fotos 2.JPG" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/imagen para fotos 3.JPG" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/imagen para fotos 3.JPG" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/imagen para fotos 5.JPG" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/imagen para fotos 5.JPG" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/imagen para fotos.JPG" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/imagen para fotos.JPG" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/imagen para fotos5.JPG" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/imagen para fotos5.JPG" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/imagenes para fotos 4.JPG" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/imagenes para fotos 4.JPG" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/imagen para foto7.JPG" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/imagen para foto7.JPG" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/imagen para foto8.JPG" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/imagen para foto8.JPG" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Mentores Section ======= -->
    <section id="mentores" class="chefs">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Nuestros Mentores</h2>
          <p>Conocelos e interactua con ellos</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <img src="assets/img/expertos/team-image2.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Carmen Cecilia Zuluaga</h4>
                  <span>ADMINISTRACION DE EMPRESAS</span>
                </div>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="200">
              <img src="assets/img/expertos/team-image1.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Jeinson Bello</h4>
                  <span>Ingeniero Industrial</span>
                </div>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="300">
              <img src="assets/img/expertos/team-image3.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Wilson Montes</h4>
                  <span>Ingeniero Electronico</span>
                </div>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Chefs Section -->

<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Compartimos la misma filosofia de negocio.</h2>
      <p>Aliados Estrategicos.</p>
    </div>

    <div class="owl-carousel testimonials-carousel" data-aos="zoom-in" data-aos-delay="100">

      <div class="testimonial-item">
        <p>
          Entidad líder a nivel nacional en formalización, desarrollo y crecimiento del sector empresarial en la región, comprometida con la prestación de servicios enfocados a las necesidades de los empresarios y la mejora continua.
        </p>
        <img src="assets/img/aliados/camara de comercio.png" class="testimonial-img" alt="width="100 height="90">
        <h3>Camara de Comercio de Tunja</h3>
        <h4>Dirección: &amp;Cl. 21 #10-52 PBX (8)7474660.</h4>
      </div>  

      <div class="testimonial-item">
        <p>

          Somos una entidad pública Departamental. Nuestro compromiso, es brindar servicios públicos de calidad con la apropiación de valores y principios
        </p>
        <img src="assets/img/aliados/gobernacion de boyaca.png" class="testimonial-img" alt="width="100 height="80">
        <h3>Gobernación de Boyacá</h3>
        <h4>Palacio de la Torre Calle 20 No. 9 - 90 &amp; PBX+(57)8742 0150</h4>
      </div>

      <div class="testimonial-item">
        <p>
          Contribuir a la educación para todos a través de la modalidad abierta, a distancia y en ambientes virtuales de aprendizaje, mediante la acción pedagógica, la proyección social, el desarrollo región Tunja. 
        </p>
        <img src="assets/img/aliados/unad.png" class="testimonial-img" alt="width="100 height="90">
        <h3>Universidad Nacional Abierta y a distancia</h3>
        <h4>Dirección: Calle 18 con Carrera 1 Barrio Manzanares &amp;PBX (8)7443587</h4>
      </div>

      <div class="testimonial-item">
        <p>
          Somos una institución de carácter universitario, de calidad académica acreditada, líder en la transformación de la sociedad, las entidades públicas y las organizaciones sociales.
        </p>
        <img src="assets/img/aliados/esap.jpeg" class="testimonial-img" alt="">
        <h3>ESAP</h3>
        <h4>Dirección: Calle 44 # 53 &amp; PBX (1) 4434920,</h4>
      </div>

      <div class="testimonial-item">
        <p>
          Somos una universidad pública, estatal de carácter nacional, Somos Universidad más importante del departamento de Boyacá y una de las más prestigiosas en el Estado Colombiano por su nivel académico.
        </p>
        <img src="assets/img/aliados/uptc.jpeg" class="testimonial-img" alt="">
        <h3>UPTC</h3>
        <h4>Avenida Central del Norte 39-115&amp; PBX (8)7405626</h4>
      </div>

    </div>

  </div>
</section><!-- End Testimonials Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contacto</h2>
          <p>Contactenos</p>
        </div>
      </div>

      <div data-aos="fade-up">
          <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Direccion:</h4>
                <p>Calle 19 No 12-29, Tunja, Boyacá</p>
              </div>

              <div class="open-hours">
                <i class="icofont-clock-time icofont-rotate-90"></i>
                <h4>Horario de Atención :</h4>
                <p>
                  Lunes a Viernes:<br>
                  08:00 AM - 06:00 PM
                </p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>info@innexsa.com</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Telefono:</h4>
                <p>+57 0987 446038</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Tu Nombre" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Área" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="8" data-rule="required" data-msg="Please write something for us" placeholder="Mensaje"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>INNEXSA</h3>
              <p>
                Calle 19 No 12-29 <br>
                Tunja, Boyacá, Colombia<br><br>
                <strong>Telefono:</strong> +57 0987 446038<br>
                <strong>Email:</strong> info@innexsa.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Enlaces Utiles</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Inicio</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Acerca de Nosotros</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Servicios</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Condicion de Servicio</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Autorización de Tratamiento de datos</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Politica de Privacidad</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nuestros servicios</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Diseño Web</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Desarrollo Web</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Gestión de productos</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Consultorias</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Noticias</h4>
            <p>Ultimas noticias sobre nuestra plataforma y nuevos retos.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; INNEXSA <strong><span>Derechos</span></strong>. recervados
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
        Diseñado por <a href="https://bootstrapmade.com/">xxxxxxxxxxx</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
@endsection