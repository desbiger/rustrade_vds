<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Новинки");
$APPLICATION->SetTitle("Новинки");
?><?$GLOBALS['newFilter'] = array("PROPERTY_NEW_PRODUCT_VALUE" => "да")?>
<?$APPLICATION->IncludeComponent("bitrix:catalog.section", "Novinki", array(
	"IBLOCK_TYPE" => "products",
	"IBLOCK_ID" => "2",
	"SECTION_ID" => $_REQUEST["SECTION_ID"],
	"SECTION_CODE" => "",
	"SECTION_USER_FIELDS" => array(
		0 => "",
		1 => "",
	),
	"ELEMENT_SORT_FIELD" => "sort",
	"ELEMENT_SORT_ORDER" => "asc",
	"FILTER_NAME" => "newFilter",
	"INCLUDE_SUBSECTIONS" => "Y",
	"SHOW_ALL_WO_SECTION" => "Y",
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
		15 => "NEW_PRODUCT",
		16 => "OBJEM",
		17 => "",
	),
	"SECTION_URL" => "",
	"DETAIL_URL" => "",
	"BASKET_URL" => "/personal/basket.php",
	"ACTION_VARIABLE" => "action",
	"PRODUCT_ID_VARIABLE" => "id",
	"PRODUCT_QUANTITY_VARIABLE" => "quantity",
	"PRODUCT_PROPS_VARIABLE" => "prop",
	"SECTION_ID_VARIABLE" => "SECTION_ID",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "N",
	"CACHE_TIME" => "36000000",
	"CACHE_GROUPS" => "Y",
	"META_KEYWORDS" => "",
	"META_DESCRIPTION" => "",
	"BROWSER_TITLE" => "NAME",
	"ADD_SECTIONS_CHAIN" => "Y",
	"DISPLAY_COMPARE" => "N",
	"SET_TITLE" => "Y",
	"SET_STATUS_404" => "N",
	"CACHE_FILTER" => "N",
	"PRICE_CODE" => array(
	),
	"USE_PRICE_COUNT" => "N",
	"SHOW_PRICE_COUNT" => "1",
	"PRICE_VAT_INCLUDE" => "Y",
	"PRODUCT_PROPERTIES" => array(
		0 => "SPECIALOFFER",
	),
	"USE_PRODUCT_QUANTITY" => "N",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "N",
	"PAGER_TITLE" => "Товары",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "modern",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>