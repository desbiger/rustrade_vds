<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
		die();
	}


	//получаем список сущесвтующих разделов

	CModule::IncludeModule("iblock");


	$properties = CIBlockProperty::GetList(null, array('IBLOCK_ID' => 2));
	while ($list = $properties->GetNext()) {
		$sections_List[$list['ID']] = $list['NAME'];
	}


	$arComponentParameters = array(
			"GROUPS" => array(
					"SETTINGS" => array(
							"NAME" => "Дополнительные настройки",
							"SORT" => 10,
					),
			),
			"PARAMETERS" => array(

					"PROP_ID" => Array(
							"PARENT" => "SETTINGS",
							"NAME" => "Свойство бренд",
							"TYPE" => "LIST",
							"VALUES" => $sections_List
					),

			)
	);

