<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => "Компонент переноса данных",
	"DESCRIPTION" => "Компонент переноса данных",
	"ICON" => "/images/support.faq.section.list.gif",
	"PATH" => array(
		"ID" => "Мои компоненты",
		"SORT" => 1000,
		"CHILD" => array(
			"ID" => "Перенос данных",
			"NAME" => GetMessage("SUPPORT_FAQ_SL_COMPONENTS"),
			"SORT" => 30,
		),
	),
);

?>