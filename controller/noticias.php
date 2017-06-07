<?php
date_default_timezone_set('America/Lima');
$arr['paginacion'] = $_POST['paginacion'];
$total_paginas = 1;
$arr['noticias'] = "";
$arr['boolpagina'] = 1; // muestra boton
if ($arr['paginacion'] == $total_paginas)
	$arr['boolpagina'] = 0; // no muestra boton
if ($arr['paginacion'] == 1){
	$arr['noticias'].= "<div class='row inner-noticia'>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12 inner-img'>";
	$arr['noticias'].= "<div class='inner-logo'><a href='inicio-programa-beca-docente-americas-potash'><img src='./resources/assets/image/comunicacion-corporativa/5690.png' alt=''></a></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>";
	$arr['noticias'].= "<a href='inicio-programa-beca-docente-americas-potash'><h4>INICIÓ EL PROGRAMA BECA DOCENTE AMERICAS POTASH</h4></a>";
	$arr['noticias'].= "<p>El pasado 21 de enero se inició el programa educativo “Beca Docente Americas Potash”, el cual consiste en proporcionales una beca integral a 15 docentes que laboran en las Instituciones Educativas de la provincia Sechura, con la finalidad de que al concluir sus estudios obtengan el grado de bachiller o licenciatura.</p>";
	$arr['noticias'].= "<div class='seguirL'>";
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='inicio-programa-beca-docente-americas-potash'>Seguir Leyendo</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";
	//************************************
	$arr['noticias'].= "<div class='row inner-noticia'>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12 inner-img'>";
	$arr['noticias'].= "<div class='inner-logo'><a href='growmax-invertira-279-millones-en-bayovar'><img src='./resources/assets/image/comunicacion-corporativa/1063.png' alt=''></a></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>";
	$arr['noticias'].= "<a href='growmax-invertira-279-millones-en-bayovar'><h4>GROWMAX INVERTIRÁ US$ 279 MILLONES EN BAYÓVAR</h4></a>";
	$arr['noticias'].= "<p>GrowMax Resources Corp presentó la Evaluación Económica Preliminar de su proyecto de fosfatos Bayóvar 7 (Piura), concluyendo que la iniciativa demandará US$ 279 millones.</p>";
	$arr['noticias'].= "<div class='seguirL'>";
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='growmax-invertira-279-millones-en-bayovar'>Seguir Leyendo</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";
	//************************************
	$arr['noticias'].= "<div class='row inner-noticia'>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12 inner-img'>";
	$arr['noticias'].= "<div class='inner-logo'><a href='invertira-10-millones'><img src='./resources/assets/image/comunicacion-corporativa/brochure2.jpg' alt=''></a></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>";
	$arr['noticias'].= "<a href='invertira-10-millones'><h4>INVERTIRÁ US$ 10 MILLONES</h4></a>";
	$arr['noticias'].= "<p>Para el 2017, la canadiense GrowMax Resources (antes Americas Petrogas Inc) tiene un presupuesto de inversión y capital de trabajo de alrededor de US$ 10 millones, que se enfocará en el avance del proyecto de fosfatos Bayóvar 7 a partir de investigaciones adicionales y estudios de venta doméstica y regional de roca de fosfato, así como en requerimientos ambientales y sociales. También adelantará una iniciativa en Argentina.</p>";
	$arr['noticias'].= "<div class='seguirL'>";
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='invertira-10-millones'>Seguir Leyendo</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";
}
if ($arr['paginacion'] == 2){
	$arr['noticias'].= "<div class='row inner-noticia'>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 inner-img'>";
	$arr['noticias'].= "<div class='inner-logo'><img src='./resources/assets/image/comunicacion-corporativa/brochure2.jpg' alt=''></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>";
	$arr['noticias'].= "<h4>PROYECTOS E INICIATIVAS PARA EL DESARROLLO 2</h4>";
	$arr['noticias'].= "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus efficitur turpis in pharetra aliquet. Quisque vitae ornare urna. Etiam venenatis erat non posuere vestibulum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>";
	$arr['noticias'].= "<div class='seguirL'>";
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='detalle'>Seguir Leyendo</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
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
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='detalle'>Seguir Leyendo</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
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
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='detalle'>Seguir Leyendo</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
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
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='detalle'>Seguir Leyendo</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
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
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='detalle'>Seguir Leyendo</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
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
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='detalle'>Seguir Leyendo</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";
}
$arr['paginacion'] = $arr['paginacion'] + 1;
echo json_encode($arr);
?>