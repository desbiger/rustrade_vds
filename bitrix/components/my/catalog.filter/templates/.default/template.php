<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
} ?>
	<!--<pre style="text-align: left">--><? //print_r($arResult)?><!--</pre>-->
<? if (count($arResult['FORMS'])): ?>
	<h3 style = "margin-top: 20px">Фильтр товаров</h3>
	<div class = "news">
		<div class = "filter">
			<form method = "get">
				<? foreach ($arResult['FORMS'] as $html): ?>
					<div class = "item">
						<?= $html ?>
					</div>
				<? endforeach ?>
				<input class="blue_button" style="position: inherit!important;" type = "submit" name = "FILTER_ACTION" value = "Подобрать">
			</form>
		</div>
	</div>
<? endif ?>