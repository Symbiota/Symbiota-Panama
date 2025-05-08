<meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
<?php
$CSS_VERSION = '4';
?>
<link href="<?= $CSS_BASE_PATH ?>/symbiota/header.css?ver=<?= $CSS_VERSION ?>" type="text/css" rel="stylesheet">
<link href="<?= $CSS_BASE_PATH ?>/symbiota/footer.css?ver=<?= $CSS_VERSION ?>" type="text/css" rel="stylesheet">
<link href="<?= $CSS_BASE_PATH ?>/symbiota/main.css?ver=<?= $CSS_VERSION ?>" type="text/css" rel="stylesheet">
<link href="<?= $CSS_BASE_PATH ?>/symbiota/customizations.css?ver=<?= $CSS_VERSION ?>" type="text/css" rel="stylesheet">
<?php
if($ACCESSIBILITY_ACTIVE){
	?>
	<link href="<?= $CSS_BASE_PATH ?>/symbiota/accessibility-compliant.css?ver=<?= $CSS_VERSION ?>" type="text/css" rel="stylesheet" data-accessibility-link="accessibility-css-link" >
	<link href="<?= $CSS_BASE_PATH ?>/symbiota/condensed.css?ver=<?= $CSS_VERSION ?>" type="text/css" rel="stylesheet" data-accessibility-link="accessibility-css-link" disabled >
	<?php
} else{
	?>
	<link href="<?= $CSS_BASE_PATH ?>/symbiota/accessibility-compliant.css?ver=<?= $CSS_VERSION ?>" type="text/css" rel="stylesheet" data-accessibility-link="accessibility-css-link" disabled >
	<link href="<?= $CSS_BASE_PATH ?>/symbiota/condensed.css?ver=<?= $CSS_VERSION ?>" type="text/css" rel="stylesheet" data-accessibility-link="accessibility-css-link" >
	<?php
}
?>
<script src="<?= $CLIENT_ROOT ?>/js/symb/lang.js" type="text/javascript"></script>

