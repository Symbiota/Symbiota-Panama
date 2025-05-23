<?php
include_once('../../config/symbini.php');
include_once($SERVER_ROOT.'/classes/OccurrenceExsiccatae.php');
if($LANG_TAG != 'en' && file_exists($SERVER_ROOT.'/content/lang/collections/exsiccati/batchimport.' . $LANG_TAG . '.php')) include_once($SERVER_ROOT.'/content/lang/collections/exsiccati/batchimport.' . $LANG_TAG . '.php');
else include_once($SERVER_ROOT . '/content/lang/collections/exsiccati/batchimport.en.php');
header("Content-Type: text/html; charset=".$CHARSET);

if(!$SYMB_UID) header('Location: ../../profile/index.php?refurl=../collections/exsiccati/batchimport.php?'.htmlspecialchars($_SERVER['QUERY_STRING'], ENT_QUOTES));

$ometid = array_key_exists('ometid',$_REQUEST) ? filter_var($_REQUEST['ometid'], FILTER_SANITIZE_NUMBER_INT) : 0;
$collid = array_key_exists('collid',$_REQUEST) ? filter_var($_REQUEST['collid'], FILTER_SANITIZE_NUMBER_INT) : 0;
$source1 = array_key_exists('source1',$_POST) ? filter_var($_POST['source1'], FILTER_SANITIZE_NUMBER_INT) : 0;
$source2 = array_key_exists('source2',$_POST) ? filter_var($_POST['source2'], FILTER_SANITIZE_NUMBER_INT) : 0;
$formSubmit = array_key_exists('formsubmit',$_POST) ? htmlspecialchars($_POST['formsubmit'], ENT_COMPAT | ENT_HTML401 | ENT_SUBSTITUTE) : '';

$statusStr = '';
$isEditor = 0;
if($IS_ADMIN){
	$isEditor = 1;
}
elseif(array_key_exists('CollAdmin',$USER_RIGHTS) && in_array($collid,$USER_RIGHTS['CollAdmin'])){
	$isEditor = 1;
}
elseif(array_key_exists('CollEditor',$USER_RIGHTS) && in_array($collid,$USER_RIGHTS['CollEditor'])){
	$isEditor = 1;
}

$exsManager = new OccurrenceExsiccatae($formSubmit?'write':'readonly');
if($isEditor && $formSubmit){
	if($formSubmit == 'Import Selected Records'){
		$statusStr = $exsManager->batchImport($collid,$_POST);
	}
	elseif($formSubmit == 'Export Selected Records'){
		$statusStr = $exsManager->exportAsCsv($_POST);
		exit;
	}
}

?>
<!DOCTYPE html>
<html lang="<?php echo $LANG_TAG ?>">
<head>
	<title><?php echo $DEFAULT_TITLE . $LANG['EXS_BATCH_TRANSFER']; ?></title>
	<?php
	include_once($SERVER_ROOT.'/includes/head.php');
	?>
	<script type="text/javascript">
		function verifyExsTableForm(f){
			var formVerified = false;
			for(var h=0;h<f.length;h++){
				if(f.elements[h].name == "occid[]" && f.elements[h].checked){
					formVerified = true;
					break;
				}
			}
			if(!formVerified){
				alert("<?= $LANG['SEL_ONE_RECORD'] ?>");
				return false;
			}
			if(f.collid.value == ""){
				//alert("Target collection must be selected");
				//return false;
			}
			return true;
		}

		function verifyFirstForm(f){
			if(f.ometid.value == ""){
				alert("<?= $LANG['EXS_TITLE_SEL'] ?>");
				return false;
			}
			return true;
		}

		function checkRecord(textObj,occid){
			var cbObj = document.getElementById(occid);
			if(textObj.value == ""){
				cbObj.checked = false;
			}
			else{
				cbObj.checked = true;
			}
		}

		function selectAll(selectObj){
			var boxesChecked = true;
			if(!selectObj.checked){
				boxesChecked = false;
			}
			var f = selectObj.form;
			for(var i=0;i<f.length;i++){
				if(f.elements[i].name == "occid[]") f.elements[i].checked = boxesChecked;
			}
		}

		function openIndPU(occId){
			var wWidth = 900;
			if(document.body.offsetWidth) wWidth = document.body.offsetWidth*0.9;
			if(wWidth > 1200) wWidth = 1200;
			newWindow = window.open('../individual/index.php?occid='+occId,'indspec','scrollbars=1,toolbar=0,resizable=1,width='+(wWidth)+',height=600,left=20,top=20');
			if(newWindow.opener == null) newWindow.opener = self;
			return false;
		}

		function openExsPU(omenid){
			var wWidth = 900;
			if(document.body.offsetWidth) wWidth = document.body.offsetWidth*0.9;
			if(wWidth > 1200) wWidth = 1200;
			newWindow = window.open('index.php?omenid='+omenid,'exsnum','scrollbars=1,toolbar=0,resizable=1,width='+(wWidth)+',height=600,left=20,top=20');
			if(newWindow.opener == null) newWindow.opener = self;
			return false;
		}
	</script>
