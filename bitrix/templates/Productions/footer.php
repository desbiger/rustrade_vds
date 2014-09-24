</div>
<!-- #content-->
<?//$APPLICATION->IncludeComponent("bitrix:catalog.section", "brands", array(
//	"IBLOCK_TYPE" => "BRANDS",
//	"IBLOCK_ID" => "5",
//	"SECTION_ID" => "",
//	"SECTION_CODE" => "",
//	"SECTION_USER_FIELDS" => array(
//		0 => "",
//		1 => "",
//	),
//	"ELEMENT_SORT_FIELD" => "sort",
//	"ELEMENT_SORT_ORDER" => "asc",
//	"FILTER_NAME" => "arrFilter",
//	"INCLUDE_SUBSECTIONS" => "Y",
//	"SHOW_ALL_WO_SECTION" => "Y",
//	"PAGE_ELEMENT_COUNT" => "30",
//	"LINE_ELEMENT_COUNT" => "",
//	"PROPERTY_CODE" => array(
//		0 => "ABOUT_BRAND",
//		1 => "",
//	),
//	"SECTION_URL" => "",
//	"DETAIL_URL" => "",
//	"BASKET_URL" => "/personal/basket.php",
//	"ACTION_VARIABLE" => "action",
//	"PRODUCT_ID_VARIABLE" => "id",
//	"PRODUCT_QUANTITY_VARIABLE" => "quantity",
//	"PRODUCT_PROPS_VARIABLE" => "prop",
//	"SECTION_ID_VARIABLE" => "SECTION_ID",
//	"AJAX_MODE" => "N",
//	"AJAX_OPTION_JUMP" => "N",
//	"AJAX_OPTION_STYLE" => "Y",
//	"AJAX_OPTION_HISTORY" => "N",
//	"CACHE_TYPE" => "N",
//	"CACHE_TIME" => "36000000",
//	"CACHE_GROUPS" => "N",
//	"META_KEYWORDS" => "-",
//	"META_DESCRIPTION" => "-",
//	"BROWSER_TITLE" => "-",
//	"ADD_SECTIONS_CHAIN" => "N",
//	"DISPLAY_COMPARE" => "N",
//	"SET_TITLE" => "Y",
//	"SET_STATUS_404" => "N",
//	"CACHE_FILTER" => "N",
//	"PRICE_CODE" => array(),
//	"USE_PRICE_COUNT" => "N",
//	"SHOW_PRICE_COUNT" => "1",
//	"PRICE_VAT_INCLUDE" => "Y",
//	"PRODUCT_PROPERTIES" => array(),
//	"USE_PRODUCT_QUANTITY" => "N",
//	"DISPLAY_TOP_PAGER" => "N",
//	"DISPLAY_BOTTOM_PAGER" => "Y",
//	"PAGER_TITLE" => "Товары",
//	"PAGER_SHOW_ALWAYS" => "Y",
//	"PAGER_TEMPLATE" => "",
//	"PAGER_DESC_NUMBERING" => "N",
//	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
//	"PAGER_SHOW_ALL" => "Y",
//	"AJAX_OPTION_ADDITIONAL" => ""
//), false);?>
<!-- logos -->

</div>
<!-- #container-->


<div class = "sidebar" id = "sideLeft">

	<div class = "left">

		<div class = "left_index">

			<h3>Каталог товаров</h3>


			<div class = "_news">
				<?$APPLICATION->IncludeComponent("bitrix:menu", "horizontal_multilevel_general", array(
					"ROOT_MENU_TYPE" => "razdels",
					"MENU_CACHE_TYPE" => "N",
					"MENU_CACHE_TIME" => "3600",
					"MENU_CACHE_USE_GROUPS" => "Y",
					"MENU_CACHE_GET_VARS" => array(),
					"MAX_LEVEL" => "2",
					"CHILD_MENU_TYPE" => "",
					"USE_EXT" => "N",
					"DELAY" => "N",
					"ALLOW_MULTI_SELECT" => "N"
				), false);?>


			</div>
			<div class="clear" style="margin-top: 10px"></div>


		</div>
	</div>
</div>
<?if($_SERVER['REAL_FILE_PATH'] != '/catalog/detail_page.php'):?>
<div class="right">
	<h3>Список производителей</h3>
	<div class="_news">
		<?$APPLICATION->IncludeComponent(
			"my:catalog.brands.list",
			".default",
			Array(
				"PROP_ID" => "11"
			)
		);?>
	</div>
</div>
<?endif?>
<!-- .sidebar#sideLeft -->

</div>
<!-- #middle-->

</div>
<!-- #wrapper -->
<div id = "footer">
	<div class = "foot_line"></div>
	<div class = "copyright">
		© Rustrade.su 2011<br/>
		Все права защищены.<br/>
		Контактная информация<br/>
	</div>
	<?$APPLICATION->IncludeComponent("bitrix:menu", "bottom_menu", array(
		"ROOT_MENU_TYPE" => "general",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(),
		"MAX_LEVEL" => "2",
		"CHILD_MENU_TYPE" => "",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	), false);?>

</div>
<!-- #footer -->

</body>
</html>