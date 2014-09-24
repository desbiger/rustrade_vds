<?
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
	$APPLICATION->SetPageProperty("title", "Каталог торгового оборудования");
	$APPLICATION->SetTitle("Каталог");
?><?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumbs", Array(
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => "s1"
));?>
	<hr/>

<? if ($_REQUEST['SECTION_ID'] || $_REQUEST['BREND']): ?>
	<?
//	$APPLICATION->IncludeComponent("my:catalog.filter", "", Array());
	$template = '.default';
	?>
<? endif ?>

<? if (!$_REQUEST['SECTION_ID'] && !$_REQUEST['BREND']) {
	$template = 'list_categories';
}
?>
<?if ($_REQUEST['BREND']) {
	$GLOBALS['arrFilter']['PROPERTY_BRAND'] = $_REQUEST['BREND'];
}?>
<?$APPLICATION->IncludeComponent("bitrix:catalog.section", $template, array(
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "products",
		"IBLOCK_ID" => "2",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_CODE" => "",
		"SECTION_USER_FIELDS" => array(
				0 => "UF_PRICE",
				1 => "",
		),
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_ORDER" => "asc",
		"FILTER_NAME" => "arrFilter",
		"INCLUDE_SUBSECTIONS" => "Y",
		"SHOW_ALL_WO_SECTION" => "Y",
		"SECTION_URL" => "",
		"DETAIL_URL" => "",
		"BASKET_URL" => "/personal/basket.php",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"META_KEYWORDS" => "",
		"META_DESCRIPTION" => "",
		"BROWSER_TITLE" => "NAME",
		"ADD_SECTIONS_CHAIN" => "Y",
		"DISPLAY_COMPARE" => "N",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "N",
		"PAGE_ELEMENT_COUNT" => "20",
		"LINE_ELEMENT_COUNT" => "",
		"PROPERTY_CODE" => array(
				0 => "SPECIALOFFER",
				1 => "PRICE",
				2 => "PRICECURRENCY",
				3 => "POPULAR",
				4 => "BRAND",
				5 => "LINE_NAME",
				6 => "LENGTH",
				7 => "WIDTH",
				8 => "HEIGHT",
				9 => "WES",
				10 => "TEMPERATURE",
				11 => "POWER",
				12 => "DECRIPTION",
				13 => "KEYWORDS",
				14 => "VOLT",
				15 => "OBJEM",
				16 => "",
		),
		"OFFERS_LIMIT" => "5",
		"PRICE_CODE" => array(),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_PROPERTIES" => array(),
		"USE_PRODUCT_QUANTITY" => "N",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => "",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"DISPLAY_TOP_PAGER" => "Y",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "modern",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"AJAX_OPTION_ADDITIONAL" => ""
), false);
?>

<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>