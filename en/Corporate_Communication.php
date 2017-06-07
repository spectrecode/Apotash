<!DOCTYPE html>
<html lang="es" ng-app="Ohemedical">

<head>
    <title>Americas Potash</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="./resources/assets/css/lightslider.css">
    <link href="./resources/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./resources/assets/css/app.css" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="57x57" href="./resources/assets/image/favicon_1/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./resources/assets/image/favicon_1/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./resources/assets/image/favicon_1/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./resources/assets/image/favicon_1/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./resources/assets/image/favicon_1/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./resources/assets/image/favicon_1/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./resources/assets/image/favicon_1/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./resources/assets/image/favicon_1/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./resources/assets/image/favicon_1/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="./resources/assets/image/favicon_1/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./resources/assets/image/favicon_1/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="./resources/assets/image/favicon_1/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./resources/assets/image/favicon_1/favicon-16x16.png">
    <link rel="manifest" href="./resources/assets/image/favicon_1/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <script src="./resources/assets/js/jquery-3.1.1.min.js"></script>
    <script src="./resources/assets/js/jquery.validate.min.js"></script>
    <script src="./resources/assets/js/lightslider.min.js"></script>
    <script src="./resources/assets/js/validacion.js"></script>
    <script src="./resources/assets/js/init.js"></script>
    <!--script(src="./resources/assets/js/app.js")-->
</head>

