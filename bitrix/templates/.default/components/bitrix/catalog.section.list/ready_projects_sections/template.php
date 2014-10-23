<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
} ?>

<!--	<pre>--><? // print_r($arResult) ?><!--</pre>-->
<? $summa = 0; ?>

<? foreach ($arResult['SECTIONS'] as $vol): ?>
	<? $cdb  = CIBlockElement::GetList(array('SORT' => 'ASC'), array(
			'IBLOCK_SECTION_ID' => $vol['ID'],
			'IBLOCK_ID' => 12
	))
			->GetNextElement();
	$element = $cdb->GetProperties();

	foreach ($element['GROUPS']['VALUE'] as $group) {

		$summa += TovarsGroup::factory($group)
				->GetTovarsAndQuantity(true)->SUMMA;
	}
	?>
	<div class = "project_node">
		<h3><?= $vol['NAME'] ?></h3>

		<div class = "props">
			<? foreach ($element['PROP']['VALUE'] as $k => $v): ?>
				<p>
					<?= $element['PROP']['DESCRIPTION'][$k] ?>: <?= $v ?>
				</p>
			<? endforeach ?>
		</div>
		<br/>
		Ваши вложения:
		<span class = "project_price">
		<?= preg_replace("|([0-9]{1,3})([0-9]{3})([0-9]{3})|isU", "$1 $2 $3", $summa) ?> р.
		</span>
		<a href = "" class="blue_button"  style="position: inherit">Подробнее</a>
	</div>
<? endforeach ?>
