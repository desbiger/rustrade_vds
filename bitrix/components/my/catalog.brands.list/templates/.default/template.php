<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
} ?>
<?
	function ElementsCount($brend,$brend_prop_id)
	{
		global $DB;
		$q = "
		SELECT * FROM
		  b_iblock_element as el,
		  b_iblock_element_property as prop

		WHERE
			prop.IBLOCK_PROPERTY_ID = $brend_prop_id
			AND prop.VALUE = '$brend'
			AND prop.IBLOCK_ELEMENT_ID = el.ID
		GROUP BY el.ID
			";
		return $DB->Query($q)->SelectedRowsCount();
	}

?>
<style type = "text/css">
	.one_leter {
		width: 50%;
		float: left;
		text-align: left;
		font-size: 10px;
	}

	.one_leter h4 {
		text-align: left;
		margin-bottom: -15px;
		margin-top: 10px;
		font-size: 15px;
	}

	.one_leter a {
		font-size: 12px;
		margin-left: 15px;
		margin-right: 2px;
		margin-top: 3px;
	}
</style>
<div class = "cat_tit">
	<a href = "#">Список брендов</a> <img src = "/bitrix/templates/Productions/img/marker2.png" alt = "m2">
</div>
<? $cur_leter = ''; ?>
<? foreach ($arResult['ITEMS'] as $key => $brend): ?>
<? if (substr($brend['VALUE'], 0, 1) == $cur_leter): ?>
	<a href = "/catalog/brends/<?= $brend['VALUE'] ?>/"><?= $brend['VALUE'] ?></a> <?=ElementsCount($brend['VALUE'],11)?><br>
<? else: ?>
<? $cur_leter = substr($brend['VALUE'], 0, 1) ?>
<?= $key != 0 ? "</div>" : '' ?>
<div class = "one_leter">
	<h4><?= $cur_leter ?></h4>

	<a href = "/catalog/brends/<?= $brend['VALUE'] ?>/"><?= $brend['VALUE'] ?></a> <?=ElementsCount($brend['VALUE'],11)?><br>
	<? endif ?>

	<? endforeach ?>
</div>