<body ng-view>
    <header class="header" ng-controller="headerCrtl">
        <div class="container">
            <div class="logo-max hidden-md hidden-lg"><a href="http://americas-potash.com/en/index"><img src="./resources/assets/image/logo-trans.png" id="logo-apM" alt="" width="100%"></a>
                <div class="box-burguer">
                    <div id="box-search"><img src="./resources/assets/image/lupa.png" width="40px" alt=""></div><a class="line-burguer"></a></div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-2 logo-header hidden-sm hidden-xs"><a href="http://americas-potash.com/en/index"><img src="./resources/assets/image/logo-trans.png" id="logo-ap" alt="" width="100%"></a></div>
                <div class="col-lg-9 col-md-9 visible-md visible-lg-inline-block">
                    <nav class="menu-header">
                        <ul>
                            <li><a href="http://americas-potash.com/en/index">Home</a></li>
                            <li class="subNos"><a href="javascript:void(0)">About Us<span> &#9660;</span></a>
                                <ul class="submenu-header">
                                    <li><a href="http://americas-potash.com/en/About_Us">Who We Are</a></li>
                                    <li><a href="http://americas-potash.com/en/Mission_and_Vision">Mission and Vision</a></li>
                                    <li><a href="http://americas-potash.com/en/Values">Values</a></li>
                                    <li><a href="http://americas-potash.com/en/Human_Talent">Human Talent </a></li>
                                </ul>
                            </li>
                            <li class="subProy"><a href="javascript:void(0)">Projects<span> &#9660;</span></a>
                                <ul class="submenu-header">
                                    <li><a href="http://americas-potash.com/en/Phosphates">Phosphates</a></li>
                                    <li><a href="http://americas-potash.com/en/Brine">Brines</a></li>
                                </ul>
                            </li>
                            <li class="subSost"><a href="javascript:void(0)">Sustainability<span> &#9660;</span></a>
                                <ul class="submenu-header">
                                    <li><a href="http://americas-potash.com/en/Sustainability">Social Responsability</a></li>
                                    <li><a href="http://americas-potash.com/en/Health">Health, Safety and Environment</a></li>
                                </ul>
                            </li>
                            <li><a class="active" href="http://americas-potash.com/en/Corporate_Communication">Corporate Communication</a></li>
                            <li><a href="http://americas-potash.com/en/Contact_Us">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 visible-md visible-lg-inline-block">
                    <div class="box-search" id="box-search">
                        <div><a href="http://americas-potash.com/index">Español</a><span> /</span><a class="active" href="http://americas-potash.com/en/index">English</a></div><img src="./resources/assets/image/lupa.png" width="40px" alt=""></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container-fluid">
                <div class="row hidden-md hidden-lg">
                    <nav class="menu-collapse">
                        <ul class="menu-collapse text-center">
                            <li><a href="http://americas-potash.com/en/index">Home</a></li>
                            <li class="sMenuNosotros"><a href="javascript:void(0)">About Us</a>
                                <ul class="submenu-movil">
                                    <li><a href="http://americas-potash.com/en/About_Us">Who We Are</a></li>
                                    <li><a href="http://americas-potash.com/en/Mission_and_Vision">Mission and Vision</a></li>
                                    <li><a href="http://americas-potash.com/en/Values">Values</a></li>
                                    <li><a href="http://americas-potash.com/en/Human_Talent">Human Talent</a></li>
                                </ul>
                            </li>
                            <li class="sMenuProy"><a href="javascript:void(0)">Projects</a>
                                <ul class="submenu-movil">
                                    <li><a href="http://americas-potash.com/en/Phosphates">Phosphates</a></li>
                                    <li><a href="http://americas-potash.com/en/Brine">Brine</a></li>
                                </ul>
                            </li>
                            <li class="sMenuSostenibilidad"><a href="javascript:void(0)">Sustainability</a>
                                <ul class="submenu-movil">
                                    <li><a href="http://americas-potash.com/en/Sustainability">Social Responsability</a></li>
                                    <li><a href="http://americas-potash.com/en/Health">Health, Safety and Environment</a></li>
                                </ul>
                            </li>
                            <li> <a href="http://americas-potash.com/en/Corporate_Communication">Corporate Communication</a></li>
                            <li><a href="http://americas-potash.com/en/Contact_Us">Contact Us</a></li>
                            <ul class="idiomas">
                                <li><a href="http://americas-potash.com/index">Español</a></li>
                                <li><a class="activeIdioma" href="http://americas-potash.com/en/index">English</a></li>
                            </ul>
                        </ul>
                    </nav>
                </div><input class="style-box-search disp-none" type="text" id="busqueda" name="search" placeholder="Search..." autofocus></div>
        </div>
    </header>
    <section id="comunicacion-corporativa">
        <div class="container-fluid">
            <div class="row">
                <div class="bannerPrincipal comuncCorp"><iframe src="https://player.vimeo.com/video/218542075?color=fff&byline=0&portrait=0" width="100%" height="480px" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                    <!-- <div class="letrero-banner">
                        <div>
                            <h2>What is Lorem ipsum</h2>
                            <div class="rectangle">Proyectos e iniciativas para el desarrollo e iniciativas para el desarrollo.</div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 noticias-comunicacion">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h2 class="titulo text-center hidden-xs hidden-sm"><b>Corporate Communication</b></h2>
                        </div>
                        <div class="col-lg-12">
                            <h3>News</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-8 col md-8 col-sm-8 col-xs-12">
                                <div id="publicaciones">
                                    <!-- inicio-->
                                    <!-- final-->
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center verM"><a class="verMas" id="paginar" href="javascript:void(0)" data-paginacion="1">Ver más</a></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="container-brochure">
                                    <div class="titulo-brochure">
                                        <h2>Brochure</h2>
                                    </div>
                                    <div class="row brochure">
                                        <div class="inner-brochure col-lg-7 col-md-7 col-sm-12 col-xs-6"><img src="./resources/assets/image/comunicacion-corporativa/brochure.png" alt=""></div>
                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-6">
                                            <h2>BROCHURE</h2>
                                            <div class="icon-brochure">
                                                <div class="icon-download3"><a href="./resources/assets/documentos/brochure/BROCHURE_AMERICAS_POTASH_INGLES.pdf" target="_blank" download>Download a PDF file</a></div>
                                                <div class="icon-eye"><a href="./resources/assets/documentos/brochure/BROCHURE_AMERICAS_POTASH_INGLES.pdf" target="_blank">Read more</a></div>
                                            </div>
                                        </div>
                                        <div class="icon-brochureM">
                                            <div class="icon-download3"><a href="./resources/assets/documentos/brochure/BROCHURE_AMERICAS_POTASH_INGLES.pdf" target="_blank" download>Download a PDF file</a></div>
                                            <div class="icon-eye"><a href="./resources/assets/documentos/brochure/BROCHURE_AMERICAS_POTASH_INGLES.pdf" target="_blank">Read more</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-prensa">
                                    <div class="titulo-brochure">
                                        <h2>Press</h2>
                                    </div>
                                    <div class="row brochure">
                                        <div class="inner-brochure col-lg-7 col-md-7 col-sm-12 col-xs-6"><img src="./resources/assets/image/comunicacion-corporativa/prensa.png" alt=""></div>
                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-6">
                                            <h2>PRESS RELEASE</h2>
                                            <div class="icon-brochure">
                                                <div class="icon-download3"><a href="./resources/assets/documentos/prensa/comunicado_1.pdf" target="_blank" download>Download a PDF file</a></div>
                                                <div class="icon-eye"><a href="./resources/assets/documentos/prensa/comunicado_1.pdf" target="_blank">Read more</a></div>
                                            </div>
                                        </div>
                                        <div class="icon-brochureM">
                                            <div class="icon-download3"><a href="./resources/assets/documentos/prensa/comunicado_1.pdf" target="_blank" download>Download a PDF file</a></div>
                                            <div class="icon-eye"><a href="./resources/assets/documentos/prensa/comunicado_1.pdf" target="_blank">Read more</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="btnGoUp hidden-xs"><i class="icon-chevron-up"></i></div>
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 box-footer">
                        <div class="row box-logos">
                            <div><a href="http://americas-potash.com/en/index"><img src="./resources/assets/image/logo-potash-footer.png" alt="" width="100%"></a></div>
                            <div><a href="http://www.growmaxcorp.com/" target="_blank"><img src="./resources/assets/image/logo-growmax-footer.png" alt="" width="100%"></a></div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 box-footer">
                        <div class="row">
                            <div class="footer-enlaces">
                                <div><a href="http://americas-potash.com/en/index">Home</a><a href="http://americas-potash.com/en/About_Us">About Us</a><a href="http://americas-potash.com/en/Phosphates">Projects</a></div>
                                <div><a href="http://americas-potash.com/en/Sustainability">Sustainability</a><a href="http://americas-potash.com/en/Corporate_Communication">Corporate Communication</a><a href="http://americas-potash.com/en/Contact_Us">Contact Us</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-center">All rights reserved by <span>AMERICAS POTASH</span></p>
        </div>
    </footer>
</body>

</html>