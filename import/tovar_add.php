<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php"); ?>
<? require_once($_SERVER["DOCUMENT_ROOT"] . "/import/class/import.php"); ?>
<? require_once($_SERVER["DOCUMENT_ROOT"] . "/import/class/entero.php"); ?>
<?
	//	ini_set('allow_url_fopen', '1');
	CModule::IncludeModule('iblock');

	if ($_REQUEST['tovar_xml_id']) {
		global $DB;
		$id             = $_REQUEST['tovar_xml_id'];
		$section_id     = $_REQUEST['section_id'];
		$section_xml_id = import::GetSectionXMLIDByID($section_id);

		$q       = "SELECT * FROM b_iblock_element WHERE IBLOCK_SECTION_ID = {$section_id} AND XML_ID = {$id}";
		$element = $DB->Query($q)
				->Fetch();
		if (!entero::CheckIssetTovarInBitrix($id)) {
			$tovar = entero::GetItem("/item/{$id}");
			$id = import::TovarAddFromArray($tovar, $section_xml_id);
		}

	}
?>
	Количество товаров в разделе - <?= import::CountTovarsInSection($section_id); ?><br>
	Последний добавленный товар - ID = <?=$id?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php"); ?>