<?php
include_once('config/symbini.php');
if($LANG_TAG != 'en' && file_exists($SERVER_ROOT.'/content/lang/templates/index.' . $LANG_TAG . '.php'))
	include_once($SERVER_ROOT.'/content/lang/templates/index.' . $LANG_TAG . '.php');
else include_once($SERVER_ROOT.'/content/lang/templates/index.en.php');
header('Content-Type: text/html; charset=' . $CHARSET);
?>
<!DOCTYPE html>
<html lang="<?= $LANG_TAG ?>">
<head>
	<title><?= $DEFAULT_TITLE; ?> <?= $LANG['HOME']; ?></title>
	<?php
	include_once($SERVER_ROOT . '/includes/head.php');
	include_once($SERVER_ROOT . '/includes/googleanalytics.php');
	?>
	<script src="js/jquery-3.7.1.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui.min.js" type="text/javascript"></script>
	<script src="js/jquery.slides.js?ver=1"></script>
	<style>
		.hero-bg {
			background-image: url(images/layout/research-landing.jpg);
			background-repeat: no-repeat;
			background-position: 50% 50%;
			background-size: cover;
			color: #FFFFFF;
			line-height: 1.7;
			margin-left: auto;
			margin-right: auto;
			padding-left: 15px;
			padding-right: 15px;
			overflow: hidden;
			width: 100%;
		}

		#hero-container{
			max-width: 1000px;
			margin-left: auto;
			margin-right: auto;
		}

		#hero-slideshow{
			margin-left: auto;
			margin-right: auto;
			width: 375px;
		}

		#main-section{
			max-width: 1000px;
			margin-left: auto;
			margin-right: auto;
		}

		#main-text{
			display: block;
			margin-left: 10%;
			margin-right: 5%;
			font-size: 1.3em;
			line-height: 1.5em;
			vertical-align: top;
		}

		#game-section{
			display: block;
			vertical-align: top;
			text-align: center;
			margin-left: auto;
			margin-right: auto;
			padding-bottom: 3rem;
		}

		@media (min-width: 768px) {
			.hero-bg{
				padding: 3rem 0;
				margin-bottom: 0;
				max-height: 100%;
				width: 100%;
				position: relative;
			}

			#hero-text{
				float: left;
				width: 540px;
			}

			#hero-slideshow{
				float: left;
				width: 375px;
			}

			#main-text{
				display: inline-block;
				margin-left: auto;
				margin-right: auto;
				font-size: 1.5em;
				line-height: 2em;
				width: 60%;
				vertical-align: top;
				padding-top: 4%;
			}

			#game-section{
				display: inline-block;
				vertical-align: top;
				text-align: center;
				margin: 0 auto;
				padding-bottom: 3rem;
				float: right;
			}

		}
	</style>
