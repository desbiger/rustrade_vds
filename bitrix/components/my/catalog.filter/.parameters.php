<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
		die();
	}


	//получаем список сущесвтующих разделов

	CModule::IncludeModule("iblock");

	$sections = CIBlockSection::GetList(Array("left_margin" => "asc"), array("IBLOCK_ID" => "2"), null, array(
			"ID",
			"NAME",
			"DEPTH_LEVEL"
	));
	while ($list = $sections->GetNext()) {
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
//					"FOLDER" => Array(
//							"PARENT" => "SETTINGS",
//							"NAME" => "Папка от куда будем барать список",
//							"TYPE" => "STRING"
//					),
					'PROP_LIST' => array(
							'PARENT' => 'SETTINGS',
							'TYPE' => 'STRING',
							'MULTIPLE' => 'Y',
							'NAME' => 'Список свойств выводимых в фильтре',
					),
//					"SECT" => Array(
//							"PARENT" => "SETTINGS",
//							"NAME" => "",
//							"TYPE" => "LIST",
//							"VALUES" => $sections_List
//					),

			)
	);

