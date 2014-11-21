<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
		die();
	}

	$iblock_id = 2;
	CModule::IncludeModule('iblock');
	$q = "
	SELECT
	  el.*, prop.`VALUE`  AS PRICE
	FROM
	  b_iblock_element AS el
	  LEFT JOIN `b_iblock_element_property` AS prop
	    ON (
	      el.`ID` = prop.`IBLOCK_ELEMENT_ID`
	      AND prop.`IBLOCK_PROPERTY_ID` = 2
	    )
	WHERE el.`IBLOCK_ID` = {$iblock_id}
	ORDER BY RAND()
	LIMIT 8
	";

	$t = $DB->Query($q);
	while ($temp = $t->Fetch()) {
		$props = array();
		$tovar = CIblockElement::GetByID($temp['ID'])->GetNext();
		$temp['DETAIL_PAGE_URL'] = $tovar['DETAIL_PAGE_URL'];
		$p_res = CIBlockElement::GetProperty($temp['IBLOCK_ID'],$temp['ID']);
		while($prop = $p_res->GetNext()){
			$props[$prop['CODE']] = $prop;
		}
		$temp['PROPS'] = $props;
		$arResult['ITEMS'][] = $temp;
	}


	$this->IncludeComponentTemplate();


?>