</head>
<body>
	<?php
	include($SERVER_ROOT . '/includes/header.php');
	?>
	<section>
		<div class="hero-bg">
			<div id="hero-container">
				<div id="hero-text">
					<div style="margin: 0; font-size: 3rem; line-height: 1.5; font-weight: bold; ">Welcome to the Panama Biodiversity Portal</div>
					<p style="font-size: 1.4rem; line-height: 1.8;">
						<?php
						if($LANG_TAG == 'es'){
							?>
							Utilizando plataformas de software innovadoras, de abajo hacia arriba y extensibles, y estrategias de colaboración, ASU y STRI demostrarán los
							beneficios de la investigación y la divulgación del intercambio de datos sobre biodiversidad. El Portal de Biodiversidad de Panamá aprovechará
							el valor del intercambio de datos utilizando información de diferentes fuentes de STRI sobre plantas, insectos, peces, reptiles y aves.
							<?php
						}
						elseif($LANG_TAG == 'fr'){
							?>
							Grâce à des plateformes logicielles innovantes, ascendantes et extensibles, ainsi qu'à des stratégies collaboratives, l'ASU et le STRI démontreront les avantages
							du partage de données sur la biodiversité pour la recherche et la sensibilisation. Le Portail panaméen sur la biodiversité exploitera la valeur du partage de
							données en utilisant des informations provenant de différentes sources du STRI sur les plantes, les insectes, les poissons, les reptiles et les oiseaux.
							<?php
						}
						else{
							//Default Language
							?>
							Using novel, bottom-up, and extensible software platforms and collaborative strategies, ASU and STRI will demonstrate the research and outreach benefits of
							biodiversity data sharing. The Panama Biodiversity Portal will leverage the value of data sharing using information from different
							STRI sources about plants, insects, fish, reptiles, and birds.
							<?php
						}
						?>
					</p>
				</div>
				<div id="hero-slideshow">
					<div style="background-color: #ffffff; float: right;">
						<?php
						$ssId = 1;
						$numSlides = 10;
						$width = 350;
						$dayInterval = 7;
						$interval = 7000;
						$clid = '51';
						$imageType = 'field';
						$numDays = 30;
						ini_set('max_execution_time', 120);
						include_once($SERVER_ROOT.'/classes/PluginsManager.php');
						$pluginManager = new PluginsManager();
						echo $pluginManager->createSlideShow($ssId,$numSlides,$width,$numDays,$imageType,$clid,$dayInterval,$interval);
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div id="main-section" style="vertical-align: middle;">
		<div id="main-text">
			<?php
			if($LANG_TAG == 'es'){
				?>
				<p>
					Actualmente, el portal proporciona acceso a registros de especímenes y datos geoespaciales relacionados.
					Próximamente, esperamos incorporar datos de secuencias de ADN existentes y registros de publicaciones sobre especímenes de vertebrados de STRI.
				</p>
				<p>
					Finalmente, el Portal exportará los datos a diversos servicios web para proporcionar análisis adicionales sobre los patrones de distribución de los vertebrados panameños.
					Estos incluyen la creación de modelos de distribución de especies, el análisis de patrones de coocurrencia de especies y el mapeo de patrones filogeográficos y de códigos de barras de ADN.
				</p>
				<p>
					Esperamos que este portal de datos demuestre el potencial de este enfoque para abordar cuestiones fundamentales de la biología neotropical a escala de Panamá y más allá.
					Invitamos a los usuarios a explorar este recurso emergente y a mantenerse al tanto de las novedades.
				</p>
				<?php
			}
			elseif($LANG_TAG == 'fr'){
				?>
				<p>
					Actuellement, le portail donne accès aux fiches de spécimens et aux données géospatiales associées.
					Nous espérons bientôt intégrer les données de séquences d'ADN existantes et les publications sur les spécimens de vertébrés STRI.
				</p>
				<p>
					À terme, le portail exportera les données vers divers services web afin de fournir des analyses complémentaires sur les schémas de répartition des vertébrés panaméens.
					Ces analyses comprennent la création de modèles de répartition des espèces, l'analyse des schémas de cooccurrence des espèces et la cartographie des schémas phylogéographiques et des codes-barres ADN.
				</p>
				<p>
					Nous espérons que ce portail de données démontrera le potentiel de cette approche pour répondre à des questions fondamentales en biologie néotropicale à l'échelle du Panama et au-delà.
					Nous encourageons les utilisateurs à explorer cette ressource émergente et à rester à l'écoute des ajouts.
				</p>
				<?php
			}
			else{
				?>
				<p>
					Currently, the portal provides access to specimen records and related geo-spatial data.
					Soon, we hope to incorporate existing DNA sequence data and publication records about STRI vertebrate specimens.
				</p>
				<p>
					Ultimately, the Portal will export the data to a variety of web services to provide additional analyses regarding distribution patterns of Panamanian vertebrates.
					These include creation of species distribution models, analysis of species co-occurance patterns, and mapping of phylogeographic and DNA barcode patterns.
				</p>
				<p>
					We expect that this data portal will demonstrate the potential of using this approach to address fundamental questions in Neotropical biology at the scale of Panama and beyond.
					We encourage users to explore this emerging resource and stay tuned for additions.
				</p>
				<?php
			}
			?>
		</div>
		<div id="game-section">
			<div>
				<?php
				$oodID = 1;
				$ootdGameChecklist = 30;
				$ootdGameTitle = "Amphibian of the Day ";
				$ootdGameType = "amphibian";

				include_once($SERVER_ROOT.'/classes/GamesManager.php');
				$gameManager = new GamesManager();
				$gameInfo = $gameManager->setOOTD($oodID,$ootdGameChecklist);
				?>
				<div style="margin:15px;">
					<div style="font-size:130%;font-weight:bold;">
						<?= $ootdGameTitle; ?>
					</div>
					<a href="<?= $CLIENT_ROOT; ?>/games/ootd/index.php?oodid=<?= $oodID.'&cl='.$ootdGameChecklist.'&title='.$ootdGameTitle.'&type='.$ootdGameType; ?>">
						<img src="<?= $gameInfo['images'][0]; ?>" style="width:250px;border:0px;" />
					</a><br/>
					<b>What is this <?= $ootdGameType; ?>?</b><br/>
					<a href="<?= $CLIENT_ROOT; ?>/games/ootd/index.php?oodid=<?= $oodID.'&cl='.$ootdGameChecklist.'&title='.$ootdGameTitle.'&type='.$ootdGameType; ?>">
						Click here to test your knowledge
					</a>
				</div>
			</div>
			<div>
				<?php
				$oodID = 2;
				$ootdGameChecklist = 31;
				$ootdGameTitle = "Bird of the Day ";
				$ootdGameType = "bird";

				$gameManager = new GamesManager();
				$gameInfo = $gameManager->setOOTD($oodID,$ootdGameChecklist);
				?>
				<div style="margin:10px;">
					<div style="font-size:130%;font-weight:bold;">
						<?= $ootdGameTitle; ?>
					</div>
					<a href="<?= $CLIENT_ROOT; ?>/games/ootd/index.php?oodid=<?= $oodID.'&cl='.$ootdGameChecklist.'&title='.$ootdGameTitle.'&type='.$ootdGameType; ?>">
						<img src="<?= $gameInfo['images'][0]; ?>" style="width:250px;border:0px;" />
					</a><br/>
					<b>What is this <?= $ootdGameType; ?>?</b><br/>
					<a href="<?= $CLIENT_ROOT; ?>/games/ootd/index.php?oodid=<?= $oodID.'&cl='.$ootdGameChecklist.'&title='.$ootdGameTitle.'&type='.$ootdGameType; ?>">
						Click here to test your knowledge
					</a>
				</div>
			</div>
			<div>
				<?php
				$oodID = 3;
				$ootdGameChecklist = 32;
				$ootdGameTitle = "Reptile of the Day ";
				$ootdGameType = "reptile";

				$gameManager = new GamesManager();
				$gameInfo = $gameManager->setOOTD($oodID,$ootdGameChecklist);
				?>
				<div style="margin:10px;>
					<div style="font-size:130%;font-weight:bold;">
						<?= $ootdGameTitle; ?>
					</div>
					<a href="<?= $CLIENT_ROOT; ?>/games/ootd/index.php?oodid=<?= $oodID.'&cl='.$ootdGameChecklist.'&title='.$ootdGameTitle.'&type='.$ootdGameType; ?>">
						<img src="<?= $gameInfo['images'][0]; ?>" style="width:250px;border:0px;" />
					</a><br/>
					<b>What is this <?= $ootdGameType; ?>?</b><br/>
					<a href="<?= $CLIENT_ROOT; ?>/games/ootd/index.php?oodid=<?= $oodID.'&cl='.$ootdGameChecklist.'&title='.$ootdGameTitle.'&type='.$ootdGameType; ?>">
						Click here to test your knowledge
					</a>
				</div>
			</div>
		</div>
	</div>
	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?>
</body>
</html>
