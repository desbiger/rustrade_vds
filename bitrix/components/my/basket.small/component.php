<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
		die();
	}
	$session   = $_SESSION['fixed_session_id'];
	$iblock_id = 7;


	CModule::IncludeModule('iblock');
	$arResult['COUNT'] = CIblockElement::GetList(null, array(
		'IBLOCK_ID' => $iblock_id,
		'PROPERTY_SESSION' => $session
	))
			->SelectedRowsCount();

	$this->IncludeComponentTemplate();
?>