<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
} ?>
<?
	$arResult['ITEMS'] = array();
?>
<?function GetSubsections($section_id)
{
	$result = array();
	$s      = CIBlockSection::GetList(null, array(
			'SECTION_ID' => $section_id,
			"IBLOCK_ID" => 2,
	));
	while ($t = $s->GetNext()) {
		$result[] = $t;
	}
	return $result;
}

	function ItemsCount($section_id)
	{
		return CIBlockElement::GetList(null, array(
				'IBLOCK_ID' => 2,
				'SECTION_ID' => $section_id,
				'INCLUDE_SUBSECTIONS' => 'Y'
		))
				->SelectedRowsCount();
	}

?>

<? $s = CIBlockSection::GetList(array('ID'), array(
		'IBLOCK_SECTION_ID' => $_REQUEST['SECTION_ID'],
		"IBLOCK_ID" => 2,
		'DEPTH_LEVEL' => 1
));
	while ($t = $s->GetNext()) {
		$t['SUBSECTIONS']    = GetSubsections($t['ID']);
		$arResult['ITEMS'][] = $t;
	}
?>
<!--<pre>--><? //print_r($arResult)?><!--</pre>-->

<div class = "_catalog">
	<div class = "cat_tit">
		<a href = "#">Каталог товаров</a> <img src = "/bitrix/templates/Productions/img/marker2.png" alt = "m2">
	</div>


	<? foreach ($arResult['ITEMS'] as $item): ?>


		<div class = "razdel">
			<a href = "<?= $item['SECTION_PAGE_URL'] ?>"><?= $item['NAME'] ?></a> <?=ItemsCount($item['ID'])?>
				<span>
					<? foreach ($item['SUBSECTIONS'] as $sub): ?>
						<a style = "display: inline" href = "<?= $sub['SECTION_PAGE_URL'] ?>"><?= $sub['NAME'] ?></a>,
					<? endforeach ?>
					</span>
		</div>

	<? endforeach ?>


</div>

