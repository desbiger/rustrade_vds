<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}/** @var array $arParams */
?>

<? foreach ($arResult['ITEMS'] as $vol): ?>
	<div class = "project_node">
		<h2><?= $vol['NAME'] ?></h2>

		<?
			if ($vol['DETAIL_PICTURE']['ID']) {
				$img = CFile::ResizeImageGet($vol['DETAIL_PICTURE']['ID'], array(
						'width' => 300,
						'height' => 300
				), BX_RESIZE_IMAGE_EXACT);
			}
			else {
				$img['src'] = '';
			}
		?>
		<div class = "img_logo">
			<img src = "<?= $img['src'] ?>" alt = ""/>
		</div>
		<div class = "props">
			<ul>
				<? foreach ($vol['PROPERTIES']['PROP']['VALUE'] as $k => $v): ?>
					<li><?= $vol['PROPERTIES']['PROP']['DESCRIPTION'][$k] ?>: <?=$v ?></li>
				<? endforeach ?>
			</ul>
		</div>
	</div>
<? endforeach ?>