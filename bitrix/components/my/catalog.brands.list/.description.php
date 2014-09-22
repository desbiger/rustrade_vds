<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => "Список брендов",
	"DESCRIPTION" => "Формирует список уникальных значений брендов",
	"ICON" => "/images/support.faq.section.list.gif",
	"PATH" => array(
		"ID" => "Мои компоненты",
		"SORT" => 1000,
		"CHILD" => array(
			"ID" => "catalog_my",
			"NAME" => "Каталог",
			"SORT" => 30,
		),
	),
);

?>