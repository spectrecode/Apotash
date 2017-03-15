<?php
date_default_timezone_set('America/Lima');

$arr['paginacion'] = $_POST['paginacion'];
$total_paginas = 3;

$arr['noticias'] = "";
$arr['boolpagina'] = 1; // muestra boton

if ($arr['paginacion'] == $total_paginas)
	$arr['boolpagina'] = 0; // no muestra boton



if ($arr['paginacion'] == 2){

	$arr['noticias'].= "<div class='row inner-noticia'>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 inner-img'>";
	$arr['noticias'].= "<div class='inner-logo'><img src='./resources/assets/image/comunicacion-corporativa/brochure2.jpg' alt=''></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>";
	$arr['noticias'].= "<h4>PROYECTOS E INICIATIVAS PARA EL DESARROLLO 2</h4>";
	$arr['noticias'].= "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus efficitur turpis in pharetra aliquet. Quisque vitae ornare urna. Etiam venenatis erat non posuere vestibulum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>";
	$arr['noticias'].= "<div class='seguirL'>";
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='detalle.html'>Seguir Leyendo</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";

	$arr['noticias'].= "<div class='row inner-noticia'>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 inner-img'>";
	$arr['noticias'].= "<div class='inner-logo'><img src='./resources/assets/image/comunicacion-corporativa/brochure2.jpg' alt=''></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>";
	$arr['noticias'].= "<h4>PROYECTOS E INICIATIVAS PARA EL DESARROLLO</h4>";
	$arr['noticias'].= "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus efficitur turpis in pharetra aliquet. Quisque vitae ornare urna. Etiam venenatis erat non posuere vestibulum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>";
	$arr['noticias'].= "<div class='seguirL'>";
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='detalle.html'>Seguir Leyendo</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";

	$arr['noticias'].= "<div class='row inner-noticia'>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 inner-img'>";
	$arr['noticias'].= "<div class='inner-logo'><img src='./resources/assets/image/comunicacion-corporativa/brochure2.jpg' alt=''></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>";
	$arr['noticias'].= "<h4>PROYECTOS E INICIATIVAS PARA EL DESARROLLO</h4>";
	$arr['noticias'].= "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus efficitur turpis in pharetra aliquet. Quisque vitae ornare urna. Etiam venenatis erat non posuere vestibulum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>";
	$arr['noticias'].= "<div class='seguirL'>";
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='detalle.html'>Seguir Leyendo</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";
}
if ($arr['paginacion'] == 3){

	$arr['noticias'].= "<div class='row inner-noticia'>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 inner-img'>";
	$arr['noticias'].= "<div class='inner-logo'><img src='./resources/assets/image/comunicacion-corporativa/brochure2.jpg' alt=''></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>";
	$arr['noticias'].= "<h4>PROYECTOS E INICIATIVAS PARA EL DESARROLLO 3</h4>";
	$arr['noticias'].= "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus efficitur turpis in pharetra aliquet. Quisque vitae ornare urna. Etiam venenatis erat non posuere vestibulum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>";
	$arr['noticias'].= "<div class='seguirL'>";
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='detalle.html'>Seguir Leyendo</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";

	$arr['noticias'].= "<div class='row inner-noticia'>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 inner-img'>";
	$arr['noticias'].= "<div class='inner-logo'><img src='./resources/assets/image/comunicacion-corporativa/brochure2.jpg' alt=''></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>";
	$arr['noticias'].= "<h4>PROYECTOS E INICIATIVAS PARA EL DESARROLLO</h4>";
	$arr['noticias'].= "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus efficitur turpis in pharetra aliquet. Quisque vitae ornare urna. Etiam venenatis erat non posuere vestibulum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>";
	$arr['noticias'].= "<div class='seguirL'>";
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='detalle.html'>Seguir Leyendo</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";

	$arr['noticias'].= "<div class='row inner-noticia'>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 inner-img'>";
	$arr['noticias'].= "<div class='inner-logo'><img src='./resources/assets/image/comunicacion-corporativa/brochure2.jpg' alt=''></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>";
	$arr['noticias'].= "<h4>PROYECTOS E INICIATIVAS PARA EL DESARROLLO</h4>";
	$arr['noticias'].= "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus efficitur turpis in pharetra aliquet. Quisque vitae ornare urna. Etiam venenatis erat non posuere vestibulum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>";
	$arr['noticias'].= "<div class='seguirL'>";
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='detalle.html'>Seguir Leyendo</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";
}

$arr['paginacion'] = $arr['paginacion'] + 1;


echo json_encode($arr);
?>