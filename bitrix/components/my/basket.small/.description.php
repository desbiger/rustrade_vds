<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => "Малая корзина",
	"DESCRIPTION" => "Выводит количество товара в заказе",
	"ICON" => "/images/news_list.gif",
	"SORT" => 20,
	"CACHE_PATH" => "Y",
	"PATH" => array(
		"ID" => "Хит Медиа",
		"CHILD" => array(
			"ID" => "shop",
			"NAME" => "Магазин",
			"SORT" => 10,
			"CHILD" => array(
				"ID" => "basket",
			),
		),
	),
);

?>