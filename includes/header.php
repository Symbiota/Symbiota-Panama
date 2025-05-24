<?php
if($LANG_TAG == 'en' || !file_exists($SERVER_ROOT.'/content/lang/templates/header.' . $LANG_TAG . '.php'))
	include_once($SERVER_ROOT . '/content/lang/templates/header.en.php');
else include_once($SERVER_ROOT . '/content/lang/templates/header.' . $LANG_TAG . '.php');
?>
<div class="header-wrapper">
	<header>
		<div class="top-wrapper">
			<a class="screen-reader-only" href="#end-nav"><?= $LANG['H_SKIP_NAV'] ?></a>
			<nav class="top-login" aria-label="horizontal-nav">
				<?php
				if ($USER_DISPLAY_NAME) {
					?>
					<div class="welcome-text bottom-breathing-room-rel">
						<?= $LANG['H_WELCOME'] . ' ' . $USER_DISPLAY_NAME ?>!
					</div>
					<span id="profile">
						<form name="profileForm" method="post" action="<?= $CLIENT_ROOT ?>/profile/viewprofile.php">
							<button class="button button-tertiary bottom-breathing-room-rel left-breathing-room-rel" name="profileButton" type="submit"><?= $LANG['H_MY_PROFILE'] ?></button>
						</form>
					</span>
					<span id="logout">
						<form name="logoutForm" method="post" action="<?= $CLIENT_ROOT ?>/profile/index.php?submit=logout">
							<button class="button button-secondary bottom-breathing-room-rel left-breathing-room-rel" name="logoutButton" type="submit"><?= $LANG['H_LOGOUT'] ?></button>
						</form>
					</span>
					<?php
				} else {
					?>
					<span id="login">
						<form name="loginForm" method="post" action="<?= $CLIENT_ROOT . "/profile/index.php" ?>">
							<input name="refurl" type="hidden" value="<?= htmlspecialchars($_SERVER['SCRIPT_NAME'], ENT_COMPAT | ENT_HTML401 | ENT_SUBSTITUTE) . "?" . htmlspecialchars($_SERVER['QUERY_STRING'], ENT_QUOTES) ?>">
							<button class="button button-secondary bottom-breathing-room-rel left-breathing-room-rel" name="loginButton" type="submit"><?= $LANG['H_LOGIN'] ?></button>
						</form>
					</span>
					<?php
				}
				?>
			</nav>
			<div class="top-brand">
				<a href="<?= $CLIENT_ROOT ?>">
					<div class="image-container">
						<img src="<?= $CLIENT_ROOT ?>/images/layout/logo_stri.svg" alt="STRI logo">
					</div>
				</a>
				<div class="brand-name">
				</div>
			</div>
		</div>
		<div class="menu-wrapper">
			<!-- Hamburger icon -->
			<input class="side-menu" type="checkbox" id="side-menu" name="side-menu" />
			<label class="hamb hamb-line hamb-label" for="side-menu" tabindex="0">☰</label>
			<!-- Menu -->
			<nav class="top-menu" aria-label="hamburger-nav">
				<ul class="menu">
					<li>
						<a href="<?= $CLIENT_ROOT ?>/index.php">
							<?= $LANG['H_HOME'] ?>
						</a>
					</li>
					<li>
						<a href="#" ><?= $LANG['H_SEARCH'] ?></a>
						<ul>
							<li><a href="<?= $CLIENT_ROOT; ?>/collections/index.php" ><?= $LANG['H_COLLECTIONS_CLASSIC'] ?></a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/collections/search/index.php" ><?= $LANG['H_COLLECTIONS_NEW'] ?></a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/collections/misc/collprofiles.php" ><?= $LANG['H_COLLECTION_LIST'] ?></a></li>
						</ul>
					</li>
					<li><a href="<?= $CLIENT_ROOT; ?>/collections/map/index.php" ><?= $LANG['H_MAP_SEARCH'] ?></a></li>
					<li>
						<a href="#" ><?= $LANG['H_IMAGES'] ?></a>
						<ul>
							<li><a href="<?= $CLIENT_ROOT; ?>/imagelib/index.php" ><?= $LANG['H_IMAGE_BROWSER'] ?></a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/imagelib/search.php" ><?= $LANG['H_IMAGE_SEARCH'] ?></a></li>
						</ul>
					</li>
					<li>
						<a href="#" ><?= $LANG['H_INVENTORIES'] ?></a>
						<ul>
							<li><a href="<?= $CLIENT_ROOT; ?>/checklists/checklist.php?clid=23" >Birds of Piñas Bay</a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/checklists/checklist.php?clid=66" >Myrtaceae</a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/checklists/checklist.php?clid=86" >Treehoppers of BCI</a></li>
						</ul>
					</li>
					<!--
					<li>
						<a href="#" ><?= $LANG['H_INVENTORIES'] ?></a>
						<ul>
							Birds of Piñas Bay, Darién, Panama
							<li><a href="<?= $CLIENT_ROOT; ?>/projects/index.php?pid=20" >Barro Colorado Island</a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/projects/index.php?pid=21" >Bocas del Toro</a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/projects/index.php?pid=19" >Isla Coiba</a></li>
							<li>----------------------</li>
							<li><a href="<?= $CLIENT_ROOT; ?>/projects/index.php?pid=18" >Algae</a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/projects/index.php?pid=1" >Amphibians</a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/projects/index.php?pid=3" >Birds</a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/projects/index.php?pid=4" >Fishes</a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/projects/index.php?pid=12">Insects &amp; Arachnids</a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/projects/index.php?pid=11">Mammals</a></li>
							<li><a href="https://invertebase.org/stri/projects/index.php?pid=4" target="_blank">Marine Invertebrates (Invert-E-Base)</a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/projects/index.php?pid=10" >Plants</a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/projects/index.php?pid=2" >Reptiles</a></li>
						</ul>
					</li>
					<li>
						<a href="#"><?= $LANG['H_DYN_KEYS'] ?></a>
						<ul>
							<li><a href="<?= $CLIENT_ROOT; ?>/ident/key.php?cl=64&proj=10&dynclid=0&taxon=All+Species">Barro Colorado Plants</a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/ident/key.php?cl=65&proj=10&dynclid=0&taxon=All+Species">Campana National Park Plants</a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/ident/key.php?cl=59&proj=10&dynclid=0&taxon=All+Species">&quot;Dicot&quot; of Panama</a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/ident/key.php?cl=60&proj=10&dynclid=0&taxon=All+Species">Ferns and Allies of Panama</a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/ident/key.php?cl=61&proj=10&dynclid=0&taxon=All+Species">Monocots of Panama</a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/ident/key.php?cl=66&proj=10&dynclid=0&taxon=All+Species">Myrtaceae of Panama</a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/ident/key.php?cl=72&proj=10&dynclid=0&taxon=All+Species">Panama Liana Atlas</a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/ident/key.php?cl=71&proj=10&dynclid=0&taxon=All+Species">Panama Tree Atlas</a></li>
						</ul>
					</li>
					<li>
						<a href="#" ><?= $LANG['H_DYN_LISTS'] ?></a>
						<ul>
							<li><a href="<?= $CLIENT_ROOT; ?>/checklists/dynamicmap.php?interface=checklist&tid=10349&taxa=Amphibia" >Amphibians</a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/checklists/dynamicmap.php?interface=checklist&tid=56&taxa=Aves" >Birds</a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/checklists/dynamicmap.php?interface=checklist&tid=4773&taxa=Actinopterygii" >Fish</a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/checklists/dynamicmap.php?interface=checklist&tid=13726&taxa=Plantae" >Plant List</a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/checklists/dynamicmap.php?interface=key&tid=13726&taxa=Plantae" >Plant Key</a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/checklists/dynamicmap.php?interface=checklist&tid=10350&taxa=Reptilia" >Reptiles</a></li>
						</ul>
					</li>
					 -->
					<li>
						<a href="#" ><?= $LANG['H_GLOSSARY'] ?></a>
						<ul>
							<!--
							<li><a href="<?= $CLIENT_ROOT; ?>/misc/glossarycover.php" >Background</a></li>
							-->
							<li><a href="<?= $CLIENT_ROOT; ?>/glossary/sources.php" >Contributors</a></li>
							<li><a href="<?= $CLIENT_ROOT; ?>/glossary/index.php" ><?= $LANG['H_GLOSSARY_SEARCH'] ?></a></li>
						</ul>
					</li>
					<li id="lang-select-li">
						<label for="language-selection"><?= $LANG['H_SELECT_LANGUAGE'] ?> </label>
						<select oninput="setLanguage(this)" id="language-selection" name="language-selection">
							<option value="en">English</option>
							<option value="es" <?= ($LANG_TAG=='es'?'SELECTED':'') ?>>Español</option>
							<option value="fr" <?= ($LANG_TAG=='fr'?'SELECTED':'') ?>>Français</option>
						</select>
					</li>
				</ul>
			</nav>
		</div>
		<div id="end-nav"></div>
	</header>
</div>
