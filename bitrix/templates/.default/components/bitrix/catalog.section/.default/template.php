<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
} ?>


<? $section = CIBlockSection::GetList(null, array(
		'SECTION_ID' => $_REQUEST['SECTION_ID'],
		"IBLOCK_ID" => 2
), null, array('UF_*'))
		->GetNext(); ?>
<?


	if (!function_exists('check_show_price')) {
		function check_show_price($section_id)
		{
			global $DB;
			$q   = "
			SELECT
			  *
			FROM
			  b_uts_iblock_14_section AS can_show_section
			WHERE can_show_section.`VALUE_ID` = '{$section_id}'
			";
			$res = $DB->Query($q)
					->fetch();
			if ($res['UF_PRICE'] == 0) {
				return false;
			}
			else {
				return true;
			}

		}
	}
	function GetPictureOfSection($section_id)
	{
		global $DB;
		$q   = "
		 SELECT *  FROM b_iblock_element as el
		 WHERE el.IBLOCK_SECTION_ID = {$section_id}
		 AND !ISNULL(el.DETAIL_PICTURE)
		";
		$res = $DB->Query($q)
				->Fetch();
		return $res['DETAIL_PICTURE'];
	}

	$sub = CIBlockSection::GetList(null, array(
			'IBLOCK_ID' => 2,
			'SECTION_ID' => $_REQUEST['SECTION_ID']
	));
	while ($t = $sub->GetNext()) {
		$subsections[] = $t;
	}
?>
	<!--	<pre>--><? //print_r($subsections)?><!--</pre>-->

<? if ($_REQUEST['ELEMENT_ID']): ?>
	<?$APPLICATION->IncludeComponent("bitrix:catalog.element", "detail_page_of_tovars", array(
			"IBLOCK_TYPE" => "products",
			"IBLOCK_ID" => "2",
			"ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],
			"ELEMENT_CODE" => "",
			"SECTION_ID" => "",
			"SECTION_CODE" => "",
			"PROPERTY_CODE" => array(
					0 => "PRICECURRENCY",
					1 => "POPULAR",
					2 => "BRAND",
					3 => "LINE_NAME",
					4 => "LENGTH",
					5 => "WIDTH",
					6 => "HEIGHT",
					7 => "WES",
					8 => "TEMPERATURE",
					9 => "POWER",
					10 => "DETAIL_TEXT",
					11 => "",
			),
			"SECTION_URL" => "",
			"DETAIL_URL" => "",
			"BASKET_URL" => "/personal/basket.php",
			"ACTION_VARIABLE" => "action",
			"PRODUCT_ID_VARIABLE" => "id",
			"PRODUCT_QUANTITY_VARIABLE" => "quantity",
			"PRODUCT_PROPS_VARIABLE" => "prop",
			"SECTION_ID_VARIABLE" => "SECTION_ID",
			"CACHE_TYPE" => "N",
			"CACHE_TIME" => "36000000",
			"CACHE_GROUPS" => "Y",
			"META_KEYWORDS" => "-",
			"META_DESCRIPTION" => "-",
			"BROWSER_TITLE" => "NAME",
			"SET_TITLE" => "Y",
			"SET_STATUS_404" => "N",
			"ADD_SECTIONS_CHAIN" => "Y",
			"PRICE_CODE" => array(),
			"USE_PRICE_COUNT" => "N",
			"SHOW_PRICE_COUNT" => "1",
			"PRICE_VAT_INCLUDE" => "Y",
			"PRICE_VAT_SHOW_VALUE" => "N",
			"PRODUCT_PROPERTIES" => array(),
			"USE_PRODUCT_QUANTITY" => "N",
			"LINK_IBLOCK_TYPE" => "",
			"LINK_IBLOCK_ID" => "",
			"LINK_PROPERTY_SID" => "",
			"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#"
	), false);?>
<? else: ?>
	<!--	<pre>--><? //print_r($section)?><!--</pre>-->
	<div class = "_catalog">
		<div class = "cat_tit">
			<a href = "#">Каталог товаров<?= $_REQUEST['BREND'] ? " (" . $_REQUEST['BREND'] . ")" : '' ?></a> <img src =
			                                                                                                       "/bitrix/templates/Productions/img/marker2.png"
			                                                                                                       alt
			                                                                                                       =
			                                                                                                       "m2">
		</div>

		<? if (count($subsections) == 0 || $_REQUEST['BREND']): ?>
			<div class = "cat_tov">
				<? foreach ($arResult['ITEMS'] as $item): ?>
					<?
					$this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>
					<? $file = CFile::ResizeImageGet($item['DETAIL_PICTURE']['ID'], array(
							'width' => 150,
							'height' => 150
					)); ?>

					<div class = "tovar" id = "<?= $this->GetEditAreaId($item['ID']); ?>">
						<a href = "<?= $item['DETAIL_PAGE_URL'] ?>"><img src = "<?= $file['src'] ?>" alt = "1"></a>
						<?= $item['NAME'] ?><br>
						<br>
					<span class = "rr">

						<? if ($section['UF_PRICE'] == '1'): ?>
							<?= $item['PROPERTIES']['PRICE']['VALUE'] ?> р.-
						<? endif ?>
						<input type = "button" value = "В корзину" tovar = "<?= $item['ID'] ?>"/>
					</span>
					</div>

				<? endforeach ?>

			</div>


			<p><?= $arResult["NAV_STRING"] ?></p>
		<? else: ?>
			<div class = "cat_tov">
				<? foreach ($subsections as $sub): ?>
					<? $pic = CFile::ResizeImageGet(GetPictureOfSection($sub['ID']), array(
							'width' => 150,
							'height' => 150
					)) ?>
					<div class = "tovar" style = "position: relative">
						<a href = "<?= $sub['SECTION_PAGE_URL'] ?>">
							<img src = "<?= $pic['src'] ?>">
							<br>
							<span style = "position: absolute; bottom: 0"><?= $sub['NAME'] ?></span>
						</a>

					</div>

				<? endforeach ?>
			</div>
		<?endif ?>
	</div>

<?endif ?>