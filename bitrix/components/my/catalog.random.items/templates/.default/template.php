<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
} ?>
<!--<pre>--><? //print_r($arResult)?><!--</pre>-->

<div class="cat_tit">
	<a href="#">Популярные товары</a> <img src="/bitrix/templates/Productions/img/marker2.png" alt="m2">
</div>
<div class="cat_tov" style="width: 800px">
	<? foreach ($arResult['ITEMS'] as $item): ?>
	<?
		$this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

	<? $file = CFile::ResizeImageGet($item['DETAIL_PICTURE'], array(
			'width' => 150,
			'height' => 150
	)); ?>

	<div class="tovar" id="<?= $this->GetEditAreaId($item['ID']); ?>">
		<a href="<?= $item['DETAIL_PAGE_URL'] ?>">
			<div style="width:143px; height:130px; overflow:hidden;">
				<img src="<?= $file['src'] ?>" alt="1">
		</a>
	</div>
	<?= $item['NAME'] ?><br>
	<br>
	<input type="button" name="" id="" value="В корзину" tovar="<?= $item['ID'] ?>"/>
	<span class="rr"> <?= $item['PRICE'] ?> <?= $znak = $item['PROPS']['PRICECURRENCY']['VALUE'] ? $znak : 'р.' ?>-</span>
</div>
<? endforeach ?>
</div>