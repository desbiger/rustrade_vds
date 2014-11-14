<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Каталог торгового оборудования");
$APPLICATION->SetTitle("Каталог");
	require_once($_SERVER["DOCUMENT_ROOT"] . "/import/class/import.php");
	CModule::IncludeModule('my');
?><?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"breadcrumbs",
	Array(
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => "s1"
	)
);?><?$APPLICATION->IncludeComponent(
	"bitrix:catalog.element", 
	"detail_page_of_tovars", 
	array(
		"IBLOCK_TYPE" => "products",
		"IBLOCK_ID" => import::$iblock_id,
		"ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],
		"ELEMENT_CODE" => $_REQUEST["ELEMENT_CODE"],
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_CODE" => $_REQUEST["SECTION_CODE"],
		"SECTION_URL" => "",
		"DETAIL_URL" => "",
		"BASKET_URL" => "/personal/basket.php",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "PRICE",
			2 => "SPECIALOFFER",
			3 => "PRICECURRENCY",
			4 => "POPULAR",
			5 => "BRAND",
			6 => "LINE_NAME",
			7 => "LENGTH",
			8 => "WIDTH",
			9 => "HEIGHT",
			10 => "WES",
			11 => "TEMPERATURE",
			12 => "POWER",
			13 => "DECRIPTION",
			14 => "KEYWORDS",
			15 => "VOLT",
			16 => "OBJEM",
			17 => "",
		),
		"OFFERS_LIMIT" => "0",
		"PRICE_CODE" => array(
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_PROPERTIES" => array(
		),
		"USE_PRODUCT_QUANTITY" => "N",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_IBLOCK_ID" => "",
		"LINK_PROPERTY_SID" => "",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"USE_ELEMENT_COUNTER" => "Y",
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PARTIAL_PRODUCT_PROPERTIES" => "N"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>