</head>
<body>
	<?php
	$displayLeftMenu = (isset($collections_exsiccati_batchimport)?$collections_exsiccati_batchimport:false);
	include($SERVER_ROOT.'/includes/header.php');
	?>
	<div class='navpath'>
		<a href="../../index.php"><?= $LANG['HOME'] ?></a> &gt;&gt;
		<a href="index.php"><?= $LANG['EXS_INDEX'] ?></a> &gt;&gt;
		<a href="batchimport.php"><?= $LANG['BATCH_IMP_MOD'] ?></a>
	</div>
	<!-- This is inner text! -->
	<div role="main" id="innertext">
		<h1 class="page-heading"><?= $LANG['EXS_BATCH_IMP'] ?></h1>
		<?php
		if($statusStr){
			echo '<hr/>';
			echo '<div style="margin:10px;color:' . (strpos($statusStr,'SUCCESS') === false ? 'red' : 'green') . ';">' . $statusStr . '</div>';
			echo '<hr/>';
		}
		if(!$ometid){
			if($exsArr = $exsManager->getSelectLookupArr()){
				?>
				<form name="firstform" action="batchimport.php" method="post" onsubmit="return verifyFirstForm(this)">
					<fieldset>
						<legend><b><?= $LANG['BATCH_IMP_MOD'] ?></b></legend>
						<div style="margin:30px">
							<select name="ometid" style="width:500px;" onchange="this.form.submit()">
								<option value=""><?= $LANG['CHOOSE_EXS_SERIES'] ?></option>
								<option value="">------------------------------------</option>
								<?php
								foreach($exsArr as $exid => $titleStr){
									echo '<option value="' . $exid . '">' . $titleStr . '</option>';
								}
								?>
							</select>
							<input name="collid" type="hidden" value="<?php echo $collid; ?>" />
						</div>
					</fieldset>
				</form>
				<?php
			}
			else{
				echo '<div style="margin:20px;font-size:120%;"><b>' . $LANG['NO_OCC_W_EXS'] . '</b></div>';
			}
		}
		elseif($formSubmit == 'Show Exsiccatae Table'){
			$occurArr = $exsManager->getExsOccArr($ometid, 'ometid');
			if($occurArr){
				$exsMetadata = $exsManager->getTitleObj($ometid);
				$exstitle = $exsMetadata['title'].' ['.$exsMetadata['editor'].']';
				echo '<div style="font-size:120%;"><b>'.$exstitle.'</b></div>';
				?>
				<form name="exstableform" method="post" action="batchimport.php" onsubmit="return verifyExsTableForm(this)">
					<div style="margin:10px 0px;">
						<?= $LANG['ENTER_CATNUMS_EXPLAIN'] ?>
					</div>
					<table class="styledtable" style="font-size:12px;">
						<tr><th><input name="selectAllCB" type="checkbox" onchange="selectAll(this)" /></th><th><?= $LANG['CATNUM'] ?></th><th><?= $LANG['EXS_NO'] ?></th><th><?= $LANG['DETAILS'] ?></th></tr>
						<?php
						foreach($occurArr as $omenid => $occArr){
							//Sort by preferred source collections and ranking
							$prefOcc = array();
							if($source1 || $source2){
								foreach($occArr as $id => $oArr){
									if($oArr['collid'] == $source1){
										array_unshift($prefOcc,$id);
									}
									if($oArr['collid'] == $source2){
										array_push($prefOcc,$id);
									}
								}
							}
							$cnt = 0;
							foreach($prefOcc as $oid){
								echo $exsManager->getExsTableRow($oid,$occArr[$oid],$omenid,$collid);
								unset($occArr[$oid]);
								$cnt++;
							}
							foreach($occArr as $occid => $oArr){
								//List maximun of three occurrences for each exsiccata number
								if($cnt < 3 || $oArr['collid'] == $collid){
									echo $exsManager->getExsTableRow($occid,$oArr,$omenid,$collid);
									$cnt++;
								}
							}
						}
						?>
					</table>
					<!--
					<div style="margin:10px 0px">
						<b>Dataset Title</b><br/>
						<input name="dataset" type="text" value="" style="width:300px;" /><br/>
						*Enter value to create a dataset to which imported records will be linked
					</div>
					 -->
					<?php
					if($targetCollArr = $exsManager->getTargetCollArr()){
						?>
						<div style="margin:10px">
							<select name="collid">
								<option value=""><?= $LANG['CHOOSE_TARGET_COLL'] ?></option>
								<option value="">----------------------------------</option>
								<?php
								foreach($targetCollArr as $id => $collName){
									echo '<option value="' . $id . '" ' . ($id == $collid ? 'SELECTED' : '') . '>' . $collName . '</option>';
								}
								?>
							</select>
							<button name="formsubmit" type="submit" value="Import Selected Records"><?= $LANG['IMP_SEL_RECORDS'] ?></button>
						</div>
						<?php
					}
					?>
					<div style="margin:15px">
						<input name="collid" type="hidden" value="<?php echo $collid; ?>" />
						<input name="ometid" type="hidden" value="<?php echo $ometid; ?>" />
						<button name="formsubmit" type="submit" value="Export Selected Records" ><?= $LANG['EXP_SEL_RECORDS'] ?></button>
					</div>
				</form>
				<?php
			}
			else{
				echo '<div style="font-weight:bold;">' . $LANG['NO_SPECS_W_EXS'] . '</div>';
			}
		}
		else{
			?>
			<form name="queryform" action="batchimport.php" method="post">
				<fieldset>
					<legend><b><?= $LANG['BATCH_IMP_MOD'] ?></b></legend>
					<?php
					$exsMeta = $exsManager->getTitleObj($ometid);
					echo '<h2>'.$exsMeta['title'].'</h2>';
					if($sourceCollArr = $exsManager->getCollArr($ometid)){
						?>
						<div style="margin:10px">
							<div>
								<b><?= $LANG['SEL_COLL_SOURCES'] ?></b>
							</div>
							<div style="margin:5px 0px">
								<select name="source1">
									<option value=""><?= $LANG['SOURCE_COLL_1'] ?></option>
									<option value="">------------------------------------</option>
									<?php
									foreach($sourceCollArr as $id => $cTitle){
										echo '<option value="' . $id . '" ' . ($source1 == $id ? 'SELECTED' : '') . '>' . $cTitle . '</option>';
									}
									?>
								</select>
							</div>
							<?php
							if(count($sourceCollArr) > 1){
								?>
								<div style="margin:5px 0px">
									<select name="source2">
										<option value=""><?= $LANG['SOURCE_COLL_2'] ?></option>
										<option value="">------------------------------------</option>
										<?php
										foreach($sourceCollArr as $id => $cTitle){
											echo '<option value="' . $id . '" ' . ($source2 == $id ? 'SELECTED' : '') . '>' . $cTitle . '</option>';
										}
										?>
									</select>
								</div>
								<?php
							}
							?>
						</div>
						<?php
					}
					?>
					<div style="margin:20px">
						<input name="collid" type="hidden" value="<?php echo $collid; ?>" />
						<input name="ometid" type="hidden" value="<?php echo $ometid; ?>" />
						<button name="formsubmit" type="submit" value="Show Exsiccatae Table" ><?= $LANG['SHOW_EXS_TABLE'] ?></button>
					</div>
				</fieldset>
			</form>
			<?php
		}
		?>
	</div>
	<?php
	include($SERVER_ROOT.'/includes/footer.php');
	?>
</body>
