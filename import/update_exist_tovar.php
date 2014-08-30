<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php"); ?>
<? require_once($_SERVER["DOCUMENT_ROOT"] . "/import/class/import.php"); ?>
<? require_once($_SERVER["DOCUMENT_ROOT"] . "/import/class/entero.php"); ?>
<?
	//	ini_set('allow_url_fopen', '1');
	CModule::IncludeModule('iblock');
	$t = CIBlockElement::GetList(null, array('IBLOCK_ID' => 14));
	$i = 0;
	while ($res = $t->Fetch()) {
		$i++;
		$arResult[] = $res['XML_ID'];
		import::TovarUpdate(entero::GetItemReg("/item/" . $res['XML_ID']), $res['ID']);
		file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/update_result.log", $i . " јйди - " . $res['ID']);
		set_time_limit(60);
	}
?>
	<!--	<pre>--><?//print_r($arResult)?><!--</pre>-->
<?



?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php"); ?>