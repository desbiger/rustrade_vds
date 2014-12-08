<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
} ?>


<!--<pre>--><? //print_r($arResult)?><!--</pre>-->
<div class = "slider">
	<div class = "folio_block">

		<div class = "main_view">

			<div class = "window">
				<div class = "image_reel" style = "top: -239px;">
					<? foreach ($arResult['ITEMS'] as $vol): ?>
						<a href = "#"><img style = "width:950px; bottom: 0" src = "<?= $vol['DETAIL_PICTURE']['SRC'] ?>" alt = ""/></a>
					<? endforeach ?>
				</div>
			</div>
			<div class = "paging">
				<? foreach ($arResult['ITEMS'] as $k => $vol): ?>
					<a href = "#" rel = "<?= $k + 1 ?>">&nbsp;</a>
				<? endforeach ?>
			</div>

		</div>
	</div>


</div>