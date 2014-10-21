<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
		"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title><? $APPLICATION->ShowTitle() ?></title>
	<? $APPLICATION->ShowHead() ?>


	<meta name = 'yandex-verification' content = '54208477191fd269'/>
	<meta name = "google-site-verification" content = "XICJliXymiJllQLel1VJ72c1SwLLimIV16GpD2RI-vg"/>

	<link rel = "stylesheet" type = "text/css" href = "/bitrix/templates/Productions/css/style.css"/>
	<!--[if lte IE 6]>
	<link rel = "stylesheet" type = "text/css" href = "/bitrix/templates/Productions/css/style_ie.css"/>
	<![endif]-->

	<script type = "text/javascript" src = "/bitrix/templates/Productions/js/menu.js"></script>
	<script type = "text/javascript" src = "/bitrix/templates/Productions/js/jquery-1.4.3.min.js"></script>
	<script type = "text/javascript" src = "/include/jquery.ui-slider.js"></script>

	<script type = "text/javascript" src = "/bitrix/templates/Productions/js/js.js"></script>
	<script type = "text/javascript" src = "/bitrix/templates/Productions/js/jquery.jcarousel.min.js"></script>
	<script type = "text/javascript" src = "/bitrix/templates/Productions/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

	<link rel = "stylesheet" href = "/bitrix/templates/Productions/css/cssf-base.css" type = "text/css" media = "screen"/>
	<link rel = "stylesheet" href = "/bitrix/templates/Productions/css/main.css" type = "text/css" media = "screen"/>
	<link rel = "stylesheet" href = "/bitrix/templates/Productions/caruosel/skin.css" type = "text/css" media = "screen"/>
	<link rel = "stylesheet" href = "/bitrix/templates/Productions/fancybox/jquery.fancybox-1.3.4.css" type = "text/css"
	      media = "screen"/>
	<!--[if lte IE 6]>
	<link rel = "stylesheet" href = "/bitrix/templates/Productions/css/cssf-ie6.css" type = "text/css" media = "screen"/>
	<![endif]-->
	<!--[if IE 7]>
	<link rel = "stylesheet" href = "/bitrix/templates/Productions/css/cssf-ie7.css" type = "text/css" media = "screen"/>
	<![endif]-->
	<script type = "text/javascript" src = "/bitrix/templates/Productions/js/iepngfix_tilebg.js"></script>
	<script type = "text/javascript">
		$(document).ready(function () {
			$(".fancy").fancybox();

			var right_height = $('.right').height();
			var content_height = $('#content').height();
			if (content_height < right_height) {
				$('#content').css('height', right_height);
			}


		})

	</script>
	<!-- Yandex.Metrika counter -->
	<script type = "text/javascript">
		(function (d, w, c) {
			(w[c] = w[c] || []).push(function () {
				try {
					w.yaCounter16637791 = new Ya.Metrika({id: 16637791, enableAll: true, webvisor: true});
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
				d.addEventListener("DOMContentLoaded", f);
			} else {
				f();
			}
		})(document, window, "yandex_metrika_callbacks");
		jQuery(document).ready(function () {
			jQuery('#mycarousel').jcarousel({
				auto: 4,
				scroll: 1,
				animation: 'slow',
				visible: 3,
				wrap: 'both'
			});
		});


		$(function () {
			$('input[type=button]').click(function () {
				tovar_id = $(this).attr('tovar');
				$.post('/ajax/index.php', {
					PRODUCT_ID: tovar_id
				}, function (data) {
					$('#basket_count').html(data);
					alert('Товар успешно добавлен в корзину');
				});
			});
		})

	</script>

	<noscript>
		<div><img src = "//mc.yandex.ru/watch/16637791" style = "position:absolute; left:-9999px;" alt = ""/></div>
	</noscript>
	<!-- /Yandex.Metrika counter -->


</head>

<body>
<? $APPLICATION->ShowPanel() ?>
<div id = "wrapper">

	<div id = "header">
		<?$APPLICATION->IncludeComponent("bitrix:menu", "base_menu", array(
				"ROOT_MENU_TYPE" => "general",
				"MENU_CACHE_TYPE" => "N",
				"MENU_CACHE_TIME" => "3600",
				"MENU_CACHE_USE_GROUPS" => "Y",
				"MENU_CACHE_GET_VARS" => array(),
				"MAX_LEVEL" => "1",
				"CHILD_MENU_TYPE" => "",
				"USE_EXT" => "N",
				"DELAY" => "N",
				"ALLOW_MULTI_SELECT" => "N"
		), false);?>

		<div class = "sub_top">

			<div class = "logo">
				<a href = "/">&nbsp;</a>
			</div>
			<br/>

			<div class = "sub_input">
				<div class = "cont">
					<img class = "ph" src = "/bitrix/templates/Productions/img/phone.png" width = "18" height = "14" alt = "ph"/>
					8 (495) 790-01-27 &nbsp;&nbsp; / &nbsp;&nbsp; 8 (495) 790-01-27 &nbsp;&nbsp; /&nbsp;&nbsp; Sale@rustrade.su &nbsp;&nbsp;
					/&nbsp;&nbsp; info@afc-project.ru
				</div>


				<div class = "cont" style = "float: right">
					<? $APPLICATION->IncludeComponent("my:basket.small", "", Array()); ?>
					<!--					<a><img class = "ph" src = "/bitrix/templates/Productions/img/cart_4211.png"/> Корзина(0)</a>-->
				</div>

				<?$APPLICATION->IncludeComponent("bitrix:search.form", "search", Array(
						"USE_SUGGEST" => "N",
						"PAGE" => "#SITE_DIR#search/index.php"
				));?>
			</div>
		</div>
	</div>
	<!-- #header-->

	<div class = "post_header">


		<?$APPLICATION->IncludeComponent("bitrix:catalog.section", "general_slider", Array(
				"IBLOCK_TYPE" => "news",
			// Тип инфоблока
				"IBLOCK_ID" => "10",
			// Инфоблок
				"SECTION_ID" => "",
			// ID раздела
				"SECTION_CODE" => "",
			// Код раздела
				"SECTION_USER_FIELDS" => array(    // Свойства раздела
						0 => "",
						1 => "",
				),
				"ELEMENT_SORT_FIELD" => "",
			// По какому полю сортируем элементы
				"ELEMENT_SORT_ORDER" => "",
			// Порядок сортировки элементов
				"ELEMENT_SORT_FIELD2" => "",
			// Поле для второй сортировки элементов
				"ELEMENT_SORT_ORDER2" => "",
			// Порядок второй сортировки элементов
				"FILTER_NAME" => "arrFilter",
			// Имя массива со значениями фильтра для фильтрации элементов
				"INCLUDE_SUBSECTIONS" => "Y",
			// Показывать элементы подразделов раздела
				"SHOW_ALL_WO_SECTION" => "Y",
			// Показывать все элементы, если не указан раздел
				"PAGE_ELEMENT_COUNT" => "30",
			// Количество элементов на странице
				"LINE_ELEMENT_COUNT" => "3",
			// Количество элементов выводимых в одной строке таблицы
				"PROPERTY_CODE" => array(    // Свойства
						0 => "",
						1 => "",
				),
				"OFFERS_LIMIT" => "5",
			// Максимальное количество предложений для показа (0 - все)
				"SECTION_URL" => "",
			// URL, ведущий на страницу с содержимым раздела
				"DETAIL_URL" => "",
			// URL, ведущий на страницу с содержимым элемента раздела
				"SECTION_ID_VARIABLE" => "SECTION_ID",
			// Название переменной, в которой передается код группы
				"AJAX_MODE" => "N",
			// Включить режим AJAX
				"AJAX_OPTION_JUMP" => "N",
			// Включить прокрутку к началу компонента
				"AJAX_OPTION_STYLE" => "Y",
			// Включить подгрузку стилей
				"AJAX_OPTION_HISTORY" => "N",
			// Включить эмуляцию навигации браузера
				"CACHE_TYPE" => "A",
			// Тип кеширования
				"CACHE_TIME" => "36000000",
			// Время кеширования (сек.)
				"CACHE_GROUPS" => "Y",
			// Учитывать права доступа
				"SET_META_KEYWORDS" => "Y",
			// Устанавливать ключевые слова страницы
				"META_KEYWORDS" => "",
			// Установить ключевые слова страницы из свойства
				"SET_META_DESCRIPTION" => "Y",
			// Устанавливать описание страницы
				"META_DESCRIPTION" => "",
			// Установить описание страницы из свойства
				"BROWSER_TITLE" => "-",
			// Установить заголовок окна браузера из свойства
				"ADD_SECTIONS_CHAIN" => "N",
			// Включать раздел в цепочку навигации
				"DISPLAY_COMPARE" => "N",
			// Выводить кнопку сравнения
				"SET_TITLE" => "Y",
			// Устанавливать заголовок страницы
				"SET_STATUS_404" => "N",
			// Устанавливать статус 404, если не найдены элемент или раздел
				"CACHE_FILTER" => "N",
			// Кешировать при установленном фильтре
				"PRICE_CODE" => "",
			// Тип цены
				"USE_PRICE_COUNT" => "N",
			// Использовать вывод цен с диапазонами
				"SHOW_PRICE_COUNT" => "1",
			// Выводить цены для количества
				"PRICE_VAT_INCLUDE" => "Y",
			// Включать НДС в цену
				"BASKET_URL" => "/personal/basket.php",
			// URL, ведущий на страницу с корзиной покупателя
				"ACTION_VARIABLE" => "action",
			// Название переменной, в которой передается действие
				"PRODUCT_ID_VARIABLE" => "id",
			// Название переменной, в которой передается код товара для покупки
				"USE_PRODUCT_QUANTITY" => "N",
			// Разрешить указание количества товара
				"ADD_PROPERTIES_TO_BASKET" => "Y",
			// Добавлять в корзину свойства товаров и предложений
				"PRODUCT_PROPS_VARIABLE" => "prop",
			// Название переменной, в которой передаются характеристики товара
				"PARTIAL_PRODUCT_PROPERTIES" => "N",
			// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
				"PRODUCT_PROPERTIES" => "",
			// Характеристики товара
				"PAGER_TEMPLATE" => "",
			// Шаблон постраничной навигации
				"DISPLAY_TOP_PAGER" => "N",
			// Выводить над списком
				"DISPLAY_BOTTOM_PAGER" => "Y",
			// Выводить под списком
				"PAGER_TITLE" => "Товары",
			// Название категорий
				"PAGER_SHOW_ALWAYS" => "Y",
			// Выводить всегда
				"PAGER_DESC_NUMBERING" => "N",
			// Использовать обратную навигацию
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			// Время кеширования страниц для обратной навигации
				"PAGER_SHOW_ALL" => "Y",
			// Показывать ссылку "Все"
				"AJAX_OPTION_ADDITIONAL" => "",
			// Дополнительный идентификатор
				"PRODUCT_QUANTITY_VARIABLE" => "quantity",
			// Название переменной, в которой передается количество товара
		), false);?>

	</div>
	<div id = "middle">

		<div id = "container">
			<div id = "content">
<? $APPLICATION->IncludeComponent("my:catalog.filter.result", "empty", Array()); ?>