<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
		die();
	}
	include_once('classes/forms.php');
	include_once('classes/filter.php');
	include_once('config/fields_type.php');


	if ($_REQUEST['FILTER_ACTION']) {
		//
		?>
		<!--			<pre>--><?//print_r($_REQUEST)?><!--</pre>-->
		<? //
		$sql = array();
		foreach ($types as $key => $vol) {

			$description = $key;
			$code        = $vol['CODE'];


			if ($vol['TYPE'] == 'interval') {

				if ($vol['REAL_CODE'] == 'Y') {
					$code    = $vol['CODE'];
					$prop_id = $vol['PROPERTY_ID'];
					$WHERE   = "WHERE prop.IBLOCK_PROPERTY_ID = {$property_id}";
				}
				else {
					$WHERE = "WHERE prop.`DESCRIPTION` = '{$description}'";
				}

				$min = $_REQUEST["min_{$code}"] != '' ? "AND prop.`VALUE_NUM` > {$_REQUEST["min_{$code}"]}" : "";
				$max = $_REQUEST["max_{$code}"] != '' ? "AND prop.`VALUE_NUM` < {$_REQUEST["max_{$code}"]}" : "";
				if ($min != '' || $max != '') {
					$sql[] = "(SELECT
					    prop.`IBLOCK_ELEMENT_ID`
					  FROM
					    `b_iblock_element_property` AS prop
					  {$WHERE}
					    {$min}
					    {$max})";
				}

			}
			elseif ($vol['TYPE'] == 'checkbox') {
				$check_values = array();
				foreach ($_REQUEST[$code] as $values) {
					$check_values[] = "'" . urldecode($values) . "'";
				}
				if (count($check_values) > 0) {
					$check_values = implode(",", $check_values);
					$sql[]        = "(SELECT
					    prop.`IBLOCK_ELEMENT_ID`
					  FROM
					    `b_iblock_element_property` AS prop
					  WHERE prop.`DESCRIPTION` = '{$description}'
					    AND prop.`VALUE` IN({$check_values}) )";
				}

			}
			elseif ($vol['TYPE'] == 'select') {
				$select = $_REQUEST[$code];
				if ($select != '') {
					$sql[] = "(SELECT
					    prop.`IBLOCK_ELEMENT_ID`
					  FROM
					    `b_iblock_element_property` AS prop
					  WHERE prop.`DESCRIPTION` = '{$description}'
					    AND prop.`VALUE` = '{$select}' )";
				}

			}
		}
		if (count($sql) > 0) {
			$dop_sql = implode(" AND el.`ID` IN  ", $sql);
			$FINAL   = "SELECT
			  *
			FROM
			  `b_iblock_element` AS el
			WHERE el.`ID` IN ";
			$FINAL .= $dop_sql;

			global $DB;
			$res = $DB->Query($FINAL);
			while ($item = $res->Fetch()) {
				$ids[] = $item['ID'];
			}
			$GLOBALS['arrFilter'] = count($ids) > 0 ? array('ID' => $ids) : array('ID' => 0);
		}
	}


	CModule::IncludeModule('iblock');

	//	---------------------получаем уникальные значения множественного общего свойства-------------------------

	foreach($types as $type_key => $type_vol){
		$descriptions[] = "'".$type_key."'";
	}
	$types_list =  implode(",",$descriptions);

	$section_id = $_REQUEST['SECTION_ID'];
	$q          = "
SELECT
  *
FROM
  `b_iblock_element_property` AS prop
WHERE
 prop.`DESCRIPTION` IN ({$types_list})
 AND prop.`IBLOCK_ELEMENT_ID` IN
  (SELECT
    el.`ID`
  FROM
    `b_iblock_element` AS el
  WHERE el.`IBLOCK_SECTION_ID` = {$section_id})
    AND NOT ISNULL(prop.`DESCRIPTION`)
GROUP BY prop.`DESCRIPTION`
	";

	$t = $DB->Query($q);
	while ($temp = $t->Fetch()) {
		$value[$temp['DESCRIPTION']]              = filter::GetValues($temp['DESCRIPTION']);
		$arResult['ITEMS'][]                      = $temp;
		$arResult['VALUES'][$temp['DESCRIPTION']] = $value[$temp['DESCRIPTION']];
	}

	//	---------------------получаем значения свойств добавленных в конфиг общего свойства-------------------------

//	foreach ($types as $kkey => $ttype) {
//		if ($ttype['REAL_CODE'] == 'Y') {
//			$property_id = $ttype['PROERTY_ID'];
//			$section_id  = $_REQUEST['SECTION_ID'];
//			$q           = "
//	SELECT
//	  *
//	FROM
//	  `b_iblock_element_property` AS prop
//	WHERE prop.`IBLOCK_ELEMENT_ID` IN
//	  (SELECT
//	    el.`ID`
//	  FROM
//	    `b_iblock_element` AS el
//	  WHERE el.`IBLOCK_SECTION_ID` = {$section_id})
//	    AND prop.`IBLOCK_PROPERTY_ID` = {$property_id}
//		";
//
//			$t = $DB->Query($q);
//			if ($temp = $t->Fetch()) {
//				$value[$kkey]                             = filter::GetValues($kkey);
//				$arResult['ITEMS'][]                      = $temp;
//				$arResult['VALUES'][$kkey] = $value[$kkey];
//			}
//		}
//	}


	$i = 0;
	foreach ($arResult['ITEMS'] as $de) {
		$i++;
		$description         = $de['DESCRIPTION'];
		$values              = $arResult['VALUES'][$description];
		$arResult['FORMS'][] = filter::GetHTMLForm($description, $values, "XML_PROP_{$i}", $types);
	}


	$this->IncludeComponentTemplate();


?>