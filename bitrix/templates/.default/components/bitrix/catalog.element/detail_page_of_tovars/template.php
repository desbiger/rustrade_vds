<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
} ?>
<!--<pre>--><? //print_r($arResult)?><!--</pre>-->
<? $section = CIBlockSection::GetList(null, array(
		'ID' => $arResult['IBLOCK_SECTION_ID'],
		"IBLOCK_ID" => 2
), null, array('UF_*'))
		->GetNext(); ?>
<? $arResult['DETAIL_TEXT'] = str_replace("[br]", "<br>", $arResult['DETAIL_TEXT']); ?>
<div style = "overflow: hidden;">
	<h1><?= $arResult['NAME'] ?></h1><br>
	<hr>
	<div class = "image_div_detail_page">
		<div style = "width:500px; overflow:hidden; padding-top:10px; text-align: center">
			<?$img = CFile::ResizeImageGet($arResult['DETAIL_PICTURE']['ID'], array(
					'width' => 400,
					'height' => 500
			))?>
			<a class = "fancy" style="overflow: hidden; display: block" href = "<?= $arResult['DETAIL_PICTURE']['SRC'] ?>">
				<img title = "<?= $arResult['NAME'] ?>" src = "<?= $img['src'] ?>"/>
			</a>

			<div style = "clear: both; width: 500px; padding: 20px; text-align: center; display: table-cell">
				<input style="position: inherit; display: inherit" type = "button" tovar="<?=$arResult['ID']?>" value = "В корзину"/>
			</div>
		</div>
	</div>
	<div style = "float: left; width: 300px; margin: 30px">

		<? if ($arResult['PROPERTIES']['SHOW_PRICE']['VALUE'] == 'да' or $section['UF_PRICE'] == '1'): ?>
			<div class = "catalog-price">
				<?= $arResult['PROPERTIES']['PRICE']['VALUE'] ?> р.
			</div>
		<? endif ?>

		<span style = "text-align:left;"><h2>Описание</h2></span>
		<br>
		<table class = "properties">
			<? foreach ($arResult['PROPERTIES']['XML_PROP']['~DESCRIPTION'] as $key => $vol): ?>
				<tr>
					<!--					--><? //var_dump($vol)?>
					<td><?= preg_replace("|.*<li>([^>]+)|u", "$1", $vol) ?></td>
					<td><?= $arResult['PROPERTIES']['XML_PROP']['VALUE'][$key] ?></td>
				</tr>
			<? endforeach ?>
		</table>


	</div>
	<div class = "clear" style = "margin-bottom: 50px"></div>
	<? if ($arResult['~DETAIL_TEXT']): ?>
		<? $text = preg_replace("|(<div[^>]+>Описание</div>).*|mUu", "$2", $arResult['DETAIL_TEXT']) ?>
		<? $text = preg_replace("|(.*)(<div[^>]+>Совместимость</div>(.*)<div[^>]*clear[^>]*></div>)(.*)|mUu", "$1$4", $text) ?>
		<div style = "text-align:left;">
			<h2>Подробно</h2>

			<p><?= $text ?></p>
		</div>
	<? endif ?>
	<? if (is_array($arResult['PROPERTIES']['AKSESSUARY']['VALUE'])): ?>
		<h2>Аксессуары</h2>
		<br>
		<? $elements = CIBlockElement::GetList(null, array('XML_ID' => $arResult['PROPERTIES']['AKSESSUARY']['VALUE'])) ?>
		<? while ($vol = $elements->GetNext()): ?>
			<? $img = CFile::ResizeImageGet($vol['DETAIL_PICTURE'], array(
					'width' => 100,
					'height' => 100
			)) ?>
			<div class = "aksess">
				<div class = "img">
					<img src = "<?= $img['src'] ?>">
				</div>
				<a href = "<?= $vol['DETAIL_PAGE_URL'] ?>"><?= $vol['NAME'] ?></a>
			</div>
		<? endwhile ?>
	<? endif ?>

	<!--    <h3>Производитель: --><? //=strip_tags($arResult['DISPLAY_PROPERTIES']['BRAND']['DISPLAY_VALUE'])?><!--</h3>-->
</div>



