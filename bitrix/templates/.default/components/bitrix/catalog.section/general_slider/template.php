<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
} ?>


<!--<pre>--><? //print_r($arResult)?><!--</pre>-->
<div class="slider">
	<div class="folio_block">

		<div class="main_view">

			<div class="window">
				<ul class="image_reel" style="top: -239px;">
					<? foreach ($arResult['ITEMS'] as $vol): ?>
						<li>
							<a href="#"><img style="width:900px; bottom: 0" src="<?= $vol['DETAIL_PICTURE']['SRC'] ?>" alt=""/></a>
						</li>
					<? endforeach ?>
				</ul>
			</div>
			<div class="paging">
				<? foreach ($arResult['ITEMS'] as $k => $vol): ?>
					<a href="#" rel="<?= $k + 1 ?>">&nbsp;</a>
				<? endforeach ?>
			</div>

		</div>
	</div>

</div>