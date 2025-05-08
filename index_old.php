<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
include_once("config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?> Home</title>
	<?php
	include_once($SERVER_ROOT.'/includes/head.php');
	include_once($SERVER_ROOT.'/includes/googleanalytics.php');
	?>
	<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui-1.12.1/jquery-ui.js" type="text/javascript"></script>
	<script src="js/jquery.slides.js"></script>
	<style>
		.hero-bg {
			background-image: url(images/layout/research-landing.jpg);
			background-repeat: no-repeat;
			background-position: 50% 50%;
			background-size: cover;
			color: #FFFFFF;
			line-height: 1.7;
			margin-right: auto;
			margin-left: auto;
			padding-left: 15px;
			padding-right: 15px;
			overflow: hidden;
			width: 100%;
		}

		@media (min-width: 790px) {
			.hero-bg {
				padding: 3rem 0;
				margin-bottom: 0;
				max-height: 100%;
				width: 100%;
				position: relative;
			}
		}
	</style>
</head>
<body>
	<?php
	include($SERVER_ROOT."/includes/header.php");
	?>
	<!-- This is inner text! -->
	<div id="" style="padding-top: 0 !important">

		<section>
			<!-- Hero -->
			<div class="hero-bg">
				<div class="container">
					<div class="seven columns">
						<h1 style="margin: 0; font-size: 3rem; line-height: 1;">Welcome to the Panama Biodiversity Portal</h1>
						<p style="font-size: 1.2rem; line-height: 1.7;">
							Using novel, bottom-up, and extensible software platforms and collaborative strategies, ASU and STRI will demonstrate the research and outreach benefits of
							biodiversity data sharing. The Panama Biodiversity Portal will leverage the value of data sharing using information from different STRI sources about plants, insects, fish, reptiles, and birds.
						</p>
					</div>
					<!-- Slideshow -->
					<div class="five columns">
						<div style="background-color:#ffffff;float:right;">
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
							//echo $pluginManager->createSlideShow($ssId,$numSlides,$width,$numDays,$imageType,$clid,$dayInterval,$interval);
							?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="container" style="vertical-align: middle;">
			<div class="seven columns" style="font-size: 1.3em;line-height: 2em;width: 50%;display: inline-block;vertical-align: top;padding-top: 4%;">
				<p>Currently, the portal provides access to specimen records and related geo-spatial data. Soon, we hope to incorporate existing DNA sequence data and publication records about STRI vertebrate specimens.</p>
				<p>Ultimately, the Portal will export the data to a variety of web services to provide additional analyses regarding distribution patterns of Panamanian vertebrates. These include creation of species distribution models, analysis of species co-occurance patterns, and mapping of phylogeographic and DNA barcode patterns.</p>
				<p>We expect that this data portal will demonstrate the potential of using this approach to address fundamental questions in Neotropical biology at the scale of Panama and beyond. We encourage users to explore this emerging resource and stay tuned for additions.</p>
			</div>

			<!-- Games -->
			<div class="five columns" style="display: inline-block;vertical-align: top;text-align: center;margin: 0 auto; padding-bottom: 3rem; float: right;">
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
					<div style="float:right;margin:10px;width:290px;text-align:center;">
						<div style="font-size:130%;font-weight:bold;">
							<?php echo $ootdGameTitle; ?>
						</div>
						<a href="<?php echo $CLIENT_ROOT; ?>/games/ootd/index.php?oodid=<?php echo $oodID.'&cl='.$ootdGameChecklist.'&title='.$ootdGameTitle.'&type='.$ootdGameType; ?>">
							<img src="<?php echo $gameInfo['images'][0]; ?>" style="width:250px;border:0px;" />
						</a><br/>
						<b>What is this <?php echo $ootdGameType; ?>?</b><br/>
						<a href="<?php echo $CLIENT_ROOT; ?>/games/ootd/index.php?oodid=<?php echo $oodID.'&cl='.$ootdGameChecklist.'&title='.$ootdGameTitle.'&type='.$ootdGameType; ?>">
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
					<div style="float:right;margin:10px;width:290px;text-align:center;">
						<div style="font-size:130%;font-weight:bold;">
							<?php echo $ootdGameTitle; ?>
						</div>
						<a href="<?php echo $CLIENT_ROOT; ?>/games/ootd/index.php?oodid=<?php echo $oodID.'&cl='.$ootdGameChecklist.'&title='.$ootdGameTitle.'&type='.$ootdGameType; ?>">
							<img src="<?php echo $gameInfo['images'][0]; ?>" style="width:250px;border:0px;" />
						</a><br/>
						<b>What is this <?php echo $ootdGameType; ?>?</b><br/>
						<a href="<?php echo $CLIENT_ROOT; ?>/games/ootd/index.php?oodid=<?php echo $oodID.'&cl='.$ootdGameChecklist.'&title='.$ootdGameTitle.'&type='.$ootdGameType; ?>">
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
					<div style="float:right;margin:10px;width:290px;text-align:center;">
						<div style="font-size:130%;font-weight:bold;">
							<?php echo $ootdGameTitle; ?>
						</div>
						<a href="<?php echo $CLIENT_ROOT; ?>/games/ootd/index.php?oodid=<?php echo $oodID.'&cl='.$ootdGameChecklist.'&title='.$ootdGameTitle.'&type='.$ootdGameType; ?>">
							<img src="<?php echo $gameInfo['images'][0]; ?>" style="width:250px;border:0px;" />
						</a><br/>
						<b>What is this <?php echo $ootdGameType; ?>?</b><br/>
						<a href="<?php echo $CLIENT_ROOT; ?>/games/ootd/index.php?oodid=<?php echo $oodID.'&cl='.$ootdGameChecklist.'&title='.$ootdGameTitle.'&type='.$ootdGameType; ?>">
							Click here to test your knowledge
						</a>
					</div>
				</div>
			</div>
		</section>
	</div>
	<?php
	include($SERVER_ROOT."/includes/footer.php");
	?>
</body>
</html>