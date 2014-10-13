<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
} ?>
<? foreach ($arResult['ITEMS'] as $vol): ?>
	<? $img = CFile::ResizeImageGet($vol['DETAIL_PICTURE'], array(
			'width' => 200,
			'height' => 200
	)) ?>
	<a rel="gallery" class="fancy" href = "<?= $vol['DETAIL_PICTURE']['SRC'] ?>">
		<img src = "<?= $img['src'] ?>" alt = ""/>
	</a>
<? endforeach ?>