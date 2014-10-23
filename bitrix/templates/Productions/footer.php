</div>
<!-- #content-->

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

		</div>

	</div>
</div>
<? if ($_SERVER['REAL_FILE_PATH'] != '/catalog/detail_page.php' && $_SERVER['SCRIPT_NAME'] != '/catalog/index.php' && (preg_match("|catalog|", $_SERVER['REQUEST_URI']) || $_SERVER['REQUEST_URI'] == '/')): ?>
	<div class = "right">
		<h3>Список производителей</h3>

		<div class = "_news">
			<?$APPLICATION->IncludeComponent("my:catalog.brands.list", ".default", Array(
					"PROP_ID" => "11"
			));?>
		</div>
		<div class = "clear" style = "margin-top: 10px"></div>
		<? if ($_REQUEST['SECTION_ID'] && !isset($_REQUEST['ELEMENT_ID'])): ?>
			<?
			$APPLICATION->IncludeComponent("my:catalog.filter", "", Array());
			?>
		<? endif ?>
	</div>
<? endif ?>
</div>
<!-- #wrapper -->

<div class = "ready_projects">
	<?$APPLICATION->IncludeComponent("bitrix:catalog.section", "ready_projects", array(
					"IBLOCK_TYPE" => "products",
					"IBLOCK_ID" => "12",
					"SECTION_ID" => "",
					"SECTION_CODE" => "",
					"SECTION_USER_FIELDS" => array(
							0 => "",
							1 => "",
					),
					"ELEMENT_SORT_FIELD" => "sort",
					"ELEMENT_SORT_ORDER" => "asc",
					"ELEMENT_SORT_FIELD2" => "id",
					"ELEMENT_SORT_ORDER2" => "desc",
					"FILTER_NAME" => "arrFilter",
					"INCLUDE_SUBSECTIONS" => "Y",
					"SHOW_ALL_WO_SECTION" => "Y",
					"PAGE_ELEMENT_COUNT" => "30",
					"LINE_ELEMENT_COUNT" => "3",
					"PROPERTY_CODE" => array(
							0 => "GROUPS",
							1 => "",
					),
					"OFFERS_LIMIT" => "5",
					"SECTION_URL" => "",
					"DETAIL_URL" => "",
					"SECTION_ID_VARIABLE" => "SECTION_ID",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"AJAX_OPTION_HISTORY" => "N",
					"CACHE_TYPE" => "N",
					"CACHE_TIME" => "36000000",
					"CACHE_GROUPS" => "Y",
					"SET_META_KEYWORDS" => "Y",
					"META_KEYWORDS" => "-",
					"SET_META_DESCRIPTION" => "Y",
					"META_DESCRIPTION" => "-",
					"BROWSER_TITLE" => "-",
					"ADD_SECTIONS_CHAIN" => "N",
					"DISPLAY_COMPARE" => "N",
					"SET_TITLE" => "Y",
					"SET_STATUS_404" => "N",
					"CACHE_FILTER" => "N",
					"PRICE_CODE" => array(),
					"USE_PRICE_COUNT" => "N",
					"SHOW_PRICE_COUNT" => "1",
					"PRICE_VAT_INCLUDE" => "Y",
					"BASKET_URL" => "/personal/basket.php",
					"ACTION_VARIABLE" => "action",
					"PRODUCT_ID_VARIABLE" => "id",
					"USE_PRODUCT_QUANTITY" => "N",
					"ADD_PROPERTIES_TO_BASKET" => "Y",
					"PRODUCT_PROPS_VARIABLE" => "prop",
					"PARTIAL_PRODUCT_PROPERTIES" => "N",
					"PRODUCT_PROPERTIES" => array(
							0 => "GROUPS",
					),
					"PAGER_TEMPLATE" => ".default",
					"DISPLAY_TOP_PAGER" => "N",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"PAGER_TITLE" => "Товары",
					"PAGER_SHOW_ALWAYS" => "Y",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "Y",
					"AJAX_OPTION_ADDITIONAL" => "",
					"PRODUCT_QUANTITY_VARIABLE" => "quantity"
			), false);?>
</div>

<div id = "footer">
	<div class = "foot_line"></div>
	<div class = "copyright">
		© Rustrade.su 2011<br/>
		Все права защищены.<br/>
		Контактная информация<br/>
		<br/>
		<br/>
		<!-- Yandex.Metrika informer -->
		<a href = "https://metrika.yandex.ru/stat/?id=26288142&amp;from=informer"
		   target = "_blank" rel = "nofollow"><img src = "//bs.yandex.ru/informer/26288142/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
		                                           style = "width:88px; height:31px; border:0;" alt = "Яндекс.Метрика" title = "Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick = "try{Ya.Metrika.informer({i:this,id:26288142,lang:'ru'});return false}catch(e){}"/></a>
		<!-- /Yandex.Metrika informer -->

		<!-- Yandex.Metrika counter -->
		<script type = "text/javascript">
			(function (d, w, c) {
				(w[c] = w[c] || []).push(function () {
					try {
						w.yaCounter26288142 = new Ya.Metrika({
							id: 26288142,
							clickmap: true,
							trackLinks: true,
							accurateTrackBounce: true
						});
					} catch (e) {
					}
				});

				var n = d.getElementsByTagName("script")[0],
						s = d.createElement("script"),
						f = function () {
							n.parentNode.insertBefore(s, n);
						};
				s.type = "text/javascript";
				s.async = true;
				s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

				if (w.opera == "[object Opera]") {
					d.addEventListener("DOMContentLoaded", f, false);
				} else {
					f();
				}
			})(document, window, "yandex_metrika_callbacks");
		</script>
		<noscript>
			<div><img src = "//mc.yandex.ru/watch/26288142" style = "position:absolute; left:-9999px;" alt = ""/></div>
		</noscript>
		<!-- /Yandex.Metrika counter -->
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