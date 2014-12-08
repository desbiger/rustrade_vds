<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
} ?>


<!--<pre>--><? //print_r($arResult)?><!--</pre>-->
<div class = "slider_vertikal">
	<ul>
		<? foreach ($arResult['ITEMS'] as $vol): ?>
			<li>
				<a target="_new" href = "<?=$vol['PROPERTIES']['LINK']['VALUE']?>">
					<img style="height: 261px; width: 250px" src = "<?= $vol['DETAIL_PICTURE']['SRC'] ?>" alt = ""/>
				</a>
			</li>
		<? endforeach ?>
	</ul>
</div>