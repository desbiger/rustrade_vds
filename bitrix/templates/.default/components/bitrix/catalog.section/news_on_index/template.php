<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
} ?>
<div class="clear"></div>
<div class = "catalog-section">
	<?foreach ($arResult['ITEMS'] as $news): ?>
		<?$img = CFile::ResizeImageGet($news['DETAIL_PICTURE']['ID'], array(
			'width' => 210,
			'height' => 200
		))
		?>
		<div class = "news_item">
			<a href="<?=$news['DETAIL_PAGE_URL']?>"><img src = "<?= $img['src'] ?>"></a>
			<a href="<?=$news['DETAIL_PAGE_URL']?>"><h4><?=$news['NAME']?></h4></a>

				<p><?=substr(strip_tags($news['DETAIL_TEXT']), 0, 200)?>...</p>
		</div>
	<? endforeach?>
</div>

