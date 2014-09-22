<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
		die();
	}

	$prop_id = $arParams['PROP_ID'];
	$q = "
	SELECT * FROM
	b_iblock_element_property as prop
	WHERE prop.IBLOCK_PROPERTY_ID = $prop_id
	GROUP BY prop.VALUE
	ORDER BY prop.VALUE
	";
	$s = $DB->Query($q);

	while ($t = $s->Fetch()) {
		$arResult['ITEMS'][] = $t;
	}

	$this->IncludeComponentTemplate();


?>