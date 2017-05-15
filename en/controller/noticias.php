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
	$arr['noticias'].= "<div class='inner-logo'><a href='Detail'><img src='./resources/assets/image/comunicacion-corporativa/5690.png' alt=''></a></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>";
	$arr['noticias'].= "<a href='Detail'><h4>AMERICAS POTASH BECA DOCENTE (Teacher´s Scholarship) PROGRAM STARTED</h4></a>";
	$arr['noticias'].= "<p>Last January 21, the “Americas Potash Beca Docente” educational program started. This program grants a full scholarship to fifteen teachers who work in educational institutions in the province of Sechura to obtain their Bachelor or Professional degrees after completing their studies.</p>";
	$arr['noticias'].= "<div class='seguirL'>";
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='Detail'>Read more</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";

	//************************************

	$arr['noticias'].= "<div class='row inner-noticia'>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12 inner-img'>";
	$arr['noticias'].= "<div class='inner-logo'><a href='Detail-1'><img src='./resources/assets/image/comunicacion-corporativa/1063.png' alt=''></a></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>";
	$arr['noticias'].= "<a href='Detail-1'><h4>GROWMAX IS PLEASED TO PROVIDE GUIDANCE REGARDING THE COMPANY'S LONG-TERM DEVELOPMENT STRATEGY.</h4></a>";
	$arr['noticias'].= "<p>On September 12, 2016, GrowMax announced its strategic plans for the Company which included:</p>";
	$arr['noticias'].= "<ul><li>Reducing general and administrative (G&A) expenses and spending in Argentina;</li><li>Exiting the Argentine oil and gas assets;</li><li>Developing plans for early cash flow.</li></ul>";
	$arr['noticias'].= "<div class='seguirL'>";
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='Detail-1'>Read more</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";

	//************************************

	$arr['noticias'].= "<div class='row inner-noticia'>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12 inner-img'>";
	$arr['noticias'].= "<div class='inner-logo'><a href='Detail-2'><img src='./resources/assets/image/comunicacion-corporativa/brochure2.jpg' alt=''></a></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>";
	$arr['noticias'].= "<a href='Detail-2'><h4>US$ 10 MILLION WILL BE INVESTED</h4></a>";
	$arr['noticias'].= "<p>For 2017, the investment and working capital budget of the Canadian company GrowMax Resources (formerly called Americas Petrogas Inc) is about US$ 10 million and it will be focused on the progress of the Bayovar 7 phosphate project from additional research and studies of domestic and regional sales of phosphate rock, as well as on environmental and social requirements.</p>";
	$arr['noticias'].= "<div class='seguirL'>";
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='Detail-2'>Read more</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
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
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='detalle'>Read more</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
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
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='detalle'>Read more</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
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
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='detalle'>Read more</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
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
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='detalle'>Read more</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
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
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='detalle'>Read more</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
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
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='detalle'>Read more</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";
}

$arr['paginacion'] = $arr['paginacion'] + 1;


echo json_encode($arr);
?>