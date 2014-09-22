<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
		"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title><?$APPLICATION->ShowTitle()?></title>
	<?$APPLICATION->ShowHead()?>


	<meta name='yandex-verification' content='54208477191fd269' />
	<meta name = "google-site-verification" content = "XICJliXymiJllQLel1VJ72c1SwLLimIV16GpD2RI-vg"/>

	<link rel = "stylesheet" type = "text/css" href = "/bitrix/templates/Productions/css/style.css"/>
	<!--[if lte IE 6]>
	<link rel = "stylesheet" type = "text/css" href = "/bitrix/templates/Productions/css/style_ie.css"/>
	<![endif]-->

	<script type = "text/javascript" src = "/bitrix/templates/Productions/js/menu.js"></script>
	<script type = "text/javascript" src = "/bitrix/templates/Productions/js/jquery-1.4.3.min.js"></script>
	<script type="text/javascript" src="/include/jquery.ui-slider.js"></script>

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
					$.post('/ajax/index.php',{
						PRODUCT_ID: tovar_id
					},function(data){
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
<?$APPLICATION->ShowPanel()?>

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
					8 (495) 790-01-27 &nbsp;&nbsp; / &nbsp;&nbsp; 8 (495) 790-01-27 &nbsp;&nbsp; /&nbsp;&nbsp;  Sale@rustrade.su &nbsp;&nbsp; /&nbsp;&nbsp;  info@afc-project.ru
				</div>


				<div class = "cont" style = "float: right">
					<?$APPLICATION->IncludeComponent(
						"my:basket.small",
						"",
						Array(
						)
					);?>
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

		<div class = "slider">
			<div class = "folio_block">

				<div class = "main_view">

					<div class = "window">
						<div class = "image_reel">
							<a href = "#"><img src = "/bitrix/templates/Productions/img/banner.png" alt = ""/></a>
							<a href = "#"><img src = "/bitrix/templates/Productions/img/banner.png" alt = ""/></a>
							<a href = "#"><img src = "/bitrix/templates/Productions/img/banner.png" alt = ""/></a>
							<a href = "#"><img src = "/bitrix/templates/Productions/img/banner.png" alt = ""/></a>
							<a href = "#"><img src = "/bitrix/templates/Productions/img/banner.png" alt = ""/></a>
							<a href = "#"><img src = "/bitrix/templates/Productions/img/banner.png" alt = ""/></a>
							<a href = "#"><img src = "/bitrix/templates/Productions/img/banner.png" alt = ""/></a>
							<a href = "#"><img src = "/bitrix/templates/Productions/img/banner.png" alt = ""/></a>
						</div>
					</div>
					<div class = "paging">

						<a href = "#" rel = "1">&nbsp;</a>
						<a href = "#" rel = "2">&nbsp;</a>
						<a href = "#" rel = "3">&nbsp;</a>
						<a href = "#" rel = "4">&nbsp;</a>
					</div>
				</div>
			</div>


		</div>

		<div id = "middle">

			<div id = "container">
				<div id = "content">
                 