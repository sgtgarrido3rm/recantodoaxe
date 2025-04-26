<?php 
	require_once("admin/inc/config.php");


	$titulo = '';
	$texto 	= '';

/*	$query = "SELECT * FROM principal";

	$logindobancodedados    = 'gisrsi';
	$senhadobancodedados    = 'paksiulum';
	$hostdobancodedados     = 'localhost';
	$nomedobancodedados		= 'gisrsi_centroafricano';

$conn = mysqli_connect($hostdobancodedados,$logindobancodedados,$senhadobancodedados,$nomedobancodedados);

//$db = mysqli_select_db('gisrsi_centroafricano',$conn);
//$result = mysqli_query($conn, "SELECT DATABASE()");
//$row = mysqli_fetch_row($result);

	$stmt = mysqli_stmt_init($conn);
	
	if(!mysqli_stmt_prepare($stmt, $query))
    	exit('SQL error');

	//$txtPesq = 'NAÇÃO CABINDA';
	
	//mysqli_stmt_bind_param($stmt, 'i', $txtPesq);
	mysqli_stmt_execute($stmt);
	$res = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
	
	if($res){
	//echo "<pre>"; var_dump($res); die();		
		//while($row = mysqli_fetch_array($res)){
			//echo "<pre>"; var_dump($res); die();
			$titulo = $res["txtTitulo"];
			$texto 	= $res["txtTexto"];
			$imagem = $res["txtImagem"];


		//}
	}

	mysqli_close($conn);*/

	$txtTitulo = 'Procissão Pai Ogum';
	if (empty($txtTitulo)) {
		$txtTitulo = 'Nenhum evento hoje';
		$dia = date('d');
		$mes = getMesAbreviado(date('m'));
		$horaEvento = "";
	} else {
		$dataHora = "2025-04-23 20:30";

		$diaArr = explode(" ", $dataHora); 
		$diaArr = explode("-", DataParaISO($diaArr[0]));
		$ano 	= $diaArr[2];
		$dia 	= $diaArr[0];
		$mes 	= getMesAbreviado($diaArr[1]);
		$mesNum	= $diaArr[1];

		$horaArr = explode(" ", $dataHora); 
		$horaArr = $horaArr[1];
		$horaArr = explode(":", $horaArr);
		$h 		 = $horaArr[0];
		$m 		 = $horaArr[1];

		$horaEvento = "<i class='fa fa-calendar'></i> $h:$m hs"; 
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Recanto do Axé - RS</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="description" content="Recanto do Axé - RS">
<meta name="keywords" content="orixas, axe, recanto, candomble, mata, batuque">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" href="img/favicon_io/favicon-32x32.png" type="image/x-icon" />

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora:400,400i" rel="stylesheet">

<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/font-awesome.min.css" />
<link rel="stylesheet" href="css/themify-icons.css" />
<link rel="stylesheet" href="css/style.css" />
<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<div id="preloder">
<div class="loader"></div>
</div>

<?php include_once('htm/menu.htm'); ?>


<section class='hero-section set-bg' data-setbg='img/bg-hero.jpg'>
<div class='hero-content'>
<div class='hc-inner'>
<div class='container'>
<h2>Recanto do Axé - RS</h2>
<p>Pai Esequiel de Ogum</p>
<!--a href='#' class='site-btn sb-wide sb-line'>join with us</a-->
</div>
</div>
</div>
</section>

<?php	
	$sectionContador = "
		<section class='event-section'>
			<div class='container'>
			<div class='row'>
			<div class='col-md-5 col-lg-6'>

			<div class='event-info'>
			<div class='event-date'>
			<h2>23</h2>
			abr
			</div>
			<h3>Homenagem ao Pai Ogum</h3>
			<p><i class='fa fa-calendar'></i> 20:30 hs <i class='fa fa-map-marker'></i> Rua Quinze de Novembro, 412 - Jardim Krahe - Viamão/RS</p>
			</div>
			</div>

			<div class='col-md-7 col-lg-6'>
				<div class='counter' id='getting-started'>
					<div class='counter-item'><h4>10</h4>Days</div>
					<div class='counter-item'><h4>08</h4>hours</div>
					<div class='counter-item'><h4>40</h4>Mins</div>
					<div class='counter-item'><h4>56</h4>secs</div>
				</div>

				

				<!--a href='#' class='site-btn sb-light-line'>Read more</a-->
			</div>

			</div>
			</div>
		</section><br />
	";

	$calendario = true;
	if ($calendario) 
		echo $sectionContador;
?>

<section class="event-sectionSpotify">
<div class="container">
	<div class="row">
		<div class="col-md-5 col-lg-6">
			<!-- em 02abr25: alterada a lista do spotify para uma adequada ao contexto das matas -->
			<iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/6b6yXeCf34MjAq1IRalJIe?utm_source=generator" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
		</div>

		<!--div class='col-md-7 col-lg-6'>
			<audio controls>
  				<source src="horse.ogg" type="audio/ogg">
  				<source src="horse.mp3" type="audio/mpeg">
				Your browser does not support the audio element.
			</audio>
		</div>

		<div class='col-md-7 col-lg-6'>
			<audio controls>
  				<source src="horse.ogg" type="audio/ogg">
  				<source src="horse.mp3" type="audio/mpeg">
				Your browser does not support the audio element.
			</audio>
		</div-->

	</div>
</div>
</section>

<!-- COM BANCO DE DADOS -->
<!--section class="about-section spad">
<div class="container">
<div class="row">
<div class="col-md-6 about-content">
<h2><?=$titulo?></h2>
<p align="justify"><?=$texto?></p>
<a href="#" class="site-btn sb-wide">join with us</a>
</div>
<div class="col-md-6 about-img">
<img src="img/<?=$imagem?>" alt="">
</div>
</div>
</div>
</section-->

<!-- SEM BANCO DE DADOS -->
<section class="about-section spad">
<div class="container">
<div class="row">
<div class="col-md-6 about-content">
<h2>Recanto do Axé: Um Espaço Sagrado na Mata</h2>
<p align="justify">Em meio à exuberância da mata, cercado pela força ancestral da natureza, nasce o Recanto do Axé – um espaço sagrado dedicado à espiritualidade e aos ritos das tradições afro-brasileiras. Aqui, cada árvore, cada folha e cada gota d’água carrega a energia dos Orixás, proporcionando um ambiente de harmonia, equilíbrio e conexão com o divino.</p>
<p align="justify">Nosso recanto foi concebido com profundo respeito aos fundamentos das religiões de matriz africana, garantindo um local seguro e acolhedor para a realização de trabalhos espirituais, oferendas, iniciações e celebrações. A terra, pulsante e viva, recebe os filhos e filhas de santo, bem como todos aqueles que buscam renovação e orientação espiritual.</p>
<!--a href="#" class="site-btn sb-wide">join with us</a-->
</div>
<div class="col-md-6 about-img">
<img src="img/cachoeira2.jpg" alt="">
</div>
</div>
</div>
</section>

<section class="services-section spad">
<div class="container">
<div class="row">
<div class="col-sm-4">
<div class="service-box">
<h4><i class="fa fa-heart"></i>Nossa Missão</h4>
<p align="justify">Nossa missão é promover e preservar o batuque como uma expressão cultural brasileira rica e diversa. Acreditamos que essa prática musical é um patrimônio cultural inestimável que merece ser valorizado e compartilhado com as gerações presentes e futuras. Outra parte importante de nossa missão é compartilhar nossa música e nossa cultura com a comunidade mais ampla. Acreditamos que o batuque pode ser uma ferramenta para promover a inclusão social e aumentar a conscientização sobre a história e a cultura afro-brasileiras.</p>
<!--a href="#" class="s-readmore">Readmore <i class="fa fa-angle-double-right"></i></a-->
</div>
</div>
<div class="col-sm-4">
<div class="service-box">
<h4><i class="fa fa-eye"></i>Nossa Visão</h4>
<p align="justify">Nosso objetivo é criar um ambiente acolhedor e seguro para todas as pessoas interessadas em cultuar a religião africana, bem como melhor atender o nosso cliente. Os atendimentos/consultas são realizadas de forma presencial ou online, garantido assim que todos tenham acesso a casa de religião para a resolução de seus problemas. Desejamos que nosso grupo seja formado por membros de diferentes idades, origens e experiências, a fim de refletir a diversidade da sociedade em que vivemos. Além disso, buscamos manter a conexão com a história e as tradições que cercam o batuque. Reconhecemos a importância de honrar e respeitar os ancestrais que desenvolveram e transmitiram essas práticas ao longo dos séculos.</p>
<!--a href="#" class="s-readmore">Readmore <i class="fa fa-angle-double-right"></i></a-->
</div>
</div>
<div class="col-sm-4">
<div class="service-box">
<h4><i class="fa fa-fire"></i>Nossos Valores</h4>
<p align="justify">Um dos nossos valores mais importantes é o respeito. Respeitamos nossos ancestrais e suas tradições, bem como as diversas origens e identidades dos membros de nossa comunidade. Isso significa que nos esforçamos para criar um espaço seguro e inclusivo para todos os envolvidos, independentemente de sua raça, gênero, orientação sexual ou qualquer outra característica pessoal. Nossos valores de respeito, colaboração e aprendizagem contínua são a base de nossa comunidade de batuque.</p>
<!--a href="#" class="s-readmore">Readmore <i class="fa fa-angle-double-right"></i></a-->
</div>
</div>
</div>
</div>
</section>


<section class="sermon-section spad">
<div class="section-title">
<!--span>Oxum</span>
<h2>Frase do Dia</h2-->
</div>
<div class="sermon-warp">
<div class="sermon-left-bg set-bg" data-setbg="img/oxum.jpg"></div>
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-6">
<div class="sermon-content">
<h2>Oxum</h2>
<ul class="sermon-info">
<!--li>Sermon From: <span>Vincent John</span></li-->
<li>Saudação: <span>Ora Yê Yê Ô, Mãe Oxum!</span></li>
<li><span></span></li>
</ul>
<p align="justify">"Mamãe Oxum, que eu seja como suas águas doces que seguem desbravadoras no curso dos rios, entrecortando pedras e se precipitando as cachoeiras, sem parar"</p>
<!--div class="icon-links">
<a href="#"><i class="ti-link"></i></a>
<a href="#"><i class="ti-zip"></i></a>
<a href="#"><i class="ti-headphone"></i></a>
<a href="#"><i class="ti-import"></i></a>
</div-->
</div>
</div>
</div>
</div>
</div>
</section>


<section class="event-list-section spad">
<div class="container">
<div class="row">
<div class="col-md-6">
<div class="section-title title-left">
<span>Sobre o Sítio Recanto do Axé - RS</span>
<h2>Nossos Espaços</h2>
</div>
</div>
<!--div class="col-md-6 text-right event-more">
 <a href="#" class="site-btn">view all events</a>
</div-->
</div>
<div class="event-list">

<div class="el-item">
<div class="row">
<div class="col-md-4">
<div class="el-thubm set-bg" data-setbg="img/cachoeira.jpg"></div>
</div>
<div class="col-md-8">
<div class="el-content">
<div class="el-header">
<!--div class="el-date">
<h2>20</h2>
may
</div-->
<h3>Água Corrente</h3>
<!--div class="el-metas">
<div class="el-meta"><i class="fa fa-user"></i> Vincent John</div>
<div class="el-meta"><i class="fa fa-calendar"></i> Monday, 08:00 Am </div>
<div class="el-meta"><i class="fa fa-map-marker"></i> Central District, Riga, LV-1050, Latvia</div>
</div-->
</div>
<p align="justify">A água corrente é um elemento simbólico e essencial nas tradições das matrizes africanas, desempenhando um papel vital tanto na espiritualidade quanto na vida cotidiana. Nas religiões de origem africana, como o Candomblé e a Umbanda, a água é vista como um dos principais elementos da natureza que mantém a conexão entre os seres humanos e as forças divinas. Ela está ligada aos Orixás, especialmente aos que regem as águas, como Oxum, Iemanjá e Nanã, sendo associada à purificação, renovação e fertilidade.</p>
<!--a href="#" class="site-btn sb-line">Read more</a-->
</div>
</div>
</div>
</div>

<div class="el-item">
<div class="row">
<div class="col-md-4">
<div class="el-thubm set-bg" data-setbg="img/altar.png"></div>
</div>
<div class="col-md-8">
<div class="el-content">
<div class="el-header">
<!--div class="el-date">
<h2>16</h2>
oct
</div-->
<h3>Altar</h3>
<!--div class="el-metas">
<div class="el-meta"><i class="fa fa-user"></i> Vincent John</div>
<div class="el-meta"><i class="fa fa-calendar"></i> Monday, 08:00 Am </div>
<div class="el-meta"><i class="fa fa-map-marker"></i> Central District, Riga, LV-1050, Latvia</div>
</div-->
</div>
<p align="justify">O altar é um dos espaços mais sagrados dentro das tradições de matriz africana, funcionando como ponto de conexão entre o mundo material e o espiritual. Ele é um espaço dedicado à reverência, ao culto e à comunicação com os Orixás, ancestrais e outras entidades espirituais. Na prática religiosa de cultos afro-brasileiros, como o Candomblé e a Umbanda, o altar é cuidadosamente preparado e mantido, sendo um local de poder e proteção.</p>
<!--a href="#" class="site-btn sb-line">Read more</a-->
</div>
</div>
</div>
</div>

<div class="el-item">
<div class="row">
<div class="col-md-4">
<div class="el-thubm set-bg" data-setbg="img/mata.png"></div>
</div>
<div class="col-md-8">
<div class="el-content">
<div class="el-header">
<!--div class="el-date">
<h2>20</h2>
may
</div-->
<h3>Mata</h3>
<!--div class="el-metas">
<div class="el-meta"><i class="fa fa-user"></i> Vincent John</div>
<div class="el-meta"><i class="fa fa-calendar"></i> Monday, 08:00 Am </div>
<div class="el-meta"><i class="fa fa-map-marker"></i> Central District, Riga, LV-1050, Latvia</div>
</div-->
</div>
<p align="justify">Os Caboclos são entidades espirituais que desempenham um papel fundamental nas religiões de matriz africana, especialmente na Umbanda e em outras tradições afro-brasileiras. São espíritos de ancestrais indígenas, ligados profundamente à natureza, à terra e à mata. Representam a força primitiva e a sabedoria ancestral dos povos indígenas, cuja conexão com os elementos naturais é vista como sagrada e poderosa.</p><p>Esses espíritos, em sua maioria, são associados à energia da mata, à floresta, aos rios e aos animais que nela habitam. Eles são conhecidos por sua sabedoria curadora, por sua força e pela capacidade de se conectar diretamente com as forças da natureza. Os Caboclos possuem uma grande relação com os Orixás da natureza, como Oxóssi, Orixá da caça, das matas e da abundância, e Iansã, Orixá dos ventos e da tempestade, além de outros Orixás ligados à terra e à fertilidade.</p>
<!--a href="#" class="site-btn sb-line">Read more</a-->
</div>
</div>
</div>
</div>

</div>
</div>
</section>


<section class="donate-section spad set-bg" data-setbg="img/ogumMata.jpg">
<div class="container">
<div class="row">
<div class="col-md-6 col-lg-7 donate-content">
<h2>Ser Umbandista</h2>

<p align="justify">É se dar, acima de tudo a um trabalho espiritual. É saber respeitar para ser respeitado, é saber amar para ser amado, é saber ouvir para ser escutado, é saber dar um pouco de si para receber um pouco de Deus dentro de si. Não iremos deixar que nossa umbanda seja deixada de lado, esquecer a nossa umbanda é esquecer de ser religioso e esquecer do nosso propósito neste plano. A caridade, irmandade, ajuda aos necessitados.
</p>
</div>

<!--div class="col-md-6 col-lg-5">
<div class="donate-card">
<h2>$45.000<span>Remaining to helps</span></h2>
<div class="donate-progress-bar">
<div class="pb-inner">
<span>60%</span>
</div>
</div>
<div class="donate-progress-info">
<div class="di-left">
Raised: <span>$50,000</span>
</div>
<div class="di-right">
Goal: <span>$95,000</span>
</div>
</div>
<a href="#" class="site-btn sb-full">DONATE NOW</a>
</div>
</div-->

</div>
</div>
</section>


<section class="blog-section spad">
<div class="container">
<div class="section-title">
<span>Recanto do Axé - RS</span>
<h2>Outros espaços</h2>
</div>
<div class="row">
<div class="col-sm-6 col-md-4">
<div class="blog-item">
<div class="bi-thumb set-bg" data-setbg="img/onibus.png"></div>
<div class="bi-content">
<div class="date">Lugar amplo para estacionamento, entrada para veículos grandes e pequenos<br />&nbsp;</div>
<h4><a href="javascript: void(0)">Entrada para ônibus</a></h4>
<!--div class="bi-author">by <a href="#">Sofia Joelsson</a></div>
<a href="#" class="bi-cata">Hope & Faithful</a-->
</div>
</div>
</div>
<div class="col-sm-6 col-md-4">
<div class="blog-item">
<div class="bi-thumb set-bg" data-setbg="img/ogum.jpg"></div>
<div class="bi-content">
<div class="date">Cabana de Ogum</div>
<h4><a href="javascript: void(0)">Cabanas com alguns orixás</a></h4>
<!--div class="bi-author">by <a href="#">Sofia Joelsson</a></div>
<a href="#" class="bi-cata">color Story</a-->
</div>
</div>
</div>
<div class="col-sm-6 col-md-4">
<div class="blog-item">
<div class="bi-thumb set-bg" data-setbg="img/entrada.jpg"></div>
<div class="bi-content">
<div class="date">Bem vindos ao Recanto do Axé - RS<br />&nbsp;</div>
<h4><a href="javascript: void(0)">É com imensa alegria e respeito que recebemos todos vocês neste espaço sagrado</a></h4>
<!--div class="bi-author">by <a href="#">Sofia Joelsson</a></div>
<a href="#" class="bi-cata">Sermon & Pray</a-->
</div>
</div>
</div>
</div>
</div>
</section>


<section class="newsletter-section">
<!--div class="container">
<div class="row">
<div class="col-sm-12 col-md-7">
<h4>Subscribe And Tell Us Real Story About Your Journey</h4>
</div>
<div class="col-sm-8 col-md-5 col-sm-offset-2 col-md-offset-0">
<form class="newsletter-form">
<input type="email" placeholder="Enter your email">
<button class="nl-send-btn">subscribe</button>
</form>
</div>
</div>
</div-->
</section>


<?php include_once('htm/rodape.htm'); ?>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery.countdown.js"></script>
<script src="js/main.js"></script>

<script type='text/javascript'>
  $('#getting-started')
  .countdown('<?=$ano?>/<?=$mesNum?>/<?=$dia?>', function(event) {
    $(this).text(
      event.strftime('%D days %H:%M:%S')
    );
  });
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0YyDTa0qqOjIerob2VTIwo_XVMhrruxo"></script>
<script src="js/map.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v2b4487d741ca48dcbadcaf954e159fc61680799950996" integrity="sha512-D/jdE0CypeVxFadTejKGTzmwyV10c1pxZk/AqjJuZbaJwGMyNHY3q/mTPWqMUnFACfCTunhZUVcd4cV78dK1pQ==" data-cf-beacon='{"rayId":"7b4515f99fa0a52f","version":"2023.3.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>
</body>

</html>