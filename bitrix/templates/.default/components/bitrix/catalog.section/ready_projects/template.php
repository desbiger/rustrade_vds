<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
} ?>

<!--<pre>--><?//print_r($arResult)?><!--</pre>-->
<?foreach($arResult['ITEMS'] as $vol):?>
		<div class="project_node">
			<h3><?=$vol['NAME']?></h3>
		</div>
<?endforeach?>
<!--<pre>--><?//print_r(TovarsGroup::factory(44158)->GetTovarsAndQuantity())?><!--</pre>-->