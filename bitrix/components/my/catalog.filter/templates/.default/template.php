<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
} ?>
<!--<pre style="text-align: left">--><?//print_r($arResult)?><!--</pre>-->
<div class="filter">
	<h3>фильтр</h3>
	<form method="get">
	<?foreach($arResult['FORMS'] as $html):?>
			<div class="item">
			<?=$html?>
			</div>
	<?endforeach?>
		<hr style="clear: both">
		<input type="submit" name="FILTER_ACTION" value="Подобрать">
	</form>
</div>