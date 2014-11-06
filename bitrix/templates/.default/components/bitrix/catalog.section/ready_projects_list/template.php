<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}/** @var array $arParams */
?>
<? $tovars = TovarsGroup::factory($_REQUEST['SECTION_ID'])
		->GetTovarsAndQuantity() ?>
	<!--	<pre>--><? // print_r($arResult) ?><!--</pre>-->

<? foreach ($arResult['ITEMS'] as $vol): ?>
	<? $summa = 0; ?>
	<?
	foreach ($vol['PROPERTIES']['GROUPS']['VALUE'] as $group) {

		$summa += TovarsGroup::factory($group)
				->GetTovarsAndQuantity(true)->SUMMA;
	} ?>
	<div class = "project_node">
		<h1><?= $vol['NAME'] ?></h1>
		<hr/>

		<?
			if ($vol['DETAIL_PICTURE']['ID']) {
				$img = CFile::ResizeImageGet($vol['DETAIL_PICTURE']['ID'], array(
						'width' => 350,
						'height' => 350
				), BX_RESIZE_IMAGE_EXACT);
			}
			else {
				$img['src'] = '';
			}
		?>
		<div class = "img_logo">
			<img src = "<?= $img['src'] ?>" alt = ""/>
		</div>
		<div class = "props">
			<ul>
				<? foreach ($vol['PROPERTIES']['PROP']['VALUE'] as $k => $v): ?>
					<li><?= $vol['PROPERTIES']['PROP']['DESCRIPTION'][$k] ?>: <?= $v ?></li>
				<? endforeach ?>
			</ul>
			<?=$vol['DETAIL_TEXT']?>
			<div class = "price"><?= TovarsGroup::FormatetdSumma($summa) ?> руб.</div>
		</div>


	</div>

	<div class = "tabs">
		<ul class = "tabNavigation">
			<li><a href = "#s">Спецификация</a></li>
			<li><a href = "#d">Фотогалерея</a></li>
		</ul>
		<div id = "s">
			<h3>Спецификация</h3>
			<? $summa = 0; ?>
			<? foreach ($vol['PROPERTIES']['GROUPS']['VALUE'] as $group): ?>

				<?$list = TovarsGroup::factory($group)
						->GetTovarsAndQuantity(true)?>
				<?= View::Factory(__DIR__ . '/view/groups.php')
						->bind('tovars', $list); ?>
			<? endforeach ?>
		</div>
		<div id = "d">
			<? foreach ($vol['PROPERTIES']['DRAWINGS']['VALUE'] as $draws): ?>
				<? $img = CFile::ResizeImageGet($draws, array(
						'width' => 150,
						'height' => 150
				), BX_RESIZE_IMAGE_EXACT) ?>
				<a rel="222" href = "<?= CFile::GetPath($draws) ?>" class="fancy">
					<img src = "<?= $img['src'] ?>" alt = ""/>
				</a>
			<? endforeach ?>
		</div>
	</div>
<? endforeach ?>