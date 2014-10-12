<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
} ?>


	<!--<pre style="text-align: left;">--><?// print_r($arResult) ?><!--</pre>-->

<? if (count($arResult['ITEMS']) > 0): ?>

	<div class = "_news2">
		<b> Новинки </b>&nbsp;&nbsp; <a href = "/catalog/novinki.php">Все новинки</a> <img alt = "m2"
		                                                                                   src = "/bitrix/templates/Productions/img/marker2.png">

		<?foreach ($arResult['ITEMS'] as $item): ?>
			<br><br>
			<?$file = CFile::ResizeImageGet($item['DETAIL_PICTURE']['ID'], array(
				"width" => 159,
				"height" => 159
			))?>

			<img alt = "<?= $item['NAME'] ?>" src = "<?= $file['src'] ?>">
			<br><br>

			<div class = "pt">
				<a href = "<?= $item['DETAIL_PAGE_URL'] ?>">
					<?=$item['NAME']?>
				</a>
			</div>
		<? endforeach?>
	</div>
<? endif ?>